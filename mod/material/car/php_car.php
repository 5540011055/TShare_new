<?php 
include('../../../includes/class.mysql.php');
define("DB_HOST_HIS","localhost");
define("DB_NAME_HIS","admin_his");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_apptshare");
$db = new DB();

$keep = 'th';
switch ($_COOKIE['lng']) {
    case "th":
        //echo "PAGE th";
        include("../../../includes/lang/th/t_share_2.php"); //include check session DE
        $province           = "name_th";
        $place_shopping     = "topic_th";
        $google_map_api_lng = "th";
        break;
    case "cn":
        //echo "PAGE cn";
        include("../../../includes/lang/cn/t_share_2.php");
        $province           = "name_cn";
        $place_shopping     = "topic_cn";
        $google_map_api_lng = 'zh-CN';
        break;
    case "en":
        //echo "PAGE EN";
        include("../../../includes/lang/en/t_share_2.php");
        $google_map_api_lng = "en";
        $place_shopping     = "topic_en";
        $province           = "name";
        break;
    default:
        //echo "PAGE EN - Setting Default";
        include("../../../includes/lang/" . $keep . "/t_share_2.php"); //include EN in all other cases of different lang detection
        //        $google_map_api_lng = $keep;
        $province           = "name_" . $keep;
        $place_shopping     = "topic_" . $keep;
        $google_map_api_lng = $keep;
        break;
}
if($_GET[query]=="province"){
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$res[pv] = $db->select_query("SELECT * FROM web_province where area = '".$_POST[region]."' ");
    while($arr[pv] = $db->fetch($res[pv])) { 
    	$data[] = $arr[pv];
    }
	
    header('Content-Type: application/json');
    echo json_encode($data);
}

if($_GET[ele]=="select_province"){
	?>
	<select class="icons" id="province" name="province">
			      <option value="" disabled selected><?=t_select_province;?></option>
                          <?php 
                                 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                            $res[pv] = $db->select_query("SELECT * FROM web_province where area = '".$_POST[region]."' ORDER BY name_th asc ");
                                             while($arr[pv] = $db->fetch($res[pv])) { 
                                             $txt = explode("/",$arr[pv][name_th]);
                                             ?>
                              <option value="<?=$txt[0];?>" class="<?=$arr[pv][area];?>"><?=$txt[0];?></option>
                              <? } ?>
	</select>
	<script>
		$('#province').material_select();
	</script>
<? }

if($_GET[action]=="add"){

  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   
   $data[drivername] = $_POST[drivername];
   $data[province] = $_POST[province];
   $data[car_type] = $_POST[car_type];
   $data[car_brand] = $_POST[car_brand];
   $data[car_sub_brand] = $_POST[car_sub_brand];
   $data[car_color] = $_POST[car_color];
   $data[car_num] = $_POST[car_num];
   $data[plate_num] = $_POST[plate_num];
   $data[plate_color] = $_POST[plate_color];
   $data[post_date] = time();
   $data[update_date] = time();
   $data[result] = $db->add_db('web_carall',$data);
   $last_id = mysql_insert_id();
   $data[last_id] = $last_id;
   $db->closedb();
		
   header('Content-Type: application/json');
	echo json_encode($data);

@copy ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_1.jpg", "../data/pic/car/".$last_id."_1.jpg" );   
@copy ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_2.jpg", "../data/pic/car/".$last_id."_2.jpg" );    
@copy ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_3.jpg", "../data/pic/car/".$last_id."_3.jpg" );  
	
 
@unlink ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_1.jpg" ); 
@unlink ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_2.jpg" ); 
@unlink ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_3.jpg" ); 
 
 } 

if($_GET[action]=="edit"){

  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   
//   $data[drivername] = $_POST[drivername];
   $data[province] = $_POST[province];
   $data[car_type] = $_POST[car_type];
   $data[car_brand] = $_POST[car_brand];
   $data[car_sub_brand] = $_POST[car_sub_brand];
   $data[car_color] = $_POST[car_color];
   $data[car_num] = $_POST[car_num];
   $data[plate_num] = $_POST[plate_num];
   $data[plate_color] = $_POST[plate_color];
   $data[update_date] = time();
   $data[result] = $db->update_db('web_carall',$data,'id = "'.$_GET[id].'" ');

   $db->closedb();
		
   header('Content-Type: application/json');
	echo json_encode($data);

 } 

if($_GET[action]=="change_status_car"){
	
	$data[status] = $_GET[status];
	$data[update_date] = time();
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    $data[result] = $db->update_db('web_carall', $data," id='".$_GET[id]."' ");
	$db->closedb ();
	$data[id] = $_GET[id];
	header('Content-Type: application/json');
	echo json_encode($data);
}

if($_GET[action]=="use_often"){
	
	$data[status_usecar] = $_GET[status];
	$data[update_date] = time();
	$data[drivername] = $_GET[driver];
	
	 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->update_db('web_carall', $data," drivername='".$_GET[driver]."' ");

	header('Content-Type: application/json');
	echo json_encode($data);
}


?>