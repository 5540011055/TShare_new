 


<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top : 0px solid #DADADA;" >
      <tr>
        <td  style=" padding-bottom:10px; background-color:#FFFFFF;"  >  <table width="100%" border="0" cellspacing="1" cellpadding="1"  style="border-bottom : 2px dotted   #DADADA; padding-bottom:5px;   ">
			      <tr >
			        <td valign="top" bgcolor="<?=$main_color?>" class="font-26" style="padding:5px;color:#FFFFFF;  border-radius:10px  0px 0px 10px;"" >ประเภท 
                    
                	  
			         </td>
                     
			        <td width="60" align="center" bgcolor="<?=$main_color?>" class="font-26" style="padding-top:0px; padding-right:0px;color:#FFFFFF">จำนวน</td>
			        <td width="40" align="center" bgcolor="<?=$main_color?>" class="font-26" style="padding-top:0px; padding-right:5px;color:#FFFFFF; border-radius:0px  10px 10px 0px">ดู</td>
                  </tr>
			      </table>

<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 >
      <TBODY>
        <TR>
          <TD width="100%" vAlign=top><TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0  >
 
 
<?
 
 /*
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
	
 $res[sub] = $db->select_query("SELECT  id FROM shopping_product_sub where main='".$arr[project][id]."'  ORDER BY  id  ASC");
 
while($arr[sub] = $db->fetch($res[sub])){
	
 
 $place = $db->num_rows('shopping_product',"id","sub=".$arr[sub][id]."  and status=1");	
 
        $db->update_db('shopping_product_sub', array(
 
			  "num_place" =>$place
 
		)," id='".$arr[sub][id]."' ");
	
 
 

}
		*/
 
 
//$res[news] = $db->select_query("SELECT t1.id, t1.topic_th, t1.num_place  FROM shopping_product_sub as t1 where t1.main='".$arr[project][id]."' ORDER BY  t1.num_place  DESC");
$res[row] = $db->select_query("SELECT *  FROM shopping_place_num  where main='".$arr[project][id]."' and province = '".$_GET[province]."' ORDER BY  num_place  DESC");


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
			        <td height="30" align="center"    valign="top" style="<?=$display;?>" > 
                    
         
                                       
             <? if($shop>0){ ?>
                    
             <a id="list_menu_add_new_booking_<? echo $arr[news][id];?>" style="text-decoration:none" >          
             
                          <? } ?>
                    
                    
                                  <? if($shop==0){ ?>
               
            <a id="list_menu_no_new_booking_<? echo $arr[news][id];?>" style="text-decoration:none"> 
                 <? } ?>
                    
			    <table width="100%" border="0" cellspacing="2" cellpadding="2"  style="border-bottom : 2px dotted   #DADADA; padding-bottom:5px;">
			      <tr >
			        <td valign="top" class="font-22" style="padding:3px" > 
                    
               
 <script> 
      
  
  
$('#list_menu_add_new_booking_<? echo $arr[news][id];?>').click(function(){  

 $( "#load_mod_popup_2" ).toggle();
  
 var url_load = "load_page_mod_2.php?name=shop&file=shop&driver=<?=$user_id?>&type=<? echo $arr[news][id];?>&province=<?=$_GET[province];?>";
 
 $('#load_mod_popup_2').html(load_main_mod);
 
 $('#load_mod_popup_2').load(url_load); 
  
  
  
 
 
  });
  
      </script>     
      
      
      
<script> 
      
 $('#list_menu_no_new_booking_<? echo $arr[news][id];?>').click(function(){  
  
alert("ยังไม่มีสินค้า");
 
  });
      </script>    
      
      
      
      
                    
               
                    
                    
                   
    <? if($shop>0){ ?> 
                   
 <font color="<?=$main_color_dark?>" class="font-26"> 
                    
         	 <?= $arr[news][topic_th]; ?> 

      <? } ?>       
             
             
             
            
          <?  if($shop==0){  
		   $linkcolor='#666666'; 
		  } else {
			  
			  $linkcolor=' #16B3B1'; 
		  }
 
		  ?>
 
                  <? if($shop==0){ 
				  
				 
				  
				  
				  
				  ?>  
               <font color="#666666"  class="font-26"> 
               
           
         	 <?= $arr[news][topic_th]; ?> </font>
        
              <? } ?>       
		 
                	  
			         </td>
			        <td width="60" align="center" class="font-26" style="padding-top:0px; padding-right:10px; color:<?=$linkcolor?>">
                    (<?= $arr[row][num_place]; ?>)
                    </td>
			        <td width="40" align="center" class="font-26" style="padding-top:0px; padding-right:5px;">
                    <i class="fa fa-search" style=" color:<?=$linkcolor?>">
                    </i></td>
                  </tr>
			      </table>
                  
                  
                  </a>
                  
                  
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr >
                     
    </tr>
  </table>
  
          </TD ><?
$count++;
if (($count%1) == 0) { echo ""; $count=0; }
}
 
//������ʴ��������
?>
			</TABLE>
			<!-- End News -->          </TD>
        </TR>
      </TBODY>
    </TABLE></td>
      </tr>
    </table>
 