<?
  include("../../../includes/class.resizepic.php");
// echo "../../../../data/fileupload/store/car/".$_GET['code']."_".$_GET['type'].".jpg";
if($_GET[type]=="add"){
	
			$original_image = $_FILES['fileUpload1']['tmp_name'] ;
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$res[1] = $image->output_resized("../../../../data/pic/car/".$_GET[id]."_1.jpg","JPG");
			
			$original_image = $_FILES['fileUpload2']['tmp_name'] ;
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$res[2] = $image->output_resized("../../../../data/pic/car/".$_GET[id]."_2.jpg","JPG");
			
			$original_image = $_FILES['fileUpload3']['tmp_name'] ;
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$res[3] = $image->output_resized("../../../../data/pic/car/".$_GET[id]."_3.jpg","JPG");
			header('Content-Type: application/json');
			echo json_encode($res);
			
}
else if($_GET[type]=="edit"){
			$original_image = $_FILES['fileUpload']['tmp_name'] ;
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$check = $image->output_resized("../../../../data/pic/car/".$_GET[id]."_".$_GET[point].".jpg","JPG");
			header('Content-Type: application/json');
			echo json_encode($check);
}
?>
 