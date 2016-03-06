

Ext.define('Modules.reportcenter.model.MedicationReport', {
	extend: 'Ext.data.Model',
	fields: [
        {name: 'pid', type: 'int'},
        {name: 'fullname', type: 'string'},
        {name: 'medication', type: 'string'},
        {name: 'type', type: 'string'},
        {name: 'instructions', type: 'string'}
	],
	proxy : {
		type: 'direct',
		api : {
			read  : 'Rx.getPrescriptionsFromAndToAndPid'
		}
	}
});