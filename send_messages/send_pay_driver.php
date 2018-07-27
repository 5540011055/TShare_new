<?PHP
require_once("../includes/class.mysql.php");
function sendMessage() {
	
	$db = New DB();
	define("DB_NAME_APP","admin_apptshare");
	define("DB_USERNAME","admin_MANbooking");
	define("DB_PASSWORD","252631MANbooking");
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[dv] = $db->select_query("SELECT username FROM web_driver  WHERE id='".$_GET[driver]."' ");
	$arr[dv] = $db->fetch($res[dv]);
//	echo $arr[dv][username];
	$invoice = $_GET[vc];
	$order_id = $_GET[order_id];
	$open_ic = $_GET[open_ic];
	$heading = array(
		   "en" => "เลขที่งาน ".$invoice
	 );

	if($_GET[type]=="send_driver"){
		

		 $content  = array(
        "en" => 'พนักงานยืนยันการจ่ายเงินแล้ว กรุณาตรวจสอบ'
   		 );
   		 $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => array(
								array("field" => "tag", "key" => "username", "relation" => "=", "value" => $arr[dv][username])
								),
			'data' => array("order_id" => $order_id, "status" => "manage", "open_ic" => $open_ic),
			'url' => "https://www.welovetaxi.com/app/demo_new2/index_sheet.php?name=index&file=open_order&order_id=".$order_id."&vc=".$invoice."&ios=1&open_ic=1",
			'contents' => $content,
			'headings' => $heading,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);
	}

	else if($_GET[type]=="send_lab"){
		 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		 $res[ob] = $db->select_query("SELECT car_plate,invoice FROM order_booking  WHERE id='".$_GET[order_id]."' ");
		 $arr[ob] = $db->fetch($res[ob]);
		 $txt_short = "ทะเบียน ".$arr[ob][car_plate]." คนขับยืนยันได้รับเงินแล้ว";
		 $content  = array(
        "en" => $txt_short.' กรุณาตรวจสอบ'
   		 );
   		 $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => array(
								array("field" => "tag", "key" => "class", "relation" => "=", "value" => "lab")
								),
			'data' => array("order_id" => $_GET[order_id], "status" => "his", "open_ic" => $open_ic),
//			'url' => "https://www.welovetaxi.com/app/demo_new2/index_sheet.php?name=index&file=open_order&order_id=".$order_id."&vc=".$invoice."&ios=1",
			'url' => "https://www.welovetaxi.com/app/demo_new2/index_sheet.php?name=index&file=open_order_history&order_id=".$order_id."&vc=".$invoice."&ios=1&open_ic=1",
			'contents' => $content,
			'headings' => $heading,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);
	}
//	echo $txt_short;
    
    $response["param"] = $fields;
    $fields = json_encode($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $res = curl_exec($ch);
    $response["allresponses"] = json_decode($res);
    
    curl_close($ch);
    
    return $response;
}

$response = sendMessage();
$return = json_encode($response);

//$data = json_decode($response, true);
header('Content-Type: application/json');
echo $return;
?>