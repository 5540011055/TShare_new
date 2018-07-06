<?php 
// header('Access-Control-Allow-Origin: *');
@session_start();
include("../includes/class.resizepic.php");
   
   // $desired_width = 200;
   // $desired_height = _INEWS_H ;
   // $image = new hft_image($original_image);
   // $image->resize($desired_width, $desired_height, '0');
   // $image->output_resized("../data/data/pic/driver/small/".$_GET['code']."_".$_GET['type'].".jpg","JPG");
 
//opy ($_FILES['fileupload']['tmp_name'], "".$_POST[userid].".png" );
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
      if ($type_login == 'nomal') {
              //  $fname['status'] =  "0";      
              // $fname['username'] =  '';
              //  $fname['case'] =  'add sssssssss';
              // $rtn = array();
              // array_push($rtn,$fname); 
          
          //echo json_encode($rtn);
     
        $res = $db->select_query("SELECT * FROM web_driver where username = '". $username ."'");
        
      }
      else if($type_login != 'nomal'){
         // $type_login = $_POST[type];      
        
        $name = $_POST[name];
        $email = $_POST[email];
       
        $url = $_POST[img];
        $res = $db->select_query("SELECT * FROM web_driver where username_login = '". $username ."'");
      }
      
      $arr = $db->fetch($res);
      //echo json_encode($username);
      if (!$arr) {
          $db = New DB();
          $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
          $data[username_login] = $username;
          $data[password_login] = $username;
          $data[email] =  $email;
          $data[nickname] = $name;
          $data[username] = $username;
          $data[password] = $username;
          $data[user_class] = 'taxi';
          $data[post_date] = time();
          if ($type_login == 'nomal') {
             $fname['status'] =  "2";      
              $fname['username'] =  '';
               $fname['case'] =  'no user';
              $rtn = array();
              array_push($rtn,$fname);
              echo json_encode($rtn);
          }
          if ($type_login != 'nomal') {
             $add = $db->add_db("web_driver",$data);
          }
          
        
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
              $img = 'data/pic/driver/small/'.$username.'.jpg';
              file_put_contents($img, file_get_contents($url));
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
            ob_start();
            session_start();
            if($type_login=='facebook'){
                if ($arr[password_login] == $password) { // check id face compare field face_id
                    $fname['status'] =  "1";      
                    $fname['username'] =  $arr[id];
                    $rtn = array();
                    array_push($rtn,$fname); 

                    $_SESSION['data_user_name'] = $arr[username] ;
                    $_SESSION['data_user_password'] = $arr[password] ;
                    $_SESSION['data_user_id'] = $arr[id] ; 
                    $_SESSION['data_user_class'] = $arr[user_class] ;
                     echo json_encode($rtn);
                                          
                }
                              
            }
          
            else if($type_login=='google'){
                 if ($arr[password_login] == $password) { // check id face compare field face_id
                    $fname['status'] =  "1";      
                    $fname['username'] =  $arr[id];
                     $fname['case'] =  'google';
                    $rtn = array();
                    array_push($rtn,$fname); 
                    $_SESSION['data_user_name'] = $arr[username] ;
                    $_SESSION['data_user_password'] = $arr[password] ;
                    $_SESSION['data_user_id'] = $arr[id] ; 
                    $_SESSION['data_user_class'] = $arr[user_class] ;
                     echo json_encode($rtn);
                                          
                }
              }
              else{
               // echo json_encode($arr);
                 if ($password == $arr[password]) {
                      $fname['status'] =  "1";      
                    $fname['username'] =  $arr[id];
                     $fname['case'] =  'nomal';
                    $rtn = array();
                    array_push($rtn,$fname);
                     $_SESSION['data_user_name'] = $arr[username] ;
                    $_SESSION['data_user_password'] = $arr[password] ;
                    $_SESSION['data_user_id'] = $arr[id] ; 
                    $_SESSION['data_user_class'] = $arr[user_class] ; 
                        
                    echo json_encode($rtn);
                       
                  }
                  else{
                     $fname['status'] =  "3";      
                    $fname['username'] =  '';
                     $fname['case'] =  'nomal passwors ';
                    $rtn = array();
                    array_push($rtn,$fname);
                    echo json_encode($rtn);
                  }
              }
            }
              

?>


            	

