<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <?php if(0==1){ ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<? } ?>
    <style>
	  .gmnoprint{
	  	display: none !important;
	  }
	  img[src^="https://maps.gstatic.com/mapfiles/api-3/images/google_white5_hdpi.png"]{
	  	display: none !important;
	  }
      #map {
        height: 100%;
      }
       .popup-tip-anchor {
        height: 0;
        position: absolute;
        /* The max width of the info window. */
        width: 200px;
      }
      
      .popup-bubble-anchor {
        position: absolute;
        width: 100%;
        bottom: /* TIP_HEIGHT= */ 8px;
        left: 0;
      }
      /* Draw the tip. */
      .popup-bubble-anchor::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        /* Center the tip horizontally. */
        transform: translate(-50%, 0);
        /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
        width: 0;
        height: 0;
        /* The tip is 8px high, and 12px wide. */
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: /* TIP_HEIGHT= */ 8px solid white;
      }
      /* The popup bubble itself. */
      .popup-bubble-content {
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, -100%);
        /* Style the info window. */
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        font-family: sans-serif;
        overflow-y: auto;
        max-height: 60px;
        box-shadow: 0px 2px 10px 1px rgba(0,0,0,0.5);
      }
      .marker {
  width: 100px;
  height: 100px;
  position: absolute;
  top: -50px;
  /*positions our marker*/
  left: -50px;
  /*positions our marker*/
  display: block;
}
	  .marker-place {
		  position: absolute;
		  top: -10px;
		  left: -20px;
		  display: block;
		  color: #3b5998;
		  border: 1px solid #ddd;
		  background-color : #fff;
		  border-radius : 30px;
		  width : 45px;
		  height : 45px;
		  box-shadow : 2px 2px 5px #999999;
		}
	  .active-marker-place{
			background-color : #666666;
			color:  #fff;
		}
		
	  .pin {
  width: 20px;
  height: 20px;
  position: relative;
  top: 38px;
  left: 38px;
  background: rgba(5, 124, 255, 1);
  border: 2px solid #FFF;
  border-radius: 50%;
  z-index: 1000;
}
	  .pin-effect {
  width: 100px;
  height: 100px;
  position: absolute;
  top: 0;
  display: block;
  background: rgba(5, 124, 255, 0.6);
  border-radius: 50%;
  opacity: 0;
  animation: pulsate 2400ms ease-out infinite;
}
	  @keyframes pulsate {
  0% {
    transform: scale(0.1);
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
  100% {
    transform: scale(1.2);
    opacity: 0;
  }
}
	  .material-icons{
	    font-style: normal;
    font-size: 24px;
    line-height: 1;
    letter-spacing: normal;
    text-transform: none;
    display: inline-block;
    white-space: nowrap;
    word-wrap: normal;
    direction: ltr;
}
	  .but_map-menu{
	  	background-color: rgb(255, 255, 255);
	    border: none;
	    outline: none;
	    width: 40px;
	    height: 40px;
	    border-radius: 25px;
	    box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px;
	    cursor: pointer;
	    right: 15px;
	    padding: 0px;
	  }
	  .popup-pin{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        /* Center the tip horizontally. */
        transform: translate(-50%, 0);
        /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
        width: 0;
        height: 0;
        /* The tip is 8px high, and 12px wide. */
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: /* TIP_HEIGHT= */ 8px solid white;
      }
    </style>
 	<script>
	$('.text-topic-action-photo').html('<?echo t_maps?>');
</script>
  </head>
  <body >
    <div id="map" ></div>
	
	<input type="hidden" value="<?=$_GET[province];?>" id="select_pv"/>
	<input type="hidden" value="<?=$_GET[lat_cen];?>" id="lat_center"/>
	<input type="hidden" value="<?=$_GET[lng_cen];?>" id="lng_center"/>
	<input type="hidden" value="<?=$_GET[user_id];?>" id="user_id"/>
	
	<div style="position: fixed;bottom: 15px;right: 0px;width:  auto;">
	<div id="current_location" display="hidden" class="marker" style="display: none;">
	  <div class="pin"></div>
	  <div class="pin-effect"></div>
	</div>
	<div id="btn_CurrentLocation" style="z-index: 0; position: absolute; right: 20px; bottom: 190px; color: rgb(35, 35, 35);">
		<button title="Your Location" class="but_map-menu">
		<i class="material-icons" style="margin: 5px;font-weight: 800;"><i class="fa fa-map-marker" style="font-size: 25px;"></i></i>
		</button>
	</div>
	<div id="btn_popup_filter" style="z-index: 0; position: absolute; right: 20px; bottom: 130px; color: rgb(35, 35, 35);">
		<button class="but_map-menu">
		<i class="material-icons" style="margin: 5px;font-weight: 800;"><i class="fa fa-search" style="font-size:20px;"></i></i>
		</button>
	</div>
	<div id="btn_popup_setting" style="z-index: 0; position: absolute; right: 20px; bottom: 70px; color: rgb(35, 35, 35);">
		<button class="but_map-menu">
		<i class="material-icons" style="margin: 5px;font-weight: 800;"><i class="fa fa-picture-o" style="font-size:20px;"></i></i>
		</button>
	</div>
	<div id="btn_popup_name_marker" style="z-index: 0; position: absolute; right: 20px; bottom: 70px; color: rgb(35, 35, 35);display: none;">
		<button class="but_map-menu">
		<i class="material-icons" style="margin: 5px;font-weight: 800;"><i class="fa fa-cog" style="font-size:20px;"></i></i>
		</button>
	</div>
	</div>
		<script>
			$('#btn_popup_setting').click();
		</script>
<script>
   		
       var map, infoWindow;
       var markerCircle ;
       var circle;
       var markerPlace;
       var markerNamePlace;
       var pv = $('#select_pv').val();
       var marker;
	   var txt_select = 'เลือก';	
	   
      initMap();
      
      function initMap() {
      	definePopupClass();
      	var lat_center = $('#lat_center').val();
      	var lng_center = $('#lng_center').val();
        map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: parseInt(lat_center), lng: parseInt(lng_center) },
        zoom: 12,
        disableDefaultUI: true,
        mapTypeControl: false,
        mapTypeId: 'roadmap',
        //   gestureHandling: 'coopergreedyative'
        gestureHandling: 'greedy',
        streetViewControl: false,
        fullscreenControl: false,
        styles: [{
                "featureType": "administrative",
                "stylers": [{
                    "weight": 2
                }]
            },
            	{
                "featureType": "landscape",
                "stylers": [{
                    "color": "#efefef"
                }]
            },
            	{
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#d3d3d3"
                }]
            },
            	{
                "featureType": "landscape",
                "elementType": "labels.text",
                "stylers": [{
                        "color": "#595959"
                    },
                    {
                        "weight": 3.5
                    }
                ]
            },
            	{
                "featureType": "landscape",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#ffffff"
                }]
            },
            	{
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#c0c0c0"
                }]
            }
        ]
    });   
         
          
		setMarker();
		
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
			markerCircle.setPosition(pos);
            map.setCenter(pos);
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        
        
      }
		
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
      
      function setMarker(){
		markerCircle = new google.maps.Marker({
	        position: map.getCenter(),
	        icon: {
	            path: google.maps.SymbolPath.CIRCLE,
	            scale: 6.5,
	            fillOpacity: 1,
	            strokeWeight: 1,
	            fillColor: '#1b8cfe',
	            strokeColor: '#ffffff'
	        },
	        draggable: false,
	        map: map
	    });
	    circle = new google.maps.Circle({
	        strokeColor: '#2673f2',
	        strokeOpacity: 0.2,
	        strokeWeight: 1,
	        fillColor: '#4285F4',
	        fillOpacity: 0.25,
	        map: map,
	        radius: Math.sqrt(1) * 30
	    });
	    circle.bindTo('center', markerCircle, 'position');


	  }
	
	  $('#btn_CurrentLocation').click(function() {
	    var i = 0;
	    var animationInterval = setInterval(function() {
	        if (i == 1) {
	            i = 0;
	            $('#btn_CurrentLocation').css("color", 'rgb(35,35,35)');
	            console.log(1);
	        } else {
	            i = 1;
	            $('#btn_CurrentLocation').css('color', 'rgb(170,170,170)');
	            console.log(2);
	        }
	    }, 500);
	    if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(function(position) {
	            var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	            map.panTo(latlng);
	            markerCircle.setPosition(latlng);
	            setTimeout(function() {

	                console.log(position)
	                smoothZoom(map, 15, map.getZoom());
	                //	          map.setZoom(16);
	//                $('#btn_CurrentLocation').hide('500');
	                $('#btn_CurrentLocation').css('color', 'rgb(35,35,35)');
	            }, 1000)
	            clearInterval(animationInterval);
	            $('#btn_CurrentLocation').css('color', 'rgb(0,132,212)');
	        });
	    } else {
	        clearInterval(animationInterval);
	        $('#btn_CurrentLocation').css('color', 'rgb(35,35,35)');
	    }
	});

		function smoothZoom(map, max, cnt) {
		    if (cnt >= max) {
		        return;
		    } else {
		        z = google.maps.event.addListener(map, 'zoom_changed', function(event) {
		            google.maps.event.removeListener(z);
		            smoothZoom(map, max, cnt + 1);
		        });
		        setTimeout(function() { map.setZoom(cnt) }, 150); // 80ms is what I found to work well on my system -- it might not work well on all systems
		    }
		}



		/** Defines the Popup class. */
		function definePopupClass() {
  /**
   * A customized popup on the map.
   * @param {!google.maps.LatLng} position
   * @param {!Element} content
   * @constructor
   * @extends {google.maps.OverlayView}
   */
  Popup = function(position, content) {
    this.position = position;

    content.classList.add('popup-bubble-content');

    var pixelOffset = document.createElement('div');
    pixelOffset.classList.add('popup-bubble-anchor');
    pixelOffset.appendChild(content);

    this.anchor = document.createElement('div');
    this.anchor.classList.add('popup-tip-anchor');
    this.anchor.appendChild(pixelOffset);

    // Optionally stop clicks, etc., from bubbling up to the map.
    this.stopEventPropagation();
  };
  // NOTE: google.maps.OverlayView is only defined once the Maps API has
  // loaded. That is why Popup is defined inside initMap().
  Popup.prototype = Object.create(google.maps.OverlayView.prototype);

  /** Called when the popup is added to the map. */
  Popup.prototype.onAdd = function() {
    this.getPanes().floatPane.appendChild(this.anchor);
  };

  /** Called when the popup is removed from the map. */
  Popup.prototype.onRemove = function() {
    if (this.anchor.parentElement) {
      this.anchor.parentElement.removeChild(this.anchor);
    }
  };

  /** Called when the popup needs to draw itself. */
  Popup.prototype.draw = function() {
    var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);
    // Hide the popup when it is far out of view.
    var display =
        Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
        'block' :
        'none';

    if (display === 'block') {
      this.anchor.style.left = divPosition.x + 'px';
      this.anchor.style.top = divPosition.y + 'px';
    }
    if (this.anchor.style.display !== display) {
      this.anchor.style.display = display;
    }
  };

  /** Stops clicks/drags from bubbling up to the map. */
  Popup.prototype.stopEventPropagation = function() {
    var anchor = this.anchor;
    anchor.style.cursor = 'auto';

    ['click', 'dblclick', 'contextmenu', 'wheel', 'mousedown', 'touchstart',
     'pointerdown']
        .forEach(function(event) {
          anchor.addEventListener(event, function(e) {
          	
			if(event=='touchstart'){
				console.log(e);
				console.log(e.target.id);
				var id = e.target.id;
				var res = id.split('_');
				console.log(res[1]);
				CheckDetail(res[1]);
			}
			
            e.stopPropagation();
          });
        });
  };
}
		
		
</script>
    
