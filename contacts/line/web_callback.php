 <?php header ('Content-type: text/html; charset=utf-8');  
 ob_start();
 session_start();
 
  include("../config.php");

// กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
ini_set('display_errors', 0);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//echo $_SESSION['driver'];
 
// กรณีมีการเชื่อมต่อกับฐานข้อมูล
//require_once("dbconnect.php");


 
// ทดสอบค่าที่ได้รับหลังจากทำการ authorize 
///echo "<pre>";
//print_r($_GET);

  $_SESSION['driver'];
  
  
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

 $tb_admin_chk = "web_driver";

$res[checkcode] = $db->select_query("SELECT * FROM ".$tb_admin_chk." WHERE id  ='".$_SESSION['driver']."' "); 
	$arr[checkcode] = $db->fetch($res[checkcode]);
  
  
  
  
  
 
if(!isset($_GET['error']) && isset($_GET['code']) && $_GET['code'] != ""){
 
    $code = $_GET['code'];
    $tokenURL = "https://notify-bot.line.me/oauth/token";
      
    $headers = array(
        'Content-Type: application/x-www-form-urlencoded'
    );
    $data = array(
	
	
        'grant_type' => 'authorization_code', // ไม่แก้ไขส่วนนี้
        'code' => (string)$code,
   'redirect_uri' => 'https://goldenbeachgroup.com/app/crontab/line/web_callback.php',
		
		    //  'redirect_uri' => 'http://localhost/app/crontab/line/web_callback.php',
		
		
        'client_id' => 'Zs7oa9Kg0odztY3RAHaGb2',
        'client_secret' => 'KomRqrxLo1LcAQw5MxLR5EYqcFdqDqL9zCLkJZi3VWr'                 
    );
     
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $tokenURL);
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec( $ch );
    curl_close( $ch );
     
    // ตรวจสอบค่าข้อมูล ว่าเป็นตัวแปร ปรเภทไหน ข้อมูลอะไร
    var_dump($result);
     
    // การเช็คสถานะการทำงาน 
    $result = json_decode($result,TRUE);
    // ดูโครงสร้าง กรณีแปลงเป็น array แล้ว
  //  echo "<pre>";
// print_r($result);
 
    // ตรวจสอบข้อมูล ใช้เป็นเงื่อนไขในการทำงาน
    if(!is_null($result) && array_key_exists('status',$result)){
        if($result['status']==200){
            echo "Access token is: ".$result['access_token'];

 
  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
			$db->update_db(TB_driver,array(
			"line_token"=>"".$result['access_token'].""
		)," id='".$_SESSION['driver']."' ");
 	
			
        }
    }
}else{ // กรณีเกิด error หรืออื่นๆ 
    if(isset($_SESSION['my_service_state_key'])){
        unset($_SESSION['my_service_state_key']);   
    }
 //   echo 'Authorization fail <br>';
    //echo '<a href="authorize.php"> </a>';
 // exit;   
}
?>
 
 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ลงทะเบียนสำเร็จ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
  
  
  
  
  
  
  
<style>
	#popup_work_main_menu {
	position: fixed;  
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	 overflow:hidden;
	/*background: url('images/loader.gif') 50% 50% no-repeat rgb(249,249,249); */background-color:#FFFFFF
}
.back-full-popup
{ 
font-size:22px;   padding:10px;  color:#FFFFF;  width:100%; background-color:<?=$maincolor?>;      
 border-top: 0px solid #000000; margin-bottom: 0px;  
  top:  0; position:fixed;
    z-index: 1; 
 
}
</style>
  
  <div id="popup_work_main_menu"    style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:999999; background-color:#FFFFFF; position:fixed;  display:nones; margin-top:0px; overflow:hidden">
  
    
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    
  <td   ><table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tbody>
      <tr>
        <td height="50" align="center" bgcolor="#16C464" style="font-size:22px; color:#FFFFFF"><b>ลงทะเบียนสำเร็จ</td>
        </tr>
      </tbody>
  </table></td>
    </tr>
</table>
 

 
 
 
 <div   id="load_work_main_menu"   style="margin-top: 0px; height:100%; overflow:auto; padding-bottom:50px;  "  ><br>
   <table width="100%" border="0" cellspacing="5" cellpadding="5">
   <tbody>
     <tr>
       <td align="center"><font style='font-size:22px'>คุณ<?=$arr[checkcode][name]?> (<?=$arr[checkcode][nickname]?>)<b></td>
     </tr>
     <tr>
       <td align="center"><font style='font-size:20px; color:#FF0000'>การลงทะเบียนของคุณสำเร็จแล้ว</font ><center>        <img src='../../data/pic/driver/main/<?=$arr[checkcode][post_date];?>.jpg'  width='150'     class='IMGSHOP'  style='border-radius: 15px;border: 2px solid #dadada;margin-top:10px'  /></td>
     </tr>
     <tr>
       <td align="center"> กรุณาปิดหน้าต่างเพื่อเข้าสู่ระบบไลน์</td>
     </tr>
   </tbody>
 </table>
 </div> 
 
 
              
				                </div>
  <script>
    	
  $('#active_no').click(function(){   
 
   $( "#popup_work_main_menu" ).hide();
 
  //  $( "#popup_work_main_menu" ).html('');

     	});
  </script>
  
    <script>
    	
  $('#active_yes').click(function(){   
 
window.location.href = "https://goldenbeachgroup.com/app/crontab/line/authorize.php?driver=<?=$arr[checkcode] [id]?>"; 	  
 
  //  $( "#popup_work_main_menu" ).html('');

     	});
  </script>
  </body>
</html>
