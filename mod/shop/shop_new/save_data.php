<?php 
include('../../../includes/class.mysql.php');
//include('../../../includes/config.in.php');
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_apptshare");
$db = new DB();
if ($_GET[action] == 'add')
{
	$number = $_POST[adult];
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$mm = $_POST[time_num];
	if($_POST[time_num]<10){
		$mm = "0".$_POST[time_num];
	}
	if($_POST[persion_china]<=0){
		$_POST[persion_china] = 0;
	}
	if($_POST[persion_other]<=0){
		$_POST[persion_other] = 0;
	}
	$array_data = array(
		"invoice" => "S$member_in",
		"code" => "",
		"plan_id" => "$_POST[price_plan]",
		"plan_commission" => $arr[plan][plan_id],
		"price_park_unit" => $price_park_driver,
		"price_park_total" => $price_park_driver,
		"price_person_unit" => $price_person_driver,
		"price_person_total" => $all_price_person_driver,
		"price_all_total" => $price_park_driver + $all_price_person_driver,
		"price_extra_park" => $price_extra_park,
		"price_extra_person" => $price_extra_park,
		"income_price_park" => $income_price_park,
		"pax" => "$_POST[adult]",
		"program" => "$_POST[program]",
		"transfer_date" => date('Y-m-d'),
		"ondate" => "$_POST[transfer_date_new]",
		"outdate" => "$_POST[transfer_date_new]",
		"airout_h" => "00",
		"airout_m" => "$mm",
		"airout_time" => "00".":"."$mm",
		"car_color" => "$_POST[car_color]",
		"car_type" => trim($_POST[txt_car_type]),
		"i_cartype" => trim($_POST[car_type]),
		"car_plate" => "$_POST[car_plate]",
		"check_use_car_id" => "$_POST[check_use_car_id]",
		"adult" => "$_POST[adult]",
		"child" => "$_POST[child]",
		"phone" => "$_POST[dri_phone]",
		"nation" => "$_POST[nation]",
		"booking_by" => "$_GET[driver]",
		"payment_type" => "$_POST[payment_type]",
		"drivername" => "$_GET[driver]",
		"namedriver" => "$_POST[namedriver]",
		"ondate_time" => "$_POST[ondate_time]",
//		"posted" => "$_SESSION[data_user_driver]",
		"post_date" => "" . time() . "",
		"update_date" => "" . time() . "",
		"num_ch" => $_POST[persion_china],
		"num_other" => $_POST[persion_other]
	);
	$result = $db->add_db('order_booking',$array_data );
	$last_id = mysql_insert_id();
	$array_data[last_id] = $last_id;
	$array_data[result] = $result;

	$member_db = $last_id;
	if ($member_db >= 10000)
	{
		$member_in = "$member_db";
	}
	elseif ($member_db >= 1000)
	{
		$member_in = "0$member_db";
	}
	elseif ($member_db >= 100)
	{
		$member_in = "00$member_db";
	}
	elseif ($member_db >= 10)
	{
		$member_in = "000$member_db";
	}
	else
	{
		$member_in = "0000$member_db";
	}
	$data_update[invoice] = "S$member_in";
	$data_update[result] = $db->update_db('order_booking',$data_update,'id = "'.$last_id.'" ');
	$array_data[update] = $data_update;
	$db->closedb();
	header('Content-Type: application/json');
	linenoti();
	echo json_encode($array_data);
}
function linenoti(){
	$txt_short = 'ทะเบียน '.$_POST[car_plate];
	$txt_short .=' ทำรายการส่งแขกเข้ามาใหม่ กรุณาตรวจสอบ';
	$title = "ทำรายการใหม่";
	$time_post = date('Y-m-d h:i:s');
	$mm = $_POST[time_num];
	if($_POST[time_num]<10){
		$mm = "0".$_POST[time_num];
	}
	if($_POST[adult]<1){
		$_POST[adult] = 0;
	}
	$txt_short2 = 'สถานที่ '. $_POST[pro_name].' ';
	$txt_short2 .= 'ทำรายการเวลา '.$time_post.'  น. ';
	$txt_short2 .= 'จะถึงสถานที่ในอีก '.$mm.' นาที ';
	$txt_short2 .= 'จำนวนแขก '.$_POST[adult].' คน';

	$str  = $title.$txt_short."\n".$txt_short2."\n\nรายละเอียดคนขับ\n"."ชื่อ-สกุล : ".$_POST[dri_name]."\n เบอร์โทร".$_POST[dri_phone];
	define('LINE_API',"https://notify-api.line.me/api/notify");
	$token = "NKtM17mRVqSAoIraJJyKbNkloWrF7QCM2kZCTsXvLXb"; //ใส่Token ที่copy เอาไว้
	$res = notify_message($str,$token);

}
function notify_message($message,$token){
	$queryData = array('message' => $message);
	$queryData = http_build_query($queryData,'','&');
	$headerOptions = array(
		'http'=>array(
			'method'=>'POST',
			'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"."Authorization: Bearer ".$token."\r\n"."Content-Length: ".strlen($queryData)."\r\n",
			'content' => $queryData
		),
	);
	$context = stream_context_create($headerOptions);
	$result = file_get_contents(LINE_API,FALSE,$context);
}
?>