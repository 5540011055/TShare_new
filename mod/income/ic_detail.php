<div style="padding: 5px;margin-top: 40px;">
   <?php 
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
            		$name_type = t_parking_fee." + ".t_person_fee." + ".t_com_fee;
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
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[order_book_detail] = $db->select_query("SELECT * FROM order_booking where transfer_date = '".$_POST[date]."' and drivername = '".$_POST[driver_id]."' ");
      while($arr[order_book_detail] = $db->fetch($res[order_book_detail])){ 
      $check_edit_book = $db->num_rows('pay_history_driver_shopping','id',"order_id = '".$arr[order_book_detail][id]."' and driver_approve = 1 ");
      if($check_edit_book>0){
      	$status_pay =  '<span style="color:#8BC34A;">'."รับเงินแล้ว".'</span>';
      	$res[pay_his] = $db->select_query("SELECT id,income_driver FROM pay_history_driver_shopping where order_id = '".$arr[order_book_detail][id]."' ");
      	$arr[pay_his] = $db->fetch($res[pay_his]);
      	$decode = json_decode($arr[pay_his][income_driver]);
      	$txt_type = "";
      	foreach ($decode as $key=>$val){
			if($key=="check_park" && $val==1){
				$txt_type .= " ค่าจอด";
				
			}else if($key=="check_person" && $val==1){
				$txt_type .= " ค่าหัว";
			}else if($key=="check_com" && $val==1){
				$txt_type .= " ค่าคอม";
			}
		}
		$status_icon_pay = $txt_type;
      }else{
      	
      	$status_icon_pay = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">'.t_pending.'</font></strong></div>';
      	$status_pay = '<span style="color:#F44336;">'."ยังไม่รับเงิน".'</span>';;
      }
      ?>
   <div style="padding: 10px 0px;">
      <div style="box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);padding: 5px;">
         <table class="onlyThisTable" width="100%">
            <tr>
               <td width="100" style="padding: 5px;">เลขการจอง</td>
               <td style="padding: 5px;"><?=$arr[order_book_detail][invoice];?></td>
            </tr>
            <tr>
               <td style="padding: 5px;">วันที่</td>
               <td style="padding: 5px;"><?=$arr[order_book_detail][transfer_date];?></td>
            </tr>
            <tr>
               <td style="padding: 5px;">จำนวน</td>
               <td style="padding: 5px;">
                  <? if($arr[order_book_detail][adult]>0){ ?>
                  <?=t_adult;?> :
                  <?=$arr[order_book_detail][adult];?>
                  &nbsp;
                  <? } ?>
                  <? if($arr[order_book_detail][child]>0){ ?>
                  <?=t_child;?> :
                  <?=$arr[order_book_detail][child];?>
                  <? } ?>
               </td>
            </tr>
            <tr>
               <td style="padding: 5px;">ประเภท</td>
               <td style="padding: 5px;"><?=$status_icon_pay;?></td>
            </tr>
          
           <tr>
               <td style="padding: 5px;">รายได้</td>
               <td style="padding: 5px;">
                <? if($decode!=""){ ?>
               		<table width="100%">
               			<?php 
               			if($decode->check_park>=1){ ?>
               			<tr>
               				<td>ค่าจอด</td>
               				<td align="right"><?=$arr[order_book_detail][price_park_total];?></td>
               				<td align="center">บาท</td>
               			</tr>
               			<?}
               			
               			if($decode->check_person>=1){ ?>
               			<tr>
               				<td>ค่าหัว</td>
               				<td align="right"><?=$arr[order_book_detail][price_person_total];?></td>
               				<td align="center">บาท</td>
               			</tr>
               			<? } 
               			if($decode->check_com>=1){ ?>
               			<tr>
               				<td>ค่าคอม</td>
               				<td align="right">6</td>
               				<td align="center">%</td>
               			</tr>
               			<? } ?>
               		</table>
				<?  }else{ ?>
				<span style="color:#F44336;">ยังไม่แจ้ง</span>
				<? } ?>
               </td>
            </tr>
			
            <tr>
            	<td style="padding: 5px;">สถานะ</td>
            	<td style="padding: 5px;"><?=$status_pay;?></td>
            </tr>
         </table>
      </div>
   </div>
   <? }
      ?>
</div>