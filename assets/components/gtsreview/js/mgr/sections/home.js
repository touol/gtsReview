gtsReview.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'gtsreview-panel-home',
            renderTo: 'gtsreview-panel-home-div'
        }]
    });
    gtsReview.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(gtsReview.page.Home, MODx.Component);
Ext.reg('gtsreview-page-home', gtsReview.page.Home);