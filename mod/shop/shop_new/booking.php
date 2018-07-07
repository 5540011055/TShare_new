<div style="padding-bottom:30px;" >
   <form method="post"  id="form_booking" name="form_booking">
      <?
         $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
          $all_car = $db->num_rows('web_carall',"id","drivername=".$user_id." and status=1");
         $res[driver] = $db->select_query("SELECT * FROM  web_driver where id = '".$user_id."' ");
                          
         $arr[driver] = $db->fetch($res[driver]);
         $res[shop] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$_GET[place]."' ");
         $arr[shop] = $db->fetch($res[shop]);
         $res[shopmain] = $db->select_query("SELECT * FROM shopping_product_main  WHERE id='".$arr[shop][main]."' ");
         $arr[shopmain] = $db->fetch($res[shopmain]);
         $res[shopsub] = $db->select_query("SELECT * FROM shopping_product_main  WHERE id='".$arr[shop][main]."' ");
         $arr[shopsub] = $db->fetch($res[shopsub]);
         $arr[project][program] = $_GET[place];
         $res[car] = $db->select_query("SELECT * FROM  web_carall  where drivername ='".$user_id."' and status=1 order by status_usecar desc");
         $arr[car] = $db->fetch($res[car]);
         $res[car_type] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[car][car_type]."' ");
         $arr[car_type] = $db->fetch($res[car_type]);
         $res[cartype] = $db->select_query("SELECT * FROM ".TB_carall_type."");
               // $arr[cartype] = $db->fetch($res[cartype]);
         $res[projectcarall] = $db->select_query("SELECT * FROM   web_carall  where drivername = '".$user_id."' and status=1 order by status_usecar desc  ")
         ?>
      <input name="program" type="hidden"  required="true" class="form-control" id="program" value="<?=$arr[shop][id]?>" >
      <div style="border-radius: 10px;
         border: 1px solid rgb(221, 221, 221);
         background-color: rgb(255, 255, 255);
         margin-bottom: 0px;
         box-shadow: rgb(218, 218, 218) 0px 0px 5px;
         padding: 15px;
         margin-top: 8px;" id="selected_taxi">
         <div class="form-group">
            <label class="font-24">ประเภทรถ</label>
            <?
               if (!$arr[car_type]) {
                  ?>
            <select class="form-control"  name="car_type" id="car_type"  style="border-radius: 25px " >
               <option value="0"> กรุณาเลือกประเภทรถ</option>
               <?
                  while($arr[cartype] = $db->fetch($res[cartype])) {
                  echo "<option value=\"".$arr[cartype][topic_th]."\"";
                  echo ">".$arr[cartype][topic_th]." </option>";
                  }
                  $db->closedb ();
                  ?>
            </select>
            <?  
               }
               else{
               ?>
            <select class="form-control"  name="car_type" id="car_type" onchange="selectdriss()" style="display:noneg;border-radius: 25px " >
               <option value="0"> กรุณาเลือกประเภทรถ</option>
               <?
                  while($arr[cartype] = $db->fetch($res[cartype])) {
                  echo "<option value=\"".$arr[cartype][topic_th]."\"";
                  if($arr[car_type][topic_th] == $arr[cartype][topic_th]) {
                    echo " Selected";
                  }
                  echo ">".$arr[cartype][topic_th]." </option>";
                  }
                  $db->closedb ();
                  ?>
            </select>
            <?  
               }
               ?>
            <!-- <input type="hidden" class="form_input" required="true" id="car_type" name="car_type" value=""> -->
         </div>
         <div class="form-group">
            <label class="font-24">ป้ายทะเบียนรถ</label>
             <input name="car_plate" type="text"   required="true" class="form_input" id="car_plate"  value="<?=$arr[car][plate_num] ?>"    >

            <input name="car_color" type="hidden"   class="form-control" id="car_color" style="padding:4px 2px;width:100%;"   value="<?=$arr[car][car_color]?>"   >
         </div>
         <div class="form-group">
            <div style="margin-top: 15px; padding: 5px; border-radius: 15px;">

