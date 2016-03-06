
Ext.define('App.view.dashboard.Dashboard', {
	extend: 'App.ux.RenderPanel',
	requires: [

	],
	pageTitle: _('dashboard'),
	itemId: 'DashboardPanel',

	initComponent: function(){
		var me = this;

		Ext.apply(me, {
			pageBody: [
			]
		});

		me.callParent();
	}
});
