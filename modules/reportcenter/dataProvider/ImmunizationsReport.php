<?php
namespace modules\reportcenter\dataProvider;

if(!isset($_SESSION)){
	session_name('BJTApp');
	session_start();
	session_cache_limiter('private');
}

include_once('Reports.php');
include_once(ROOT . '/classes/MatchaHelper.php');
include_once(ROOT . '/dataProvider/User.php');
include_once(ROOT . '/dataProvider/Patient.php');
include_once(ROOT . '/dataProvider/Encounter.php');

class ImmunizationsReport extends Reports {
	private $db;
	private $user;
	private $patient;
	private $encounter;

	/*
	 * The first thing all classes do, the construct.
	 */
	function __construct() {
		parent::__construct();
		$this->db = new \MatchaHelper();
		$this->user = new \User();
		$this->patient = new \Patient();
		$this->encounter = new \Encounter();

		return;
	}

	public function createImmunizationsReport(\stdClass $params) {
		ob_end_clean();
		$Url = $this->ReportBuilder($params->html, 10);
		return array(
			'success' => true,
			'url' => $Url
		);
	}

	public function getImmunizationsReport(\stdClass $params) {
		$params->to = ($params->to == '') ? date('Y-m-d') : $params->to;
		$from = $params->from;
		$to = $params->to;
		$immu = $params->immu;
		$sql = " SELECT *
	               FROM patient_immunizations
	              WHERE create_date BETWEEN '$from 00:00:00' AND '$to 23:59:59'";
		if(isset($immu) && $immu != '')
			$sql .= " AND immunization_id = '$immu'";
		$this->db->setSQL($sql);
		$records = $this->db->fetchRecords(\PDO::FETCH_ASSOC);
		foreach($records AS $num => $rec){
			$records[$num]['fullname'] = $this->patient->getPatientFullNameByPid($rec['pid']);
		}
		return $records;
	}

}
//$e = new ImmunizationsReport();
//$params = new stdClass();
//$params->from ='2010-03-08';
//$params->to ='2013-03-08';
//echo '<pre>';
//echo '<pre>';
//print_r($e->htmlImmunizationList($params,''));