<table width="100%" border="0" cellspacing="2" cellpadding="2">
           <tr>
            <td >
                  <div    style="    margin-bottom: 25px;" onclick="selectnation(1);">
                     <table width="100%" border="0" cellspacing="2" cellpadding="2" >
                              
                               <tr>
                                <td width="50" align="center">
                                     <label class="container">
                           <input type="checkbox" name="persion_china" id="persion_china" value="">
                           <span class="checkmark" style="pointer-events: none"></span>
                         </label>
                                    </td>
                                    <td>
                                       <table width="100%" cellpadding="1" cellspacing="2">
                                        
                                       
                                             <tr>
                                             <td width="10"> <img src="images/flag/China.png" width="25" height="25" alt=""></td>
                                          <td width="100" align="left" style="color: #DADADA;
                   padding: 5px; border-radius: 10px;"><font color="#333" class="font-20">แขกจีน<br>
                                                </font>
                                             </td>
                                          </tr>
                                       
                                      </table>
                                       
                                    </td>
                                   
                                 </tr>
                                 
                             
                         </table>
                   </div>
            </td>
            <td >
               <div  style="    margin-bottom: 25px;" onclick="selectnation2(0);">
      <table width="100%" border="0" cellspacing="2" cellpadding="2" >
               
                  <tr>
                   <td width="50" align="center">
                      <label class="container">
            <input type="checkbox" name="persion_other" id="persion_other" value="">
            <span class="checkmark" style="pointer-events: none"></span>
          </label>
                     </td>
                     <td>
                        <table width="100%" cellpadding="1" cellspacing="2">
                         
                           <tr>
                              <td width="10"><img src="images/flag/Other.png" width="25" height="25" alt="" >
                              </td>
                           <td width="100" align="left" style="color: #DADADA;
    padding: 5px; border-radius: 10px;">
    <font color="#333" class="font-20">ต่างชาติ
                                 </font>
                              </td>
                           </tr>
                        
                        </table>
                        
                     </td>
                    
                  </tr>
              
           </table>
    </div>
            </td>
         </tr>
         <!-- <tr style="margin-top: 10px;">
                                    <td colspan="2">
                                       <div class="col-md-4 col-sm-6 col-xs-6"  >
                                          <div id="box_china" style="display: none;">
                                          <select name="num_china" id="num_china" class="form-control" style="border-radius: 25px;">

                                          <?php 

                                          for($i=0; $i<=30; $i++)
                                          {

                                              echo "<option value=".$i.">".$i."</option>";
                                          }
                                          ?> 
                                          </select>
                                          </div> 
                                       </div>
                                       <div class="col-md-4 col-sm-6 col-xs-6">
                                          <div id="box_other" style="display: none;">
                                          <select name="num_other" id="num_other" class="form-control" style="border-radius: 25px;">

                                          <?php 

                                          for($i=0; $i<=30; $i++)
                                          {

                                              echo "<option value=".$i.">".$i."</option>";
                                          }
                                          ?> 
                                          </select>
                                       </div>
                                       </div>

                                          
                                    </td>
                                    
                                 </tr> -->
         
           
         </table>
     
   </div>
   
            
         </div>
         <div class="form-group">
            <label class="font-24">จำนวนคน</label>
            <table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-5px;"  >
               <tr>
                  <td>
                     <input  name="adult" required="true"  type="number" class="form_input" placeholder="ผู้ใหญ่" id="adult" >
                  </td>
                  <td width="5"></td>
                  <td>
                     <input  name="child" required="true" type="number" class="form_input" placeholder="เด็ก" id="child" >
                  </td>
               </tr>
            </table>
         </div>
         <div class="form-group">
            <label class="font-24">เวลาถึงโดยประมาณ(นาที)</label>
            <!--<input type="number" class="form_input" required="true" id="time_num" name="time_num">-->
            <select id="time_select" name="time_select"  required="true" style="border-radius: 25px;">
            	<option value="0">- เลือกนาที -</option>
            	<?php 
            		$mm = 5;
            		for($i=5;$i<=60;$i+=5){
						?>
						<option value="<?=$i;?>"><?=$i." นาที";?></option>
						<?
//						$mm+=5;
					}
            	?>
            	<option value="over">มากกว่า 60 นาที</option>
            </select>
            <div id="box_over_mm" style="display: none;"><span style="font-size: 13px;padding: 7px;">กรุณากรอก</span>
            <input type="number" class="form_input" id="orver_mm">
            </div>
            <script>
            	$('#time_select').change(function(){
            		if($(this).val()=="over"){
						$('#box_over_mm').show();
						$( "#orver_mm" ).focus();
						
					}else{
						$('#box_over_mm').hide();
						$('#time_num').val($(this).val());
					}
					
            	});
            	
            	$('#orver_mm').keyup(function(){
            		if($('#time_select').val()=="over"){
						$('#time_num').val($(this).val());
					}
            	});
            </script>
            <input type="hidden" class="form_input" id="time_num" name="time_num" value="0">
         </div>
         <div class="form-group">
            <label class="font-24">เบอร์โทรศัพท์</label>
            <i class="material-icons res-input" onclick="$('#dri_phone').val('');$('#dri_phone_x').hide();" id="dri_phone_x" style="display: block;">close</i>
            <input type="number" class="form_input"  id="dri_phone" name="dri_phone" value="<?=$arr[web_user][phone];?>" onkeyup="hideRes('dri_phone');">
         </div>
      </div>
      <!-- DIV CAR -->  
      <!-- <div class="<?= $coldata?>" id="show_transfer_detail" style="margin-top:10px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ;  ">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
               <tr>
                  <td>
                     <div class="font-28" style="color:<?=$main_color?>"><b><?=t_your_car_infor;?> </b></div>
                  </td>
                  <td width="50" style="display: none;" id="row_accept_car">
                     <img src="images/checked.png" width="35px"/>
                  </td>
               </tr>
            </tbody>
         </table> -->
      <!-- <div> -->
      <!-- +"&car_color="+document.getElementById('car_color').value
         +"car_plate="+document.getElementById('car_plate').value
         +"&plan="+document.getElementById('plan_setting').value -->
      <!-- <input type="" name="car_plate" required="true" value="<?=$arr[car][plate_num];?>" type="text" class="form_input" placeholder="ป้ายทะเบียน"> -->
      <!-- </div> -->
      <!-- <div style="margin-top:-50px;" id="show_car_detail">
         <?   //include ("mod/booking/load/booking/car.php");   ?>
         </div> -->
      <!-- </div> -->
      <!-- BTN  -->  
      <div id="testScroll">
         <!-- Agent Issu -->  
         <div class="<?= $coldata?>" id="show_payment_detail" style="margin-top:10px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
               <tbody>
                  <tr>
                     <td>
                        <div class="font-28" style="color:<?=$main_color?>"><b><?=t_work_remuneration;?></b></div>
                     </td>
                     <td width="50" style="display: none;" id="row_accept_payment">
                        <img src="images/checked.png" width="35px"/>
                     </td>
                  </tr>
               </tbody>
            </table>
            <div >
               <table width="100%" border="0" cellspacing="1" cellpadding="5" style="">
                  <tbody>
                     <tr>
                        <?php 
                           /*    
                           1 : ค่าจอด + ค่าหัว
                           2 : ค่าจอด + ค่าคอมมิชชั่น
                           3 : ค่าหัว + ค่าคอมมิชชั่น
                           4 : ค่าจอด + ค่าหัว + ค่าคอมมิชชั่น
                           5 : ค่าจอด
                           6 : ค่าหัว
                           7 : ค่าคอมมิชชั่น*/
                              $type_name_qr = "topic_cn";
                           if($_COOKIE['lng']=="th"){
                           $type_name_qr = "topic_th";
                           $query_topic = "topic_th"; 
                           }else if($_COOKIE['lng']=="en"){
                           $type_name_qr = "topic_en";
                           }else if($_COOKIE['lng']=="cn"){
                           $type_name_qr = "topic_cn";
                           }
                           $type_name_qr = "topic_th";
                           
                           function checkTypePay($id){
                           if($id==1){
                           $name_type = t_parking_fee." + ".t_person_fee;
                           }
                           else if($id==2){
                           $name_type = t_parking_fee." + ".t_com_fee;
                           }
                           else if($id==3){
                           $name_type = t_person_fee." + ".t_com_fee;
                           } 
                           else if($id==4){
                           $name_type = t_parking_fee." + ".t_person_fee."+".t_com_fee;
                           }
                           else if($id==5){
                           $name_type = t_parking_fee;
                           }
                           else if($id==6){
                           $name_type = t_person_fee;
                           }
                           else if($id==7){
                           $name_type = t_com_fee;
                           }
                           return $name_type;
                           }
                           ?>
                        <td width="100%">
                           <input  name="plan_setting"  type="hidden" class="form-control"  id="plan_setting" value="0"   />
                           <?
                              if($arr[shop][price_plan]>0){
                                                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                                      $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan]."");
                                                      while($arr[category] = $db->fetch($res[category])){
                              $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=1 ");
                              $arr[open] = $db->fetch($res[open]);        
                                                         ?>
                           <script>
                              ///
                              $('#show_price_plan_1').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                           <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;padding: 10px 0px;" onclick="ClickPay(1)">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3" >
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2" align="center">
                                          <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="<?=$arr[open][plan_id];?>" id="price_plan_1" /> -->
                                       </td>
                                       <td class="font-22"><b> <?=checkTypePay($arr[category][id]);?></b> </td>
                                       <td width="35" rowspan="2" valign="middle"><a id="show_price_plan_1"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <?
                                             $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                             $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan]."   ");
                                              $arr[price] = $db->fetch($res[price]);
                                             $show_park=$arr[price][price_park];
                                             $show_person=$arr[price][price_person];
                                             $show_commision=$arr[price][price_commision];
                                              if($show_park==1){    
                                             $status_show_park='show';          
                                              }
                                              if($show_park==0){    
                                             $status_show_park='';        
                                              }
                                              if($show_person==1){     
                                             $status_show_person='show';           
                                              }
                                             if($show_person==0){   
                                             $status_show_person='';         
                                              }
                                               if($show_commision==1){    
                                             $status_show_commision='show';           
                                              }
                                                if($show_commision==0){   
                                               $status_show_commision='';    
                                              }
                                               ?>
                                          <? if($arr[open][price_extra]==1){ 
                                             $res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                  ?>
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1" >
                                             <tbody>
                                                <tr>
                                                   <td width="75"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;<?=t_china;?>  </td>
                                                   <td>
                                                      <span style="display:<?=$status_show_park?>"><?=t_parking_fee;?>  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span>
                                                      <span style="display:<?=$status_show_person?>"><?=t_person_fee;?>  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_commision;?>"><?=t_com_fee;?>  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 
                                          <? if($arr[open][price_all]==1){ 
                                             $res[cost] = $db->select_query("SELECT price_park_driver,price_commision_driver, price_person_driver FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                   ?>
                                          <!-- <table width="100%" border="0" cellspacing="1" cellpadding="1" >
                                             <tbody>
                                                <tr>
                                                   <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;ต่างชาติ</td>
                                                   <td>
                                                      <span style="display:none<?=$status_show_park?>"><?=t_parking_fee;?>  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_person?>"><?=t_person_fee;?>  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_commision;?>"><?=t_com_fee;?>  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table> -->
                                          <? } ?> 
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <?php
                              }
                              $db->closedb ();
                              }
                              
                              if($arr[shop][price_plan_2]>0){
                                                         $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                                         $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_2]."");
                                                         while($arr[category] = $db->fetch($res[category])){
                                                             $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=2 ");
                                                               $arr[open] = $db->fetch($res[open]);        
                                                            //echo "<option value=\"".$arr[category][id]."\"";
                                                            if($arr[category][id] ==$arr[project][price_plan]){
                                                               //echo " Selected";
                                                            }
                                                            //echo ">".$arr[category][topic_th]." </option>";
                                                            ?>
                           <script>
                              ///
                              $('#show_price_plan_2').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                          <!--  <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;padding: 10px 0px;" onclick="ClickPay(2);">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3" >
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2" align="center">
                                         
                                       <td class="font-22"><b> <?=checkTypePay($arr[category][id]);?></b> </td>
                                       <td width="35" rowspan="2"><a id="show_price_plan_2"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <?
                                             $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                             $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan_2]."   ");
                                              $arr[price] = $db->fetch($res[price]);
                                             $show_park=$arr[price][price_park];
                                             $show_person=$arr[price][price_person];
                                             $show_commision=$arr[price][price_commision];
                                              if($show_park==1){    
                                             $status_show_park='show';          
                                              }
                                              if($show_park==0){    
                                             $status_show_park='';        
                                              }
                                              if($show_person==1){     
                                             $status_show_person='show';           
                                              }
                                             if($show_person==0){   
                                             $status_show_person='';         
                                              }
                                               if($show_commision==1){    
                                             $status_show_commision='show';           
                                              }
                                                if($show_commision==0){   
                                             echo  $status_show_commision='';   
                                              }
                                               ?>
                                          <? if($arr[open][price_extra]==1){ 
                                             $res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                  ?>
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="75"> 
                                                      <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;<?=t_china;?>  
                                                   </td>
                                                   <td>
                                                      <span style="display:none<?=$status_show_park?>"><?=t_parking_fee;?>  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>"><?=t_person_fee;?>  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 
                                          <? if($arr[open][price_all]==1){ 
                                             $res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                   ?>
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/>
                                                      <span class="font-20">ต่างชาติ</span>
                                                   </td>
                                                   <td>
                                                      <span style="display:none<?=$status_show_park?>"><?=t_parking_fee;?>  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_person?>"><?=t_person_fee;?>   <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_commision;?>"><?=t_com_fee;?>   <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div> -->
                           <?php
                              }
                              $db->closedb ();
                              }
                              
                              if($arr[shop][price_plan_3]>0){
                                                         $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                                         $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_3]."");
                                                         while($arr[category] = $db->fetch($res[category])){
                                                          $res[open] = $db->select_query("SELECT  * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=3 ");
                                                          $arr[open] = $db->fetch($res[open]);     
                                                            //echo "<option value=\"".$arr[category][id]."\"";
                                                            if($arr[category][id] ==$arr[project][price_plan]){
                                                               //echo " Selected";
                                                            }
                                                            //echo ">".$arr[category][topic_th]." </option>";
                                                            ?>
                           <script>
                              ///
                              $('#show_price_plan_3').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                           <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 0px;padding: 10px 0px;" onclick="ClickPay(3);">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3"  >
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2"  align="center" >
                                          <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="<?=$arr[open][plan_id];?>" id="price_plan_3" /></td> -->
                                       <td class="font-22"><b> <?=checkTypePay($arr[category][id]);?> </b></td>
                                       <td width="35" rowspan="2"><a id="show_price_plan_3"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <?
                                             $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                             $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan_3]."   ");
                                              $arr[price] = $db->fetch($res[price]);
                                             $show_park=$arr[price][price_park];
                                             $show_person=$arr[price][price_person];
                                             $show_commision=$arr[price][price_commision];
                                              if($show_park==1){    
                                             $status_show_park='show';          
                                              }
                                              if($show_park==0){    
                                             $status_show_park='';        
                                              }
                                              if($show_person==1){     
                                             $status_show_person='show';           
                                              }
                                             if($show_person==0){   
                                             $status_show_person='';         
                                              }
                                               if($show_commision==1){    
                                             $status_show_commision='show';           
                                              }
                                                if($show_commision==0){   
                                             echo  $status_show_commision='';   
                                              }
                                               ?>
                                          <? if($arr[open][price_extra]==1){
                                          //echo $arr[open][id]; 
                                             $res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                  ?>
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="75"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/>
                                                      <span class="font-20">&nbsp;<?=t_china;?> </span>
                                                   </td>
                                                   <td>
                                                      <span style="display:none<?=$status_show_park?>"><?=t_parking_fee;?>  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_person?>"><?=t_person_fee;?>  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_commision;?>"><?=t_com_fee;?>  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 

                                          <? if($arr[open][price_all]==0) { 

                                             $res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting =".$arr[open][id]." and country = 240 and status=1    ORDER BY  sort_country desc limit 1  ");

                                              $arr[cost] = $db->fetch($res[cost]);     
                                                   ?>
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="80">
                                                      <img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;ต่างชาติ</span>
                                                   </td>
                                                   <td>
                                                      <span style="display:none<?=$status_show_park?>"><?=t_parking_fee;?><b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_person?>"><?=t_person_fee;?><b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_commision;?>"><?=t_com_fee;?><b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <?php
                              }
                              $db->closedb ();
                              }
                              ?>
                           <!--</select>-->
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <table width="100%" border="0" cellspacing="2" cellpadding="2" id="show_submit" style="margin-top: 15px;">
         
         <tbody>
            <tr>
               <td><button onclick="save_bookin_shop();" type="button" class="btn-repair waves-effect btn-other" style="background-color: #3b5998; border-radius: 25px; color:#fff;text-transform: capitalize;width: 100%;"  id="" > <span id="txt_btn_save" class="font-28"><?=t_save_data;?></span> </button></td>
            </tr>
         </tbody>
      </table>
