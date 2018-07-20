<?PHP
function sendMessage() {
	
	$heading = array(
		   "en" => $_POST[topic]
	 );
	
	 $content  = array(
        "en" => $_POST[content]
   		 );
   	if($_POST[type]==1){
		$tag = array(array("field" => "tag", "key" => "class", "relation" => "=", "value" => "lab"));
	}else if($_POST[type]==2){
		$tag = array(array("field" => "tag", "key" => "class", "relation" => "=", "value" => "taxi"));
	}else{
		$tag = array();
	}	 
   		 $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => $tag,
			'contents' => $content,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"

		);
    
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