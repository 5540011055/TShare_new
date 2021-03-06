<?php
   @ob_start();
   @session_start();
   header('Content-type: text/html; charset=utf-8');
   require_once("mainfile.php");
   $PHP_SELF = "popup.php";
   GETMODULE($_GET[name], $_GET[file]);
   //   require_once("css/maincss.php");
   $db->connectdb(DB_NAME_DATA, DB_USERNAME, DB_PASSWORD);
   ?>

<?if ($_COOKIE['detect_username'] == '') {   ?> 
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
      <link rel="stylesheet" href="front_bank/css/thbanklogos.min.css" id="stylesheet">

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="bootstrap/font_all/ultimate/flaticon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/airport/flaticon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/payment/css/fontello.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/icomoon/demo-files/demo.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/app/css/app-icon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/app-new/css/app-icon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
      <link rel="stylesheet" href="material/extra.css?v=<?=time();?>">
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="material/onsenui/css/onsenui.css">
	<link rel="stylesheet" href="material/onsenui/css/onsen-css-components.min.css">
	<script src="material/onsenui/js/onsenui.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
    
   	<body>
<ons-navigator id="appNavigator" swipeable swipe-target-width="80px">
  <ons-page>
    <ons-splitter id="appSplitter">
      <ons-splitter-side id="sidemenu" page="sidemenu.html" swipeable side="right" collapse="" width="260px"></ons-splitter-side>
      <ons-splitter-content page="tabbar.html"></ons-splitter-content>
    </ons-splitter>
  </ons-page>
</ons-navigator>

<template id="tabbar.html">
  <ons-page id="tabbar-page">
    <ons-toolbar>
      <div class="center">Home</div>
      <div class="right">
        <ons-toolbar-button onclick="fn.toggleMenu()">
          <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
        </ons-toolbar-button>
      </div>
    </ons-toolbar>
    <ons-tabbar swipeable id="appTabbar" position="auto">
      <ons-tab label="Home" icon="ion-home" page="home.html" active></ons-tab>
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
          Home
        </div>
        <div class="right">
          <ons-icon icon="fa-link"></ons-icon>
        </div>
      </ons-list-item>
      <ons-list-item onclick="fn.loadView(1)">
        <div class="left">
          <ons-icon fixed-width class="list-item__icon" icon="ion-edit, material:md-edit"></ons-icon>
        </div>
        <div class="center">
          Forms
        </div>
        <div class="right">
          <ons-icon icon="fa-link"></ons-icon>
        </div>
      </ons-list-item>
      <ons-list-item onclick="fn.loadView(2)">
        <div class="left">
          <ons-icon fixed-width class="list-item__icon" icon="ion-film-marker, material: md-movie-alt"></ons-icon>
        </div>
        <div class="center">
          Animations
        </div>
        <div class="right">
          <ons-icon icon="fa-link"></ons-icon>
        </div>
      </ons-list-item>
    </ons-list>

    <ons-list-title style="margin-top: 10px">Links</ons-list-title>
    <ons-list>
      <ons-list-item onclick="fn.loadLink('https://onsen.io/v2/docs/guide/js/')">
        <div class="left">
          <ons-icon fixed-width class="list-item__icon" icon="ion-document-text"></ons-icon>
        </div>
        <div class="center">
          Docs
        </div>
        <div class="right">
          <ons-icon icon="fa-external-link"></ons-icon>
        </div>
      </ons-list-item>
      <ons-list-item onclick="fn.loadLink('https://github.com/OnsenUI/OnsenUI')">
        <div class="left">
          <ons-icon fixed-width class="list-item__icon" icon="ion-social-github"></ons-icon>
        </div>
        <div class="center">
          GitHub
        </div>
        <div class="right">
          <ons-icon icon="fa-external-link"></ons-icon>
        </div>
      </ons-list-item>
      <ons-list-item onclick="fn.loadLink('https://community.onsen.io/')">
        <div class="left">
          <ons-icon fixed-width class="list-item__icon" icon="ion-chatboxes"></ons-icon>
        </div>
        <div class="center">
          Forum
        </div>
        <div class="right">
          <ons-icon icon="fa-external-link"></ons-icon>
        </div>
      </ons-list-item>
      <ons-list-item onclick="fn.loadLink('https://twitter.com/Onsen_UI')">
        <div class="left">
          <ons-icon fixed-width class="list-item__icon" icon="ion-social-twitter"></ons-icon>
        </div>
        <div class="center">
          Twitter
        </div>
        <div class="right">
          <ons-icon icon="fa-external-link"></ons-icon>
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
    	<?php  include ("".$MODPATHFILE."");?>  
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

<template id="pullHook.html">
  <ons-page>
    <ons-toolbar>
      <div class="left">
        <ons-back-button>Home</ons-back-button>
      </div>
      <div class="center"></div>
    </ons-toolbar>

    <ons-pull-hook id="pull-hook" threshold-height="120px">
      <ons-icon id="pull-hook-icon" size="22px" class="pull-hook-content" icon="fa-arrow-down"></ons-icon>
    </ons-pull-hook>

    <ons-list id="kitten-list">
      <ons-list-header>Pull to refresh</ons-list-header>
    </ons-list>

    <script>
      ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        var pullHook = document.getElementById('pull-hook');
        var icon = document.getElementById('pull-hook-icon');
        pullHook.addEventListener('changestate', function (event) {
          switch (event.state) {
            case 'initial':
              icon.setAttribute('icon', 'fa-arrow-down');
              icon.removeAttribute('rotate');
              icon.removeAttribute('spin');
              break;
            case 'preaction':
              icon.setAttribute('icon', 'fa-arrow-down');
              icon.setAttribute('rotate', '180');
              icon.removeAttribute('spin');
              break;
            case 'action':
              icon.setAttribute('icon', 'fa-spinner');
              icon.removeAttribute('rotate');
              icon.setAttribute('spin', true);
              break;
          }
        });
        var getRandomName = function () {
          const names = ['Oscar', 'Max', 'Tiger', 'Sam', 'Misty', 'Simba', 'Coco', 'Chloe', 'Lucy', 'Missy'];
          return names[Math.floor(Math.random() * names.length)];
        };
        var getRandomUrl = function () {
          const width = 40 + Math.floor(20 * Math.random());
          const height = 40 + Math.floor(20 * Math.random());
          return `https://placekitten.com/g/${width}/${height}`;
        };
        var getRandomKitten = function () {
          return {
            name: getRandomName(),
            url: getRandomUrl()
          };
        };
        var getRandomData = function () {
          const data = [];
          for (var i = 0; i < 8; i++) {
            data.push(getRandomKitten());
          }
          return data;
        };
        var createKitten = function (kitten) {
          return ons.createElement(`
              <ons-list-item>
                <div class="left">
                  <img class="list-item__thumbnail" src="${kitten.url}">
                </div>
                <div class="center">${kitten.name}</div>
              </ons-list-item>
            `
          );
        };
        var kittens = getRandomData();
        for (kitty of kittens) {
          var kitten = createKitten(kitty);
          document.getElementById('kitten-list').appendChild(kitten);
        };
        pullHook.onAction = function (done) {
          setTimeout(function() {
            document.getElementById('kitten-list').appendChild(createKitten(getRandomKitten()));
            done();
          }, 400);
        }
      };
    </script>

    <style>
      .pull-hook-content {
        color: #666;
        transition: transform .25s ease-in-out;
      }
    </style>
  </ons-page>
