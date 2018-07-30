<?php 
			include("../../../../../includes/class.resizepic.php");
			$original_image = $_FILES['fileUpload']['tmp_name'] ;
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$path = "../../../../../../data/fileupload/doc_bill/".$_GET[place];
			if (is_dir($path)) {
			    $result = $image->output_resized("../../../../../../data/fileupload/doc_bill/".$_GET['place']."/".$_GET['place']."_".$_GET['order_id'].".jpg","JPG");
			} else {
			    mkdir($path, 0777, true);
			    $result = $image->output_resized("../../../../../../data/fileupload/doc_bill/".$_GET['place']."/".$_GET['place']."_".$_GET['order_id'].".jpg","JPG");
			}
			$array[path] = $path;
			$array[result] = $result;
			header('Content-Type: application/json');
			echo json_encode($array);
?>