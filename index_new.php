<?php
   @ob_start();
   @session_start();
   header('Content-type: text/html; charset=utf-8');
   require_once("mainfile.php");
   $PHP_SELF = "popup.php";
   GETMODULE($_GET[name], $_GET[file]);
   //   require_once("css/maincss.php");
   $db->connectdb(DB_NAME_DATA, DB_USERNAME, DB_PASSWORD);
if($detectname=="Other"){
	$fontmobile=0;
	$menu_ion_class = "icon-menu-ios";
}else{
	$fontmobile=6;
//	$detectname='Android';
	$menu_ion_class = "icon-menu-android";
}
if ($_COOKIE['detect_username'] == '') {   ?> 
<script>
  window.location = "material/login/index.php";
// window.location = "signin.php";
</script> 
<? }   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px min-width-1024px">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>T-Share</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta name="format-detection" content="telephone=no">
      <meta name="theme-color" content="<?= $main_color ?>" />
      <!--<link rel="stylesheet" href="front_bank/css/thbanklogos.min.css" id="stylesheet">
      <script src="js/sweet_origin/sweetalert.js"></script>
      <link rel="stylesheet" href="js/sweet_origin/sweetalert.css">-->
      <!-- materialize -->
      <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">-->
      <!--<link rel="stylesheet" href="material/materialize.min.css?v=<?=time();?>">-->
      <!--<link rel="stylesheet" href="material/nav.css?v=<?=time();?>">-->
      <link rel="stylesheet" href="material/extra.css?v=<?=time();?>">
      <!--<link rel="stylesheet" href="material/material.indigo-pink.min.css">-->
    
   
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="bootstrap/font_all/ultimate/flaticon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/airport/flaticon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/payment/css/fontello.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/icomoon/demo-files/demo.css?v=<?=time()?>">
      <!--<link rel="stylesheet" href="bootstrap/font_all/app/css/app-icon.css?v=<?=time()?>">-->
      <link rel="stylesheet" href="bootstrap/font_all/app-new/css/app-icon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
   </head>
   <script>
      	  var load_main_mod = '<div class="outer-loading-mod">'
      	  +'<div class="inner-loading">'
      	  +'<div class="preloader-wrapper medium active">'
          +'<div class="spinner-layer spinner-blue-only">'
            +'<div class="circle-clipper left">'
              +'<div class="circle"></div>'
            +'</div><div class="gap-patch">'
              +'<div class="circle"></div>'
            +'</div><div class="circle-clipper right">'
             +'<div class="circle"></div>'
            +'</div>'
          +'</div>'
        +'</div>'
        +'</div>'
        +'</div>';
        
    var load_sub_mod =  '<div class="sub-loader">'
    +'<div class="preloader-wrapper active">'
    +'<div class="spinner-layer spinner-blue-only">'
      +'<div class="circle-clipper left">'
       +'<div class="circle"></div>'
      +'</div><div class="gap-patch">'
        +'<div class="circle"></div>'
      +'</div><div class="circle-clipper right">'
        +'<div class="circle"></div>'
      +'</div>'
    +'</div>'
  +'</div>';
  +'</div>';
            var load_main_mod_table='<br><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px;   margin-top:10px " ></i></center></span><div style="font-size:14px; color:#333333; font-weight:normal;  margin-top:10px " ><center><span id="navload_topic"> โหลดข้อมูล</span></center></div';
            
            var progress_bar = '<div class="progress">'+
      '<div class="indeterminate"></div>'+
  '</div>';
   </script>
	<!-- Scripts -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <!--<script src="material/materialize.min.js?v=<?=time();?>"></script>
      <script src="material/startup-all-min.js?v=<?=time();?>" crossorigin="anonymous"></script>-->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
      <!--/*<script src="js/jquery.touchSwipe.min.js"></script>*/-->
      
       <link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" />
   	   <link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" />
       <script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
       <script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script> 
       
       <link rel="stylesheet" href="material/onsenui/css/onsenui.css">
	   <link rel="stylesheet" href="material/onsenui/css/onsen-css-components.min.css">
	   <script src="material/onsenui/js/onsenui.min.js"></script>
	   <ons-modal direction="up">
		  <div style="text-align: center">
		    <p>
		      <ons-icon icon="md-spinner" size="28px" spin></ons-icon> Loading...
		    </p>
		  </div>
		</ons-modal>
	<script>
		 var modal = document.querySelector('ons-modal');
		modal.show();
    var detect_mb = "<?=$detectname;?>";
   	  var class_user = $.cookie("detect_userclass");
      var username = $.cookie("detect_username").toUpperCase();
      console.log(detect_mb+" : "+class_user+" : "+username);
	  if(username=="" || typeof username == 'undefined'){
	  	
	  	window.location = "signin";
	  
	  }
	</script>	   
   <body style="">

    <ons-navigator id="appNavigator" swipeable swipe-target-width="80px">
        <ons-page>
            <ons-splitter id="appSplitter">
                <ons-splitter-side id="sidemenu" page="sidemenu.html" swipeable side="left" collapse="" width="260px"></ons-splitter-side>
                <ons-splitter-content page="tabbar.html"></ons-splitter-content>
            </ons-splitter>
        </ons-page>
    </ons-navigator>

    <template id="tabbar.html">
        <ons-page id="tabbar-page">
            <ons-toolbar>
                <div class="left">
                    <ons-toolbar-button onclick="fn.toggleMenu()">
                        <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                    </ons-toolbar-button>
                </div>
                <div class="center">หน้าหลัก</div>
                <div class="right">
                    <ons-toolbar-button onclick="fn.pushPage({'id': 'pf.html', 'title': 'ข้อมูลบัญชี', 'key':'profile'}, 'lift-ios')">
                        <img src="../data/pic/driver/small/HKT0153.jpg" style="width: 35px; margin-top: 2px; margin-left: 0px; border-radius: 25px;" />
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <ons-tabbar swipeable id="appTabbar" position="auto">
                <ons-tab label="หน้าหลัก" icon="ion-home" page="home.html" active></ons-tab>
                <ons-tab label="Forms" icon="ion-edit" page="forms.html"></ons-tab>
                <ons-tab label="Animations" icon="ion-film-marker" page="animations.html"></ons-tab>
            </ons-tabbar>

            <script>
                ons.getScriptPage().addEventListener('prechange', function(event) {
        if (event.target.matches('#appTabbar')) {
          event.currentTarget.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');
        }
      });
    </script>
        </ons-page>
    </template>

    <template id="sidemenu.html">
        <ons-page>
            <div class="profile-pic">
                <img src="https://monaca.io/img/logos/download_image_onsenui_01.png">
            </div>
            <ons-list-title>Access</ons-list-title>
            <ons-list>
                <ons-list-item onclick="fn.loadView(0)">
                    <div class="left">
                        <ons-icon fixed-width class="list-item__icon" icon="ion-home, material:md-home"></ons-icon>
                    </div>
                    <div class="center">
                        หน้าหลัก
                    </div>
                    <!--<div class="right">
                        <ons-icon icon="fa-link"></ons-icon>
                    </div>-->
                </ons-list-item>
                
                <ons-list-item expandable>
                    <div class="left">
                        <!--<ons-icon fixed-width class="list-item__icon" icon="ion-edit, material:md-edit"></ons-icon>-->
                        <i class="icon-new-uniF133-2 list-item__icon"></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_profile');">
                        ข้อมูลผู้ใช้งาน
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;">ข้อมูลส่วนตัว</div>
                    <div class="expandable-content" style="padding-left: 60px;">เอกสารสำคัญ</div>
                    <div class="right" id="list_profile">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>
                
                <ons-list-item expandable>
                    <div class="left">
                       <i class="icon-new-uniF10A-9 list-item__icon"></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_car_info');">
                        ข้อมูลรถ
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;">เพิ่มรถ</div>
                    <div class="expandable-content" style="padding-left: 60px;">รถทั้งหมด</div>
                    <div class="right" id="list_car_info">
                         <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>

                <ons-list-item expandable>
                    <div class="left">
                        <i class="icon-new-uniF121-10 list-item__icon "></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_acc');">
                        บัญชี
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;">รายรับ</div>
                    <div class="expandable-content" style="padding-left: 60px;">ธนาคาร</div>
                    <div class="right" id="list_acc">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>
                <ons-list-item>
                    <div class="left">
                        <span class="list-item__icon <?=$menu_ion_class;?>"> <i class="fa fa-qrcode" style="margin-top: 1px !important;"></i></span>
                    </div>
                    <div class="center">
                        แนะนำเพื่อน
                    </div>
                </ons-list-item>
                <ons-list-item onclick="fn.loadLink('https://community.onsen.io/')">
                    <div class="left">
                        <ons-icon fixed-width class="list-item__icon " icon="fa-link"></ons-icon>
                    </div>
                    <div class="center">
                        แจ้งเตือนผ่านไลน์
                    </div>
                   
                </ons-list-item>
                <ons-list-item onclick="fn.loadLink('https://twitter.com/Onsen_UI')">
                    <div class="left">
                        <i class="material-icons list-item__icon <?=$menu_ion_class;?>">contact_phone</i>
                    </div>
                    <div class="center">
                        ติดต่อเรา
                    </div>
                   
                </ons-list-item>
                <ons-list-item onclick="fn.loadLink('https://twitter.com/Onsen_UI')">
                    <div class="left">
                        <i class="icon-new-uniF186 icon_menu list-item__icon"></i>
                    </div>
                    <div class="center">
                        ออกจากระบบ
                    </div>
                    
                </ons-list-item>
            </ons-list>

            <script>
                ons.getScriptPage().onInit = function() {
        // Set ons-splitter-side animation
        this.parentElement.setAttribute('animation', ons.platform.isAndroid() ? 'overlay' : 'reveal');
      };
    </script>

            <style>
                .profile-pic {
        width: 200px;
        background-color: #fff;
        margin: 20px auto 10px;
        border: 1px solid #999;
        border-radius: 4px;
      }

      .profile-pic > img {
        display: block;
        max-width: 100%;
      }

      ons-list-item {
        color: #444;
      }
    </style>
        </ons-page>
    </template>

    <template id="home.html">
        <ons-page>
           <?php include ("".$MODPATHFILE."");?>  
        </ons-page>
    </template>

    <template id="forms.html">
        <ons-page id="forms-page">
            <ons-list>
                <ons-list-header>Text input</ons-list-header>
                <ons-list-item class="input-items">
                    <div class="left">
                        <ons-icon icon="md-face" class="list-item__icon"></ons-icon>
                    </div>
                    <label class="center">
                        <ons-input id="name-input" float maxlength="20" placeholder="Name"></ons-input>
                    </label>
                </ons-list-item>
                <ons-list-item class="input-items">
                    <div class="left">
                        <ons-icon icon="fa-question-circle-o" class="list-item__icon"></ons-icon>
                    </div>
                    <label class="center">
                        <ons-search-input id="search-input" maxlength="20" placeholder="Search"></ons-search-input>
                    </label>
                </ons-list-item>
                <ons-list-item>
                    <div class="right right-label">
                        <span id="name-display">Hello anonymous!</span>
                        <ons-icon icon="fa-hand-spock-o" size="lg" class="right-icon"></ons-icon>
                    </div>
                </ons-list-item>

                <ons-list-header>Switches</ons-list-header>
                <ons-list-item>
                    <label class="center" for="switch1">
                        Switch<span id="switch-status">&nbsp;(on)</span>
                    </label>
                    <div class="right">
                        <ons-switch id="model-switch" input-id="switch1" checked="true"></ons-switch>
                    </div>
                </ons-list-item>
                <ons-list-item>
                    <label id="enabled-label" class="center" for="switch2">
                        Enabled switch
                    </label>
                    <div class="right">
                        <ons-switch id="disabled-switch" input-id="switch2"></ons-switch>
                    </div>
                </ons-list-item>

                <ons-list-header>Select</ons-list-header>
                <ons-list-item>
                    <div class="center">
                        <ons-select id="select-input" style="width: 120px">
                            <option value="Vue">
                                Vue
                            </option>
                            <option value="React">
                                React
                            </option>
                            <option value="Angular">
                                Angular
                            </option>
                        </ons-select>

                    </div>
                    <div class="right right-label">
                        <span id="awesome-platform">Vue&nbsp;</span>is awesome!
                    </div>
                </ons-list-item>

                <ons-list-header>Radio buttons</ons-list-header>
                <ons-list-item tappable>
                    <label class="left">
                        <ons-radio class="radio-fruit" input-id="radio-0" value="Apples"></ons-radio>
                    </label>
                    <label for="radio-0" class="center">Apples</label>
                </ons-list-item>
                <ons-list-item tappable>
                    <label class="left">
                        <ons-radio class="radio-fruit" input-id="radio-1" value="Bananas" checked></ons-radio>
                    </label>
                    <label for="radio-1" class="center">Bananas</label>
                </ons-list-item>
                <ons-list-item tappable modifier="longdivider">
                    <label class="left">
                        <ons-radio class="radio-fruit" input-id="radio-2" value="Oranges"></ons-radio>
                    </label>
                    <label for="radio-2" class="center">Oranges</label>
                </ons-list-item>
                <ons-list-item>
                    <div id="fruit-love" class="center">
                        I love Bananas!
                    </div>
                </ons-list-item>

                <ons-list-header>Checkboxes - <span id="checkboxes-header">Green,Blue</span></ons-list-header>
                <ons-list-item tappable>
                    <label class="left">
                        <ons-checkbox class="checkbox-color" input-id="checkbox-0" value="Red"></ons-checkbox>
                    </label>
                    <label class="center" for="checkbox-0">
                        Red
                    </label>
                </ons-list-item>
                <ons-list-item tappable>
                    <label class="left">
                        <ons-checkbox class="checkbox-color" input-id="checkbox-1" value="Green" checked></ons-checkbox>
                    </label>
                    <label class="center" for="checkbox-1">
                        Green
                    </label>
                </ons-list-item>
                <ons-list-item tappable>
                    <label class="left">
                        <ons-checkbox class="checkbox-color" input-id="checkbox-2" value="Blue" checked></ons-checkbox>
                    </label>
                    <label class="center" for="checkbox-2">
                        Blue
                    </label>
                </ons-list-item>

                <ons-list-header>Range slider</ons-list-header>
                <ons-list-item>
                    Adjust the volume:
                    <ons-row>
                        <ons-col width="40px" style="text-align: center; line-height: 31px;">
                            <ons-icon icon="md-volume-down"></ons-icon>
                        </ons-col>
                        <ons-col>
                            <ons-range id="range-slider" value="25" style="width: 100%;"></ons-range>
                        </ons-col>
                        <ons-col width="40px" style="text-align: center; line-height: 31px;">
                            <ons-icon icon="md-volume-up"></ons-icon>
                        </ons-col>
                    </ons-row>
                    Volume:<span id="volume-value">&nbsp;25</span> <span id="careful-message" style="display: none">&nbsp;(careful, that's loud)</span>
                </ons-list-item>
            </ons-list>

            <script>
                ons.getScriptPage().onInit = function () {
        if (ons.platform.isAndroid()) {
          const inputItems = document.querySelectorAll('.input-items');
          for (i = 0; i < inputItems.length; i++) {
            inputItems[i].hasAttribute('modifier') ?
              inputItems[i].setAttribute('modifier', inputItems[i].getAttribute('modifier') + ' nodivider') :
              inputItems[i].setAttribute('modifier', 'nodivider');
          }
        }
        var nameInput = document.getElementById('name-input');
        var searchInput = document.getElementById('search-input');
        var updateInputs = function (event) {
          nameInput.value = event.target.value;
          searchInput.value = event.target.value;
          document.getElementById('name-display').innerHTML = event.target.value !== '' ? `Hello ${event.target.value}!` : 'Hello anonymous!';
        }
        nameInput.addEventListener('input', updateInputs);
        searchInput.addEventListener('input', updateInputs);
        document.getElementById('model-switch').addEventListener('change', function (event) {
          if (event.value) {
            document.getElementById('switch-status').innerHTML = `&nbsp;(on)`;
            document.getElementById('enabled-label').innerHTML = `Enabled switch`;
            document.getElementById('disabled-switch').disabled = false;
          } else {
            document.getElementById('switch-status').innerHTML = `&nbsp;(off)`;
            document.getElementById('enabled-label').innerHTML = `Disabled switch`;
            document.getElementById('disabled-switch').disabled = true;
          }
        });
        document.getElementById('select-input').addEventListener('change', function (event) {
          document.getElementById('awesome-platform').innerHTML = `${event.target.value}&nbsp;`;
        });
        var currentFruitId = 'radio-1';
        const radios = document.querySelectorAll('.radio-fruit')
        for (var i = 0; i < radios.length; i++) {
          var radio = radios[i];
          radio.addEventListener('change', function (event) {
            if (event.target.id !== currentFruitId) {
              document.getElementById('fruit-love').innerHTML = `I love ${event.target.value}!`;
              document.getElementById(currentFruitId).checked = false;
              currentFruitId = event.target.id;
            }
          })
        }
        var currentColors = ['Green', 'Blue'];
        const checkboxes = document.querySelectorAll('.checkbox-color')
        for (var i = 0; i < checkboxes.length; i++) {
          var checkbox = checkboxes[i];
          checkbox.addEventListener('change', function (event) {
            if (!currentColors.includes(event.target.value)) {
              currentColors.push(event.target.value);
            } else {
              var index = currentColors.indexOf(event.target.value);
              currentColors.splice(index, 1);
            }
            document.getElementById('checkboxes-header').innerHTML = currentColors;
          })
        }
        document.getElementById('range-slider').addEventListener('input', function (event) {
          document.getElementById('volume-value').innerHTML = `&nbsp;${event.target.value}`;
          if (event.target.value > 80) {
            document.getElementById('careful-message').style.display = 'inline-block';
          } else {
            document.getElementById('careful-message').style.display = 'none';
          }
        })
      }
    </script>

            <style>
                .right-icon {
        margin-left: 10px;
      }

      .right-label {
        color: #666;
      }
    </style>
        </ons-page>
    </template>

    <template id="animations.html">
        <ons-page>
            <ons-list>
                <ons-list-header>Transitions</ons-list-header>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'none'}, 'none')">
                    none
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'default'}, 'default')">
                    default
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'slide-ios'}, 'slide-ios')">
                    slide-ios
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'slide-md'}, 'slide-md')">
                    slide-md
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'lift-ios'}, 'lift-ios')">
                    lift-ios
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'lift-md'}, 'lift-md')">
                    lift-md
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'fade-ios'}, 'fade-ios')">
                    fade-ios
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'fade-md'}, 'fade-md')">
                    fade-md
                </ons-list-item>
            </ons-list>
        </ons-page>
    </template>

    <template id="pf.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center">ข้อมูลบัญชี</div>
            </ons-toolbar>
            <div id="body_show_pf">

            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>

    <template id="popup1.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_popup1">
            	
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>

    <style>
        ons-splitter-side[animation=overlay] {
    border-left: 1px solid #bbb;
  }