</template>

<template id="dialogs.html">
  <ons-page id="dialogs-page">
    <ons-toolbar>
      <div class="left">
        <ons-back-button>Home</ons-back-button>
      </div>
      <div class="center"></div>
      <div class="right">
        <ons-toolbar-button id="info-button" onclick="fn.showDialog('popover-dialog')"></ons-toolbar-button>
      </div>
    </ons-toolbar>

    <ons-list-title>Notifications</ons-list-title>
    <ons-list modifier="inset">
      <ons-list-item tappable modifier="longdivider" onclick="ons.notification.alert('Hello, world!')">
        <div class="center">
          Alert
        </div>
      </ons-list-item>
      <ons-list-item tappable modifier="longdivider" onclick="ons.notification.confirm('Are you ready?')">
        <div class="center">
          Simple Confirmation
        </div>
      </ons-list-item>
      <ons-list-item tappable modifier="longdivider" onclick="ons.notification.prompt('What is your name?')">
        <div class="center">
          Prompt
        </div>
      </ons-list-item>
      <ons-list-item tappable modifier="longdivider" onclick="ons.notification.toast('Hi there!', { buttonLabel: 'Dismiss', timeout: 1500 })">
        <div class="center">
          Toast
        </div>
      </ons-list-item>
      <ons-list-item tappable modifier="longdivider" onclick="ons.openActionSheet({ buttons: ['Label 1', 'Label 2', 'Label 3', 'Cancel'], destructive: 2, cancelable: true })">
        <div class="center">
          Action/Bottom Sheet
        </div>
      </ons-list-item>
    </ons-list>

    <ons-list-title>Components</ons-list-title>
    <ons-list modifier="inset">
      <ons-list-item tappable modifier="longdivider" onclick="fn.showDialog('lorem-dialog')">
        <div class="center">
          Simple Dialog
        </div>
      </ons-list-item>
      <ons-list-item tappable modifier="longdivider" onclick="fn.showDialog('watHmmSure-dialog')">
        <div class="center">
          Alert Dialog
        </div>
      </ons-list-item>
      <ons-list-item tappable modifier="longdivider" onclick="fn.showDialog('toast-dialog')">
        <div class="center">
          Toast (top)
        </div>
      </ons-list-item>
      <ons-list-item tappable modifier="longdivider" onclick="fn.showDialog('modal-dialog')">
        <div class="center">
          Modal
        </div>
      </ons-list-item>
      <ons-list-item tappable modifier="longdivider" onclick="fn.showDialog('popover-dialog')">
        <div class="center">
          Popover - MD Menu
        </div>
      </ons-list-item>
      <ons-list-item tappable modifier="longdivider" onclick="fn.showDialog('action-sheet-dialog')">
        <div class="center">
          Action/Bottom Sheet
        </div>
      </ons-list-item>
    </ons-list>

    <!-- Components -->
    <ons-dialog id="lorem-dialog" cancelable>
      <!-- Optional page. This could contain a Navigator as well. -->
      <ons-page>
        <ons-toolbar>
          <div class="center">Simple Dialog</div>
        </ons-toolbar>
        <p style="text-align: center">Lorem ipsum dolor</p>
        <p style="text-align: center">
          <ons-button modifier="light" onclick="fn.hideDialog('lorem-dialog')">Close</ons-button>
        </p>
      </ons-page>
    </ons-dialog>

    <ons-alert-dialog id="watHmmSure-dialog" cancelable>
      <div class="alert-dialog-title">Hey!!</div>
      <div class="alert-dialog-content">
        Lorem ipsum
        <ons-icon icon="fa-commenting-o"></ons-icon>
      </div>
      <div class="alert-dialog-footer">
        <button class="alert-dialog-button" onclick="fn.hideDialog('watHmmSure-dialog')">Wat</button>
        <button class="alert-dialog-button" onclick="fn.hideDialog('watHmmSure-dialog')">Hmm</button>
        <button class="alert-dialog-button" onclick="fn.hideDialog('watHmmSure-dialog')">Sure</button>
      </div>
    </ons-alert-dialog>

    <ons-toast id="toast-dialog" animation="fall">Supercalifragilisticexpialidocious<button onclick="fn.hideDialog('toast-dialog')">No way</button></ons-toast>

    <ons-modal id="modal-dialog" onclick="fn.hideDialog('modal-dialog')">
      <p style="text-align: center">
        Loading
        <ons-icon icon="fa-spinner" spin></ons-icon>
        <br><br> Click or wait
      </p>
    </ons-modal>

    <ons-popover id="popover-dialog" cancelable direction="down" cover-target target="#info-button">
      <ons-list id="popover-list">
        <ons-list-item class="more-options" tappable onclick="fn.hideDialog('popover-dialog')">
          <div class="center">Call history</div>
        </ons-list-item>
        <ons-list-item class="more-options" tappable onclick="fn.hideDialog('popover-dialog')">
          <div class="center">Import/export</div>
        </ons-list-item>
        <ons-list-item class="more-options" tappable onclick="fn.hideDialog('popover-dialog')">
          <div class="center">New contact</div>
        </ons-list-item>
        <ons-list-item class="more-options" tappable onclick="fn.hideDialog('popover-dialog')">
          <div class="center">Settings</div>
        </ons-list-item>
      </ons-list>
    </ons-popover>

    <ons-action-sheet id="action-sheet-dialog" cancelable>
      <ons-action-sheet-button onclick="fn.hideDialog('action-sheet-dialog')" icon="md-square-o">Action 1</ons-action-sheet-button>
      <ons-action-sheet-button onclick="fn.hideDialog('action-sheet-dialog')" icon="md-square-o">Action 2</ons-action-sheet-button>
      <ons-action-sheet-button onclick="fn.hideDialog('action-sheet-dialog')" modifier="destructive" icon="md-square-o">Action 3</ons-action-sheet-button>
      <ons-action-sheet-button onclick="fn.hideDialog('action-sheet-dialog')" icon="md-square-o">Cancel</ons-action-sheet-button>
    </ons-action-sheet>

    <script>
      ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        var toolbarButton = ons.platform.isAndroid() ? ons.createElement(`<ons-icon icon="md-more-vert"></ons-icon>`) : ons.createElement(`<span>More</span>`);
        var infoButton = document.getElementById('info-button');
        infoButton.appendChild(toolbarButton);
        var toastDialog = document.getElementById('toast-dialog');
        toastDialog.parentNode.removeChild(toastDialog);
        document.getElementById('dialogs-page').appendChild(toastDialog);
        var timeoutID = 0;
        window.fn.showDialog = function (id) {
          var elem = document.getElementById(id);
          if (id === 'popover-dialog') {
            elem.show(infoButton);
          } else {
            elem.show();
            if (id === 'modal-dialog') {
              clearTimeout(timeoutID);
              timeoutID = setTimeout(function() { fn.hideDialog(id) }, 2000);
            }
          }
        };
        window.fn.hideDialog = function (id) {
          document.getElementById(id).hide();
        };
        const moreOptions = document.querySelectorAll('.more-options');
        if (!ons.platform.isAndroid()) {
          document.getElementById('watHmmSure-dialog').setAttribute('modifier', 'rowfooter');
          for (option of moreOptions) {
            option.hasAttribute('modifier') ?
              option.setAttribute('modifier', option.getAttribute('modifier') + ' longdivider') :
              option.setAttribute('modifier', 'longdivider');
          }
        } else {
          for (option of moreOptions) {
            option.hasAttribute('modifier') ?
              option.setAttribute('modifier', option.getAttribute('modifier') + ' nodivider') :
              option.setAttribute('modifier', 'nodivider');
          }
        }
      };
      document.getElementById('appNavigator').topPage.onDestroy = function () {
        var toastDialog = document.getElementById('toast-dialog');
        toastDialog.parentNode.removeChild(toastDialog);
        document.querySelector('#dialogs-page .page__content').appendChild(toastDialog);
      }
    </script>

    <style>
      #lorem-dialog .dialog-container {
        height: 200px;
      }

      ons-list-title {
        margin-top: 20px;
      }
    </style>
  </ons-page>
