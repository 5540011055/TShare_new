<?php
@setcookie("app_remember_user", $_POST[loginusername], time() + (86400 * 30), "/"); // 86400 = 1 day
@setcookie("app_remember_pass", $_POST[loginpassword], time() + (86400 * 30), "/"); // 86400 = 1 day
@setcookie('app_remember_time', false);
?>
<?
@session_start();
require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/function.in.php");
$db = New DB();
$username_full  = $_POST[loginusername];
$username_short = 'driver_' . $_POST[loginusername];
//Check Admin
///// driver ปกติ
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$username_cut = substr($_POST[loginusername], 0, 3); // abcd
$tb_admin_chk = "web_driver";

$res[admin]  = $db->select_query("SELECT * FROM " . $tb_admin_chk . " WHERE password='" . $_POST[loginpassword] . "'  AND (username='" . $username_full . "' or username='" . $username_short . "' or phone='" . $username_full . "') ");
$rows[admin] = $db->rows($res[admin]);
if ($rows[admin]) {
    $arr[admin] = $db->fetch($res[admin]);
    //$user_id = $arr[admin][id] ;    
    //include("xml/update/id.php");
}
//Can Login
if ($arr[admin][id]) {
    //Login ผ่าน
    ob_start();
    session_start();
    $_SESSION['data_user_name']     = $arr[admin][username];
    $_SESSION['data_user_password'] = $arr[admin][password];
    $_SESSION['data_user_id']       = $arr[admin][id];
    $_SESSION['data_user_class']    = $arr[admin][user_class];
    @setcookie("detect_username", $_POST[loginusername], time() + (3000 * 30), "/");
    @setcookie("detect_userclass", $arr[admin][user_class], time() + (3000 * 30), "/");
?>
<script>

 var url = "index.php?check_new_user=<?= $_POST[check_new_user]; ?>";
console.log(url);
 window.location.href = url; 

 </script>
 <?
}
else {
?>
 <div style="padding:5px; background-color:#FF0000 ; margin-top:10px;border-radius: 5px; "><font color="#FFFFFF"> 
    ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง <?= $username_full . " " . $_POST[loginpassword]; ?></font> </div>
    <?
}
?>