<div id="broModal" class="modal" style="font-size: 0px!important; color: #000000 !important;height: 100%">
  <span class="close" style="position: fixed;
    color: #f4f4f4;
    right: 15px;
    font-size: 40px; display: none;
   " id="closeModal" >&times;</span>
   <i class="fa fa-times" aria-hidden="true" style="position: fixed;
    color: #f4f4f4;
    right: 15px;
    font-size: 40px;
    z-index: 9000;
   " id="close_modal" onclick="closeModal();"></i>
  <div class="modal-content" id="img01"> </div>
 
</div>

<style>
	.map-search-modal{
	  font-size: 0px; 
	  color: #000000;
	  transition:0.27s;
	  height:0px;
	  display: block;
	  position: fixed;
	  top: 50px;
	  right: 0;
	  bottom: 0;
	  left: 0;
	  z-index: 0;
	  overflow: hidden;
	  -webkit-overflow-scrolling: touch;
	  outline: 0;
	  background-color : #fff;
	  box-shadow: 1px 2px 10px #666;
	}
	.box-show-place{
		border: 1px solid #ddd;  
		padding: 2px;  
		box-shadow: 1px 1px 3px #ddd;
		border-radius: 15px;
		margin-bottom:5px;
		width: 100%;
	}
</style>

<input type="hidden" value="0" id="check_broM"/>
<input type="hidden" value="0" id="check_switch_mod_show"/>

