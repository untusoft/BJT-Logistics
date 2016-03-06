

Ext.define('App.controller.dashboard.panel.NewResults', {
	extend: 'App.controller.dashboard.Dashboard',

	init: function(){
		if(!a('view_dashboard_new_results')) return;

		var me = this;

		me.control({
			'portalpanel':{
				render: me.onDashboardPanelBeforeRender
			},
			'#DashboardPanel':{
				activate: me.onDashboardPanelActivate
			},
			'#DashboardNewResultsGrid':{
				itemdblclick: me.onDashboardNewResultsGridItemDoubleClick
			}
		});

		me.addRef([
			{
				ref: 'DashboardRenderPanel',
				selector:'#DashboardPanel'
			},
			{
				ref: 'DashboardNewResultsGrid',
				selector:'#DashboardNewResultsGrid'
			}
		]);
	},

	onDashboardNewResultsGridItemDoubleClick: function(grid, record){
		grid.el.mask(_('please_wait'));

		app.setPatient(record.data.pid, null, function(){
			app.openPatientSummary();
			app.onMedicalWin('laboratories');
			grid.el.unmask();
		});
	},


	onDashboardPanelActivate: function(){
		this.getDashboardNewResultsGrid().getStore().load();
	},

	onDashboardPanelBeforeRender: function(){
		this.addRightPanel(_('new_results'), Ext.create('App.view.dashboard.panel.NewResults'));
	}

});