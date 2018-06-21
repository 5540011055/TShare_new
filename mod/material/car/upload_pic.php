<?
  include("../../../includes/class.resizepic.php");
 echo "../../../../data/fileupload/store/car/".$_GET['code']."_".$_GET['type'].".jpg";
			$original_image = $_FILES['fileUpload']['tmp_name'] ;
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$image->output_resized("../../../../data/fileupload/store/car/".$_GET['code']."_".$_GET['type'].".jpg","JPG");
//			$image->output_resized("../data/pic/car/".$_GET['id']."_".$_GET['type'].".jpg","JPG");
//			../data/pic/car/11_1.jpg?v=1512809452
?>
 