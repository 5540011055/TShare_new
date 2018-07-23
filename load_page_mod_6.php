<?php @header ('Content-type: text/html; charset=utf-8'); 
@session_start();
require_once("mainfile.php");
$PHP_SELF = "index.php";
GETMODULE($_GET[name],$_GET[file]);
 //require_once("js/control.php");
?>

<div style="top:0px; padding:0px; overflow: auto; width:100%; padding-bottom:0px;padding-top: 10px;   ">
    <? include ("".$MODPATHFILE.""); ?>
</div>
<?
 ///  include ("css/maincss.php");
  ?>