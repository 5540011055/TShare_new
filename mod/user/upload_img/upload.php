<?php 
if($_GET[type]=="id_card"){
	
	include("../../../includes/class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/id_card/".$_GET[id]."_idcard.jpg","JPG");
	echo json_encode($result);
	exit();
}
if($_GET[type]=="id_drving"){
	
	include("../../../includes/class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/id_driving/".$_GET[id]."_iddriving.jpg","JPG");
	echo json_encode($result);
	exit();
}
  	include("../../../includes/class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/small/".$_GET[user].".jpg","JPG");
	echo json_encode($result);
?>