</template>

<template id="buttons.html">
  <ons-page>
    <ons-toolbar>
      <div class="left">
        <ons-back-button>Home</ons-back-button>
      </div>
      <div class="center"></div>
    </ons-toolbar>

    <section style="margin: 16px">
      <ons-button class="button-margin">Normal</ons-button>
      <ons-button modifier="quiet" class="button-margin">Quiet</ons-button>
      <ons-button modifier="outline" class="button-margin">Outline</ons-button>
      <ons-button modifier="cta" class="button-margin">Call to action</ons-button>
      <ons-button modifier="light" class="button-margin">Light</ons-button>
      <ons-button modifier="large" class="button-margin">Large</ons-button>
    </section>

    <section style="margin: 16px">
      <ons-button class="button-margin" disabled>Normal</ons-button>
      <ons-button modifier="quiet" class="button-margin" disabled>Quiet</ons-button>
      <ons-button modifier="outline" class="button-margin" disabled>Outline</ons-button>
      <ons-button modifier="cta" class="button-margin" disabled>Call to action</ons-button>
      <ons-button modifier="light" class="button-margin" disabled>Light</ons-button>
      <ons-button modifier="large" class="button-margin" disabled>Large</ons-button>
    </section>

    <ons-fab position="top right">
      <ons-icon icon="md-face"></ons-icon>
    </ons-fab>

    <ons-fab position="bottom left" disabled>
      <ons-icon icon="md-car"></ons-icon>
    </ons-fab>

    <ons-speed-dial position="bottom right" direction="up" :open.sync="spdOpen">
      <ons-fab>
        <ons-icon icon="md-share"></ons-icon>
      </ons-fab>
      <ons-speed-dial-item onclick="ons.notification.confirm(`Share on Twitter?`)">
        <ons-icon icon="md-twitter"></ons-icon>
      </ons-speed-dial-item>
      <ons-speed-dial-item onclick="ons.notification.confirm(`Share on Facebook?`)">
        <ons-icon icon="md-facebook"></ons-icon>
      </ons-speed-dial-item>
      <ons-speed-dial-item onclick="ons.notification.confirm(`Share on Google+`)">
        <ons-icon icon="md-google-plus"></ons-icon>
      </ons-speed-dial-item>
    </ons-speed-dial>

    <script>
      ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>

    <style>
      .button-margin {
        margin: 6px 0;
      }
    </style>
  </ons-page>
