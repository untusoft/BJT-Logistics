
Ext.define('App.view.administration.Roles', {
	extend: 'App.ux.RenderPanel',
	requires: [
		'App.ux.combo.XCombo',
		'Ext.grid.plugin.CellEditing',
		'Ext.ux.DataTip'
	],
	itemId: 'AdministrationRolePanel',
	pageTitle: _('roles_and_permissions'),
	pageBody: [
		{
			xtype:'grid',
			bodyStyle: 'background-color:white',
			itemId: 'AdministrationRoleGrid',
			frame: true,
			columnLines: true,
			tbar: [
				{
					xtype: 'xcombo',
					emptyText: _('select'),
					labelWidth: 50,
					width: 250,
					valueField: 'id',
					displayField: 'title',
					queryMode: 'local',
					store: Ext.create('App.store.administration.AclGroups'),
					itemId: 'AdministrationRoleGroupCombo',
					windowConfig: {
						title: _('add_group')
					},
					formConfig: {
						border: false,
						bodyPadding: 10,
						items: [
							{
								xtype: 'textfield',
								fieldLabel: _('group_name'),
								name: 'title'
							},
							{
								xtype: 'checkbox',
								fieldLabel: _('active'),
								name: 'active'
							}
						]
					}
				},
				'-',
				'->',
				'-',
				{
					xtype: 'button',
					text: _('add_role'),
					iconCls: 'icoAdd',
					action: 'adminAclAddRole'
				},
				'-'
			],
			//    selModel: {
			//        selType: 'cellmodel'
			//    },
			features: [
				{
					ftype: 'grouping'
				}
			],
			plugins: [
				{
					ptype: 'cellediting',
					clicksToEdit: 1
				},
				{
					ptype: 'datatip',
					tpl: _('click_to_edit')
				}
			],
			columns: [
				{
					text: 'Permission',
					width: 250,
					locked: true
				}
			]
		}
	],
	pageButtons: [
		{
			text: _('cancel'),
			cls: 'cancelBtn',
			action: 'adminAclCancel'
		},
		'-',
		{
			text: _('save'),
			cls: 'saveBtn',
			action: 'adminAclSave'
		}
	]
});
