<?php
/**
 * GaiaEHR (Electronic Health Records)
 * Copyright (C) 2013 Certun, LLC.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


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
