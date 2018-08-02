 <?
// $_COOKIE['lng'] = 'en';
$get_lng           = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
$get_lng           = $get_lng[0];
$check_lng_browser = explode('-', $get_lng);
$check_lng_browser = $check_lng_browser[0];

if ($check_lng_browser == 'ch' or $check_lng_browser == 'zh' or $check_lng_browser == 'sh') {
    $keep = 'cn';
} else if ($check_lng_browser == 'th') {
    $keep = 'th';
} else {
    $keep = 'en';
}
$keep = 'th'; // set เป็น th ก่อน
switch ($_COOKIE['lng']) {
    case "th":
        //echo "PAGE th";
        include("includes/lang/th/t_share_2.php"); //include check session DE
        $province           = "name_th";
        $place_shopping     = "topic_th";
        $google_map_api_lng = "th";
        $car_pax = "pax_th";
        break;
    case "cn":
        //echo "PAGE cn";
        include("includes/lang/cn/t_share_2.php");
        $province           = "name_cn";
        $place_shopping     = "topic_cn";
        $google_map_api_lng = 'zh-CN';
        $car_pax = "pax_cn";
        break;
    case "en":
        //echo "PAGE EN";
        include("includes/lang/en/t_share_2.php");
        $google_map_api_lng = "en";
        $place_shopping     = "topic_en";
        $province           = "name";
        $car_pax = "pax";
        break;
    default:
        //echo "PAGE EN - Setting Default";
        include("includes/lang/" . $keep . "/t_share_2.php"); //include EN in all other cases of different lang detection
        //        $google_map_api_lng = $keep;
        if($keep=="en"){
			$province           = "name";
			$car_pax = "pax";
		}else{
			$province           = "name_" . $keep;
			$car_pax = "pax". $keep;
		}
        
        $place_shopping     = "topic_" . $keep;
        $google_map_api_lng = $keep;
        break;
}
$check_default_browser_lng = $keep;
date_default_timezone_set("Asia/Bangkok");
if (eregi("mainfile.php", $PHP_SELF)) {
    Header("Location: index.php");
    die();
}
error_reporting(0);
function GETMODULE($name, $file)
{
    global $MODPATH, $MODPATHFILE;
    if (!$name) {
        $name = "index";
    }
    if (!$file) {
        $file = "index";
    }
    $modpathfile = "mod/" . $name . "/" . $file . ".php";
    ///$modpathfile="mod/".$name."/".$file.".html";
    if (file_exists($modpathfile)) {
        $MODPATHFILE = $modpathfile;
        $MODPATH     = "mod/" . $name . "/";
    } else {
        die("page not found...");
    }
}
require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/function.in.php");
$_SESSION['lang'] = "th";
/*include("includes/lang/" . $_SESSION['lang'] . "/menu.php");
include("includes/lang/" . $_SESSION['lang'] . "/profile.php");
include("includes/lang/" . $_SESSION['lang'] . "/web.php");*/
/*
$folder_xml="../data/xml";
//$folder_xml="/home/admin/domains/goldenbeachgroup.com/private_html/app/data_xml";
/*
require_once("../includes/config.in.php");
require_once("../includes/class.mysql.php");
require_once("../includes/function.in.php");
*/
$_SESSION['data_user_name']     = $_COOKIE['detect_username'];
$_SESSION['data_user_class']    = $_COOKIE['detect_userclass'];
$db = New DB();
?>
<?
$data_user_class = $_SESSION['data_user_class'];
//////// lab

    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    $res[web_user] = $db->select_query("SELECT * FROM web_driver WHERE username='" . $_SESSION['data_user_name'] . "'    ");
    $arr[web_user] = $db->fetch($res[web_user]);