</div>
</form>
<input type="hidden" value="<?=$_GET[place];?>" id="product_id" />   

<div  id="send_booking_data"></div>
<script>
function hideRes(id){
	var txt = $('#'+id).val();
	if(txt.length<1){
		$('#'+id+'_x').hide();
	}else{
		$('#'+id+'_x').show();
	}
}
  $(".text-topic-action-mod-3" ).html("<?=$arr[shop][$place_shopping]?>");
   var product_id = $('#product_id').val();
   $('#submit_data_set').click(function(){      
      var url_load = "load_page_mod_3.php?name=booking/step&file=booking&driver=<?=$_GET[driver]?>&place=<?=$_GET[place];?>";
       $.post( url_load, function( data ) {
               $('#load_mod_popup_3').html(data);
                  // console.log(data);
               });
     // $('#load_mod_popup_3').html(load_main_mod);
     // $('#load_mod_popup_3').load(url_load); 
   });
   var ch_china = false;
   var ch_other = false;
      function selectnation(x){
         if (x == 1 && ch_china == false) {
            $('#persion_china').prop('checked', true); // Checks it
            ch_china = true;
            $('#persion_china').val(x)
            $('#box_china').show(500)
         }
         else {
            $('#persion_china').prop('checked', false);
            ch_china = false;
            $('#persion_china').val('')

             $('#box_china').hide(500)
         }
         
      }
      function selectnation2(x){
        
         if (x == 0 && ch_other == false) {
            $('#persion_other').prop('checked', true); // Checks it
            ch_other = true;
            $('#persion_other').val(x)
            $('#box_other').show(500)
         }
         else {
            $('#persion_other').prop('checked', false);
            ch_other = false;
            $('#persion_other').val('')
             $('#box_other').hide(500)
         }
         
         
      }
   function save_bookin_shop(){

   	var place_num = document.getElementById('car_plate').value;
    console.log($('#time_num').val());
	
/*	 var url_mail = "mail.php?key=new_shop";
             $.post(url_mail,$('#form_booking').serialize(),function(data){
                  console.log(data);
               });
      return;         */
	
     console.log($('#car_type').val())
      if ($('#car_type').val() == 0) {
         swal("กรุณาเลือก !", "ประเภทรถ", "warning");
         return false;
      }
      if ($('#car_plate').val() == "") {
         swal("กรุณาป้อน !", "ป้ายทะเบียนรถ", "warning");
         $('#car_plate').focus();
         return false;
      }
      if ($('#adult').val() == "") {
         swal("กรุณาป้อน !", "จำนวนผู้ใหญ่", "warning");
         $('#adult').focus();
         return false;
      }
      if ($('#child').val() == "") {
         $('#child').val(0)
         // swal("กรุณาป้อน !", "จำนวนเด็ก", "warning");
         // $('#child').focus();
         // return false;
      }
      if ($('#time_num').val() == '') {
         swal("กรุณาป้อน !", "เวลาถึงโดยประมาณ", "warning");
         return false;
      }
      
      console.log(place_num)
      swal({
         title: "ยืนยันข้อมูลส่งแขก ?",
         text: "เวลาถึงประมาณ : " + $('#time_num').val() + " น.",
         html: false,
         type: "warning",
         showCancelButton: true,
         confirmButtonClass: "btn-danger waves-effect waves-light",
		  cancelButtonClass: "btn-cus waves-effect waves-light",
         confirmButtonText: "ยืนยัน",
         cancelButtonText: 'ยกเลิก',
         closeOnConfirm: false
      },
      function () {
         $.post('go.php?name=shop/shop_new&file=save_data&action=add&type=driver&driver=<?=$user_id?>', $('#form_booking').serialize(), function (response) {
            console.log(response)
            	$.post('send_messages/send_onesignal.php?key=new_shop&order_id='+response.last_id+'&vc='+response.invoice+'&m='+response.airout_m, {
	               driver: "<?=$user_id?>",
	               nickname: "<?=$arr[driver][nickname]?>",
	               car_plate: place_num
	            }, function (data) {
	               console.log(data);
	            });
            var url_mail = "mail.php?key=new_shop";
             $.post(url_mail,$('#form_booking').serialize(),function(data){
                  console.log(data);
               });
               
               setTimeout(function(){  openOrderFromAndroid(response.last_id);}, 1500);
              
               
               
         });
         swal({
               title: "ส่งข้อมูลสำเร็จ!",
               text: "",
               html: false,
               type: "success"
            },
            function () {
               $('.close-small-popup').click();
               $('#index_menu_shopping_history').click();
            });
      });
}
</script> 