</style>

    <input type="hidden" id="set_lng_cookies" value="th" />
    
    <template id="submit-alert-dialog.html">
	  <ons-alert-dialog id="submit-my-alert-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="submit-dialog-title">คุณแน่ใจหรือไม่</div>
	    <div class="alert-dialog-content">
	       ว่าต้องการบันทึกข้อมูลนี้
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="hideAlertDialog()">ยกเลิก</ons-alert-dialog-button>
	      <ons-alert-dialog-button onclick="submitSingUp()">บันทึก</ons-alert-dialog-button>
	    </div>
	  </ons-alert-dialog>
	</template>
    
</body>
   
</html>

<script>
    window.fn = {};

    window.fn.toggleMenu = function() {
        document.getElementById('appSplitter').left.toggle();
    };

    window.fn.loadView = function(index) {
        document.getElementById('appTabbar').setActiveTab(index);
        document.getElementById('sidemenu').close();
    };

    window.fn.loadLink = function(url) {
        window.open(url, '_blank');
    };

    window.fn.pushPage = function(page, anim) {
        console.log(page);
        if (page.key == "shop") {
            var url = "page/shop";
            $.post(url,function(html){
            	$('#body_popup1').html(html);
            });
        }
        if(page.key=="profile"){
        	var url_load = "load_page_mod.php?name=user&file=empty_user&check=0";
			$.post(url_load,function(html){
            	$('#body_show_pf').html(html);
            });
		}
        if (anim) {
            document.getElementById('appNavigator').pushPage(page.id, {
                data: {
                    title: page.title
                },
                animation: anim
            });
        } else {
            document.getElementById('appNavigator').pushPage(page.id, {
                data: {
                    title: page.title
                }
            });
        }
    };

    function language(lng) {
        console.log(lng);
        setCookie("lng", lng, 1);
        window.location.reload();
    }

    function GohomePage() {
        $("#load_material").fadeIn();
        console.log('GohomePage Run');
        $('#load_mod_data').html(load_main_mod);
        window.location = "index.php";
    }

    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    var check_new_user = '<?=$_GET[check_new_user];?>';
    var regis_linenoti = '<?=$_GET[regis];?>';

    console.log(regis_linenoti)
    console.log('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
    //                                                alert(check_new_user);
    if (check_new_user != "") {
        $("#main_load_mod_popup").toggle();
        var url_load = "load_page_mod.php?name=user&file=index&check_new_user=" + check_new_user;
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load);
    }
    if (regis_linenoti != "") {
        $("#main_load_mod_popup").toggle();
        var url_load = "load_page_mod.php?name=user&file=notiline&regis=linenoti&state=one";
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load);
    }
    
    function arrowChange(id){
    	var check = $('#'+id+' i').hasClass('fa-chevron-down');
    	console.log(check);
		if(check==true){
			$('#'+id+' i').removeClass('fa-chevron-down');
			$('#'+id+' i').addClass('fa-chevron-up');
		}else{
			$('#'+id+' i').addClass('fa-chevron-down');
			$('#'+id+' i').removeClass('fa-chevron-up');
		}
	}
