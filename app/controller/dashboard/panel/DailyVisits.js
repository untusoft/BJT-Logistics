

Ext.define('App.controller.dashboard.panel.DailyVisits', {
	extend: 'App.controller.dashboard.Dashboard',

	init: function(){
		if(!a('view_dashboard_daily_visits')) return;

		var me = this;

		me.control({
			'portalpanel': {
				render: me.onDashboardPanelBeforeRender
			},
			'#DashboardPanel': {
				activate: me.onDashboardPanelActivate
			}
		});

		me.addRef([
			{
				ref: 'DashboardRenderPanel',
				selector: '#DashboardPanel'
			},
			{
				ref: 'DashboardDailyVisitsChart',
				selector: '#DashboardDailyVisitsChart'
			}
		]);
	},

	onDashboardPanelActivate: function(){
		this.loadChart();
	},

	onDashboardPanelBeforeRender: function(){
		this.addRightPanel(_('daily_visits'), Ext.create('App.view.dashboard.panel.DailyVisits'));
	},

	loadChart: function(){
		var me = this,
			store = me.getDashboardDailyVisitsChart().getStore(),
			data = [],
			time,
			i,
			j;

		Encounter.getTodayEncounters(function(response){

			var encounters = response;
			for(i=0; i < encounters.length; i++){
				time = Ext.Date.parse(encounters[i].service_date, 'Y-m-d H:i:s').setMinutes(0,0,0);
				var found = false;

				for(j=0; j < data.length; j++){
					if(data[j].time == time){
						data[j].total = data[j].total + 1;
						found = true;
					}
				}

				if(!found){
					data.push({
						total: 1,
						time: time
					});
				}
			}

			store.loadData(data);
		});
	}

});