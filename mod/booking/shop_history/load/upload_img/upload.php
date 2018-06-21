<?php 
$path = "../../../../../../data/fileupload/store/".$_GET['type']."_".$_GET['code'].".jpg";
echo $path;
$images = $_FILES["fileUpload"]["tmp_name"];
//		$new_images = "Thumbnails_".$_FILES["fileUpload"]["name"];
		copy($_FILES["fileUpload"]["tmp_name"],"../../../../../../data/fileupload/store/".$_GET['type']."_".$_GET['code'].".jpg");
		/*$width=500; 
		$size=GetimageSize($images);
		$height=round($width*$size[1]/$size[0]);
		$height=700;
		$images_orig = ImageCreateFromJPEG($images);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		ImageJPEG($images_fin,$path);
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);*/
?>