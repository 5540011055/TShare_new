<script>
$('#text_mod_topic_action').text('รายชื่อสมาชิก Taxi');
</script>

<style>
    .onlyThisTable td{
		 	padding: 15px 10px;
	}
    .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
         </style>
<div style="padding: 0px;  margin-top: 55px;margin-bottom: 30px;">
<div>
	<table width="100%">
		<tr>
			<td colspan="2">
				<a class="btn waves-effect waves-light green lighten-2" style="color: #fff;" onclick="filterOnline();">สมาชิกออนไลน์</a>
			</td>
		</tr>
		<tr>
			<td width="50%" style="padding: 0px 5px;"><input type="text" placeholder="ค้นหาจากชื่อ" value="" style="width: 100%;" class="font-22" id="search_dv_name"  /></td>
			<td width="50%" style="padding: 0px 5px;"><input type="text" placeholder="ค้นหาจากเบอร์โทร" value="" style="width: 100%;" class="font-22" id="search_dv_phone"  /></td>
		</tr>
	</table>
</div>
<table class="centered onlyThisTable" width="100%" >
  <thead>
    <tr>
      <th width="30">#</th>
      <th>ชื่อเล่น</th>
      <th>เบอร์โทร</th>
    </tr>
  </thead>
  <tbody>
<?php 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[dv] = $db->select_query("SELECT * FROM web_driver order by id desc ");
while($arr[dv] = $db->fetch($res[dv])){ 
 $d1 = "2018-03-24";
 $d2 = date('Y-m-d',$arr[dv][post_date]);
?>

	<tr id="tr_id_<?=$arr[dv][id];?>" >
		<td onclick="openDetailDv('<?=$arr[dv][id];?>','<?=$arr[dv][nickname];?>');"><span class="sp_id"><?=$arr[dv][id];?></span></td>
		<td onclick="openDetailDv('<?=$arr[dv][id];?>','<?=$arr[dv][nickname];?>');"><span class="sp_name" role="<?=$arr[dv][id];?>"><?=$arr[dv][nickname];?></span></td>
		<td><a href="tel:<?=$arr[dv][phone];?>"><span class="sp_phone" role="<?=$arr[dv][id];?>"><?=$arr[dv][phone];?></span></a></td>
		<td align="right">
		<i class="fa fa-user" aria-hidden="true" id="icon_online_<?=$arr[dv][id];?>" style="font-size: 26px;"></i>
		</td>
	</tr>

<? }
?>
</tbody>
 </table>
 </div>
 
 <div id="broModal" class="modal" style="font-size: 0px!important; color: #000000 !important;">
      <span class="close" style="position: fixed;
         color: #f4f4f4;
         right: 15px;
         font-size: 40px; display: none;
         " id="closeModal" >&times;</span>
      <i class="fa fa-times" aria-hidden="true" style="position: fixed;
         color: #f4f4f4;
         right: 15px;
         font-size: 40px;
         z-index: 9000;
         margin-top : 10px;
         " id="close_modal" onclick="$('#broModal').hide();$('#material_dialog').show();$('#main_load_mod_popup .back-full-popup').show();"></i>
         
      <div class="modal-content" id="img01"> 
      
      </div>
   </div>
 
 <script>
 	function openDetailDv(id,name){
		console.log(id);
		
		$('#material_dialog_lg').modal('open');
		$('#dialoglLabel_lg').text(name);
		$('#load_modal_body').html('<br/><br/><br/>');
		var url = "empty_style.php?name=taxi_list&file=driver_detail";
		$.post(url,{ id : id },function(res){
			$('#load_modal_body_lg').html(res);
		});
	}
	function viewDocument(dv_id,type,caption){

		$('#material_dialog_lg').modal('close');
		$('#main_load_mod_popup .back-full-popup').hide();
		$('#broModal').show();
		var load_img = "mod/taxi_list/doc_dv_swiper.php?type="+type+"&driver_id="+dv_id+"&caption="+caption;
		console.log(load_img);
		$('#img01').load(load_img);
	}
	$( "#search_dv_name" ).keyup(function() {
	  	var txt_ip = $(this).val();
	  	$('.sp_name').each(function() {
			var txt_name = $(this).text();
			var row_id = $(this).attr('role');
			 if (txt_name.toUpperCase().indexOf(txt_ip.toUpperCase()) > -1) {
		       	$('#tr_id_'+row_id).show();
		      } else {
		        $('#tr_id_'+row_id).hide();
		      }
		});
	});
	$( "#search_dv_phone" ).keyup(function() {
	  	var txt_ip = $(this).val();
	  	$('.sp_phone').each(function() {
			var txt_phone = $(this).text();
			var row_id = $(this).attr('role');
			 if (txt_phone.toUpperCase().indexOf(txt_ip.toUpperCase()) > -1) {
		       	$('#tr_id_'+row_id).show();
		      } else {
		        $('#tr_id_'+row_id).hide();
		      }
		});
	});

	$.each(array_rooms, function( index, value ) {
	  console.log(value );
	  $('#icon_online_'+value).css('color','rgb(139, 195, 74)');
	});
	
	function filterOnline(){
		$('.centered tr').hide();
		$.each(array_rooms, function( index, value ) {
		  	console.log(value);
		  	$('#tr_id_'+value).show();
		  	$('#icon_online_'+value).css('color','rgb(139, 195, 74)');
		});
	}
 </script>