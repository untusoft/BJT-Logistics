/**
 GaiaEHR (Electronic Health Records)
 Copyright (C) 2013 Certun, LLC.

 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

Ext.define('Modules.reportcenter.view.ReportCenter', {
	extend: 'App.ux.RenderPanel',
	id: 'panelReportCenter',
	pageTitle: _('report_center'),

	initComponent: function(){
		var me = this;

		me.reports = Ext.create('Ext.panel.Panel', {
			layout: 'auto'
		});
		me.pageBody = [ me.reports ];

		/**
		 * Patient Reports List
		 * TODO: Pass the report indicator telling what report should be rendering
		 * this indicator will also be the logic for field rendering.
		 */
		me.FirstCategory = me.addCategory(_('master_reports'), 260);
/*
		me.ClientListReport = me.addReportByCategory(me.FirstCategory, _('client_list_report'), function(btn){

			if(!me.clientListStore) me.clientListStore = Ext.create('Modules.reportcenter.store.ClientList');

			me.goToReportPanelAndSetPanel({
				title: _('client_list_report'),
				layout: 'anchor',
				height: 100,
				items: [
					{
						xtype: 'datefield',
						fieldLabel: _('from'),
						name: 'from',
						format: 'Y-m-d'
					},
					{
						xtype: 'datefield',
						fieldLabel: _('to'),
						name: 'to',
						format: 'Y-m-d'
					},
					{
						xtype: 'patienlivetsearch',
						fieldLabel: _('name'),
						hideLabel: false,
						name: 'pid',
						width: 350
					}
				],
				fn: ClientList.CreateClientList,
				store: me.clientListStore,
				columns: [
					{
						text: _('service_date'),
						xtype: 'datecolumn',
						format: 'Y-m-d',
						dataIndex: 'start_date'
					},
					{
						text: _('name'),
						width: 200,
						dataIndex: 'fullname'
					},
					{
						text: _('address'),
						flex: 1,
						dataIndex: 'fulladdress'
					},
					{
						text: _('home_phone'),
						dataIndex: 'home_phone'
					}
				]
			});
		});
*/
		me.callParent(arguments);
	},

	/**
	 * Function to add categories with the respective with to the
	 * Report Center Panel
	 */
	addCategory: function(category, width){
		var me = this;
		return me.reports.add(Ext.create('Ext.container.Container', {
			cls: 'CategoryContainer',
			width: width,
			layout: 'anchor',
			items: [
				{
					xtype: 'container',
					cls: 'title',
					margin: '0 0 5 0',
					html: category
				}
			]
		}));
	},

	/**
	 * Function to add Items to the category
	 */
	addReportByCategory: function(category, text, fn){
		return category.add(Ext.create('Ext.button.Button', {
			cls: 'CategoryContainerItem',
			anchor: '100%',
			margin: '0 0 5 0',
			textAlign: 'left',
			text: text,
			handler: fn
		}));
	},

	/**
	 * Function to call the report panel.
	 * Remember the report fields are dynamically rendered.
	 */
	goToReportPanelAndSetPanel: function(config){
		var panel = app.MainPanel.getLayout().setActiveItem('panelReportPanel');
		panel.setReportPanel(config);
	},

	/**
	 * This function is called from MitosAPP.js when
	 * this panel is selected in the navigation panel.
	 * place inside this function all the functions you want
	 * to call every this panel becomes active
	 */
	onActive: function(callback){
		callback(true);
	}

});