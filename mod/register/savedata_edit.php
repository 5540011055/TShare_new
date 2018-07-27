<?
//include("includes/config.in.php");
include("../../includes/class.mysql.php");
define("DB_HOST_HIS","localhost");
define("DB_NAME_HIS","admin_his");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_apptshare");
$db = new DB();
if ($_GET[action] == "add") {

   /* $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    $db->add_db('web_carall', $params);
    $last_id = mysql_insert_id();
    $db->closedb(); 
    $params['id'] = $last_id;*/
    /////
    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    $next_increment = 0;
    $qShowStatus    = "SHOW TABLE STATUS LIKE 'web_driver'";
    $qShowStatusResult = mysql_query($qShowStatus) or die("Query failed: " . mysql_error() . "<br/>" . $qShowStatus);
    $row = mysql_fetch_assoc($qShowStatusResult);
    $last_id   = $row['Auto_increment'];
    $member_db = $row['Auto_increment'];
    if ($member_db >= 1000) {
        $member_in = "$member_db";
    } elseif ($member_db >= 100) {
        $member_in = "0$member_db";
    } elseif ($member_db >= 10) {
        $member_in = "00$member_db";
    } elseif ($member_db >= 1) {
        $member_in = "000$member_db";
    } else {
        $member_in = "0000$member_db";
    }
    $rand       = substr(str_shuffle('12345678901234567890123456789012345678901234567890'), 0, 50);
    $rand_login = substr(str_shuffle('12345678901234567890123456789012345678901234567890'), 0, 50);
    $password = substr(str_shuffle('1234567890'), 0, 4);
    $provincecode = 'HKT';
    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    /*$data2 = array(
        "username" => "$provincecode$member_in",
        "password" => "$password",
        "code_login" => $rand_login,
        "company" => "$_POST[company]",
        "email" => "$_POST[email]",
        "name_en" => "$_POST[name_en]",
        "name" => "$_POST[name]",
        "nickname" => "$_POST[nickname]",
        "idcard_finish" => "$_POST[idcard_finish]",
        "idcard" => "$_POST[idcard]",
        "iddriving_finish" => "$_GET[iddriver_finish]",
        "iddriving" => "$_POST[iddriving_new]",
        "email" => "$_POST[email]",
        "phone" => "$_POST[phone]",
        "contact" => "$_POST[contact]",
        "car_num" => $last_id,
        "start_work" => "$_POST[start_work]",
        "address" => "$_POST[address]",
        "detail" => "$_POST[detail]",
        "posted" => "$_SESSION[admin_user]",
        "driver_zone" => "$_POST[driver_zone]",
        "status" => "1",
        "email" => "$_POST[email]",
        "skype_id" => "$_POST[skype_id]",
        "zello_id" => "$_POST[zello_id]",
        "wechat_id" => "$_POST[wechat_id]",
        "whatsapp_id" => "$_POST[whatsapp_id]",
        "line_id" => "$_POST[line_id]",
        "post_date" => "" . TIMESTAMP . "",
        "update_date" => "" . TIMESTAMP . ""
    );*/
    $data["username"] = $provincecode.$member_in;
    $data["password"] = $password;
        $data["code_login"] = $rand_login;
        $data["company"] = $_POST[company];
        $data["email"] = $_POST[email];
        $data["name_en"] = $_POST[name_en];
        $data["name"] = $_POST[name];
        $data["nickname"] = $_POST[nickname];
        $data["idcard_finish"] = $_POST[idcard_finish];
        $data["idcard"] = $_POST[idcard];
        $data["iddriving_finish"] = $_GET[iddriver_finish];
        $data["iddriving"] = $_POST[iddriving_new];
        $data["email"] = $_POST[email];
        $data["phone"] = $_POST[phone];
        $data["contact"] = $_POST[contact];
        $data["car_num"] = $last_id;
        $data["start_work"] = $_POST[start_work];
        $data["address"] = $_POST[address];
        $data["detail"] = $_POST[detail];
        $data["posted"] = $_SESSION[admin_user];
        $data["driver_zone"] = $_POST[driver_zone];
        $data["status"] = "1";
        $data["email"] = $_POST[email];
        $data["skype_id"] = $_POST[skype_id];
        $data["zello_id"] = $_POST[zello_id];
        $data["wechat_id"] = $_POST[wechat_id];
        $data["whatsapp_id"] = $_POST[whatsapp_id];
        $data["line_id"] = $_POST[line_id];
        $data["post_date"] = time();
        $data["update_date"] = time();
    	$data[result] = $db->add_db('web_driver',$data);
    
    header('Content-Type: application/json');
	echo json_encode($data);
	
//    $db->closedb();
/*    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    $res[project]         = $db->select_query("SELECT  id,username  FROM  web_driver    order by id desc limit 1  ");
    ///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
    $arr[web_driver_edit] = $db->fetch($res[project]);
    copy("../data/fileupload/store/register/" . $_POST[check_code] . "_id_driver.jpg", "../data/pic/driver/small/" . $arr[web_driver_edit][username] . ".jpg");
    unlink("../data/fileupload/store/register/" . $_POST[check_code] . "_id_driver.jpg");
    $_GET[vc]   = 'new';
    ////// สร้างไฟล์
    $folder_xml = "../data/xml";
    $newdriver  = "" . "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n" . "<newdriver>\n";
    ///$newdriver .= "<id>".$arr[chatlast][id]."</id>\n";
    $newdriver .= "<status>1</status>\n";
    $newdriver .= "<time>" . date("H:i:s") . "</time>\n";
    $newdriver .= "<name>" . $_POST[name] . "</name>\n";
    $newdriver .= "<phone>" . $_POST[phone] . "</phone>\n";
    $newdriver .= "<code>" . $_POST[check_code] . "</code>\n";
    $newdriver .= "<id>" . $arr[web_driver_edit][id] . "</id>\n";
    $newdriver .= "</newdriver>";
    @unlink("$folder_xml/register/taxi/" . $_GET[vc] . ".xml");
    @$fd = @fopen("$folder_xml/register/taxi/" . $_GET[vc] . ".xml", "a+");
    @fputs($fd, $newdriver . "");
    @fclose($fd);
    include("mod/register/sendmail/new.php");*/
}

