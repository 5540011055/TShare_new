<style>
   .shop-main-icon {
   border-radius: 60px;
   background-color: <?=$main_color?>;
   padding: 0px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color: #FFFFFF;
   border: solid 3px #FFFFFF;
   box-shadow: 0 0 0px 2px #DADADA; text-align:center;
   color: #fff;
   }
   /* 
   .div-all-shop:hover{
   padding:5px;   border-radius: 10px; border: 2px solid #ddd;background-color:#FFFDE9;     margin-bottom: 5px; box-shadow: 0px  0px 10px #DADADA  ; margin-bottom:10px;
   }
   */
   .box-show-pv{
   width: 100%;
   padding: 7px;
   border-radius : 10px;
   }
   .zindex-small-popup{
      z-index:10000;
      }
</style>
<?php 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$province_name = $db->select_query("SELECT id,".$province." FROM web_province where id='".$_GET[province]."' ");
$province_name = $db->fetch($province_name);

?>
<script>

     $(".text-topic-action-mod" ).html("<?=t_send_to_customer;?> (<?=$province_name[$province];?>)");
    
</script> 
<div style="margin-top:45px;">
	<div style="padding: 20px 10px;" align="center">
   <button style="max-width:250px;" class="btn-repair waves-effect box-show-pv"  onclick="ChangeProvince('other');"><strong><span class="font-24 text-cap"><? echo t_provinces;?></span></strong></button>
   </div>

   	

	 <ul class="collection">
	<?php 
	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[project] = $db->select_query("SELECT id,logo_code,topic_th,topic_en,topic_cn FROM shopping_product_main  ORDER BY  id  ASC  ");
      while($arr[project] = $db->fetch($res[project])){
        $type = $db->num_rows('shopping_product_sub',"id","main=".$arr[project][id]."");
        $shop = $db->num_rows('shopping_product',"id","main=".$_GET[id]."  and status=1");
        $allproduct = $db->num_rows('shopping_product',"id","main=".$arr[project][id]." and status = 1 and province = '".$_GET[province]."' ");
      	if($allproduct==1){
      		$res[sub] = $db->select_query("SELECT sub FROM shopping_product where main=".$arr[project][id]." and status = 1 and province = '".$_GET[province]."' ");
      		$arr[sub] = $db->fetch($res[sub]);
      	}
      	if($type ==''){ 
      	 $type ='ยังไม่มี';
      	}
      		if($shop ==''){ 
      	 $shop ='ยังไม่มี';
      	}
      	 $allplace = $db->num_rows('shopping_product',"id","main=".$arr[project][id]." and status = 1 and province = '".$_GET[province]."' ");
      	 if (strpos($arr[project][logo_code], 'fa') !== false) {
      	 	$a = '';
      	 }else{
      	 	
		 	$a = 'padding-top: 12px;';
		 }
		 if($allplace>0){
		 	$show_type = '';
		 }else{
		 	$show_type = 'display:none;';
		 }
	?> 
    <li class="collection-item avatar" onclick="selectMainType('<? echo $arr[project][id];?>','<?=$arr[project][topic_th];?>')" style="<?=$show_type;?>">
	  <i class="fa <?=$arr[project][logo_code]?> circle" style="margin-top: 7px;<?=$a;?>"></i>  
      <span style="margin-top: 8px;" class="title font-24"><?=$arr[project][$place_shopping];?></span>
      <p class="font-20"><?=$allplace;?> สถานที่</p>
      <a class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
   

	<? } ?>
  </ul>
</div>
<script>
	function selectMainType(id,topic_main){
		var url = "mod/shop/update_num_place.php?id="+id+"&province=<?=$_GET[province];?>&op=update";
         		 $.post( url, function( data ) {
         		  	console.log(data);
         		});  
          var num = $('#num_place_'+id).val();
          if(num<=0){
          	alert('ไม่มีสินค้า');
          }
          else{
          	if(num==1){
          		 var id_place_one = $('#id_sub_'+id).val();
          		 $("#main_load_mod_popup_2" ).toggle();
         		var url_load = "load_page_mod_2.php?name=shop&file=shop&driver=<?=$user_id?>&type="+id_place_one+"&province=<?=$_GET[province];?>&detail=1&topic="+topic_main;
         		console.log(url_load);
         		$('#load_mod_popup_2').html(load_main_mod);
         		$('#load_mod_popup_2').load(url_load); 
         	}else{
         		 console.log('<?=$_GET[province];?>');
         		 $("#main_load_mod_popup_1" ).show();
         		 var url_load= "load_page_mod_1.php?name=shop&file=main&id="+id+"&type=stop&province=<?=$_GET[province];?>&topic="+topic_main+"&pd=1";
         		 console.log(url_load);
         		  $('#load_mod_popup_1').html(load_main_mod);
         		  $('#load_mod_popup_1').load(url_load); 
         	}
          }
	}
   $("#close_alert_show_shopping_place").click(function(){   
   $( "#alert_show_shopping_place" ).hide();
   });
    function ChangeProvince(type){

      	if(type=="other"){

      		$('#main_load_mod_popup').hide();
      		$('#load_mod_popup').html('');
      		$('#show_section').click();

      	}else if(type=="stay"){
      		var name = '<?=$name;?>';
      		var province = '<?=$_GET[province];?>';
      		var url_load= "load_page_mod.php?name=shop&file=maintype&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop&province="+province+"&province_name="+name;
        	$('#load_mod_popup').html(load_main_mod);
        	$('#load_mod_popup').load(url_load);
      	}
      }
</script>