</script>
<style>
 .toolbar-home{
 	position: absolute;
    right: 15px;
    top: 10px;
    z-index: 10;
 }
 .close-left{
 	padding: 5px;
 	position: fixed;
 	z-index: 106;
 	margin-left: 5px;
 }
 .toolbar-head{
 	padding: 10px;
 	width: 100%;background-color: #f7f7f8;
    height: 50px;
    z-index: 100;
    position: fixed;
    top: 0;
    transform: translate3d(0,0,0);
    border-bottom: 1px solid #e8e6e6;
 }
 .btn-primary{
     background-color: <?=$main_color;?> !important;
     color: #fff !important;
}
	.sub-loader{
		padding: 50px;
    	width: 100%;
    	text-align: center;
	}
   .outer-loading-mod {
   position: fixed;
   margin-left: 0px;
   margin-top: 0px;
   display: table;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   z-index: 9999;
   background: #FFF;
   }
   .inner-loading {
   display: table-cell;
   vertical-align: middle;
   text-align: center;
   width: 100%;
   height: 100%;
   background: none;
   }
   @keyframes load {
   100% {
   opacity: 0;
   transform: scale(1);
   }
   }
   @keyframes load {
   100% {
   opacity: 0;
   transform: scale(1);
   }
   }
   .css-full-popup {
   position: fixed;
   left: 0px;
   top: 0px; 
   bottom:0;
   width: 100%;
   height: 100%;
   z-index: 99; 
   overflow-y:hidden ; padding:0px; background-color:#FFFFFF;
   }
   .back-full-popup
   { 
   border-bottom: dashed 1px #3b5998 !important;
   font-size: 22px !important;
   padding: 10px !important;
   color: #333333 !important;
   width: 100% !important;
   border-top: 0px solid #000000 !important;
   margin-bottom: 0px!important;
   top: 0 !important;
   position: fixed !important;
   background: #e8e8e8 !important;
   z-index: 100;
   }
   .close-small-popup{
   font-size:22px;
   color:#333 !important;
   }
   .text_small_popup{
   color:#333 !important;
   }
   /*pop up*/
   .main_load_mod_popup{
   color: #333;
   }
   .main_load_mod_popup_1{
   color: #333;
   }
   .main_load_mod_popup_2{
   color: #333;
   }
   .main_load_mod_popup_3{
   color: #333;
   }
   .main_load_mod_popup_4{
   color: #333;
   }
   .main_load_mod_popup_5{
   color: #333;
   }
   .button-close-popup-mod-1{
   color: #333333;
   }
   .button-close-popup-mod-2{
   color: #333333;
   }
   .button-close-popup-mod-3{
   color: #333333;
   }
   .button-close-popup-mod-4{
   color: #333333;
   }
   .button-close-popup-mod-5{
   color: #333333;
   }
   .button-close-popup-mod{
   color: #333333;
   }
   .text_mod_topic_action_1{
   font-size:22px;
   color: #333333;
   }
   .text_mod_topic_action_2{
   font-size:22px;
   color: #333333;
   }
   .text_mod_topic_action_3{
   font-size:22px;
   color: #333333;
   }
   .text_mod_topic_action_4{
   font-size:22px;
   color: #333333;
   }
   .text_mod_topic_action_5{
   font-size:22px;
   color: #333333;
   }
   .text_mod_topic_action_6{
   font-size:22px;
   color: #333333;
   }
   .fa-home{
   font-size: 28px;
   }
   /*****END*****/
