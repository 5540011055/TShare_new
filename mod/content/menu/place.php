 <style>
 .div-menu-palce{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:-15px;
 	 
 }
 
 
 a:link {
	text-decoration: none !important;
}
a:visited {
	text-decoration: none!important;
}
a:hover {
	text-decoration: none!important;
}
a:active {
	text-decoration: none!important;
}
</style>
  <br/>


<?

/*
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_sub where   id=".$_GET[main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);


*/

 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectmain] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projectmain] = $db->fetch($res[projectmain]);
 
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectsub] = $db->select_query("SELECT * FROM shopping_product_sub where   id=".$_GET[sub]."  ");
$arr[projectsub] = $db->fetch($res[projectsub]);
 
 
?>


   <script>
	 
   $("#add_new_place").click(function(){
			 
 
			 
 $('#topic_edit').html('เพิ่มสถานที่ใหม่');
 
  $('#show_data_page').html('');
 
			 
  var url_page_type_add= "empty_style.php?name=content/load&file=place&op=sub_add&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>";
 
 $('#show_data_page').load(url_page_type_add);
 
 
	   });
	   
 
	   
	   </script>
       
       
       
       
      <script>
	 
 
 
 $("#all_place").click(function(){
			 
  
			 
 $('#topic_edit').html('ประเภท > <? echo $arr[projectsub][topic_th];?>');
			 
			 
  var url_page_type_all= "empty_style.php?name=content/load&file=place&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>";
 
  $('#show_data_page').load(url_page_type_all);
 
	   
	      });
	   
	   </script>   
      <script>
	 
 
 
	     $("#all_sub").click(function(){
			 
 
			 
 $('#topic_edit').html('หมวดหมู่ > <? echo $arr[projectmain][topic_en];?>');
			 
			 
  var url_page_type_all= "empty_style.php?name=content/load&file=type&main=<?=$_GET[main];?>";
 
  $('#show_data_page').load(url_page_type_all);
 
 
 
	   
	      });
	   
	   </script>
 
     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:22px;"  class="div-menu-palce" >
      <tr>
        <td>
 
        
        
        
        
        
        
      <a style="font-size:22px; color:#000000" id="all_sub"  > <i class="fa <? echo $arr[projectmain][logo_code];?>" style="width:24px; font-size:22px; color:#666666"  ></i><? echo $arr[projectmain][topic_th];?>ทั้งหมด </a>    &nbsp; |&nbsp;  
        
        
        
        
        <a style="font-size:22px;" id="all_place" ><? echo $arr[projectsub][topic_th];?>ทั้งหมด</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a   id="add_new_place"style="font-size:22px;"> <i class="fa  fa-plus-circle" style="width:30px; font-size:24px;"  ></i>&nbsp;เพิ่มสถานที่ใหม่</a>  
 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="type_product_list"style="font-size:22px;color: #000000;">&nbsp;ประเภทสินค้า</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="add_type_product_list"style="font-size:22px;color: #000000;"><i class="fa  fa-plus-circle" style="width:30px; font-size:24px;"  ></i>&nbsp;เพิ่มประเภทสินค้า</a>
        
        </td>
      </tr>
    </table>
 
<script>
$("#type_product_list").click(function(){
			 
 $('#topic_edit').html('ประเภทสินค้า');
	 $('#show_data_page').css('margin-top','20px!important;');		 
			 
  var url_page_type_all= "empty_style.php?name=content/load&file=category_product&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>";
 
  $('#show_data_page').load(url_page_type_all);

	      });
	      
$("#add_type_product_list").click(function(){
			 
 $('#topic_edit').html('เพิ่มประเภทสินค้า');
			 
			 
  var url_page_type_all= "empty_style.php?name=content/load&file=category_product&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>&op=add_type_product";
 
  $('#show_data_page').load(url_page_type_all);

	      });
</script>
