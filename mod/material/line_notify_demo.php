<?php
define('LINE_API',"https://notify-api.line.me/api/notify");
function notify_message($msg,$token){
 $queryData = $msg;
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 return $res;
}

/*$msg = array();
$msg[message] = 'สมัครสมาชิก';	
$token = "cuJeygjbI4UFGHXJha1zVxiNCJWXPaenK4xo7kzuCQX"; //ใส่Token ที่copy เอาไว้ ส่วนตัว
$response = notify_message($msg,$token);
echo $response;*/
?>