</template>

<template id="carousel.html">
  <ons-page>
    <ons-toolbar>
      <div class="left">
        <ons-back-button>Home</ons-back-button>
      </div>
      <div class="center"></div>
    </ons-toolbar>

    <ons-carousel id="carousel" fullscreen swipeable auto-scroll overscrollable initial-index="0">
      <ons-carousel-item class="carousel-item" style="background-color: gray">
        <div class="color-tag">Gray</div>
      </ons-carousel-item>
      <ons-carousel-item class="carousel-item" style="background-color: #085078">
        <div class="color-tag">Blue</div>
      </ons-carousel-item>
      <ons-carousel-item class="carousel-item" style="background-color: #373B44">
        <div class="color-tag">Dark</div>
      </ons-carousel-item>
      <ons-carousel-item class="carousel-item" style="background-color: #D38312">
        <div class="color-tag">Orange</div>
      </ons-carousel-item>
    </ons-carousel>

    <div class="dots">
      <span id="dot0" class="dot" onclick="fn.swipe(this)">
        &#9679;
      </span>
      <span id="dot1" class="dot" onclick="fn.swipe(this)">
        &#9675;
      </span>
      <span id="dot2" class="dot" onclick="fn.swipe(this)">
        &#9675;
      </span>
      <span id="dot3" class="dot" onclick="fn.swipe(this)">
        &#9675;
      </span>
    </div>

    <script>
      ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        const carousel = document.getElementById('carousel');
        carousel.addEventListener('postchange', function () {
          var index = carousel.getActiveIndex();
          const dots = document.querySelectorAll('.dot');
          for (dot of dots) {
            dot.innerHTML = dot.id === 'dot' + index ? '&#9679;' : '&#9675;';
          }
        });
        window.fn.swipe = function (target) {
          carousel.setActiveIndex(Number(target.id.slice(-1)));
        }
      }
    </script>

    <style>
      .carousel-item {
        display: flex;
        justify-content: space-around;
        align-items: center;
      }

      .color-tag {
        color: #fff;
        font-size: 48px;
        font-weight: bold;
        text-transform: uppercase;
      }

      .dots {
        text-align: center;
        font-size: 30px;
        color: #fff;
        position: absolute;
        bottom: 40px;
        left: 0;
        right: 0;
      }

      .dots > span {
        cursor: pointer;
      }
    </style>
  </ons-page>
