 <?
include('../../../includes/class.mysql.php');
//include('../../../includes/config.in.php');
define("DB_HOST_HIS","localhost");
define("DB_NAME_HIS","admin_his");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_app");
$db = new DB();
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	
	$data['adult'] = $_GET[num];
	
	$data[result] = $db->update_db('order_booking',$data,'id = "'.$_GET[id].'" ');
	echo print_r($data[result]);
// $db->update_db('order_booking', array(
   
//   "adult" => "" . $_GET[num] . "")," id='".$_GET[id]."' ");
		$db->closedb ();
?>