<div id="mapModal" class="map-search-modal">
		<div style="width: 100%;padding-left: 10px;padding-right: 10px;padding-top: 5px;padding-bottom:  5px;">
			<table width="100%">
  				<tr>
  					<td>
  				<input class="search-box-shop" id="search_shop" onkeyup="SearchPlace();" value="" placeholder="<?=t_search_by_place;?>" style=" border-radius: 15px; width:100%;padding:10px;height:35px;">
  				<i class="fa fa-search" aria-hidden="true" style="position:  absolute;right: 30px;top: 15px;font-size: 20px;" ></i>
  					</td>
  				</tr>
  				</table>
		</div>
	<div style="padding: 5px 15px;height: 210px;overflow:  scroll;display: nones;" id="box_result_search">

	</div>
</div>

<div id="infowindow_event" class="map-search-modal" style="background-color:#3333338f;display:none;
padding-bottom:65px;overflow: scroll;top:0px;padding-top:65px;height: 100%;padding-left:15;padding-right: 15px;" >

	<div style="padding: 10px;margin-top: 0px;padding: 15px;background-color:#fff;box-shadow:1px 2px 3px #999;
	border-bottom-left-radius : 28px;
	border-bottom-right-radius : 28px;
	border-top-left-radius : 28px;">
		<span class="close" style="position: absolute;color: #110000;right: 30px;top:65px;font-size: 45px; display: nones;" id="closeInfowindow" >&times;</span>
		<div id="body_show_infowindow">
			
		</div>
	</div>
</div>
       <script src="https://cdn.rawgit.com/googlemaps/js-rich-marker/gh-pages/src/richmarker.js?v=<?=time();?>"></script>
  </body>
</html>
