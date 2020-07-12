var gtsReview = function (config) {
    config = config || {};
    gtsReview.superclass.constructor.call(this, config);
};
Ext.extend(gtsReview, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}, buttons: {}
});
Ext.reg('gtsreview', gtsReview);

gtsReview = new gtsReview();