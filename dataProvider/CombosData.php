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

include_once(ROOT . '/dataProvider/i18nRouter.php');

class CombosData {

	/**
	 * @var MatchaCUP
	 */
	private $CLO;
	/**
	 * @var MatchaCUP
	 */
	private $CC;
	/**
	 * @var MatchaCUP
	 */
	private $P;
	/**
	 * @var MatchaCUP
	 */
	private $F;
	/**
	 * @var MatchaCUP
	 */
	private $FP;
	/**
	 * @var MatchaCUP
	 */
	private $I;
	/**
	 * @var MatchaCUP
	 */
	private $R;
	/**
	 * @var MatchaCUP
	 */
	private $U;
	/**
	 * @var MatchaCUP
	 */
	private $CL;
	/**
	 * @var MatchaCUP
	 */
	private $A;
	/**
	 * @var MatchaCUP
	 */
	private $DT;

	//------------------------------------------------------------------------------------------------------------------
	// Main Sencha Model Getter and Setters
	//------------------------------------------------------------------------------------------------------------------

	public function getTimeZoneList(){
		$locations = [];
		$zones = timezone_identifiers_list();
		foreach($zones as $zone)
			$locations[] = [
				'value' => $zone,
				'name' => str_replace('_', ' ', $zone)
			];
		return $locations;
	}

	public function getUsers(){
		include_once('Person.php');
		if($this->U == null){
			$this->U = MatchaModel::setSenchaModel('App.model.administration.User');
		}
		$rows = [];
		$records = $this->U->load(['active' => 1], ['id','title','fname','mname','lname'])->all();

		foreach($records['data'] as $row){
			$row['name'] = $row['title'] . ' ' . Person::fullname($row['fname'], $row['mname'], $row['lname']);
			unset($row['title'], $row['fname'], $row['mname'], $row['lname']);
			array_push($rows, $row);
		}
		return $rows;
	}

	public function getRoles(){
		if($this->F == null)
			$this->F = MatchaModel::setSenchaModel('App.model.administration.AclRoles');
		return $this->F->load()->all();
	}

	public function getFiledXtypes(){
		return [
			0 => [
				'id' => 1,
				'name' => 'Fieldset',
				'value' => 'fieldset'
			],
			1 => [
				'id' => 2,
				'name' => 'Field Container',
				'value' => 'fieldcontainer'
			],
			2 => [
				'id' => 3,
				'name' => 'Display Field',
				'value' => 'displayfield'
			],
			3 => [
				'id' => 4,
				'name' => 'Text Field',
				'value' => 'textfield'
			],
			4 => [
				'id' => 5,
				'name' => 'TextArea Field',
				'value' => 'textareafield'
			],
			5 => [
				'id' => 6,
				'name' => 'CheckBox Field',
				'value' => 'checkbox'
			],
			6 => [
				'id' => 7,
				'name' => 'Slelect List / Combo Box',
				'value' => 'combobox'
			],
			7 => [
				'id' => 8,
				'name' => 'Radio Field',
				'value' => 'radiofield'
			],
			8 => [
				'id' => 9,
				'name' => 'Date/Time Field',
				'value' => 'mitos.datetime'
			],
			9 => [
				'id' => 10,
				'name' => 'Date Field',
				'value' => 'datefield'
			],
			10 => [
				'id' => 11,
				'name' => 'Time Field',
				'value' => 'timefield'
			],
			11 => [
				'id' => 12,
				'name' => 'Number Field',
				'value' => 'numberfield'
			],
			12 => [
				'id' => 13,
				'name' => 'CheckBox With Family History',
				'value' => 'checkboxwithfamilyhistory'
			]
		];
	}

	public function getThemes(){
		return [
			[
				'name' => 'Gray',
				'value' => 'ext-all-gray'
			],
			[
				'name' => 'Blue',
				'value' => 'ext-all'
			]
		];
	}

}
