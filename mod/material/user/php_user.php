<?php 
include('../../../includes/class.mysql.php');
//include('../../../includes/config.in.php');
define("DB_HOST_HIS","localhost");
define("DB_NAME_HIS","admin_his");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_apptshare");
$db = new DB();
$tb_admin_chk = "web_driver";
if($_GET[action]=="register"){
	
	include("../../../includes/class.resizepic.php");
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);

    $rand       = substr(str_shuffle('12345678901234567890123456789012345678901234567890'), 0, 50);
    $rand_login = substr(str_shuffle('12345678901234567890123456789012345678901234567890'), 0, 50);
    $password = substr(str_shuffle('1234567890'), 0, 4);
    $provincecode = 'HKT';
    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    
    	$data["password"] = $password;
        $data["code_login"] = $rand_login;
        $data["email"] = $_POST[email];
        $data["name_en"] = $_POST[name_en];
        $data["name"] = $_POST[name_th];
        $data["nickname"] = $_POST[nickname];
        $data["idcard"] = $_POST[idcard];
        $data["phone"] = $_POST[phone];
        $data["address"] = $_POST[address];
        $data["driver_zone"] = $_POST[driver_zone];
        $data["province"] = $_POST[province];
        $data["status"] = "1";
        $data["post_date"] = time();
        $data["update_date"] = time();
    	$data[result] = $db->add_db($tb_admin_chk,$data);
    
    $last_id = mysql_insert_id();
    $member_db = $last_id;
    $member_in = genUsername($member_db);
    $data["last_id"] = $last_id;
    $data_update[username] = $provincecode.$member_in;
    $data_update[result] = $db->update_db($tb_admin_chk,$data_update,'id = "'.$last_id.'" ');
    $data[update] = $data_update;
    
    if($_FILES['fileUpload']['tmp_name']){
		/*$original_image = $_FILES['fileUpload']['tmp_name'] ;
		$desired_width = 600;
		$desired_height = _INEWS_H ;
		$image = new hft_image($original_image);
		$image->resize($desired_width, $desired_height, '0');
//		header('Content-Type: application/json');
		
//		$path = "../../../../data/pic/driver/small_new/Test_upload.jpg";
		$img[result] = $image->output_resized($path,"JPG");
		$img[tmp] = $original_image;
		$img[name] = $_FILES['fileUpload']['name'];*/
		
		$path = "../../../../data/pic/driver/small_new/".$data_update[username].".jpg";
		$data = $_POST['image-data'];
		$image = $data;
		$image = imagecreatefrompng($image);
		$size = getimagesize($image);
		imagejpeg($image, $path, $size[0], $size[1]);
		$save_img = imagedestroy($image);
		$img[result] = $save_img;
		$img[path] = $path;
	}
    
	
	if($_POST[plate_num]!=''){
		$car[plate_num] = $_POST[plate_num];
		$car[drivername] = $member_db;
		$car[status] = 1;
		$car[status_usecar] = 0;
		$car[post_date] = time();
		$car[update_date] = time();
		$car[car_type] = 0;
		$car[result] = $db->add_db('web_carall_new',$car);
		$data[car] = $car;
	}
	
	$data[upload_img] = $img;
	$data[path] = $path;
	header('Content-Type: application/json');
    echo json_encode($data);
    
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
?>