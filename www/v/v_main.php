<?php/** * �������� ������ * =============== * $title - ��������� * $content - HTML �������� */?><!DOCTYPE html><html><head>	<base href="<?=BASE_URL?>" />	<title><?=$title?></title>        <link rel="shortcut icon" href="icon.png" type="image/png">		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>                <script src="//js/auth.js"></script>        <?=$head?>	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">		<link rel="stylesheet" type="text/css" media="screen" href="v/css/style.css" /> 	</head><body>    <div id="dialog-form" title="Create new user"><p class="validateTips">All form fields are required.</p><form><fieldset><label for="name">Name</label><input type="text" name="name" id="name" value="Jane Smith" class="text ui-widget-content ui-corner-all"><label for="email">Email</label><input type="text" name="email" id="email" value="jane@smith.com" class="text ui-widget-content ui-corner-all"><label for="password">Password</label><input type="password" name="password" id="password" value="xxxxxxx" class="text ui-widget-content ui-corner-all"><input type="submit" tabindex="-1" style="position:absolute; top:-1000px"></fieldset></form></div>	        <div id="bg">	<div id="content">		<?=$content?>	</div>        </div></body></html>