<?php 
// header('Access-Control-Allow-Origin: *');
@session_start();
include("../includes/class.resizepic.php");

   // $desired_width = 200;
   // $desired_height = _INEWS_H ;
   // $image = new hft_image($original_image);
   // $image->resize($desired_width, $desired_height, '0');
   // $image->output_resized("../data/data/pic/driver/small/".$_GET['code']."_".$_GET['type'].".jpg","JPG");

//copy ($_FILES['fileupload']['tmp_name'], "".$_POST[userid].".png" );
include('../includes/class.mysql.php');
$db = New DB();
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  // $db = New DB();
$db->connectdb('admin_app','da_admin','BrgNNrUNR3');
$fname =  array();

      //echo $username;
$type_login = $_POST[type]; 
$username = $_POST[username];
$password = $_POST[password];
$card =  $_POST[idcard];
$email =  $_POST[email];
if($_POST[type] == 'nomal'){

  $db = New DB();
  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);

  $data[email] =  $email;
  $data[idcard] = $card;
  $data[username] = $username;
  $data[password] = $password;
  $data[user_class] = 'taxi';
  $data[post_date] = time();


  $add = $db->add_db("web_driver",$data);



  if ($add === TRUE) {
    $last_id = mysql_insert_id();

    $fname['status'] =  "1";      
    $fname['username'] =  $last_id;
    $fname['case'] =  'add success';
    $rtn = array();
    array_push($rtn,$fname);                                          

    $_SESSION['data_user_name'] = $username; 
    $_SESSION['data_user_password'] = $username; 
    $_SESSION['data_user_id'] = $last_id ; 
    $_SESSION['data_user_class'] = 'taxi' ;

    echo json_encode($rtn);     


  } else {
   $fname['status'] =  "0";      
   $fname['username'] =  '';
   $fname['case'] =  'n';
   $rtn = array();
   array_push($rtn,$fname);
   echo json_encode($rtn);
 }
}
else{
  $fname['status'] =  "0";      
  $fname['username'] =  '';
  $fname['case'] =  'n';
  $rtn = array();
  array_push($rtn,$fname);
  echo json_encode($type_login);

}


?>