</style>
<style>
.onlyThisTable td, th {
    padding: 5px 5px !important;
}
/*td{
	text-align: left !important;
}*/
.pd-5{
	padding: 5 !important;
}
.badge-custom{
	position: absolute;
	background-color: #F44336;
	padding: 4px 7px;
	margin: -5px 3px;
	z-index: 0;
	border-radius: 50%;
}
.background-airy{
/*	background-color: #ffffff40 !important; */
	background-color: unset !important;
	box-shadow: none !important;
	border: none !important;
}
.box-shadow-only{
   box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
}
.paddling-max background-airy{
   padding : 17px 12px !important;
   border-radius: 0px !important;
   border : 0px !important;
}
.popup-open {
   overflow: hidden;
}
.css-small-popup {
   /* left: 0px; */
   /* right: 0px; */
   /* bottom: 0px; */
   top: 50px;

   /* margin-top: 95px;
   margin-left: 30px;*/
   /*    margin: 40px;*/
   margin: 15% auto;
   position : relative;
   width: 85%;
   height: auto%;
   z-index: 99;
   /* padding: 30px; */
   background-color: #fff;
   border: 2px solid #cccccc;
   border-radius: 10px;
   }
   .background-smal-popup{

   width: 100%;
   height: 100%;
   z-index: 99;
/*   background-color: rgba(0, 0, 0, 0.45);*/
/*   background-color: rgb(160, 160, 160);*/
   background-color: rgb(183, 183, 183);
   top: 0px;
   left: 0px;
   right: 0px;
   bottom: 0px;
}
.close-small-popup{
   /* position : relative;*/
/* right : 50px;
top : 95px;*/
z-index : 10000;
color : #000000;
width: 100%;
/*margin-left: -10px;
margin-top: 5px;*/
}
.css-full-popup2{
   position: fixed;
   width: 100%;
   z-index: 9999;
   background-color: #ffff;
   height: 100%;
   /* margin-top: 48px;*/
}
.btn_select{
   width: 100%;
   border: 1px solid #ddd;
   padding: 13px;
   margin-top: 0px;
   border-radius: 20px;
   background-color: #fff;
   box-shadow: 1px 1px 5px #ddd;
   background-color: #3b5998;
   color: #ffff;
}