</template>

<template id="loadMore.html">
  <!-- Load more items on scroll bottom -->
  <ons-page id="load-more-page" on-infinite-scroll="fn.loadMore">
    <p class="intro">
      Useful for loading more items when the scroll reaches the bottom of the page, typically after an asynchronous API call.<br><br>
    </p>

    <ons-list id="list-node"></ons-list>

    <div class="after-list">
      <ons-icon icon="fa-spinner" size="26px" spin></ons-icon>
    </div>

    <script>
      ons.getScriptPage().onInit = function () {
        var listNode = document.getElementById('list-node');
        var createListItem = function (i) {
          return ons.createElement(`<ons-list-item>Item #${i}</ons-list-item>`);
        }
        for (var i = 0; i < 30; i++) {
          listNode.appendChild(createListItem(i));
        }
        window.fn.loadMore = function (done) {
          setTimeout(function() {
            const listLength = listNode.children.length;
            for (var i = 0; i < 10; i++) {
              listNode.appendChild(createListItem(listLength + i));
            }
            done();
          }, 600)
        }
      }
    </script>

    <style>
      .after-list {
        margin: 20px;
        text-align: center;
      }
    </style>
  </ons-page>
</template>

<template id="lazyRepeat.html">
  <!-- Lazy load thousands of items -->
  <ons-page id="lazy-repeat-page">
    <p class="intro">
      Automatically unloads items that are not visible and loads new ones. Useful when the list contains thousands of items.<br><br>
    </p>

    <ons-list>
      <ons-lazy-repeat id="infinite-list"></ons-lazy-repeat>
    </ons-list>

    <script>
      ons.getScriptPage().onInit = function () {
        var infiniteList = document.getElementById('infinite-list');

        infiniteList.delegate = {
          createItemContent: function (i) {
            return ons.createElement(`<ons-list-item>Item #${i}</ons-list-item>`);
          },
          countItems: function () {
            return 3000;
          }
        };

        infiniteList.refresh();
      }
    </script>

    <style>
      .intro {
        text-align: center;
        padding: 0 20px;
        margin-top: 40px;
      }
    </style>
  </ons-page>
