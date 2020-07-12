gtsReview.panel.Home = function (config) {
    config = config || {}
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',

        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('gtsreview') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            stateful: true,
            stateId: 'gtsreview-panel-home',
            stateEvents: ['tabchange'],
            getState: function () {return {activeTab: this.items.indexOf(this.getActiveTab())}},
            items: [{
                title: _('gtsreview_items'),
                layout: 'anchor',
                items: [{
                    html: _('gtsreview_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'gtsreview-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    })
    gtsReview.panel.Home.superclass.constructor.call(this, config)
}
Ext.extend(gtsReview.panel.Home, MODx.Panel)
Ext.reg('gtsreview-panel-home', gtsReview.panel.Home)

Ext.onReady(function () {
    if (gtsReview.config.help_buttons.length > 0) {
        gtsReview.buttons.help = function (config) {
            config = config || {}
            for (var i = 0; i < gtsReview.config.help_buttons.length; i++) {
                if (!gtsReview.config.help_buttons.hasOwnProperty(i)) {
                    continue
                }
                gtsReview.config.help_buttons[i]['handler'] = this.loadPaneURl
            }
            Ext.applyIf(config, {
                buttons: gtsReview.config.help_buttons
            })
            gtsReview.buttons.help.superclass.constructor.call(this, config)
        }
        Ext.extend(gtsReview.buttons.help, MODx.toolbar.ActionButtons, {
            loadPaneURl: function (b) {
                var url = b.url;
                var text = b.text;
                if (!url || !url.length) { return false }
                if (url.substring(0, 4) !== 'http') {
                    url = MODx.config.base_help_url + url
                }
                MODx.helpWindow = new Ext.Window({
                    title: text
                    , width: 850
                    , height: 350
                    , resizable: true
                    , maximizable: true
                    , modal: false
                    , layout: 'fit'
                    , bodyStyle: 'padding: 0;'
                    , items: [{
                        xtype: 'container',
                        layout: {
                            type: 'vbox',
                            align: 'stretch'
                        },
                        width: '100%',
                        height: '100%',
                        items: [{
                            autoEl: {
                                tag: 'iframe',
                                src: url,
                                width: '100%',
                                height: '100%',
                                frameBorder: 0
                            }
                        }]
                    }]
                    //,html: '<iframe src="' + url + '" width="100%" height="100%" frameborder="0"></iframe>'
                })
                MODx.helpWindow.show(b)
                return true
            }
        })

        Ext.reg('gtsreview-buttons-help', gtsReview.buttons.help)
        MODx.add('gtsreview-buttons-help')
    }
})
