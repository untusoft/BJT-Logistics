<?php

$API = array(
	'Modules' => array(
		'methods' => array(
			'getAllModules' => array(
				'len' => 0
			),
			'getActiveModules' => array(
				'len' => 0
			),
			'getEnabledModules' => array(
				'len' => 0
			),
			'getDisabledModules' => array(
				'len' => 0
			),
			'getModuleByName' => array(
				'len' => 1
			),
			'updateModule' => array(
				'len' => 1
			)
		)
	),
	'Globals' => array(
		'methods' => array(
			'setGlobals' => array(
				'len' => 0
			),
			'getGlobals' => array(
				'len' => 0
			),
			'getAllGlobals' => array(
				'len' => 0
			),
			'updateGlobals' => array(
				'len' => 1
			)
		)
	),
	'User' => array(
		'methods' => array(
			'getUsers' => array(
				'len' => 1
			),
			'getUser' => array(
				'len' => 1
			),
			'addUser' => array(
				'len' => 1
			),
			'updateUser' => array(
				'len' => 1
			),
			'updatePassword' => array(
				'len' => 1
			),
			'usernameExist' => array(
				'len' => 1
			),
			'getCurrentUserData' => array(
				'len' => 0
			),
			'getCurrentUserBasicData' => array(
				'len' => 0
			),
			'updateMyAccount' => array(
				'len' => 1
			),
			'verifyUserPass' => array(
				'len' => 1
			),
			'getProviders' => array(
				'len' => 0
			),
			'getActiveProviders' => array(
				'len' => 0
			),
			'getUserFullNameById' => array(
				'len' => 1
			)
		)
	),
	'authProcedures' => array(
		'methods' => array(
			'login' => array(
				'len' => 1
			),
			'ckAuth' => array(
				'len' => 0
			),
			'unAuth' => array(
				'len' => 0
			),
			'getSites' => array(
				'len' => 0
			)
		)
	),
    /**
     * Comobo Boxes Data Functions
     */
    'CombosData' => array(
        'methods' => array(
            'getOptionsByListId' => array(
                'len' => 1
            ),
            'getTimeZoneList' => array(
                'len' => 1
            ),
            'getUsers' => array(
                'len' => 0
            ),
            'getRoles' => array(
                'len' => 0
            ),
            'getFiledXtypes' => array(
                'len' => 0
            ),
            'getThemes' => array(
                'len' => 0
            )
        )),

	'Navigation' => array(
		'methods' => array(
			'getNavigation' => array(
				'len' => 0
			)
		)
	),
	'Roles' => array(
		'methods' => array(
			'getRolePerms' => array(
				'len' => 0
			),
			'updateRolePerm' => array(
				'len' => 1
			),
			'getRolesData' => array(
				'len' => 0
			),
			'saveRolesData' => array(
				'len' => 1
			)
		)
	),
	'ACL' => array(
		'methods' => array(

			'getAclGroups' => array(
				'len' => 1
			),
			'getAclGroup' => array(
				'len' => 1
			),
			'addAclGroup' => array(
				'len' => 1
			),
			'updateAclGroup' => array(
				'len' => 1
			),
			'deleteAclGroup' => array(
				'len' => 1
			),
			'getGroupPerms' => array(
				'len' => 1
			),
			'updateGroupPerms' => array(
				'len' => 1
			),
			'getAclRoles' => array(
				'len' => 1
			),
			'getAclRole' => array(
				'len' => 1
			),
			'addAclRole' => array(
				'len' => 1
			),
			'updateAclRole' => array(
				'len' => 1
			),


			'getAllUserPermsAccess' => array(
				'len' => 0
			),
			'hasPermission' => array(
				'len' => 1
			),
			'emergencyAccess' => array(
				'len' => 1
			)
		)
	),

	'CronJob' => array(
		'methods' => array(
			'run' => array(
				'len' => 0
			)
		)
	),
	'i18nRouter' => array(
		'methods' => array(
			'getTranslation' => array(
				'len' => 0
			),
			'getDefaultLanguage' => array(
				'len' => 0
			),
			'getAvailableLanguages' => array(
				'len' => 0
			)
		)
	),
	'SiteSetup' => array(
		'methods' => array(
			'checkDatabaseCredentials' => array(
				'len' => 1
			),
			'checkRequirements' => array(
				'len' => 0
			),
			'setSiteDirBySiteId' => array(
				'len' => 1
			),
			'createDatabaseStructure' => array(
				'len' => 1
			),
			'loadDatabaseData' => array(
				'len' => 1
			),
			'createSiteAdmin' => array(
				'len' => 1
			),
			'createSConfigurationFile' => array(
				'len' => 1
			),
			'loadCode' => array(
				'len' => 1
			)
		)
	)
);
