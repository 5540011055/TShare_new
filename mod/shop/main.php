   <script>
      $(".text-topic-action-mod-1" ).html("ส่งแขก > <?=$_GET[topic];?>");
   </script> 
<?php
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $province_name = $db->select_query("SELECT id,".$province." FROM web_province where id='".$_GET[province]."' ");
   $province_name = $db->fetch($province_name);
    ?> 
<style>
	.item-pd{
		padding: 15px 20px !important;
	}
	.tb_pad td{
		 	padding: 7px 2px;
	}
   .shop-main-icon {
   border-radius: 80px;
   background-color: <?=$main_color_sorf?>;
   padding: 5px;
   width: 80px;
   height: 80px;
   text-align: justify;
   color: #FFFFFF;
   border: solid 8px #FFFFFF;
   box-shadow: 0 0 0px 2px #DADADA; text-align:center;
   color: #fff;
   }
   .div-all-shop{
   padding:5px;   border-radius: 10px; border: 0px solid #ddd;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-bottom:10px;
   }
   /* 
   .div-all-shop:hover{
   padding:5px;   border-radius: 10px; border: 2px solid #ddd;background-color:#FFFDE9;     margin-bottom: 5px; box-shadow: 0px  0px 10px #DADADA  ; margin-bottom:10px;
   }
   */
</style>
<div style="margin-top:52px;">
   <div align="center" class="font-28 box-show-pv" style="display: none;"><strong><span><?=$province_name[$province];?></span></strong></div>
   <?
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[pd_main] = $db->select_query("SELECT topic_th,logo_code,id FROM shopping_product_main where id='".$_GET[id]."'  ORDER BY  id  ASC  ");
      $arr[pd_main] = $db->fetch($res[pd_main]);

      ?>
 <ul class="collection with-header">
        <li class="collection-header"><h4>ประเภทย่อยของสถานที่</h4></li>
        <?php 
        $res[row] = $db->select_query("SELECT id,sub,num_place  FROM shopping_place_num  where main='".$arr[pd_main][id]."' and province = '".$_GET[province]."' ORDER BY  num_place  DESC");
		$count=0;
		while($arr[row] = $db->fetch($res[row])){
			if ($count==0) { echo "<TR>"; }
			
		 $res[news] = $db->select_query("SELECT id, topic_th  FROM shopping_product_sub where id = '".$arr[row][sub]."'  ");
		 $arr[news] = $db->fetch($res[news]);
			
		  $shop = $arr[row][num_place];
			
			if($arr[row][num_place]<=0){
				$display = 'display: none;';
			}else{
				$display = '';
			}
        ?>
        <li onclick="selectSubTypeShop('<?=$arr[news][id];?>');" class="collection-item item-pd" style="<?=$display;?>">
        <div>
        <span class="font-22"><?=$arr[news][topic_th]; ?></span> 
        <span class="new badge" style="position: absolute;right: 55px;margin: 3px;background-color: #009688;"><?= $arr[row][num_place]; ?></span>
        <a href="#!" class="secondary-content"><i class="material-icons">keyboard_arrow_right</i></a>
        </div></li>
       <? } ?>
      </ul>

</div>
<script>
   $("#close_alert_show_shopping_place").click(function(){   
   $( "#alert_show_shopping_place" ).hide();
   });
   function selectSubTypeShop(sub_id){
   	$( "#main_load_mod_popup_2" ).show();
	 var url_load = "load_page_mod_2.php?name=shop&file=shop&driver=<?=$user_id?>&type="+sub_id+"&province=<?=$_GET[province];?>";
	 console.log(url_load);
	 $('#load_mod_popup_2').html(load_main_mod);
	 $('#load_mod_popup_2').load(url_load);
   }
</script>