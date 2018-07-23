<?php 
require_once("../../includes/class.mysql.php");
define("TIMESTAMP",time()) ;
mysql_query("SET NAMES uft8"); 
mysql_query("SET character_set_results=uft-8"); 
$db = New DB();

if($_GET[check]=="idcard_idrive"){
	
	$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
	$res[driver_doc] = $db->select_query("SELECT idcard,iddriving,idcard_finish,iddriving_finish FROM web_driver WHERE id='" . $_GET[user_id] . "' ");
    $arr[driver_doc] = $db->fetch($res[driver_doc]);
    
    header('Content-Type: application/json');
    echo json_encode($arr[driver_doc]);
//    echo $_GET[user_id];
}

if($_GET[check]=="car_driver"){
	$user_id = $_GET[user_id];
	$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
	$num = $db->num_rows('web_carall','id','drivername="'.$user_id.'" ');
    $result[num] = $num;
    
    header('Content-Type: application/json');
    echo json_encode($result);
//    echo $_GET[user_id];
}
?>