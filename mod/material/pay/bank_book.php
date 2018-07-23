<? 
   if($_GET[open]=="menu"){ ?>
<script>
   $('.text-topic-action-mod').html('<?=t_bank_account_information;?>');
</script>
<? } 

   	 $bank_list = array("กรุงไทย"
    					,"กสิกรไทย", "ไทยพาณิชย์","กรุงเทพ","ทหารไทย"
   					 ,"กรุงศรีอยุธยา"
   					 ,"เกียรตินาคิน"
   					 ,"ซิติแบงก์"
   					 ,"ทิสโก้"
   					 ,"ซีไอเอ็มบี ไทย"
   					 ,"ธนชาต"
   					 ,"นครหลวงไทย"
   					 ,"ยูโอบี"
   					 ,"สแตนดาร์ดชาร์เตอร์ดไทย"
   					 ,"เมกะสากลพาณิชย์"
   					 ,"ไอซีบีซี"
   					 ,"แลนด์ แอนด์ เฮ้าส์ เพื่อรายย่อย"
   					 ,"ไทยเครดิต เพื่อรายย่อย"
   					 ,"พัฒนาวิสาหกิจขนาดกลางและขนาดย่อม"
   					 ,"เพื่อการเกษตรและสหกรณ์การเกษตร"
   					 ,"เพื่อการส่งออกและนำเข้าแห่งประเทศไทย"
   					 ,"อิสลามแห่งประเทศไทย"
   					 );

   /*	$bank_list = array("Krung Thai"
    , "Kasikorn", "Siam Commercial Bank", "Bangkok", "TMB"
   , "Ayutthaya"
   , "Kiatnakin"
   , "Citibank"
   , "TISCO"
   , "CIMB Thai"
   , "Thanachart"
   , "Siam City"
   , "UOB"
   , "Standard Chartered Thai"
   , "Mega International Commercial"
   , "ICBC"
   , "Land and Houses for Retail"
   , "Thai Retail Credit"
   , "Small and Medium Enterprise Development"
   , "For Agriculture and Agricultural Cooperatives"
   , "For export and import of Thailand"
   , "Islam of Thailand"
   					 );*/

    $res[web_user] = $db->select_query("SELECT * FROM web_driver  where id =".$_GET[driver]." ");
   	$arr[web_user] = $db->fetch($res[web_user]);
    ?>
<style>
	.select-dropdown{
   padding-left: 10px;
/*   margin: 0 0 20px 0;*/
   }
   .initialized{
   display: none;
   }
  .select-wrapper input.select-dropdown{
  	 margin: 0 0 20px 0;
  }
</style>
<div class="box box-default" style="margin-top:45px;">
<div style="    padding: 20px 10px;">
   <form method="post" action="" id="bank_form" name="bank_form"  enctype="multipart/form-data" >
      
         <div class="row" style="padding-right:0px; ">
            
            <div class="input-field col s12">
		          <i class="material-icons prefix">account_circle</i>
		          <input type="text" class="validate" name="pay_bank_name" id="pay_bank_name"  required="true" value="<?=$arr[web_user][pay_bank_name];?>"  >
		          <label for="icon_prefix" class="active font-24"><?=t_account_name;?></label>
		      </div>
           
            <div class="input-field col s12">
			<i class="material-icons prefix">account_balance</i>
		    <select name="pay_bank" id="pay_bank">
		      <option value="" disabled selected>เลือกธนาคาร</option>
		      <?php 
                     foreach($bank_list as $name){ 
                     if($arr[web_user][pay_bank]==$name){
                     $selected = "selected";
                     }else{
                     $selected = "";
                     }
                     ?>
                  <option  value="<?=$name;?>" <?=$selected;?> ><?=$name;?></option>
                  <?  }
                     ?>
		    </select>
		    <label class="font-21"><?=t_bank;?></label>
		  </div>

            <div class="input-field col s12">
		          <i class="material-icons prefix">account_balance</i>
		          <input type="text" class="validate" name="pay_bank_sub" id="pay_bank_sub"  required="true" value="<?=$arr[web_user][pay_bank_sub];?>"  >
		          <label for="icon_prefix" class="active font-24"><?=t_bank_branch;?></label>
		      </div>
		  
            <div class="input-field col s12">
		          <i class="material-icons prefix">account_balance_wallet</i>
		          <input type="text" class="validate" name="pay_bank_number" id="pay_bank_number"  required="true" value="<?=$arr[web_user][pay_bank_number];?>"  >
		          <label for="icon_prefix" class="active font-24"><?=t_account_number;?></label>
		      </div>
              
            <div class="col-md-6">
               <div  id="send_user_data"  class="topicname" ></div>
            </div>
           
            <table class="tb-pd-5" width="100%" border="0" style="margin-bottom: 10px;">
		      <tbody>
		         <tr>
		            <td width="50%">
		               <button id="reset_data_car" type="button" class="btn waves-effect waves-light lighten-2 " style="width:100%;background-color:#9E9E9E;  border-radius: 0px;color: #fff;">
		                  <span class="font-24">
		                     <center>รีเซ็ต</center>
		                  </span>
		               </button>
		            </td>
		            <td width="50%">
		               <button id="submit_user_bank" type="button" class="btn waves-effect waves-light lighten-2 " style="width:100%;background-color:#3b5998;  border-radius: 0px;color: #fff;">
		                  <span class="font-24">
		                     <center>บันทึก</center>
		                  </span>
		               </button>
		            </td>
		         </tr>
		      </tbody>
		   </table>
			
         </div>
     
   </form>
   <script type="text/javascript">
      $(document).ready(function() {

       $('select').material_select();

      });

      $('#submit_user_bank').click(function(){
      	
      	var url_load = "empty_style.php?name=material/pay&file=php_pay&id=<?=$arr[web_user][id]?>&op=update_bank";
      	var open = '<?=$_GET[open];?>';
      	$.post( url_load, $( "#bank_form" ).serialize() , function( data ) {
      	  	console.log(data);
      	  	if(open==""){
      			var url_load_finish= "load_page_mod_4.php?name=booking/step/load&file=finish&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop&place=<?=$_GET[place]?>";
      		url_load_finish =url_load_finish+"&adult="+document.getElementById('adult').value;
      		url_load_finish =url_load_finish+"&child="+document.getElementById('child').value;
      		url_load_finish =url_load_finish+"&time="+document.getElementById('time').value;
      		url_load_finish =url_load_finish+"&car="+document.getElementById('check_use_car_id').value;
      		url_load_finish =url_load_finish+"&airout_h="+document.getElementById('airout_h').value;
      		url_load_finish =url_load_finish+"&airout_m="+document.getElementById('airout_m').value;
      		url_load_finish =url_load_finish+"&car_color="+document.getElementById('car_color').value;
      		url_load_finish =url_load_finish+"&plan="+document.getElementById('plan_setting').value;
      		console.log(url_load_finish);
      		$('#load_mod_popup_4').html(load_main_mod);
      		$('#load_mod_popup_4').load(url_load_finish);	
      		}else{
      			swal("<?=t_save_succeed;?>", "<?=t_press_button_close;?>", "success");
      		}
      	});
      	
      });
   </script>
</div>
</div>
