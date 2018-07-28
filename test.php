<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
<link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
<script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
	<body>
		<ons-navigator swipeable id="myNavigator" page="page1.html"></ons-navigator>

<template id="page1.html">
  <ons-page id="page1">
    <ons-toolbar>
      <div class="center">Page 1</div>
    </ons-toolbar>
	
    <p>This is the first page.</p>

    <ons-button id="push-button">Push page</ons-button>
    
    
  </ons-page>
</template>

<template id="page2.html">
  <ons-page id="page2">
    <ons-toolbar>
      <div class="left"><ons-back-button>Page 1</ons-back-button></div>
      <div class="center"></div>
    </ons-toolbar>

    <p>This is the second page.</p>
    <ons-page>
  <ons-button onclick="showAlert()">Alert</ons-button>
  <ons-button onclick="showConfirm()">Confirm</ons-button>
  <ons-button onclick="showPrompt()">Prompt</ons-button>
  <ons-button onclick="showToast()">Toast</ons-button>
</ons-page>
  </ons-page>
</template>
	</body>
	<script>
		document.addEventListener('init', function(event) {
  var page = event.target;

  if (page.id === 'page1') {
    page.querySelector('#push-button').onclick = function() {
      document.querySelector('#myNavigator').pushPage('page2.html', {data: {title: 'Page 2'}});
    };
  } else if (page.id === 'page2') {
    page.querySelector('ons-toolbar .center').innerHTML = page.data.title;
  }
});
	var showAlert = function() {
  ons.notification.alert('Alert!');
};

var showConfirm = function() {
  ons.notification.confirm('Confirm!')
};

var showPrompt = function() {
  ons.notification.prompt('Prompt!')
    .then(function(input) {
      var message = input ? 'Entered: ' + input : 'Entered nothing!';
      ons.notification.alert(message);
    });
};

var showToast = function() {
  ons.notification.toast('Toast!', {
    timeout: 2000
  });
};

	</script>
</html>