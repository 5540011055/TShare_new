<?php 
include('../../includes/class.mysql.php');
//include('../../includes/config.in.php');
define("DB_HOST_HIS","localhost");
define("DB_NAME_HIS","admin_his");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_apptshare");
define("DB_NAME","admin_web");
$tb_admin_chk = "web_driver";
$db = new DB();

if($_GET[query]=="get_id_province_only"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $str = $_POST[txt_pv]; //กรุงเทพมหานคร
   if(strlen($str)>7){
   	$txt = mb_substr($str,0,7, "utf-8");
   }else{
   	$txt = $_POST[txt_pv];
   }
   $th = "name_th LIKE '%".$txt."%'";
   $en = "or name LIKE '%".$txt."%'";
   $cn = "or name_cn LIKE '%".$txt."%'";
   $pv[province] = $db->select_query("SELECT id,name_th,name_cn,name,area FROM web_province where ".$th." ".$en." ".$cn."   ");
   $pv[province] = $db->fetch($pv[province]);
   header('Content-Type: application/json');
   echo json_encode($pv[province]);
}

if($_GET[query]=="data_province"){
	 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
     $res[category] = $db->select_query("SELECT name_th,id,name FROM web_province   ORDER BY id ");
     while($arr[category] = $db->fetch($res[category])) {
     	$data[] = $arr[category];
     }
     header('Content-Type: application/json');
     echo json_encode($data);
}

if($_GET[checking]=="idcard_overlap"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$idcard = $_POST[txt];
	$check = $db->num_rows($tb_admin_chk,"id","idcard = '".$idcard."' and idcard != '' ");
	
	$return[input] = $idcard;
	$return[check] = $check;
	header('Content-Type: application/json');
	echo json_encode($return);
}

if($_GET[checking]=="login"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$user = $_POST[real_username];
	$pass = $_POST[real_password];

	
	$check_us = $db->num_rows($tb_admin_chk,"id","password='" . $pass . "'  AND username='" . $user . "'");
	if($check_us>0){
		$res[us]  = $db->select_query("SELECT * FROM " . $tb_admin_chk . " WHERE password='" . $pass . "'  AND username='" . $user . "' ");
		$arr[us] = $db->fetch($res[us]);
		session_start();
    	$_SESSION['data_user_name']     = $arr[us][username];
    	$_SESSION['data_user_password'] = $arr[us][password];
    	$_SESSION['data_user_id']       = $arr[us][id];
    	$_SESSION['data_user_class']    = $arr[us][user_class];
    	/*@setcookie("detect_username", $_POST[loginusername], time() + (3000 * 30), "/");
    	@setcookie("detect_userclass", $arr[us][user_class], time() + (3000 * 30), "/");
    	@setcookie("app_remember_user", $_POST[loginusername], time() + (86400 * 30), "/"); // 86400 = 1 day
		@setcookie("app_remember_pass", $_POST[loginpassword], time() + (86400 * 30), "/"); // 86400 = 1 day
		@setcookie('app_remember_time', false);*/
		$data[user] = $arr[us][username];
		$data[class_user] = $arr[us][user_class];
		$data[pass] = $pass;
		
		$return[data] = $data;
		$return[check] = 1;
	}else{
		$return[check] = 0;
	}
	$return[num_rows] = $check_us;
	$return[data_post][user] = $user;
	$return[data_post][pass] = $pass;
	$return[data_post][detail] = $arr[us];
	header('Content-Type: application/json');
	echo json_encode($return);
}
?>