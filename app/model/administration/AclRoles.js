
Ext.define('App.model.administration.AclRoles', {
	extend: 'Ext.data.Model',
	table: {
		name: 'acl_roles',
		comment: 'Access Control List Roles'
	},
	fields: [
		{
			name: 'id',
			type: 'int'
		},
		{
			name: 'role_name',
			type: 'string'
		},
		{
			name: 'group_id',
			type: 'int',
			index: true
		},
		{
			name: 'seq',
			type: 'int',
			index: true
		},
		{
			name: 'active',
			type: 'bool',
			index: true
		}
	],
	proxy: {
		type: 'direct',
		api: {
			read: 'ACL.getAclRoles',
			create: 'ACL.addAclRole',
			update: 'ACL.updateAclRole'
		},
		reader: {
			root: 'data'
		}
	}
});