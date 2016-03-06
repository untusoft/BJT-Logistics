<?php


include_once(ROOT . '/dataProvider/ACL.php');
include_once(ROOT . '/dataProvider/i18nRouter.php');

class Navigation
{
	/**
	 * @var \ACL
	 */
	private $ACL;
	private $i18n;
	private $t;

	function __construct()
	{
		$this->ACL = new ACL();
		$this->i18n = i18nRouter::getTranslation();
	}

	private function i18n($w){
		return isset($this->i18n[$w]) ? $this->i18n[$w] : '*' . $w . '*';
	}

	public function getNavigation()
	{
		// *************************************************************************************
		// Renders the items of the navigation panel
		// Default Nav Data
		// *************************************************************************************
		$nav = array();

		$nav[] = array(
			'text' => $this->i18n('dashboard'),
			'leaf' => true,
			'cls' => 'file',
			'iconCls' => 'icoDash',
			'id' => 'App.view.dashboard.Dashboard'
		);
		// *************************************************************************************
		// Administration Folder
		// *************************************************************************************
		$admin = array(
			'text' => $this->i18n('administration'),
			'cls' => 'folder',
			'expanded' => true,
			'iconCls' => 'icoLogo',
			'id' => 'administration'
		);
		if($this->ACL->hasPermission('access_gloabal_settings')){
			$admin['children'][] = array(
				'text' => $this->i18n('global_settings'),
				'leaf' => true,
				'cls' => 'file',
				'id' => 'App.view.administration.Globals'
			);
		}
		if($this->ACL->hasPermission('access_users')){
			$admin['children'][] = array(
				'text' => $this->i18n('users'),
				'leaf' => true,
				'cls' => 'file',
				'id' => 'App.view.administration.Users'
			);
		}
		if($this->ACL->hasPermission('access_roles')){
			$admin['children'][] = array(
				'text' => $this->i18n('roles'),
				'leaf' => true,
				'cls' => 'file',
				'id' => 'App.view.administration.Roles'
			);
		}
		if($this->ACL->hasPermission('access_admin_modules')){
			$admin['children'][] = array(
				'text' => $this->i18n('modules'),
				'leaf' => true,
				'cls' => 'file',
				'id' => 'App.view.administration.Modules'
			);
		}

		if(isset($admin['children']) && count($admin['children']) > 0) array_push($nav, $admin);


		// *************************************************************************************
		// Miscellaneous Folder
		// *************************************************************************************
		$misc = array(
			'text' => $this->i18n('miscellaneous'),
			'cls' => 'folder',
			'expanded' => true,
			'iconCls' => 'icoLogo',
			'id' => 'miscellaneous'
		);

		$misc['children'][] = array(
			'text' => $this->i18n('my_account'),
			'leaf' => true,
			'cls' => 'file',
			'id' => 'App.view.miscellaneous.MyAccount'
		);

		if(isset($misc['children']) && count($misc['children']) > 0) array_push($nav, $misc);

		return $nav;

	}

}
