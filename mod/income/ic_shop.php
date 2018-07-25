<?php 
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[web_user] = $db->select_query("SELECT id FROM web_driver WHERE username='" . $_SESSION['data_user_name'] . "'    ");
   $arr[web_user] = $db->fetch($res[web_user]);
   $date = "2018-05-11";
   $month = str_pad($_GET[month], 2, '0', STR_PAD_LEFT);
   $year = (int)substr($date, 0, 4);
   $no    = "$year-$month";
   $date_finish_plus = date('Y-m-d',strtotime("+1 day")); 
   $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
   $res[timeline] = $db->select_query("SELECT * FROM date_loop  where dayall like '%" . $no . "%'   and  dayall   < '".$date_finish_plus."' order by  id  asc  limit 31");
   //echo $no;
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[sum_all] = $db->select_query("SELECT sum(price_all_total) as total FROM order_booking where transfer_date like '%".$no."%' and drivername = '".$arr[web_user][id]."' and check_driver_pay = 1 ");
   $arr[sum_all] = $db->fetch($res[sum_all]);
   ?>

<style>
   .mdl-data-table th {
   padding: 0 11px 12px 18px;
   text-align: center;
   }
</style>

<div style="display: none;"><?="SELECT sum(price_all_total) as total FROM order_booking where transfer_date like '%".$no."%' and drivername = '".$arr[web_user][id]."' ";?></div>
<h3>ยอดรวม <?=number_format($arr[sum_all][total]);?></h3>
<div style="padding: 0px;">
   <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" width="100%">
      <thead>
         <tr>
            <th class="mdl-data-table__cell--non-numeric" width="30">วันที่</th>
            <!--<th>-</th>-->
            <th>รอบ</th>
            <th>รายได้</th>
            <th>รับแล้ว</th>
         </tr>
      </thead>
      <tbody>
         <?php 
            $i=1;
            while($arr[timeline] = $db->fetch($res[timeline])){
            	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
            	$res[sum_each_day] = $db->select_query("SELECT sum(price_all_total) as each_day FROM order_booking where transfer_date = '".$arr[timeline][dayall]."' and drivername = '".$arr[web_user][id]."' ");
            	$arr[sum_each_day] = $db->fetch($res[sum_each_day]);
            	$num_work = $db->num_rows('order_booking','id','transfer_date = "'.$arr[timeline][dayall].'" and drivername = "'.$arr[web_user][id].'"  ');
            	if($arr[sum_each_day][each_day]!=""){
            		$data_param = $arr[timeline][dayall];
            	}else{
            		$data_param = "";
            	}
            	$total_all = intval($total_all) + intval($arr[sum_each_day][each_day]);
            	if($num_work>0){
            		$tr_bg = "background-color:#8bc34a0d;";
            	}else{
            		$tr_bg = "";
            	}
            	$res[sum_pay] = $db->select_query("SELECT sum(price_all_total) as each_pay FROM order_booking where transfer_date = '".$arr[timeline][dayall]."' and check_driver_pay = 1
            	and drivername = '".$arr[web_user][id]."' ");
            	$arr[sum_pay] = $db->fetch($res[sum_pay]);
            	if($arr[sum_pay][each_pay]<=0){
            		$arr[sum_pay][each_pay] = 0;
            	}
            	$total_all_completed = intval($total_all_completed) + intval($arr[sum_pay][each_pay]);
              	?>
         <tr onclick="viewIncomeDetail('<?=$data_param;?>','<?=$arr[web_user][id];?>');" style="<?=$tr_bg;?>">
            <td class="mdl-data-table__cell--non-numeric" align="right"><?=str_pad($i, 2, '0', STR_PAD_LEFT);?></td>
            <!-- <td><?=$arr[order_book][id];?></td>-->
            <td><?=$num_work;?></td>
            <td><?=number_format($arr[sum_each_day][each_day]);?></td>
            <td><?=$arr[sum_pay][each_pay];?></td>
         </tr>
         <?	$i++;
            } ?>
         <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><?=number_format($total_all_completed);?></td>
         </tr>
      </tbody>
   </table>
</div>