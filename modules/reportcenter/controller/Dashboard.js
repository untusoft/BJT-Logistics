

Ext.define('Modules.reportcenter.controller.Dashboard', {
	extend: 'Ext.app.Controller',
	requires: [
		'Modules.reportcenter.view.dashboard.WeekVisitsPortlet',
		'App.view.dashboard.panel.Portlet'
	],
	refs: [
		{
			ref: 'DashboardColumnOne',
			selector: '#dashboard-col-1'
		},
		{
			ref: 'DashboardColumnTwo',
			selector: '#dashboard-col-2'
		}
	],

	init: function(){
		var me = this;

		me.control({

		});

		if(me.getDashboardColumnTwo()){
			me.getDashboardColumnTwo().add({
				xtype: 'portlet',
				title: _('week_report'),
				items: [
					{
						xtype: 'weekvisitsportlet',
						height: 400
					}
				]
			});
		}
	},

});