</div>
<style>
   .btn-repair {
   /* padding: .84rem 2.14rem;*/
   font-size: .81rem;
   -webkit-transition: all .2s ease-in-out;
   transition: all .2s ease-in-out;
   /*         margin: .375rem;*/
   border: 0;
   border-radius: .125rem;
   cursor: pointer;
   text-transform: uppercase;
   white-space: normal;
   word-wrap: break-word;
   color: #fff !important;
   box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
   padding: 7px;
}

.waves-effect {
   position: relative;
   cursor: pointer;
   overflow: hidden;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   -webkit-tap-highlight-color: transparent;
   z-index: 1;
}

.btn-other {
   /*width: 280px;*/
   border-radius: 25px;
   font-size: 24px;
   /*padding-left: 35px;*/
   text-align: center;
}

.step-booking {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 10px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color: #FFFFFF;
   font-size: 30px;
   font-weight: bold;
   margin-top: -10px;
   text-align: center;
   border: solid 4px #FFFFFF;
   box-shadow: 0 0 0px 0px #E8E6E6;
   position: absolute;
   background: #f39c12 !important;
   color: #fff;
}

.step-booking-small {
   border-radius: 50%;
   background-color: <?=$main_color?>;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color: #FFFFFF;
   font-size: 20px;
   font-weight: bold;
   text-align: center;
   vertical-align: middle;
   border: solid 4px #FFFFFF;
   background: <?=$main_color?> !important;
   color: #fff;
}