</template>

<template id="infiniteScroll.html">
  <ons-page>
    <ons-toolbar>
      <div class="left">
        <ons-back-button>Home</ons-back-button>
      </div>
      <div class="center"></div>
    </ons-toolbar>

    <ons-tabbar position="auto">
      <ons-tab label="Load More" page="loadMore.html"></ons-tab>
      <ons-tab label="Lazy Repeat" page="lazyRepeat.html" active></ons-tab>
    </ons-tabbar>

    <script>
      ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
  </ons-page>
</template>

<template id="progress.html">
  <ons-page>
    <ons-toolbar>
      <div class="left">
        <ons-back-button>Home</ons-back-button>
      </div>
      <div class="center"></div>
    </ons-toolbar>

    <ons-progress-bar id="progress-value" class="progressStyle" value="0"></ons-progress-bar>

    <section style="margin: 40px 16px">
      <p id="progress-status">
        Progress: 0%
      </p>

      <p>
        <ons-progress-bar class="progressStyle" value="20"></ons-progress-bar>
      </p>

      <p>
        <ons-progress-bar class="progressStyle" value="40" secondary-value="80"></ons-progress-bar>
      </p>

      <p>
        <ons-progress-bar class="progressStyle" indeterminate></ons-progress-bar>
      </p>

      <div style="text-align: center; margin: 40px; color: #666">
        <p>
          <ons-progress-circular class="progressStyle" value="20"></ons-progress-circular>
          <ons-progress-circular class="progressStyle" value="40" secondary-value="80"></ons-progress-circular>
          <ons-progress-circular class="progressStyle" indeterminate></ons-progress-circular>
        </p>

        <p>
          <ons-icon icon="ion-load-a" spin size="30px"></ons-icon>
          <ons-icon icon="ion-load-b" spin size="30px"></ons-icon>
          <ons-icon icon="ion-load-c" spin size="30px"></ons-icon>
          <ons-icon icon="ion-load-d" spin size="30px"></ons-icon>
        </p>

        <p>
          <ons-icon icon="fa-spinner" spin size="26px"></ons-icon>
          <ons-icon icon="circle-o-notch" spin size="26px"></ons-icon>
        </p>

        <p>
          <ons-icon icon="md-spinner" spin size="30px"></ons-icon>
        </p>
      </div>

      <p>
        <ons-button modifier="large">
          <ons-icon icon="ion-load-c" spin size="26px"></ons-icon>
        </ons-button>
        <br><br>
        <ons-button modifier="large" disabled>
          <ons-icon icon="ion-load-c" spin size="26px"></ons-icon>
        </ons-button>
      </p>
    </section>

    <script>
      ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        if (!ons.platform.isAndroid()) {
          const progressStyle = document.querySelectorAll('.progressStyle');
          for (progress of progressStyle) {
            progress.hasAttribute('modifier') ?
              progress.setAttribute('modifier', progress.getAttribute('modifier') + ' ios') :
              progress.setAttribute('modifier', 'ios');
          }
        }
        var progressStatus = document.getElementById('progress-status');
        var progressValue = document.getElementById('progress-value');
        var intervalID = 0;
        intervalID = setInterval(function() {
          if (progressValue.value === 100) {
            clearInterval(intervalID);
            return;
          }
          progressValue.value++;
          progressStatus.innerHTML = `Progress: ${progressValue.value}%`;
        }, 40);
      }
    </script>

    <style>
      /* 'ios' modifier */

      .progress-bar--ios__primary,
      .progress-bar--ios.progress-bar--indeterminate::before,
      .progress-bar--ios.progress-bar--indeterminate::after {
        background-color: #4282cc
      }

      .progress-bar--ios__secondary {
        background-color: #87b6eb;
      }

      .progress-circular--ios__primary {
        stroke: #4282cc
      }

      .progress-circular--ios__secondary {
        stroke: #87b6eb;
      }
    </style>
  </ons-page>
