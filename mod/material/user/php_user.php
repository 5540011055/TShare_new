<?php 
include('../../../includes/class.mysql.php');
include("../../../includes/class.resizepic.php");
//include('../../../includes/config.in.php');
define("DB_HOST_HIS","localhost");
define("DB_NAME_HIS","admin_his");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_apptshare");
$db = new DB();
$tb_admin_chk = "web_driver";
$tb_admin_logs = "web_driver_logs";
$tb_car = "web_carall";
if($_GET[action]=="register"){
	
		if($_POST[nickname]=="" or $_POST[nickname]==NULL){
    		$exit[col] = "nickname";
    		$exit[val] = $_POST[nickname];
    		$exit[type] = 0;
    		header('Content-Type: application/json');
			echo json_encode($exit);
			exit;
		}
		if($_POST[name_th]=="" or $_POST[name_th]==NULL){
			$exit[col] = "name_th";
			$exit[val] = $_POST[name_th];
    		$exit[type] = 0;
    		header('Content-Type: application/json');
			echo json_encode($exit);
			exit;
		}
		if($_POST[phone]=="" or $_POST[phone]==NULL){
			$exit[col] = "phone";
			$exit[val] = $_POST[phone];
    		$exit[type] = 0;
    		header('Content-Type: application/json');
			echo json_encode($exit);
			exit;
		}
		if($_POST[code_privince]=="" or $_POST[code_privince]==NULL){
			$exit[col] = "code";
			$exit[val] = $_POST[code_privince];
    		$exit[type] = 0;
    		header('Content-Type: application/json');
			echo json_encode($exit);
			exit;
		}
	
//	include("../../../includes/class.resizepic.php");
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);

//    $rand       = substr(str_shuffle('12345678901234567890123456789012345678901234567890'), 0, 50);
//    $rand_login = substr(str_shuffle('12345678901234567890123456789012345678901234567890'), 0, 50);
    $password = substr(str_shuffle('1234567890'), 0, 4);
    $provincecode = $_POST[code_privince];
    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    
    	
    	$data["password"] = $password;
        $data["email"] = $_POST[email];
        $data["name"] = $_POST[name_th];
        $data["name_en"] = $_POST[name_en];
        $data["nickname"] = $_POST[nickname];
        $data["idcard"] = $_POST[idcard];
        $data["iddriving"] = $_POST[iddriving];
        $data["phone"] = $_POST[phone];
        $data["phone2"] = $_POST[phone2];
        $data["phone_emergency"] = $_POST[phone_em];
        $data["address"] = $_POST[address];
        $data["driver_zone"] = $_POST[driver_zone];
        $data["province"] = $_POST[province];
        $data["status"] = 1;
        $data["emergency_person"] = $_POST[em_person];
        $data["idcard_finish"] = $_POST[ex_idcard];
        $data["iddriving_finish"] = $_POST[ex_iddriving];
        $data["post_date"] = time();
        $data["update_date"] = time();
        $data["register_reference"] = $_POST[register_reference];
        $data["i_gender"] = $_POST[gender];
        $data["birthday"] = $_POST[birthday];
    	$add_result = $db->add_db($tb_admin_chk,$data);
    	
    $return[add][data] = $data;
    $return[add][result] = $add_result;
    
    $last_id = mysql_insert_id();
    $member_db = $last_id;
    $member_in = genUsername($member_db);
    $return[last_id] = $last_id;
    $data[i_driver] = $last_id;
    $data_update[username] = $provincecode.$member_in;
    $data_update[password] = $password;
    $data_update[result] = $db->update_db($tb_admin_chk,$data_update,'id = "'.$last_id.'" ');
    $return[update] = $data_update;
    
    $add_driver_log = $db->add_db($tb_admin_logs,$data);
     
   /* if($_POST['image-data']){
	
		$path = "../../../../data/pic/driver/small/".$data_update[username].".jpg";
		$img_data = $_POST['image-data'];
		$size = getimagesize($img_data);
		$image = $img_data;
		$image = imagecreatefrompng($image);
		
		imagejpeg($image, $path, $size[0], $size[1]);
		$save_img = imagedestroy($image);
		$img[result] = $save_img;
		$img[w] = json_encode($size);
//		$img[h] = $size[1];
		$img[path] = $path;
	}*/
	$path = "../../../../data/pic/driver/small/".$data_update[username].".jpg";
	
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized($path,"JPG");
	$img[result] = $result;
	$img[path] = $path;
    
	
	if($_POST[plate_num]!=''){
		$car[plate_num] = $_POST[plate_num];
		$car[drivername] = $member_db;
		$car[car_type] = $_POST[car_type];
		$car[car_brand] = $_POST[car_brand_txt];
		$car[i_car_brand] = $_POST[car_brand];
		$car[i_car_color] = $_POST[car_color];
		$car[car_color] = $_POST[car_color_txt];
		$car[plate_color] = $_POST[plate_color_txt];
		$car[i_plate_color] = $_POST[plate_color];
		$car[i_province] = $_POST[car_province];
		$car[status] = 1;
		$car[status_usecar] = 0;
		$car[post_date] = time();
		$car[update_date] = time();
		$car[result] = $db->add_db($tb_car,$car);
		$last_id_car = mysql_insert_id();
		$return[car] = $car;
		
		rename("../../../../data/pic/car/".$_POST[rand].".jpg", "../../../../data/pic/car/".$last_id_car."_1.jpg");
	}
	rename("../../../../data/pic/driver/id_card/".$_POST[rand]."_idcard.jpg", "../../../../data/pic/driver/id_card/".$last_id."_idcard.jpg");
	rename("../../../../data/pic/driver/id_driving/".$_POST[rand]."_iddriving.jpg", "../../../../data/pic/driver/id_driving/".$last_id."_iddriving.jpg");
	
	$qr_code = "https://api.qrserver.com/v1/create-qr-code/?size=430x430&data=https://www.welovetaxi.com/app/TShare_new/material/login/index.php?ref=".$return[last_id];
	$part_qr_code = "../../../../data/qrcode/register/".$return[last_id]."_driver.png";
	copy($qr_code,$part_qr_code);
	
	$return[upload_img] = $img;
	$return[path] = $path;
	$return[driver_logs] = $add_driver_log;
	$return[code_rand] = $_POST[rand];
	header('Content-Type: application/json');
    echo json_encode($return);
    
    $curl_post_data = '{"id":"'.$last_id.'","action":"add"}';
                    
              $headers = array();

