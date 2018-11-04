<?PHP
function sendMessage() {
	
	if($_GET[key]=="new_shop"){

		$order_id = $_GET[order_id];
		$invoice = $_GET[vc];
		$minute = $_GET[m];
		if($invoice!=""){
			$txt_vc = 'เลขที่งาน '.$invoice;
		}
		if($minute!=""){
			$txt_m = 'ถึงภายใน '.$minute." นาที";
		}

		$txt_short = 'ทะเบียน '.$_POST[car_plate];
		 $content  = array(
        "en" => $txt_short.' '.$txt_vc.' '.$txt_m
   		 );
   		 $heading = array(
		   "en" => "มีรายการใหม่เข้ามา"
		);
   		 $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => array(
								array("field" => "tag", "key" => "class", "relation" => "=", "value" => "lab")
//								array("field" => "tag", "key" => "username", "relation" => "=", "value" => "HKT0153")
								),
			'data' => array("order_id" => $order_id, "status" => "manage" ),
			'url' => "https://www.welovetaxi.com/app/demo_new2/index_sheet.php?name=index&file=open_order&order_id=".$order_id."&vc=".$invoice."&ios=1",
			'contents' => $content,
			'headings' => $heading,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);
	}

	else if($_GET[key]=="new_driver"){
		 $content  = array(
        "en" => 'มีคนขับรถสมัครสมาชิกเข้ามาใหม่'
   		 );
   		 $heading = array(
		   "en" => "สมัครสมาชิก"
		);
   		 $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => array(
								array("field" => "tag", "key" => "class", "relation" => "=", "value" => "lab")
								),
			'contents' => $content,
			'headings' => $heading,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);
	}
	
    
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