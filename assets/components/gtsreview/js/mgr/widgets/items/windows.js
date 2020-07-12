gtsReview.window.CreateItem = function (config) {
    config = config || {}
    config.url = gtsReview.config.connector_url

    Ext.applyIf(config, {
        title: _('gtsreview_item_create'),
        width: 600,
        cls: 'gtsreview_windows',
        baseParams: {
            action: 'mgr/item/create',
            resource_id: config.resource_id
        }
    })
    gtsReview.window.CreateItem.superclass.constructor.call(this, config)

    this.on('success', function (data) {
        if (data.a.result.object) {
            // Авто запуск при создании новой подписик
            if (data.a.result.object.mode) {
                if (data.a.result.object.mode === 'new') {
                    var grid = Ext.getCmp('gtsreview-grid-items')
                    grid.updateItem(grid, '', {data: data.a.result.object})
                }
            }
        }
    }, this)
}
Ext.extend(gtsReview.window.CreateItem, gtsReview.window.Default, {

    getFields: function (config) {
        return [
            {xtype: 'hidden', name: 'id', id: config.id + '-id'},
            {
                xtype: 'textfield',
                fieldLabel: _('gtsreview_item_name'),
                name: 'name',
                id: config.id + '-name',
                anchor: '99%',
                allowBlank: false,
            }, {
                xtype: 'textarea',
                fieldLabel: _('gtsreview_item_description'),
                name: 'description',
                id: config.id + '-description',
                height: 150,
                anchor: '99%'
            },  {
                xtype: 'gtsreview-combo-filter-resource',
                fieldLabel: _('gtsreview_item_resource_id'),
                name: 'resource_id',
                id: config.id + '-resource_id',
                height: 150,
                anchor: '99%'
            }, {
                xtype: 'xcheckbox',
                boxLabel: _('gtsreview_item_active'),
                name: 'active',
                id: config.id + '-active',
                checked: true,
            }
        ]


    }
})
Ext.reg('gtsreview-item-window-create', gtsReview.window.CreateItem)

gtsReview.window.UpdateItem = function (config) {
    config = config || {}

    Ext.applyIf(config, {
        title: _('gtsreview_item_update'),
        baseParams: {
            action: 'mgr/item/update',
            resource_id: config.resource_id
        },
    })
    gtsReview.window.UpdateItem.superclass.constructor.call(this, config)
}
Ext.extend(gtsReview.window.UpdateItem, gtsReview.window.CreateItem)
Ext.reg('gtsreview-item-window-update', gtsReview.window.UpdateItem)