.step-booking-small-no {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color: #FFFFFF;
   font-size: 20px;
   font-weight: bold;
   text-align: center;
   border: solid 4px #FFFFFF;
   background: #999999 !important;
   color: #fff;
}

.step-booking-active {
   text-align: justify;
   color: #FFFFFF;
   border: solid 1px <?=$main_color?>;
   background-color: #F6F6F6;
   color: #fff;
   border-radius: 10px;
   margin-bottom: 10xp;
}

.step-booking-active-no {
   text-align: justify;
   color: #FFFFFF;
   border: solid 1px #dadada;
   color: #fff;
   border-radius: 10px;
}

.label_price_plan {
   vertical-align: top;
   padding: 5px;
   margin: 4px;
}

.stepbar {
   position: fixed;
   width: 100%;
   z-index: 99990;
   /*    margin-top: 0px;*/
   margin-top: 48px;
   /*    top: 55px;*/
   top: 0px;
   left: 0px;
   background-color: #f6f6f6;
   /* border: 1px solid #ddd;*/
   height: 8px;
}

.stepbox {
   background-color: #4267b2;
   border: 1px solid #ddd;
   height: 100%;
}

.progress-bar {
   /*margin : 1px;*/
   margin-right: 1px;
   /* background-color: rgb(25, 202, 153);*/
}

