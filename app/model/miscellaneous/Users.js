
Ext.define('App.model.miscellaneous.Users', {
	extend: 'Ext.data.Model',
	fields: [
		{
			name: 'id',
			type: 'int',
			comment: 'User Account ID'
		},
		{
			name: 'create_uid',
			type: 'int',
			comment: 'create user ID'
		},
		{
			name: 'update_uid',
			type: 'int',
			comment: 'update user ID'
		},
		{
			name: 'create_date',
			type: 'date',
			comment: 'create date',
			dateFormat: 'Y-m-d H:i:s'
		},
		{
			name: 'update_date',
			type: 'date',
			comment: 'last update date',
			dateFormat: 'Y-m-d H:i:s'
		},
		{
			name: 'username',
			type: 'string',
			comment: 'username'
		},
		{
			name: 'title',
			type: 'string',
			comment: 'title (Mr. Mrs.)'
		},
		{
			name: 'fname',
			type: 'string',
			comment: 'first name'
		},
		{
			name: 'mname',
			type: 'string',
			comment: 'middle name'
		},
		{
			name: 'lname',
			type: 'string',
			comment: 'last name'
		},
		{
			name: 'pin',
			type: 'string',
			comment: 'pin number'
		},
		{
			name: 'npi',
			type: 'string',
			comment: 'National Provider Identifier'
		},
		{
			name: 'fedtaxid',
			type: 'string',
			comment: 'federal tax id'
		},
		{
			name: 'feddrugid',
			type: 'string',
			comment: 'federal drug id'
		},
		{
			name: 'email',
			type: 'string',
			comment: 'email'
		},
		{
			name: 'specialty',
			type: 'string',
			comment: 'specialty'
		},
		{
			name: 'taxonomy',
			type: 'string',
			comment: 'taxonomy',
			defaultValue: '207Q00000X'
		},
		{
			name: 'facility_id',
			type: 'int'
		}
	],
	proxy: {
		type: 'direct',
		api: {
			read: 'User.getCurrentUserData',
			update: 'User.updateUser'
		}
	}
});