$user_id = $arr[web_user][id];
$_SESSION['data_user_id'] = $user_id;
//$carnumber    = $arr[web_user][car_num];
$user_name_th = $arr[web_user][name];
$user_name_en = $arr[web_user][name_en];
//$user_car_use = $arr[web_user][car_number_use];
$user_car_use_status = $arr[web_user][status_usecar];
//$user_id     = $_SESSION['data_user_id'];
$carnumber   = $arr[web_user][car_num];
$chk_data_id = $arr[web_user][id];
///////// driver detail
$data_driver_name     = $arr[web_user][name];
$data_driver_nickname = $arr[web_user][nickname];
$data_driver_phone    = $arr[web_user][phone];
$data_user_class = $arr[web_user][user_class];
$user_class = $arr[web_user][user_class];
/////
///// หา sup
/*$res[web_sup] = $db->select_query("SELECT id,province FROM web_admin WHERE id='" . $arr[web_user][company] . "'    ");
$arr[web_sup] = $db->fetch($res[web_sup]);
//$user_id = $_SESSION['data_user_id'];
$res[driver_network] = $db->select_query("SELECT * FROM  contact_network WHERE province_name='" . $arr[web_sup][province] . "' and type='driver' ");
$arr[driver_network] = $db->fetch($res[driver_network]);
$network_company     = $arr[driver_network][id];
$arr[driver_network][company];
$res[callcenter_network] = $db->select_query("SELECT * FROM  contact_network WHERE company='" . $arr[driver_network][company] . "' and type='callcenter' ");
$arr[callcenter_network] = $db->fetch($res[callcenter_network]);
//////// หาจำนวนเมนู
$user_zello       = $arr[driver_network][id_zello];
$callcenter_zello = $arr[callcenter_network][id_zello];*/
//$my_phone = $db->num_rows('contact_phone_driver', "id", "driver_id='" . $user_id . "'  ");
/*if ($_SESSION['data_user_password'] <> $arr[web_user][password]) {
?> 
 <script>
///  window.location.href = "logout.php"; //will redirect to your blog page (an ex: blog.html)
  </script>
<?
}*/
include "css/color/" . $data_user_class . ".php";

$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
  "0"=>"",
  "1"=>"มกราคม",
  "2"=>"กุมภาพันธ์",
  "3"=>"มีนาคม",
  "4"=>"เมษายน",
  "5"=>"พฤษภาคม",
  "6"=>"มิถุนายน", 
  "7"=>"กรกฎาคม",
  "8"=>"สิงหาคม",
  "9"=>"กันยายน",
  "10"=>"ตุลาคม",
  "11"=>"พฤศจิกายน",
  "12"=>"ธันวาคม"                 
);
function thai_date($time){
  global $thai_day_arr,$thai_month_arr;
  $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
  $thai_date_return.= "ที่ ".date("j",$time);
  $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
  $thai_date_return.= " พ.ศ.".(date("Y",$time)+543);
//    $thai_date_return.= "  ".date("H:i",$time)." น.";
  return $thai_date_return;
}
$cars = array("TOYOTA", "ISUZU"
                              ,"MITSUBISHI"
                              ,"MAZDA"
                              ,"NISSAN"
                              ,"SUZUKI"
                              ,"HINO"
                              ,"LEXUS"
                              ,"DAIHATSU"
                              ,"SUBARU"
                              ,"MITSUOKA"
                              ,"MERCEDES-BENZ"
                              ,"BMW"
                              ,"AUDI"
                              ,"VOLKSWAGEN"
                              ,"PEUGEOT"
                              ,"PORSCHE"
                              ,"OPEL"
                              ,"SMART"
                              ,"MCLAREN"
                              ,"WIESMANN"
                              ,"CHEVROLET"
                              ,"JEEP"
                              ,"FORD"
                              ,"CHRYSLER"
                              ,"DODGE"
                              ,"HUMMER"
                              ,"PONTIAC"
                              ,"BUICK"
                              ,"OLDSMOBILE"
                              ,"INFINITI"
                              ,"AMC"
                              ,"LINCOLN"
                              ,"TESLA"
                              ,"CADILLAC"
                              ,"MINI"
                              ,"ROVER"
                              ,"LAND ROVER"
                              ,"ASTON MARTIN"
                              ,"JAGUAR"
                              ,"ROLLS-ROYCE"
                              ,"BENTLEY"
                              ,"AUSTIN"
                              ,"MG"
                              ,"LONDON TAXI"
                              ,"TRIUMPH"
                              ,"ALFA ROMEO"
                              ,"FIAT"
                              ,"MASERATI"
                              ,"LOTUS"
                              ,"FERRARI"
                              ,"LAMBORGHINI"
                              ,"KIA"
                              ,"MUSSO"
                              ,"DAEWOO"
                              ,"HYUNDAI"
                              ,"SSANGYONG"
                              ,"CITROEN"
                              ,"RENAULT"
                              ,"VOLVO"
                              ,"SAAB"
                              ,"THAI RUNG"
                              ,"PROTON"
                              ,"NAZA"
                              ,"SEAT"
                              ,"TATA"
                              ,"HOLDEN"
                              ,"CHERY"
                              ,"DFSK"
                              ,"FOTON"
                              ,"SKODA"
                              );

?>