.tool-icon-chat {
   width:100%;border-radius: 20px;
}
.tool-icon-text {
   padding:5px; width:100%;border-radius: 15px; height:60px; background-color:#FFFFFF; font-size:32px; color: <?=$maincolor?>;
}
.tool-icon-text:hover{
   padding:5px; width:100%;border-radius: 15px; height:60px; border:2px solid <?=$maincolor?>;background-color:#FFFFFF; box-shadow: 0px 0px 10px #999999; color:<?=$maincolor?>;
}
.tool-td-chat {
   padding:5px;border-radius: 15px; padding-bottom:10px;
}
.circle-menu{
   border-radius: 50%; background-color:<?=$main_color?>; 
   display: block;
   padding: 10px;
   width: 45px;
   height: 45px;
   color:#FFFFFF;  font-size:24px;
/*   border: solid 1px #FFFFFF;*/
   text-align: center;
   vertical-align: middle;
   box-shadow: 1px 1px 5px #9E9E9E;
}
.btn-default{
   border-radius: 20px;
   box-shadow: 0px  0px 5px #DADADA;  border:none;
}
.text-cap{
   text-transform: capitalize !important;
}
.text-low{
   text-transform: lowercase !important;
}
.btn-repair{
   padding: .84rem 2.14rem;
   font-size: .81rem;
   -webkit-transition: all .2s ease-in-out;
   transition: all .2s ease-in-out;
   margin-top: .375rem;
   border: 0;
   border-radius: .125rem;
   cursor: pointer;
   text-transform: uppercase;
   white-space: normal;
   word-wrap: break-word;
   color: #000000;
   background-color: #ffffff;
   box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
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

.back_main{
   padding: 5px 0px;
   margin-top: 0px;
   padding-left: 10px;
   position: fixed;
   background-color: #fff;
   width: 100%;
   /*     border-bottom: 1px solid #ddd;*/
   box-shadow: 1px 1px 10px #ddd;
   z-index: 2;
}
@media screen and (max-width: 320px) {
   .line-center{
      /*       height: 59px;*/
      height: 50px;
   }
   #date_transfer_work{
      height: 35px !important;
      font-size: 20px !important;
   }
   .icon_calendar{
      font-size: 20px !important;
   }
}
.btn_filter_active{
   padding: 8px;
   border: 1px solid <?=$main_color;?>;
   border-radius: 25px;
   /* width: 100px;*/
   background-color: <?=$main_color;?>;
   color: #fff;
   box-shadow: 1px 1px 1px #333;
   cursor: pointer;
   margin: 5px;
}
.btn_filter{
   padding: 8px;
   border: 1px solid <?=$main_color;?>;
   border-radius: 25px;
   /* width: 100px;*/
   cursor: pointer;
   margin: 5px;
}

