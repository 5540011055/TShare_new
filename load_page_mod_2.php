<?php @header ('Content-type: text/html; charset=utf-8'); 
   @session_start();
   require_once("mainfile.php");
   $PHP_SELF = "index.php";
   GETMODULE($_GET[name],$_GET[file]);
    //require_once("js/control.php");
   ?>  
<script>
   $('.button-close-popup-mod-2').click(function(){   
    $( "#main_load_mod_popup_2" ).hide();
     $( "#load_mod_popup_2" ).html('');
//    	var url_load = "load_page_mod.php?name=booking/load&file=work_all&driver=<?=$user_id?>&day=<? echo date('Y-m-d');?>";
//        $("#load_booking_data").load(url_load);
      	});
</script>
<div style="top:0px; padding:10px; overflow: auto; width:100% ; padding-bottom:0px;   ">   
   <? include ("".$MODPATHFILE.""); ?>
</div>
<?
   //   include ("css/maincss.php");
    ?>