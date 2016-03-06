<?php

class Globals {

	/**
	 * @var bool|MatchaCUP
	 */
	private static $g = null;

	/**
	 * @return array
	 */
	public static function getGlobals() {
		if(self::$g == null)
			self::$g = MatchaModel::setSenchaModel('App.model.administration.Globals');
		return self::$g->load()->all();
	}

	/**
	 * @param stdClass $params
	 * @return stdClass
	 */
	public function updateGlobals($params) {
		if(self::$g == null)
			self::$g = MatchaModel::setSenchaModel('App.model.administration.Globals');
		$params = self::$g->save($params);
		$this->setGlobals();
		return $params;
	}

	/**
	 * @static
	 * @return mixed
	 */
	public static function setGlobals() {

        if(!isset($_SESSION['globals'])) $_SESSION['globals'] = array();

		if(self::$g == null)
			self::$g = MatchaModel::setSenchaModel('App.model.administration.Globals');
		foreach(self::$g->load()->all() as $setting){
			$_SESSION['globals'][$setting['gl_name']] = $setting['gl_value'];
		}
		$_SESSION['globals']['timezone_offset'] = -14400;
		$_SESSION['globals']['date_time_display_format'] = $_SESSION['globals']['date_display_format'] . ' ' . $_SESSION['globals']['time_display_format'];
		return $_SESSION['globals'];
	}

	/**
	 * @return array
	 */
	public static function getGlobalsArray() {
		if(self::$g == null)
			self::$g = MatchaModel::setSenchaModel('App.model.administration.Globals');
		$gs = array();
		foreach(self::$g->load()->all() AS $g){
			$gs[$g['gl_name']] = $g['gl_value'];
		}
		return $gs;
	}

	/**
	 * @param string $global
	 * @return mix
	 */
	public static function getGlobal($global) {
		if(!isset($_SESSION['globals'])){
			self::setGlobals();
			return self::getGlobal($global);
		} else {
			return isset($_SESSION['globals'][$global]) ? $_SESSION['globals'][$global] : false;
		}
	}

}

//print '<pre>';
//$g = new Globals();
//print_r($g->getGlobalsArray());