.payment-menu{
   border-radius: 50%; background-color:#59AA47; display: block;
   padding: 12px;
   width: 50px;
   height: 50px;
   color:#FFFFFF;  font-size:10px;
   border: solid 2px #FFFFFF;
   text-align: center;
   vertical-align: middle;  box-shadow: 0px  0px 10px #DADADA  ; margin-left: -5px;
}
.div-all-price{
/* padding:3px;
border-radius: 8px;
border:  1px solid #ddd;*/
background-color:#FFFFFF;
/*margin-bottom: 10px; */
margin-top:0px;
/*  box-shadow: 0px  0px 0px #DADADA  ;*/
}
.div-all-zello{
   padding:5px;
   border-radius: 0px;
   border: 1px solid #ddd;
   background-color:#FFF;
   margin-bottom: 5px;
   box-shadow: 0px 0px 0px #DADADA ;
}
.list-container{
   font-size: 16px;
   padding: 5px 0px;
   transform: 0.3s;
   /*   padding: 0px;*/
}
.w3-ul li{
   padding: 0px 5px;
   border-bottom: 1px solid #ddd;
}
.ico-pos{
   position: absolute;
   right: 0px;
   margin: 20px 10px;
}
.cancel-work-shop{
   box-shadow: 1px 2px 2px #35353575;
   width: 90px;
   border: 1px solid #a9a9a9;
   background: #FF5722;
   color: #fff;
   position: absolute;
   top: 50px;
   right: 15px;
   /*     margin: 50px 15px;*/
   text-align: center;
   border-radius: 10px;
}
.div-all-checkin{
   padding:5px;
   border-radius: 15px;
   border: 1px solid #ddd;
   background-color:#F6F6F6;
   margin-bottom: 5px;
   margin-top:5px;
   box-shadow: 0px 0px 10px #DADADA ;
}
.disabledbutton-checkin {
   pointer-events: none;
   background-color:#FFF;
   color:#FFF;
   border: 1px solid #88B34D;
}

