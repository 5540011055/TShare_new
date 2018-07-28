<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<style>
	#myPopup-popup{
		height: 100% !important;
		width: 100% !important;
		position: fixed;
		left: 0px !important;
		max-width: unset !important;
	}
	#myPopup{
		height: 100% !important;
/*		width: 100% !important;*/
	}
	
	#myPopup2-popup2{
		height: 100% !important;
		width: 100% !important;
		position: fixed;
		left: 0px !important;
		max-width: unset !important;
	}
	#myPopup2{
		height: 100% !important;
/*		width: 100% !important;*/
	}
</style>
<div data-role="page">
  <div data-role="header">
    <h1>Welcome To My Homepage</h1>
  </div>

  <div data-role="main" class="ui-content">
    <p>This is a demonstration of all available transition effects for popups.</p>
    <p><b>Note:</b> For performance reasons, jQuery Mobile recommend using "pop", "fade" or "none" for smooth and fast animations.</p>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="fade">Fade</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="flip">Flip</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="flow">Flow</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="pop">Pop</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="slide">Slide</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="slidefade">Slidefade</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="slideup">Slide up</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="slidedown">Slide down</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="turn">Turn</a>
    <a href="#myPopup" data-rel="popup" class="ui-btn" data-transition="none" >No transition</a>

    <div data-role="popup" id="myPopup" class="ui-content">
      <a data-rel="back"><i class="fa fa-times" aria-hidden="true" style="font-size: 26px;position: absolute;right: 15px;top: 10px;"></i></a>
      <div style="margin-top: 10px"><p>This is a simple popup.</p>
      <a href="#myPopup2" data-rel="popup2" class="ui-btn" data-transition="slide">Slide</a>
      </div>
    </div>
  
  </div>

  <div data-role="footer">
    <h1>Footer Text</h1>
  </div>
</div> 

</body>
</html>
