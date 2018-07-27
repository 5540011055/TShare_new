<?php
include('../../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_apptshare','admin_MANbooking','252631MANbooking');
if($_GET[op]=="get_id_province"){
   
   $str = $_POST[txt_pv]; //กรุงเทพมหานคร
   if(strlen($str)>7){
   	$txt = mb_substr($str,0,7, "utf-8");
   }else{
   	$txt = $_POST[txt_pv];
   }
   $th = "name_th LIKE '%".$txt."%'";
   $en = "or name LIKE '%".$txt."%'";
   $cn = "or name_cn LIKE '%".$txt."%'";
   $pv[province] = $db->select_query("SELECT id,name_th,name_cn,name,area FROM web_province  where ".$th." ".$en." ".$cn."   ");
   $pv[province] = $db->fetch($pv[province]);
   $num_place[area] = $db->select_query("SELECT sum(num_place) as num_all FROM shopping_place_num where area = '".$pv[province][area]."' and status = 1 group by area ");
   $num_place[area] = $db->fetch($num_place[area]);
   $num_place[pv] = $db->select_query("SELECT sum(num_place) as num_all FROM shopping_place_num where province = '".$pv[province][id]."' and status = 1 group by province ");
   $num_place[pv] = $db->fetch($num_place[pv]);  
   $db->closedb ();
   $db->connectdb('admin_web','admin_MANbooking','252631MANbooking');
   $area[area] = $db->select_query("SELECT id,topic_th,topic_en,topic_cn FROM web_area  where id = '".$pv[province][area]."'  ");
   $area[area] = $db->fetch($area[area]);
   $db->closedb ();
   $data[id] =  $pv[province][id];
   $data[name_th] =  $pv[province][name_th];
   $data[name_cn] =  $pv[province][name_cn];
   $data[name] =  $pv[province][name];
   $data[area] =  $pv[province][area];
   $data[area_name] =  $area[area][topic_th];
   $data[num_place_area] =  $num_place[area][num_all];
   $data[num_place_province] =  $num_place[pv][num_all];
   header('Content-Type: application/json');
   echo json_encode($data);
   }
?>