.form-group { background:none;
}
.box_his,.box_book{
   padding: 5px 0px;
   border: 1px solid #3b5998;
   margin-bottom: 10px;
   border-radius: 25px;
   box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);
}
.step-booking-small {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color:#FFFFFF;
   font-size:20px;
   font-weight:bold;
   margin-top:-10px;
   text-align:center;
   border: solid 4px #FFFFFF;
   background: #f39c12 !important;
   color: #fff;
}
.step-booking-small-no {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color:#FFFFFF;
   font-size:20px;
   font-weight:bold;
   margin-top:-10px;
   text-align:center;
   border: solid 4px #FFFFFF;
   background: #999999 !important;
   color: #fff;
}
.step-booking {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 10px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color:#FFFFFF;
   font-size:30px;
   font-weight:bold;
   text-align:center;
   margin-left:-5px;
   border: solid 3px #F6F6F6;
   box-shadow: 0 0 10px 3px #E8E6E6;
   background: #FF0000 !important;
   color: #fff;
}
.step-booking-active {
   border-radius: 50%;
   padding: 10px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color:#FFFFFF;
   font-size:30px;
   font-weight:bold;
   text-align:center;
   margin-left:-5px;
   border: solid 3px #F6F6F6;
   box-shadow: 0 0 10px 3px #E8E6E6;
   background: #59AA47 !important;
   color: #fff;
}
.mof{
   width: 100%;
   position: relative;
   border: none;
   outline:none;
   cursor: pointer;
   background: #FFFFFF;
   color: #333;
   padding: 13px;
   border-radius: 2px;
   font-size: 22px;
}.ripple{
   overflow:hidden;
}
.ripple-effect{
   position: absolute;
   border-radius: 50%;
   width: 50px;
   height: 50px;
   background: white;
   animation: ripple-animation 2s;
}
@keyframes ripple-animation {
   from {
      transform: scale(1);
      opacity: 0.4;
   }
   to {
      transform: scale(100);
      opacity: 0;
   }
}
</style>
<style>
.bar-item{
	padding: 10px;
	margin-left: 5px;
}
.time-post{
 margin-right: 12px;
 border: 1px solid #333;
 padding: 5px;
 position: absolute;
 z-index: 1;
 right:  0px;
 background-color: #fff;
 margin-top: -25px;
 border-radius: 25px; 
}

