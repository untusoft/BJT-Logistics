

Ext.define('Modules.reportcenter.model.Appointment', {
	extend: 'Ext.data.Model',
	fields: [
        {name: 'pid', type: 'int'},
        {name: 'fullname', type: 'string'},
        {name: 'notes', type: 'string'},
		{name: 'catname'},
		{name: 'facility'},
		{name: 'provider'},
		{name: 'start', type: 'date', dateFormat: 'Y-m-d H:i:s'},
		{name: 'start_time', type: 'date', dateFormat: 'Y-m-d H:i:s A'}
	],
	proxy : {
		type: 'direct',
		api : {
			read  : 'Appointments.getAppointmentsList'
		}
	}
});