</template>

<template id="transition.html">
  <ons-page>
    <ons-toolbar>
      <div class="left">
        <ons-back-button>Animations</ons-back-button>
      </div>
      <div class="center"></div>
    </ons-toolbar>
    <p style="text-align: center">
      Use the VOnsBackButton
    </p>
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
      <div style="
         display: block; 
         position: fixed;
         margin-left: 0px;
         margin-top: 0px;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         z-index: 999999999999;
         background: #FFF;" id="load_material">
         <div class="row" align="center" style="
            top: 40%;
            position:  absolute;
            left:  0;
            bottom: 60%;
            right: 0;">
            <div class="preloader-wrapper big active">
               <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	</body>
</html>
<script>
      if('<?=$_GET[status];?>'!="his"){ //เช็คว่าสเตตัสที่ส่งมาเป็น ประวัติ หรือ กำลังจัดการ
         $(window).load(function() {
         	$("#load_material").fadeOut(500);
         	 setTimeout(function(){ 
		      	  sendTagIOS(class_user,username);
		    }, 1500);
         });
		}  
      </script>
<script>
//	alert("<?=$user_id;?>")
//	console.log('<?=json_encode($arr[web_user]);?>')
   var detect_mb = "<?=$detectname;?>";
   var class_user = $.cookie("detect_userclass");
   var username = $.cookie("detect_username").toUpperCase();
   console.log(detect_mb+" : "+class_user+" : "+username);
   if(detect_mb == "Android"){
   	 sendTagOs(class_user,username);
   }
   
   function sendTagOs(txt,username) {
   				if (typeof Android !== 'undefined') {
   				Android.sendTag(txt,username);
   			}
   } 
   function deleteTagOs(txt) {
   				if (typeof Android !== 'undefined') {
   				Android.deleteTag(txt);
   			}
   } 

</script>   
<script >
			window.fn = {};

window.fn.toggleMenu = function () {
  document.getElementById('appSplitter').right.toggle();
};

window.fn.loadView = function (index) {
  document.getElementById('appTabbar').setActiveTab(index);
  document.getElementById('sidemenu').close();
};

window.fn.loadLink = function (url) {
  window.open(url, '_blank');
};

window.fn.pushPage = function (page, anim) {
  if (anim) {
    document.getElementById('appNavigator').pushPage(page.id, { data: { title: page.title }, animation: anim });
  } else {
    document.getElementById('appNavigator').pushPage(page.id, { data: { title: page.title } });
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
   var url_load = "load_page_mod.php?name=user&file=index&check_new_user="+check_new_user;
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
.icon { padding-top: 20px; }
p {
   font-family: Arial, Helvetica, sans-serif; font-size:18px;
}
body,td,th {
   font-family: Arial, Helvetica, sans-serif;
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
   border-radius: 50%; background-color:<?=$main_color?>; display: block;
   padding: 10px;
   width: 50px;
   height: 50px;
   color:#FFFFFF;  font-size:24px;
   border: solid 1px #FFFFFF;
   text-align: center;
   vertical-align: middle;
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

<!-- Pricing Tables -->
<div class="hiddendiv common"></div>
<div class="drag-target" data-sidenav="slide-out" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); width: 10px; left: 0px;"></div>
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

