<?php 
include('../../../includes/class.mysql.php');
define("DB_HOST_HIS","localhost");
define("DB_NAME_HIS","admin_his");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_apptshare");
$db = new DB();
/*$car  = array("0 -112px",
"0 -280px",
"0 -308px",
"0 -504px",
"0 -532px",
"0 -700px",
"0 -896px",
"0 -924px",
"0 -952px",
"0 -980px",
"0 -1064px",
"0 -1120px",
"0 -1148px",
"0 -1176px",
"0 -1232px",
"0 -1344px",
"0 -1372px",
"0 -1456px",
"0 -1512px",
"0 -1764px",
"0 -1848px",
"0 -1960px",
"0 -2044px",
"0 -2100px",
"0 -2240px",
"0 -2296px",
"0 -2380px",
"0 -2520px",
"0 -2716px",
"0 -2772px",
"0 -2800px",
"0 -2884px",
"0 -2940px",
"0 -2940px",
"0 -3192px",
"0 -3276px",
"0 -3332px",
"0 -3416px",
"0 -3500px",
"0 -3528px",
"0 -3584px",
"0 -3696px",
"0 -3724px",
"0 -3752px",
"0 -3836px",
"0 -3892px",
"0 -3920px",
"0 -3976px",
"0 -4032px",
"0 -4060px",
"0 -4060px",
"0 -4200px",
"0 -4228px",
"0 -4312px",
"0 -4396px",
"0 -4452px",
"0 -4564px",
"0 -4760px",
"0 -4788px");*/

$car  = array("Ford","Honda","Isuzu","Mazda","Mercedes-Benz","Mitsubishi","Nissan","Toyoya");
 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 
   foreach($car as $key=>$val){
   	 $data = array();
   	 $data[name_en] = $val;
   	 $data[last_update] = time();
   	 $data[post_date] = time();
   	 $data[popular] = 1;
//	$id = intval ($key) + 1;
//     $result = $db->update_db('web_car_brand',$data,'id = "'.$id.'" ');
     $result = $db->add_db('web_car_brand',$data);
     echo $result."<br/>";
   }
//   $data[name_th] = $_POST[province];
  


		
   header('Content-Type: application/json');
	echo json_encode($data);
?>