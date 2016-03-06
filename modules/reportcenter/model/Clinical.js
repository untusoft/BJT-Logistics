

Ext.define('Modules.reportcenter.model.Clinical', {
	extend: 'Ext.data.Model',
	fields: [
        {name: 'pid', type: 'int'},
        {name: 'create_date', type: 'date', dateFormat: 'Y-m-d H:i:s'},
        {name: 'DOB', type: 'date', dateFormat: 'Y-m-d H:i:s'},
        {name: 'fullname', type: 'string'},
        {name: 'age', type: 'string'},
		{name: 'sex'},
		{name: 'ethnicity'},
		{name: 'race'}
	],
	proxy : {
		type: 'direct',
		api : {
			read  : 'Clinical.getClinicalList'
		}
	}
});