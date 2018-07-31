<div class="my-padding" style="margin-top:  0px;overflow-x: hidden;">
   <div id="tag_your_area" style="margin-top: 15px;">
      <table width="100%">
         <tr>
            <td style="padding: 20px 15px;">
            <a class="btn-repair waves-effect" id="open_map" style="padding: 20px 0px;border: 1px solid #fff;width: 100%;text-align: center; border-radius: 25px;"><span class="text-cap font-24"><?=t_open." ".t_maps;?></span><br><span class="font-21">เลือกสถานที่ส่งแขกช้อปปิ้งผ่านแผนที่</span></a>
            </td>
         </tr>
         <tr>
            <td style="padding: 20px 15px;">
            <a class="btn-repair waves-effect" id="submit_this_pv"  style="padding: 20px 0px;border: 1px solid #fff;width: 100%;text-align: center;border-radius: 25px;"><span class="text-cap font-24"><?=t_login_province;?>&nbsp;(<span class="text-change-province"></span>)</span><br><span class="font-21">เลือกสถานที่ส่งแขกช้อปปิ้งในจังหวัดที่คุณอยู่</span></a>
            </td>
         </tr>
         <tr>
            <td  style="padding: 20px 15px;">
            <a class="btn-repair waves-effect" id="show_section" style="padding: 20px 0px;border: 1px solid #fff;width: 100%;border-radius: 25px;text-align: center;">
            <span class="text-cap font-24"><?=t_login_another_province;?></span><br><span class="font-21">เลือกจังหวัดอื่นๆที่ให้บริการ</span></a>
            </td>
         </tr>
      </table>
   </div>
	<div class="row">
      <div class="col s12 m5">
        <div class="card-panel teal" style="color: #fff;">
          <span class="card-title">ข้อกำหนด</span><br/>
          <span>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</span>
        </div>
      </div>
    </div>
</div>

<script>

	$.post('mod/shop/php_shop.php?op=get_id_province',{ txt_pv: $('#txt_pv_fr').val() },function(r){
		console.log(r);
		$('#province_id').val(r.id);
		$('#area').val(r.area);
	});

   $('#open_map').click(function(){	
   var province = $('#province_id').val();
   $( "#main_load_mod_popup_map" ).toggle();
   
   $( "#load_mod_popup_map" ).show();
   $('#load_mod_popup_map').html(load_main_mod);

   var url_load = "load_page_map.php?name=map_api&file=map_main&province="+province+"&user_id=<?=$user_id?>";
   $('#load_mod_popup_map').load(url_load); 

   });

   $('#submit_select_pv').click(function(){
   		 console.log('select province');
   		 var province = $('#province_id').val();
   		 var province_name = $('#txt_pv_fr').val();
   		 if(province==0 || province==""){
//   		 	alert('กรุณาเลือกจังหวัด');
   		 	swal('<?=t_please_select_province;?>');
   		 	return;
   		 }
   		 $('.bottom_popup').show();
   		 openMainShop(province,province_name);
   });

   $('#show_section').click(function(){
		
   });
   
   $('#submit_this_pv').click(function(){
   	 var province = $('#province_id').val();
   	 var province_name = $('#txt_pv_fr').val();	
   		
   	 console.log(province+" : "+province_name);	 
   	 if(province==""){
   //				 	 alert('ไม่มีสินค้าในจังหวัดที่คุณอยู่');
   		 swal("<?=t_no_products_your_province;?>!")
   //				 	 $('#show_section').click();
   	 	 return;
   	 }
   	 if($('#province_text').text()==""){
   	 	swal("<?=t_not_verify_u_pv;?>!")
   //				 	$('#fade_in3').click();
   	 	 return;
   	 }
   	 openMainShop(province,province_name);
   });
   
 
</script>
