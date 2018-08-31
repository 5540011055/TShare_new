
<ul id="slide-out" class="side-nav" style="transform: translateX(-310px);">
   <li class="padding-5 default-shadow default-shadow">
            <ul class="collapsible collapsible-accordion">
               <li class="bold ">
                  <a class="collapsible-header waves-effect waves-light font-26"><i class="icon-new-uniF133-2 icon_menu"></i><?=t_user_information;?></a>
                  <div class="collapsible-body" style="display: none;">
                     <ul>
                        <li><a class="g" onclick="openProfile();"><?=t_personal_information;?></a></li>
                        <li><a onclick="openFileData();"><?=t_important_data_file?></a></li>
                        <!--<li><a onclick="openProfilePic();"><?=t_change_profile_picture?></a></li>-->
                     </ul>
                  </div>
               </li>
            </ul>
         </li>
         <li class="padding-5 default-shadow default-shadow" style="margin-top: 0px;">
            <ul class="collapsible collapsible-accordion">
               <li class="bold active">
                 
                  <a class="collapsible-header waves-effect waves-light font-26"> <i class="icon-new-uniF10A-9 icon_menu"></i><?=t_car_information;?></a>
                  <div class="collapsible-body" style="display: none;">
                     <ul>
                        <li><a class="g" onclick="openNewCar();" ><?=t_add_new_car;?></a></li>
                        <li><a onclick="openAllCar();"><?=t_all_car?></a></li>
                     </ul>
                  </div>
               </li>
            </ul>
         </li>
         <li class="padding-5 default-shadow default-shadow">
            <ul class="collapsible collapsible-accordion">
               <li class="bold active">
                  <a class="collapsible-header waves-effect waves-light font-26"><i class="icon-new-uniF121-10 icon_menu"></i><?=t_income_details;?></a>
                  <div class="collapsible-body" style="display: none;">
                     <ul>
                        <li><a class="g" onclick="revenue();"><?=t_receipt_of_parking_fee;?></a></li>
                        <li><a onclick="openBankAcc();"><?=t_bank_account?></a></li>
                     </ul>
                  </div>
               </li>
            </ul>
         </li>
        
         <li class="default-shadow padding-5 default-shadow">
         <a class="collapsible-header waves-effect waves-light font-26" onclick="openQrCode();"><i class="fa fa-qrcode icon_menu" style="margin-top: 1px !important;"></i><?=t_friends;?></a>
         </li>
         <li class="default-shadow padding-5 default-shadow">
         <a class="collapsible-header waves-effect waves-light font-26" onclick="openNotifyline();">
         <!--<i class="fa fa-volume-control-phone icon_menu" style="margin-top: 1px !important;"></i>ติดต่อ</a>-->
         <i class="fa fa-link icon_menu" style="color: #757575;    margin: 1px !important;" ></i><span style="padding-left: 15px;">สมัครแจ้งเตือนผ่านไลน์</span></a>
         </li>
		 <li class="default-shadow padding-5 default-shadow">
         <a class="collapsible-header waves-effect waves-light font-26" onclick="openContactUs();">
         <!--<i class="fa fa-volume-control-phone icon_menu" style="margin-top: 1px !important;"></i>ติดต่อ</a>-->
         <i class="material-icons icon_menu" style="color: #757575;    margin: 1px !important;" >contact_phone</i><span style="padding-left: 15px;">ติดต่อเรา</span></a>
         </li>
        <!-- <li style="display: none;"><a class="waves-effect waves-light" href="startup-team.html" style="padding: 0px 16px;"><?=t_language;?></a></li>-->
         <li class="default-shadow padding-5 default-shadow">
         <a class="collapsible-header waves-effect waves-light font-26" onclick="logOut();"><i class="icon-new-uniF186 icon_menu"></i><?=t_sign_out;?></a>
         </li>
      </ul>
      
<script>
	function openNewCar(){
		$( "#main_load_mod_popup" ).show();
//        var url_load = "load_page_mod.php?name=car&file=new_car_new";
		var url_load = "load_page_mod.php?name=material/car&file=add_car";
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load); 
	}
	
	function openAllCar(){
		$( "#main_load_mod_popup" ).show();
//        var url_load = "load_page_mod.php?name=car&file=all";
        var url_load = "load_page_mod.php?name=material/car&file=all_car";
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load); 
	}
	function openBankAcc(){
		$( "#main_load_mod_popup" ).show();
//        var url_load = "load_page_mod.php?name=pay&file=bank_book&driver=<?=$arr[web_user][id];?>&open=menu";
        var url_load = "load_page_mod.php?name=material/pay&file=bank_book&driver=<?=$arr[web_user][id];?>&open=menu";
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load); 
	}
	function openProfile(){
		$( "#main_load_mod_popup" ).show();
        var url_load = "load_page_mod.php?name=user&file=index";
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load);
	}
	function openFileData(){
		$( "#main_load_mod_popup" ).show();
        var url_load = "load_page_mod.php?name=user&file=job";
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load);
	}
	function openProfilePic(){
		$( "#load_mod_popup_photo" ).show();
        var url_load = "load_page_photo.php?name=user&file=profile_iframe&user=<?=$arr[web_user][username];?>";
        $('#load_mod_popup_photo').html(load_main_mod);
        $('#load_mod_popup_photo').load(url_load); 
	}
	function openQrCode(){
		$("#btn_qrcode_bottom_menu").addClass("bottom-popup-icon-new-active");
     	$( "#main_load_mod_popup_3" ).show();
      	$('#load_mod_popup_3').html(load_main_mod);
      	var url_load= "load_page_mod_3.php?name=user&file=qrcode";
      	$('#load_mod_popup_3').load(url_load); 
	}
	function openContactUs(){
		$('#dialoglLabel').text('ติดต่อเรา');
		$('#material_dialog').modal('open');
		var url = "mod/user/contrac_us.php";
		var url = "empty_style.php?name=user&file=contrac_us";
		$.post(url,function(html){
			$('#load_modal_body').html(html);
		});
	}
  function openNotifyline(){
    location.href="https://www.welovetaxi.com/app/TShare_new/index.php?regis=linenoti&scope=notify&state=one"
  }
	/*function logOut(){
		swal({
		  title: "<?=t_sign_out;?>",
		  text: "<?=t_confirm_signout;?>",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger waves-effect waves-light",
		  cancelButtonClass: "btn-cus waves-effect waves-light",
		  confirmButtonText: "<?=t_yes;?>",
		  cancelButtonText: "<?=t_no;?>",
		  closeOnConfirm: false
		},
		function(){
		   $.post('signout.php?type=logout',function(){
      		 swal("<?=t_sign_out_successfully;?>","", "success");
      		 setTimeout(function(){ 
      		 	window.location.href = "index.php";		}, 1000);
      		});
		  }); 
	}*/
</script>      