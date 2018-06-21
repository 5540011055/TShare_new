<?php 
include('../../../includes/class.mysql.php');
define("DB_HOST_HIS","localhost");
define("DB_NAME_HIS","admin_his");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_app");
$db = new DB();

$keep = 'th';
switch ($_COOKIE['lng']) {
    case "th":
        //echo "PAGE th";
        include("../../../includes/lang/th/t_share_2.php"); //include check session DE
        $province           = "name_th";
        $place_shopping     = "topic_th";
        $google_map_api_lng = "th";
        break;
    case "cn":
        //echo "PAGE cn";
        include("../../../includes/lang/cn/t_share_2.php");
        $province           = "name_cn";
        $place_shopping     = "topic_cn";
        $google_map_api_lng = 'zh-CN';
        break;
    case "en":
        //echo "PAGE EN";
        include("../../../includes/lang/en/t_share_2.php");
        $google_map_api_lng = "en";
        $place_shopping     = "topic_en";
        $province           = "name";
        break;
    default:
        //echo "PAGE EN - Setting Default";
        include("../../../includes/lang/" . $keep . "/t_share_2.php"); //include EN in all other cases of different lang detection
        //        $google_map_api_lng = $keep;
        $province           = "name_" . $keep;
        $place_shopping     = "topic_" . $keep;
        $google_map_api_lng = $keep;
        break;
}
if($_GET[query]=="province"){
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$res[pv] = $db->select_query("SELECT * FROM web_province where area = '".$_POST[region]."' ");
    while($arr[pv] = $db->fetch($res[pv])) { 
    	$data[] = $arr[pv];
    }
	
    header('Content-Type: application/json');
    echo json_encode($data);
}

if($_GET[ele]=="select_province"){
	?>
	<select class="icons" id="province" name="province">
			      <option value="" disabled selected><?=t_select_province;?></option>
                          <?php 
                                 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                            $res[pv] = $db->select_query("SELECT * FROM web_province where area = '".$_POST[region]."' ORDER BY name_th asc ");
                                             while($arr[pv] = $db->fetch($res[pv])) { 
                                             $txt = explode("/",$arr[pv][name_th]);
                                             ?>
                              <option value="<?=$txt[0];?>" class="<?=$arr[pv][area];?>"><?=$txt[0];?></option>
                              <? } ?>
	</select>
	<script>
		$('#province').material_select();
	</script>
<? }
?>