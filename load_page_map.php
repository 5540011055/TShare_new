<?php @header ('Content-type: text/html; charset=utf-8'); 
@session_start();
require_once("mainfile.php");
$PHP_SELF = "index.php";
GETMODULE($_GET[name],$_GET[file]);
 //require_once("js/control.php");

?>    
  <?php 
 $txt = t_maps;
  ?>
  <script>
    	
  $('.button-close-popup-map').click(function(){   
	console.log(1);
    $( "#main_load_mod_popup_map" ).hide();
    $( "#load_mod_popup_map" ).html('');
    
    $( "#load_mod_popup_map" ).html('');
    
    $( ".bottom_popup" ).show();
	
  });
  </script>

  <div style="top:0px; padding:0px; overflow: auto; width:100% ;height: 100%;" id="load_page_map_touse">   
  <? include ("".$MODPATHFILE.""); ?>
  </div>