.btn-approve-job{
  border-radius: 15px;
  padding: 7px 20px;
  position:  absolute;
  right: 15px;
  bottom: 4px;
  border: 0px solid;
  box-shadow: 2px 2px 10px #c5bfbf;
  background-color: #3b5998;
  color: #fff;
  font-size: 12px;
}
#main_component{
  margin-top: 50px;
  border-top: 0px;
  position: relative;
  border-radius: 0px;
  background: #ffffff;
  width: 100%;
}
.box_his,.box_book{
 padding: 5px 8px;
 border: 1px solid #3b5998;
 /*    margin-bottom: 10px;*/
 /*   margin: 30px 0px;*/
 margin: 30px 0px;
 border-radius: 25px;
 box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);
}


</style>

<div class="container" style="display: none;">
   <div class="row">
      <div id="loader">
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="lading"></div>
      </div>
   </div>
</div>

<?php   $lng_map = $google_map_api_lng;?>
<script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?= $lng_map; ?>&v=<?= time(); ?>"></script>
<script>
  	
    
    function sendTagIOS(classname,username){
    	var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
   		if(iOS==true){
       		var url_xcode = "send://ios?class="+classname+"&username="+username+"&test=0";
       		console.log(url_xcode);
            window.location = url_xcode;
		}
   	}
   	
   	function deleteTagIOS(classname,username){
   		var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
   		if(iOS==true){
       		var url_xcode = "delete://ios?class="+classname+"&username="+username+"&test=0";
       		console.log(url_xcode);
            window.location = url_xcode;
		}
   	}
   	
   	function logOut(){
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
				   	 $.cookie("detect_user", "", { path: '/' });
				   	 $.cookie("detect_userclass", "", { path: '/' });
				   	 $.cookie("detect_username", "", { path: '/' });
		      		 swal("<?=t_sign_out_successfully;?>","", "success");
		      		 	setTimeout(function(){ 		
		      		 		
			      		 	deleteTagOs("Test Text");
						    deleteTagIOS(class_user,username);
						    window.location.href = "material/login/index.php";
//						    window.location.href = "signin.php";
		      		 	}, 1000);
		      		});
				  }); 
  }
</script>
<script>
     
	   if ('<?=$_GET[status];?>' != "his") { //เช็คว่าสเตตัสที่ส่งมาเป็น ประวัติ หรือ กำลังจัดการ
        $(window).load(function() {
//            $("#load_material").fadeOut(500);
			modal.hide();
            setTimeout(function() {
                sendTagIOS(class_user, username);
            }, 1500);
        });
    }
</script>
<script >


   function language(lng) {
       console.log(lng);
       setCookie("lng", lng, 1);
       window.location.reload();
   }
   function GohomePage() {
   		$("#load_material").fadeIn();
       console.log('GohomePage Run');
       $('#load_mod_data').html(load_main_mod);
       window.location = "index.php";
   }
   function addCommas(nStr){
       nStr += '';
       x = nStr.split('.');
       x1 = x[0];
       x2 = x.length > 1 ? '.' + x[1] : '';
       var rgx = /(\d+)(\d{3})/;
       while (rgx.test(x1)) {
           x1 = x1.replace(rgx, '$1' + ',' + '$2');
       }
       return x1 + x2;
   }
   var check_new_user = '<?=$_GET[check_new_user];?>';
   var regis_linenoti = '<?=$_GET[regis];?>';
   
   console.log(regis_linenoti)
   console.log('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
   //                                                alert(check_new_user);
   if(check_new_user!=""){
   $( "#main_load_mod_popup" ).toggle();
//   var url_load = "load_page_mod.php?name=user&file=empty_user&check_new_user="+check_new_user;
	var url_load = "load_page_mod.php?name=user&file=empty_user";
   $('#load_mod_popup').html(load_main_mod);
   $('#load_mod_popup').load(url_load); 
   }
   if(regis_linenoti!=""){
   $( "#main_load_mod_popup" ).toggle();
   var url_load = "load_page_mod.php?name=user&file=notiline&regis=linenoti&state=one";
   $('#load_mod_popup').html(load_main_mod);
   $('#load_mod_popup').load(url_load); 
   }
</script>