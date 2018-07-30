<?php 
/*$path = "../../../../../../data/fileupload/store/".$_GET['type']."_".$_GET['code'].".jpg";
echo $path;
$images = $_FILES["fileUpload"]["tmp_name"];
//		$new_images = "Thumbnails_".$_FILES["fileUpload"]["name"];
		copy($_FILES["fileUpload"]["tmp_name"],"../../../../../../data/fileupload/store/".$_GET['type']."_".$_GET['code'].".jpg");*/

	include("../../../../includes/class.resizepic.php");

			$original_image = $_FILES['fileUpload']['tmp_name'] ;
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			header('Content-Type: application/json');
			$result = $image->output_resized("../../../../../data/fileupload/store/tbooking/".$_GET['type']."_".$_GET['code'].".jpg","JPG");
			
			echo json_encode($result);
?>