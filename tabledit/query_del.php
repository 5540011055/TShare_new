<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.
require_once("includes/class.mysql.php");

//header('Content-Type: application/json; charset=utf-8');
$table = 'app_language';
$username = 'admin_MANbooking';
$pass = '252631MANbooking';
$db_name = 'admin_apptshare';
$db = New DB();
$db->connectdb($db_name,$username,$pass);
$current_date = time();
mysql_query("SET NAMES uft8"); 
mysql_query("SET character_set_results=uft-8"); 
?>
<table width="100%">
	
<?php 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[dv] = $db->select_query("SELECT * FROM web_driver order by id desc ");
while($arr[dv] = $db->fetch($res[dv])){ ?>
	<tr>
		<td><?=$arr[dv][id];?></td>
		<td><?=$arr[dv][nickname];?></td>
	</tr>
<? }
?>
	
</table>
	</body>
</html>