$url = "http://www.welovetaxi.com:3000/adddriver";
//$api_key = '1f7bb35be49521bf6aca983a44df9a6250095bbb';
$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json'
        // 'API-KEY: '.$api_key.''
    )
);
curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_REFERER, $url);
curl_setopt($curl, CURLOPT_URL, $url);  

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
//echo $curl_response;
curl_close($curl);
    
    include('../line_notify_demo.php');
    
    $msg = array();
    $txt_short = "\n".'มีคนขับรถสมัครสมาชิกเข้ามาใหม่';
   	$txt_short2 = "\n".'ชื่อ '.$data["name"];
   	$txt_short2 .= "\n".'User : '.$data_update[username].' ';
   	$txt_short2 .= "\n".'Password : '.$data[password].' ';
   	$txt_short2 .= "\n".'เบอร์โทร : '.$data[phone];
//   	$txt_short2 .= "\n".'สมัครเวลา : '.date('Y-m-d h:i:s',$data[post_date]).' ';
   	
	$msg[message] = $txt_short.' '.$txt_short2;	
	$token = "cuJeygjbI4UFGHXJha1zVxiNCJWXPaenK4xo7kzuCQX"; //ใส่Token ที่copy เอาไว้ ส่วนตัว
	$response = notify_message($msg,$token);
//	echo $response;
    
}