if ($_GET[action] == "add2") {


    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   /* $next_increment = 0;
    $qShowStatus    = "SHOW TABLE STATUS LIKE 'web_driver'";
    $qShowStatusResult = mysql_query($qShowStatus) or die("Query failed: " . mysql_error() . "<br/>" . $qShowStatus);
    $row = mysql_fetch_assoc($qShowStatusResult);
    $last_id   = $row['Auto_increment'];
    $member_db = $row['Auto_increment'];
    if ($member_db >= 1000) {
        $member_in = "$member_db";
    } elseif ($member_db >= 100) {
        $member_in = "0$member_db";
    } elseif ($member_db >= 10) {
        $member_in = "00$member_db";
    } elseif ($member_db >= 1) {
        $member_in = "000$member_db";
    } else {
        $member_in = "0000$member_db";
    }*/
    $rand       = substr(str_shuffle('12345678901234567890123456789012345678901234567890'), 0, 50);
    $rand_login = substr(str_shuffle('12345678901234567890123456789012345678901234567890'), 0, 50);
    $password = substr(str_shuffle('1234567890'), 0, 4);
    $provincecode = 'HKT';
    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    
//    $data["username"] = $provincecode.$member_in;
    	$data["password"] = $password;
        $data["code_login"] = $rand_login;
        $data["company"] = $_POST[company];
        $data["email"] = $_POST[email];
        $data["name_en"] = $_POST[name_en];
        $data["name"] = $_POST[name];
        $data["nickname"] = $_POST[nickname];
        $data["idcard_finish"] = $_POST[idcard_finish];
        $data["idcard"] = $_POST[idcard];
        $data["iddriving_finish"] = $_GET[iddriver_finish];
        $data["iddriving"] = $_POST[iddriving_new];
        $data["email"] = $_POST[email];
        $data["phone"] = $_POST[phone];
        $data["contact"] = $_POST[contact];
//        $data["car_num"] = $last_id;
        $data["start_work"] = $_POST[start_work];
        $data["address"] = $_POST[address];
        $data["detail"] = $_POST[detail];
        $data["posted"] = $_SESSION[admin_user];
        $data["driver_zone"] = $_POST[driver_zone];
        $data["status"] = "1";
        $data["email"] = $_POST[email];
        $data["skype_id"] = $_POST[skype_id];
        $data["zello_id"] = $_POST[zello_id];
        $data["wechat_id"] = $_POST[wechat_id];
        $data["whatsapp_id"] = $_POST[whatsapp_id];
        $data["line_id"] = $_POST[line_id];
        $data["post_date"] = time();
        $data["update_date"] = time();
    	$data[result] = $db->add_db('web_driver',$data);
    
    $last_id = mysql_insert_id();
    $member_db = $last_id;
    if ($member_db >= 1000) {
        $member_in = "$member_db";
    } elseif ($member_db >= 100) {
        $member_in = "0$member_db";
    } elseif ($member_db >= 10) {
        $member_in = "00$member_db";
    } elseif ($member_db >= 1) {
        $member_in = "000$member_db";
    } else {
        $member_in = "0000$member_db";
    }
    $data_update[username] = $provincecode.$member_in;;
    $data_update[result] = $db->update_db('web_driver',$data_update,'id = "'.$last_id.'" ');
    
    $data[update] = $data_update;
    
    header('Content-Type: application/json');
	echo json_encode($data);
	

}
?>