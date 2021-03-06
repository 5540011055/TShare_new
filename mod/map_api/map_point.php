<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <!--<script src="https://cdn.rawgit.com/googlemaps/js-rich-marker/gh-pages/src/richmarker.js"></script>-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
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
  	<?php 
 if($_GET[type]=='driver_topoint'){		
     	$lat_col = "driver_topoint_lat";
     	$lng_col = "driver_topoint_lng";
     	$date = "driver_topoint_date";
    }
    else if($_GET[type]=='guest_receive'){		
      	$lat_col = "driver_pickup_lat";
     	$lng_col = "driver_pickup_lng";
     	$date = "guest_receive_date";
    } 
    else if($_GET[type]=='guest_register'){		
      	$lat_col = "driver_register_lat";
     	$lng_col = "driver_register_lng";
     	$date = "guest_register_date";
    } 
   /* else if($_GET[type]=='driver_pay_report'){		
     	$lat_col = "driver_register_lat";
     	$lng_col = "driver_register_lng";
    }*/
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[book] = $db->select_query("SELECT ".$lat_col.",".$lng_col.",".$date.",drivername FROM  order_booking  where id = '".$_GET[order_id]."'  ");
 $arr[book] = $db->fetch($res[book]);

$res[projectdriver] = $db->select_query("SELECT name,nickname,phone,name_en,username FROM web_driver WHERE id='".$arr[book][drivername]."'    "); 
 $arr[projectdriver] = $db->fetch($res[projectdriver]);
  	?>
    <div id="map" ></div>
	<input type="hidden" id="lat_map_point" value="<?=$arr[book][$lat_col];?>" />
	<input type="hidden" id="lng_map_point" value="<?=$arr[book][$lng_col];?>" />
	<input type="hidden" id="tttt" value="<?="SELECT ".$lat_col.",".$lng_col." FROM  order_booking  where id = '".$_GET[order_id]."'  "?>" />
	<div style="position: fixed;bottom: 15px;right: 0px;width:  auto;">
	<div id="current_location" display="hidden" class="marker" style="display: none;">
	  <div class="pin"></div>
	  <div class="pin-effect"></div>
	</div>
	<!--<div id="btn_CurrentLocation" style="z-index: 0; position: absolute; right: 20px; bottom: 190px; color: rgb(35, 35, 35);">
		<button title="Your Location" class="but_map-menu">
		<i class="material-icons" style="margin: 5px;font-weight: 800;"><i class="fa fa-map-marker" style="font-size: 25px;"></i></i>
		</button>
	</div>-->
	</div>

<!--<div id="marker" display="hidden" class="marker">
  <div class="pin"></div>
  <div class="pin-effect"></div>
</div>-->
<div class="row" style="position: fixed; bottom: 0px;right: 0px;margin-bottom: 0px;" id="box_show_detail">
    <div class="col s12 m6">
      <div class="card blue-grey darken-2">
        <div class="card-content white-text" style="padding: 10px;    color: #fff !important;">
          <span class="card-title font-22" style="margin-bottom: 0px;">รายละเอียด</span>
          <p class="font-20"><?php echo $arr[projectdriver][name]." (".$arr[projectdriver][username].")"; ?><br>
          <?php echo "เวลา ".date("Y:m:d H:i:s",$arr[book][$date])." น"; ?>
          </p>
        </div>
       
      </div>
    </div>
  </div>

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
      	
      	var lat_center = $('#lat_map_point').val();
      	var lng_center = $('#lng_map_point').val();
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
         
          
		
		
		var ip_lat = $('#lat_map_point').val();
		var ip_lng = $('#lng_map_point').val();
		var pos = {
              lat: parseFloat(ip_lat),
              lng: parseFloat(ip_lng)
            };
            console.log(pos)
            setMarker();
            marker.setPosition(pos);
//			markerCircle.setPosition(pos);
			
			
            map.setCenter(pos);
			
			
			setTimeout(function(){ smoothZoom(map, 18, map.getZoom()); }, 500);
	}
      
      function setMarker(){
		/*markerCircle = new google.maps.Marker({
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
	    circle.bindTo('center', markerCircle, 'position');*/
		
		  marker = new google.maps.Marker({
          map: map,
          title: 'Hello World!'
        });

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
		
		
</script>

       
  </body>
</html>