if($_GET[action]=="register2"){
	
		if($_POST[name_th]=="" or $_POST[name_th]==NULL){
			$exit[col] = "name_th";
			$exit[val] = $_POST[name_th];
    		$exit[type] = 0;
    		header('Content-Type: application/json');
			echo json_encode($exit);
			exit;
		}
		if($_POST[phone]=="" or $_POST[phone]==NULL){
			$exit[col] = "phone";
			$exit[val] = $_POST[phone];
    		$exit[type] = 0;
    		header('Content-Type: application/json');
			echo json_encode($exit);
			exit;
		}
		if($_POST[code_privince]=="" or $_POST[code_privince]==NULL){
			$exit[col] = "code";
			$exit[val] = $_POST[code_privince];
    		$exit[type] = 0;
    		header('Content-Type: application/json');
			echo json_encode($exit);
			exit;
		}
	
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    $password = substr(str_shuffle('1234567890'), 0, 4);
    $provincecode = $_POST[code_privince];
    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    
    	
    	$data["password"] = $password;
        $data["email"] = $_POST[email];
        $data["name"] = $_POST[name_th];
        $data["name_en"] = $_POST[name_en];
        $data["nickname"] = $_POST[nickname];
        $data["idcard"] = $_POST[idcard];
        $data["iddriving"] = $_POST[iddriving];
        $data["phone"] = $_POST[phone];
        $data["phone2"] = $_POST[phone2];
        $data["phone_emergency"] = $_POST[phone_em];
        $data["address"] = $_POST[address];
        $data["driver_zone"] = $_POST[driver_zone];
        $data["province"] = $_POST[province];
        $data["status"] = 1;
        $data["emergency_person"] = $_POST[em_person];
        $data["idcard_finish"] = $_POST[ex_idcard];
        $data["iddriving_finish"] = $_POST[ex_iddriving];
        $data["post_date"] = time();
        $data["update_date"] = time();
        $data["register_reference"] = $_POST[register_reference];
        $data["i_gender"] = $_POST[gender];
        $data["birthday"] = $_POST[birthday];
    	$add_result = $db->add_db($tb_admin_chk,$data);
    	
    $return[add][data] = $data;
    $return[add][result] = $add_result;
    
    $last_id = mysql_insert_id();
    $member_db = $last_id;
    $member_in = genUsername($member_db);
    $return[last_id] = $last_id;
    $data[i_driver] = $last_id;
    $data_update[username] = $provincecode.$member_in;
    $data_update[password] = $password;
    $data_update[result] = $db->update_db($tb_admin_chk,$data_update,'id = "'.$last_id.'" ');
    $return[update] = $data_update;
    
    $add_driver_log = $db->add_db($tb_admin_logs,$data);
  

    echo json_encode($return);
    
   $curl_post_data = '{"id":"'.$last_id.'","action":"add"}';
                    
              $headers = array();

$url = "http://www.welovetaxi.com:3000/adddriver";
//$api_key = '1f7bb35be49521bf6aca983a44df9a6250095bbb';
$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json'
        // 'API-KEY: '.$api_key.''
    )
);
curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_REFERER, $url);
curl_setopt($curl, CURLOPT_URL, $url);  

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
//echo $curl_response;
curl_close($curl);
    
    include('../line_notify_demo.php');
    
    $msg = array();
    $txt_short = "\n".'มีคนขับรถสมัครสมาชิกเข้ามาใหม่';
   	$txt_short2 = "\n".'ชื่อ '.$data["name"];
   	$txt_short2 .= "\n".'User : '.$data_update[username].' ';
   	$txt_short2 .= "\n".'Password : '.$data[password].' ';
   	$txt_short2 .= "\n".'เบอร์โทร : '.$data[phone];
//   	$txt_short2 .= "\n".'สมัครเวลา : '.date('Y-m-d h:i:s',$data[post_date]).' ';
   	
	$msg[message] = $txt_short.' '.$txt_short2;	
	$token = "cuJeygjbI4UFGHXJha1zVxiNCJWXPaenK4xo7kzuCQX"; //ใส่Token ที่copy เอาไว้ ส่วนตัว
	$response = notify_message($msg,$token);
//	echo $response;
}

if($_GET[action]=="upload"){
	/*$data[tmp] = $_FILES['fileUpload']['tmp_name'] ;
	$data[name] = $_FILES['fileUpload']['name'] ;
	header('Content-Type: application/json');
	echo json_encode($data);*/
	$data = $_POST['image-data'];
	$image = $data;
	$image = imagecreatefrompng($image);
	imagejpeg($image, 'test.jpg', 1000, 800);
	imagedestroy($image);
     echo $image;  
}

if($_GET[action]=="edit"){
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
//	$data[pic_home] = $check;
    $data[password] = $_POST[password];
    $data[name_en] = $_POST[name_en];
    $data[name] = $_POST[name];
    $data[nickname] = $_POST[nickname];
    $data[idcard] = $_POST[idcard];
    $data[iddriving] = $_POST[iddriving];
    $data[idcard_finish] = $_POST[ex_idcard];
    $data[iddriving_finish] = $_POST[ex_iddriving];
    $data[phone] = $_POST[phone];
    $data[contact] = $_POST[contact];
    $data[email] = $_POST[email];
    $data[address] = $_POST[address];
    $data[update_date] = time();
    $data[i_gender] = $_POST[gender];
    $result = $db->update_db($tb_admin_chk,$data , " id= '".$_GET[id]."' ");
    adddriver($_GET[id]);
    header('Content-Type: application/json');
    $data[result] = $result;
    echo json_encode($data);
}

function genUsername($member_db){
	if ($member_db >= 1000) {
        $member_in = "$member_db";
    } elseif ($member_db >= 100) {
        $member_in = "0$member_db";
    } elseif ($member_db >= 10) {
        $member_in = "00$member_db";
    } elseif ($member_db >= 1) {
        $member_in = "000$member_db";
    } else {
        $member_in = "0000$member_db";
    }
    return $member_in;
}

function adddriver($id){
  $curl_post_data = '{"id":"'.$id.'","action":"add"}';
                    
              $headers = array();

$url = "http://www.welovetaxi.com:3000/adddriver";
//$api_key = '1f7bb35be49521bf6aca983a44df9a6250095bbb';
$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json'
        // 'API-KEY: '.$api_key.''
    )
);
curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_REFERER, $url);
curl_setopt($curl, CURLOPT_URL, $url);  

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
//echo $curl_response;
curl_close($curl);
}
?>