<style>
.img-car{
	height: 70px;
    width: auto;
}
</style>
<div  style="padding-top:40px;" >
	<div align="center" style="padding: 5px 10px; width:100%; margin-top: 20px;" >
		<div class="btn waves-effect waves-light" style=" border: 1px solid #3b5998;width: 100%;border-radius: 25px;" id="add_car" >
	      <span class="font-26"><strong><?=t_add_car;?> <i class="fa fa-plus-circle" aria-hidden="true"></i></strong></span>
	   </div>
   </div>
   <script>
      $('.text-topic-action-mod').html('<?=t_all_car;?>');
      
      $('#add_car').click(function(){
      	$( "#main_load_mod_popup_1" ).show();
//        var url_load = "load_page_mod_1.php?name=car&file=new_car&openby=all";
       var url_load = "load_page_mod_1.php?name=material/car&file=add_car&openby=all";
       console.log('add_car');
       $('#load_mod_popup_1').html(load_main_mod);
        $('#load_mod_popup_1').load(url_load); 
      });
   </script>
   <div style="margin-top: 10px;">
   
      <?
         $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
         $res[project] = $db->select_query("SELECT * FROM  web_carall  where drivername='".$user_id."'  order by id asc  ");
         	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
          while($arr[project] = $db->fetch($res[project])){  
          $arr[type] = $db->fetch($res[type]);
          		$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#FFFFFF'; 
         	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
         	$res[car_type] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[project][car_type]."' ");
         	$arr[car_type] = $db->fetch($res[car_type]);
         	 ?>
      <div class="col-md-6" style="padding-left: 10px;padding-right: 10px;padding-bottom: 30px;"  >
         
         <div style="padding:5px;   border-radius: 6px; border: 1px solid #ddd;box-shadow:1px 1px 3px #ddd  ; background:<? echo $bgcolor; ?>   " >
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td valign="middle" class="font-16">
                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                           <tr>
                              <td width="50%" height="50%" align="center" class="tool-td-chat">
                                
                                 <button type="button" class="btn btn-cus"   id="edit_car_<?=$arr[project][id];?>" onclick="editCar('<?=$arr[project][id];?>');"  style="width:100%">
                                    <center>
                                       <div   class="font-30"><i class="fa fa-edit" style="color:<?=$main_color?>"  ></i></div>
                                       <span style="padding-bottom:20px;" class="font-22"> <?=t_edit_car_info;?> </span>
                                    </center>
                                 </button>
                              </td>
                           </tr>
                           <tr>
                              <td width="50%" height="50%" align="center" class="tool-td-chat">
                                 <? if($arr[project][status_usecar]==1){ 
                                    $type = "close";
                                    $text_type = t_ancel_commonly_used;
                                    $icon = "fa fa-times-circle";
                                    $color_often = "color: #FF0000";
                                    }else if($arr[project][status_usecar]==0){
                                    $type = "open";
                                    $text_type = t_use_regularly;
                                    $icon = "fa fa-check-circle";
                                    $color_often = "color: #0072BC";
                                    }
                                           ?>
                                 <button type="button" class="btn btn-cus "  id="use_car_<?=$arr[project][id];?>" onclick="use_often('<?=$arr[project][id];?>','<?=$type;?>','<?=$user_id;?>');"  style="width:100%">
                                    <center>
                                       <div  class="font-30"><i class="<?=$icon;?>" style="<?=$color_often;?>"></i></div>
                                       <span style="padding-bottom:20px;" class="font-22"><?=$text_type;?> </span>
                                    </center>
                                 </button>
                              </td>
                           </tr>
                           <tr>
                              <td width="50%" height="50%" align="center" class="tool-td-chat">
                                 <? if($arr[project][status]==1){ ?>
                                 <button type="button" class="btn btn-cus " onclick="cancelCar('<?=$arr[project][id];?>')" id="cancel_car_<?=$arr[project][id];?>"   style="width:100%">
                                    <center>
                                       <div  class="font-30"><i class="fa fa-trash "   style="color:#FF0000" ></i></div>
                                       <span style="padding-bottom:20px;" class="font-22">  <?=t_disable;?> </span>
                                    </center>
                                 </button>
                                 <? } ?>
                                 <? if($arr[project][status]==0){ ?>
                                 <button type="button" class="btn btn-cus "  onclick="activeCar('<?=$arr[project][id];?>')"  id="active_car_<?=$arr[project][id];?>"   style="width:100%">
                                    <center>
                                       <div  class="font-30"><i class="fa fa-taxi "   style="color:<?=$main_color?>" ></i></div>
                                       <span style="padding-bottom:20px;" class="font-22">  <?=t_enable;?> </span>
                                    </center>
                                 </button>
                                 <? } ?>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
                  <td width="60%" valign="top" style="padding-left:5px">
                     <style>
                        .drivertable{        
                        border-radius:5px; margin-top:10px; margin-bottom:10px;
                        border:0px solid #999999; background-color:#FFFFFF; 
                        box-shadow: 0px 1px 5px #DADADA;  }
                        .tdtable  td {height:26px;}
                     </style>
                     <br><? if($arr[project][plate_color]=="Green"){
                        $plate_color="009999"; } ?>
                     <? if($arr[project][plate_color]=="Yellow"){
                        $plate_color="FFCC00"; } ?>
                     <? if($arr[project][plate_color]=="Black"){
                        $plate_color="FFFFFF"; } ?>
                     <? if($arr[project][plate_color]=="Red"){
                        $plate_color="FF0000"; } ?>
                     <table width="100%" cellpadding="1" cellspacing="2"  style="margin-top:-10px;  margin-right: 0px; margin-bottom:0px; margin-right:0px; " >
                     	<tr>
                        <?
                           if($_GET[company_tran] == ''){
                           	$_GET[company_tran] = 283;
                           }
                           if($_GET[company_tran] != ''){
                           	$company_tran = " and company = '".$_GET[company_tran]."' ";
                           }
                           if($_GET[status] != ''){
                           	$status = " and status = '".$_GET[status]."' ";
                           }
                           	//Comment Icon
                           ?>
                        <? if($arr[project][plate_color]=="Green"){
                           $plate_color="009999"; } ?>
                        <? if($arr[project][plate_color]=="Yellow"){
                           $plate_color="FFCC00"; } ?>
                        <? if($arr[project][plate_color]=="Black"){
                           $plate_color="FFFFFF"; } ?>
                        <? if($arr[project][plate_color]=="Red"){
                           $plate_color="FF0000"; } ?>
                        <td width="80" height="70" align="center" bgcolor="#<?=$plate_color?>" style="border: solid 2px; height:70px; color:#DADADA; padding:10px; padding-right:10px;border-radius:10px;"><font color="#<? if($arr[project][plate_color]=="Green"){
                           echo "FFFFFF"; } ?>"  class="font-32"><b><? echo $arr[project][plate_num];?> <br> 
                           <font   class="font-22"><? echo $arr[project][province];?></font></b></font>
                        </td>
                        </tr>
                     </table>
                     <table width="100%"  border="0" cellspacing="2" cellpadding="2"    >
                        <tr>
                           <td width="50" class="font-22"><strong><?=t_type;?></strong></td>
                           <td  class="font-22"><? echo "" . $arr[car_type][$place_shopping] . " "; ?></td>
                        </tr>
                        <tr>
                           <td class="font-22"><strong><?=t_brand;?></strong></td>
                           <td class="font-22"><?echo $arr[project][car_brand];?></td>
                        </tr>
                        <tr>
                           <td class="font-22"><strong><?=t_model;?></strong></td>
                           <td class="font-22"><?echo $arr[project][car_sub_brand];?></td>
                        </tr>
                        <tr>
                           <td class="font-22"><strong><?=t_car_coloring;?></strong></td>
                           <td class="font-22"><? echo $arr[project][car_color];?>
                           </td>
                        </tr>
                        <tr>
                           <td class="font-24"><strong><?=t_status;?></strong></td>
                           <td class="font-24">
                              <? if($arr[project][status_usecar]==1){
                                 $use_often = "(".t_using.")";
                                 } ?>
                              <? if($arr[project][status]==0){ ?>
                              <font color="#FF0000"><strong> <?=t_disable;?></strong></font>
                              <? } ?>
                              <? if($arr[project][status]==1){ ?>
                              <font color="<?=$main_color?>"><strong><?=t_enable;?></strong></font>
                              <? } ?>
                              <span style="font-size: 12px;"><b><?=$use_often;?></b></span>
                           </td>
                        </tr>
                     </table>
                  </td>
               </tr>
            </table>
            <table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-15px;">
               <tbody>
                  <tr style="display:nones">
                     <td width="33%" align="center"><img src="../data/pic/car/<?=$arr[project][id];?>_1.jpg?v=<?=$arr[project][update_date];?>"  class="img-car"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
                     <td width="33%" align="center"><img src="../data/pic/car/<?=$arr[project][id];?>_2.jpg?v=<?=$arr[project][update_date];?>"  class="img-car"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
                     <td width="33%" align="center"><img src="../data/pic/car/<?=$arr[project][id];?>_3.jpg?v=<?=$arr[project][update_date];?>"  class="img-car"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
                  </tr>
               </tbody>
            </table>
         </div>      
      </div>
      <? } ?>  
   </div>
   <script>
    function activeCar(id){
		 swal({
            title: "<?=t_are_you_sure;?>",
   			text: "<?=ต้องการใช้งานรถคันนี้;?>",
            type: "success",
            showCancelButton: true,
            confirmButtonClass: "btn-danger waves-effect waves-light",
            cancelButtonClass: "btn-cus waves-effect waves-light",
            confirmButtonText: '<?=t_yes;?>',
   			cancelButtonText: "<?=t_no;?>",
            closeOnConfirm: true,
            closeOnCancel: true,
            html: true
            },
            function(isConfirm){
               if (isConfirm){
               	var url = 'mod/material/car/php_car.php?action=change_status_car&status=1&id='+id;
               	console.log(url);
	            $.post(url,function(res){
	            	console.log(res)
	            	 openAllCar()
	            }); 
              } 
            });
	}
   	function cancelCar(id){
		swal({
            title: "<?=t_are_you_sure;?>",
   			text: "<?=ต้องการยกเลิกการใช้งานรถคันนี้;?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger waves-effect waves-light",
            cancelButtonClass: "btn-cus waves-effect waves-light",
            confirmButtonText: '<?=t_yes;?>',
   			cancelButtonText: "<?=t_no;?>",
            closeOnConfirm: true,
            closeOnCancel: true,
            html: true
            },
            function(isConfirm){
              if (isConfirm){
              	var url = 'mod/material/car/php_car.php?action=change_status_car&status=0&id='+id;
              	console.log(url);
	            $.post(url,function(res){
	            	console.log(res)
	            	 openAllCar()
	            }); 
              } 
            });
	}
      function use_often(id,type,driver){
      	if(type=="open"){
      		var text_use = "<font style='font-size:22px'><?=t_want_to_use_regularly;?>";
      		var url = "mod/material/car/php_car.php?action=use_often&id="+id+'&driver='+driver+'&status=1';
//      		var type_alert = "success";
      	}else if(type=="close"){
      		var url = "mod/material/car/php_car.php?action=use_often&id="+id+'&driver='+driver+'&status=0';
      		var text_use = "<font style='font-size:22px'><?=t_cancel_often_used;?>";
      		
      	}
      	var type_alert = "warning";
      	 swal({
      			title: "<font style='font-size:28px'><b> <?=t_are_you_sure;?>",
      			text: text_use,
      			type: type_alert,
      			showCancelButton: true,
      			confirmButtonClass: "btn-danger waves-effect waves-light",
            	cancelButtonClass: "btn-cus waves-effect waves-light",
      			confirmButtonText: '<?=t_yes;?>',
   				cancelButtonText: "<?=t_no;?>",
      			closeOnConfirm: true,
      			closeOnCancel: true,
      			html: true
      		},
      		function(isConfirm){
      	    if (isConfirm){
      	  		
		      	$.post(url, function(data) {
		      		console.log(data);
					openAllCar()
		      	});
      	    } 
      		});
      }
   </script>
   <div id="show_from_edit">
   </div>
   <script>
      function editCar(id){
      	console.log(id);
       $("#main_load_mod_popup_1" ).toggle();
//       var url = "load_page_mod_1.php?name=car&file=edit_car&openby=car&id="+id;
       var url = "load_page_mod_1.php?name=material/car&file=edit_car&openby=car&id="+id;
        console.log(url);
        $('#load_mod_popup_1').html(load_main_mod);
        $('#load_mod_popup_1').load(url); 
      }
      function autoclickAllcar(){
      //$( "#load_mod_popup" ).toggle();
      var url_load = "load_page_mod.php?name=car&file=all";
      $('#load_mod_popup').html(load_main_mod);
      $('#load_mod_popup').load(url_load); 
      }
   </script>
</div>
<div id="show_car_detail"></div>