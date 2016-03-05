<?php
/**
 * GaiaEHR
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

if(!defined('_GaiaEXEC')) die('No direct access allowed.');
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Logon Screen</title>
    <script type="text/javascript" src="lib/<?php print EXTJS ?>/ext-all.js"></script>
    <link rel="stylesheet" type="text/css" href="resources/css/ext-all-gray.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style_newui.css">
    <link rel="stylesheet" type="text/css" href="resources/css/custom_app.css">

    <link rel="shortcut icon" href="favicon.ico">
    <script type="text/javascript">
        var app,
            acl = {},
            lang = {},
            globals = {},
            site = '<?php print $site ?>',
            localization = '<?php print site_default_localization ?>';
    </script>
    <script src="JSrouter.php?site=<?php print $site ?>"></script>
    <script src="data/api.php?site=<?php print $site ?>"></script>
    <script type="text/javascript">

        window.i18n = window._ = function(key){
            return window.lang[key] || '*'+key+'*';
        };

        window.say = function(args){
	        console.log.apply(this, arguments);
        };

        window.g = function(global){
	        return window.globals[global] || false;
        };

        window.a = function(acl){
	        return window.acl[acl] || false;
        };

        Ext.Loader.setConfig({
            enabled: true,
            disableCaching: true,
            paths: {
                'App': 'app'
            }
        });
        for(var x = 0; x < App.data.length; x++){
            Ext.direct.Manager.addProvider(App.data[x]);
        }
        Ext.onReady(function(){
            app = Ext.create('App.view.login.Login');
        });
    </script>
</head>
<body id="login">
<div id="msg-div"></div>
<div id="copyright" style=" margin:0; overflow: auto; width: 100%; bottom: 0; left:0; padding: 5px 10px; ">
	<div style="float: left">Copyright (C) 2015 Untusoft |:|v<?php print VERSION ?></div>
</body>
</html>