.container {
   display: block;
   position: relative;
   padding-left: 35px;
   margin-bottom: 12px;
   cursor: pointer;
   font-size: 22px;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
}
.container input {
   position: absolute;
   opacity: 0;
   cursor: pointer;
}
.checkmark {
   border-radius: 50%;
    border: 1px solid #5d75a9;
    position: absolute;
    top: -4px;
    left: 0;
    height: 30px;
    width: 30px;
    background-color: #e4e4e4;
}
.container:hover input~.checkmark {
   background-color: #ccc;
}
.container input:checked~.checkmark {
   background-color: #2196F3;
}
.checkmark:after {
   content: "";
   position: absolute;
   display: none;
}
.container input:checked~.checkmark:after {
   display: block;
}
.container .checkmark:after {
   left: 11px;
   top: 6px;
   width: 9px;
   height: 15px;
   border: solid white;
   border-width: 0 3px 3px 0;
   -webkit-transform: rotate(45deg);
   -ms-transform: rotate(45deg);
   transform: rotate(45deg);
}

.form_input {
   padding: 5px 22px;
   height: 34px;
   border: solid #3b5998 1px;
   border-radius: 25px;
   width: 100%;
   font-size: 18px;
   display: block;
   line-height: 1.42857143;
   color: #333333;
   background-color: #fff;
   background-image: none;
}
.col-xs-6 {
    width: 50%;
}
.col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    float: left;
}
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
</style>
<script>
   
   </script>