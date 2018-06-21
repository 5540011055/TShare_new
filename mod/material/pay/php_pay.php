<?php 
include('../../../includes/class.mysql.php');
define("DB_HOST_HIS","localhost");
define("DB_NAME_HIS","admin_his");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_app");
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
if($_GET[op]=="update_bank"){
   	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   	$data = array(
            "pay_bank_name" => "$_POST[pay_bank_name]",
   			"pay_bank" => "$_POST[pay_bank]",
   			"pay_bank_sub" => "$_POST[pay_bank_sub]",
   			"pay_bank_number" => "$_POST[pay_bank_number]",
               "update_date" => "" . TIMESTAMP . ""
           );
            $result = $db->update_db(TB_driver, $data , " id=$_GET[id] ");
           $db->closedb();
           echo json_decode($data);
           echo json_decode($result);
   }
?>