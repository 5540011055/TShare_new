<?php 
// header('Access-Control-Allow-Origin: *');
@session_start();
include("../includes/class.resizepic.php");
include('../includes/class.mysql.php');
$db = New DB();
  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  // $db = New DB();
 $db->connectdb('admin_app','da_admin','BrgNNrUNR3');
      $fname =  array();
      $id_card = $_POST[icard];
      if ( $id_card != '') {
        
      $res = $db->select_query("SELECT * FROM web_driver where id_card = '". $id_card ."'");
      $arr = $db->fetch($res);
      //echo json_encode($username);
      if (!$arr) {
          
             $fname['status'] =  "1";      
              $fname['username'] =  '';
              $fname['case'] =  'no have';
              $rtn = array();
              array_push($rtn,$fname);
              echo json_encode($rtn);
          }
        
        else{
              $fname['status'] =  "1";      
              $fname['username'] =  '';
              $fname['case'] =  'have';
              $rtn = array();
              array_push($rtn,$fname);
              echo json_encode($rtn);
            }
      }
      else{
        $fname['status'] =  "2";      
              $fname['username'] =  '';
              $fname['case'] =  'not data';
              $rtn = array();
              array_push($rtn,$fname);
              echo json_encode($rtn);
      }
      
              

?>


            	

