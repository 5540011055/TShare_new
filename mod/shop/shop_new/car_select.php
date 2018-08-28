<div style="padding: 5px;margin-top: 0px;">
<?php 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$select = "SELECT * FROM web_carall where drivername = '".$_SESSION['data_user_id']."'  ";
$res[car] = $db->select_query($select);
while($arr[car] = $db->fetch($res[car])){	
$res[ct] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[car][car_type]."' ");
$arr[ct] = $db->fetch($res[ct]);
if($arr[car][plate_color]=="Green"){
$plate_color="009999"; }
if($arr[car][plate_color]=="Yellow"){
$plate_color="FFCC00"; } 
 if($arr[car][plate_color]=="Black"){
 $plate_color="FFFFFF"; } 
 if($arr[car][plate_color]=="Red"){
 $plate_color="FF0000"; 
 } 
?>	
	<a id="car_<?=$arr[car][id];?>" class="a-select-car" style="text-decoration:none; margin-top:30px;" onclick="selectCarShops('<?=$arr[car][id];?>','<?=$arr[car][car_type];?>');">
		<input type="hidden" id="value_car_<?=$arr[car][id];?>" data-plate_num="<?=$arr[car][plate_num];?>" />
    	<table width="100%" border="0" cellspacing="2" cellpadding="2" id="div_car_<?=$arr[car][id];?>" style="border: 0px solid #ddd;background-color: #f6f6f6;">
               <tbody>
                  <tr>
                     <td>
                        <table width="100%" cellpadding="1" cellspacing="2">
                           <tbody>
                           <tr>
                           <td width="100" align="center" bgcolor="<?=$plate_color;?>" style="border: solid 2px; height:20px; color:#DADADA; padding:5px; padding-right:0px;border-radius:5px;"><font color="#FFFFFF" class="font-28"><b><?=$arr[car][plate_num];?><br>
                                 <font class="font-20"><?=$arr[car][province];?></font></b></font>
                              </td>
                           </tr>
                        </tbody>
                        </table>
                        
                     </td>
                     <td width="50" align="center">
                      <label class="container">
					  <input type="checkbox" name="car" id="car_use_<?=$arr[car][id];?>" value="1">
					  <span class="checkmark"></span>
					</label>
                     </td>
                  </tr>
               </tbody>
            </table>
    </a>
<? } ?>
</div>
 <script>
 	function selectCarShops(id,cartype){
	    $('input[type="checkbox"]').prop('checked', false); // Unchecks it
	    $('#car_use_'+id).prop('checked', true); // Checks it
	    var plate_num = $('#value_car_'+id).data('plate_num');
	    $('#car_type').val(cartype);
	    $('#car_plate').val(plate_num);
	    
	    
	}
 </script>