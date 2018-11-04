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
$tb_car = "web_carall";
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
   $pv[province] = $db->select_query("SELECT id,name_th,name_cn,name,area,code FROM web_province where ".$th." ".$en." ".$cn."  ");
   $pv[province] = $db->fetch($pv[province]);
   header('Content-Type: application/json');
   echo json_encode($pv[province]);
}

if($_GET[query]=="user_data"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[us]  = $db->select_query("SELECT * FROM web_driver WHERE (username = '".$_POST[key]."') or (phone = '".$_POST[key]."')or (email = '".$_POST[key]."') ");
	$arr[us] = $db->fetch($res[us]);
	header('Content-Type: application/json');
	echo json_encode($arr[us]);
}

if($_GET[query]=="user_data_recovery"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[us]  = $db->select_query("SELECT phone,email,username,name FROM web_driver WHERE username = '".$_POST[key]."'  ");
	$arr[us] = $db->fetch($res[us]);
	$return = FALSE;
	if($arr[us]){
		$return[data] = $arr[us];
		$return[type] = 1;
	}else{
		$res[us]  = $db->select_query("SELECT phone,email,username,name FROM web_driver WHERE phone = '".$_POST[key]."'  ");
		$arr[us] = $db->fetch($res[us]);
		if($arr[us]){
			$return[data] = $arr[us];
			$return[type] = 2;
		}else{
			$res[us]  = $db->select_query("SELECT phone,email,username,name FROM web_driver WHERE email = '".$_POST[key]."'  ");
			$arr[us] = $db->fetch($res[us]);
				if($arr[us]){
					$return[data] = $arr[us];
					$return[type] = 3;
				}
		}
	}
	
	header('Content-Type: application/json');
	echo json_encode($return);
}

if($_GET[query]=="data_province"){
	 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
     $res[category] = $db->select_query("SELECT name_th,id,name,code FROM web_province   order by name_th asc");
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

if($_GET[checking]=="car_plate_overlap"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$txt = $_POST[txt];
	$check = $db->num_rows($tb_car,"id","plate_num = '".$txt."' and plate_num != '' ");
	
	$return[input] = $txt;
	$return[check] = $check;
	header('Content-Type: application/json');
	echo json_encode($return);
}

if($_GET[checking]=="phone_overlap"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$txt = $_POST[txt];
	$check = $db->num_rows($tb_admin_chk,"id","phone = '".$txt."' and phone != '' ");
	
	$return[input] = $txt;
	$return[check] = $check;
	header('Content-Type: application/json');
	echo json_encode($return);
}

if($_GET[checking]=="login"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$user = $_POST[real_username];
	$pass = $_POST[real_password];

	
	$check_us = $db->num_rows($tb_admin_chk,"id","password='" . $pass . "'  AND (username='" . $user . "' or phone = '".$user."' or email = '".$user."') ");
	if($check_us>0){
		$res[us]  = $db->select_query("SELECT * FROM " . $tb_admin_chk . " WHERE password='" . $pass . "'  AND (username='" . $user . "' or phone = '".$user."' or email = '".$user."') ");
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
		$data[id] = $arr[us][id];
		
		$return[data] = $data;
		$return[check] = 1;
	}
	else{
		$return[check] = 0;
	}
	$return[num_rows] = $check_us;
	$return[data_post][user] = $user;
	$return[data_post][pass] = $pass;
	$return[data_post][detail] = $arr[us];
	header('Content-Type: application/json');
	echo json_encode($return);
}

if($_GET[checking]=="empty_user"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$check = $db->num_rows($tb_admin_chk,"id","password = '' and username = '".$_POST[username]."' ");
	
	$return[input] = $_POST[username];
	$return[check] = $check;
	header('Content-Type: application/json');
	echo json_encode($return);
}

if($_GET[test]=="keyup"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[us]  = $db->select_query("SELECT * FROM " . $tb_admin_chk . " WHERE username like '%".$_GET[txt]."%' limit 5 ");
	while($arr[us] = $db->fetch($res[us])){
		$data[] = $arr[us];
	}
	header('Content-Type: application/json');
	echo json_encode($data);
}

if($_GET[query]=="car_brand"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[cb]  = $db->select_query("SELECT id,name_en,name_th,name_cn,img,popular FROM web_car_brand WHERE status = 1 ");
	while($arr[cb] = $db->fetch($res[cb])){
		$data[] = $arr[cb];
		
	}
	header('Content-Type: application/json');
	echo json_encode($data);
}

if($_GET[query]=="car_type"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[cb]  = $db->select_query("SELECT id,name_th FROM web_car_use_type WHERE status = 1 ");
	while($arr[cb] = $db->fetch($res[cb])){
		$data[] = $arr[cb];
	}
	header('Content-Type: application/json');
	echo json_encode($data);
}

if($_GET[query]=="car_color"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[cb]  = $db->select_query("SELECT id,name_th,name_en,img,plate FROM web_car_color WHERE status = 1 ");
	while($arr[cb] = $db->fetch($res[cb])){
		$data[] = $arr[cb];
	}
	header('Content-Type: application/json');
	echo json_encode($data);
}

if($_GET[query]=="car_plate"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[cb]  = $db->select_query("SELECT id,name_th,name_en,img FROM web_car_plate WHERE status = 1 order by i_index asc");
	while($arr[cb] = $db->fetch($res[cb])){
		$data[] = $arr[cb];
	}
	header('Content-Type: application/json');
	echo json_encode($data);
}

if($_GET[query]=="em_person"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[cb]  = $db->select_query("SELECT id,name_th,name_en FROM web_emergency_person WHERE status = 1 order by i_index asc ");
	while($arr[cb] = $db->fetch($res[cb])){
		$data[] = $arr[cb];
	}
	header('Content-Type: application/json');
	echo json_encode($data);
}

if($_GET[action]=="push_sms"){
	
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$data[i_use_sms] = intval($_GET[sms]) + 1;
    $data[result] = $db->update_db($tb_admin_chk,$data,'id = "'.$_GET[dv].'" ');
    header('Content-Type: application/json');
    echo json_encode($data);
}
?>