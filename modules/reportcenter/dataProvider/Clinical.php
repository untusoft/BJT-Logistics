<?php
namespace modules\reportcenter\dataProvider;

if(!isset($_SESSION)){
	session_name('GaiaEHR');
	session_start();
	session_cache_limiter('private');
}
include_once('Reports.php');
include_once(ROOT . '/classes/MatchaHelper.php');
include_once(ROOT . '/dataProvider/User.php');
include_once(ROOT . '/dataProvider/Patient.php');
include_once(ROOT . '/dataProvider/Encounter.php');
include_once(ROOT . '/dataProvider/i18nRouter.php');

class Clinical extends Reports {
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

	public function createClinicalReport(\stdClass $params) {
		ob_end_clean();
		$Url = $this->ReportBuilder($params->html, 10);
		return array(
			'success' => true,
			'url' => $Url
		);
	}

	public function getClinicalList(\stdClass $params) {

		$params->to = ($params->to == '') ? date('Y-m-d') : $params->to;

		$sql = "SELECT *, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(DOB)), '%Y')+0 AS age, CONCAT(fname, ' ', mname, ' ', lname) AS fullname FROM patient";

		$whereArray = array();
		$whereStatement = '';

		if($params->from == '' && $params->to == '')
			$whereArray[] = "date_created BETWEEN '$params->from 00:00:00' AND '$params->to 23:59:59'";
		if(isset($params->sex) && ($params->sex != '' && $params->sex != 'Both'))
			$whereArray[] = "sex='$params->sex'";
		if(isset($params->race) && $params->race != '')
			$whereArray[] = "race='$params->race'";
		if(isset($params->pid) && $params->pid != '')
			$whereArray[] = "pid='$params->pid'";
		if(isset($params->ethnicity) && $params->ethnicity != '')
			$whereArray[] = "ethnicity='" . $this->getEthnicityByKey($params->ethnicity) ."'";

		foreach($whereArray as $whereSegment)
			$whereStatement .= $whereSegment . ' AND ';
		if(count($whereArray) >= 1)
			$sql .= substr(" WHERE " . $whereStatement, 0, -5);
		$sql .= " HAVING age BETWEEN " . ($params->age_from == '' ? '0' : $params->age_from) . " AND " . ($params->age_to == '' ? '100' : $params->age_to);

		$this->db->setSQL($sql);
		$data = $this->db->fetchRecords(\PDO::FETCH_ASSOC);

		return $data;
	}

	public function getEthnicityByKey($key) {
		$sql = "SELECT option_name
	            FROM combo_lists_options
	            WHERE option_value ='$key'";
		$this->db->setSQL($sql);
		return $this->db->fetchRecord(\PDO::FETCH_ASSOC);
	}

}