<?php 
		$path = "../../../../../../../data/fileupload/doc_pay_driver/".$_GET['type']."_".$_GET['code'].".jpg";
		echo $path;
		$images = $_FILES["fileUpload"]["tmp_name"];
//		$new_images = "Thumbnails_".$_FILES["fileUpload"]["name"];
		copy($_FILES["fileUpload"]["tmp_name"],"../../../../../../../data/fileupload/doc_pay_driver/".$_GET['type']."_".$_GET['code'].".jpg");
		
?>