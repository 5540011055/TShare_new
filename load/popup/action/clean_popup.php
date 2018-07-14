<style>
.title {
    text-align: center;
    position: relative;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -webkit-flex-shrink: 10;
    -ms-flex-negative: 10;
    flex-shrink: 10;
    font-weight: 500;
    display: inline-block;
    font-size: 17px;
    margin: 0;
    line-height: 1.2;
    z-index: 1;
}
</style>
<?php 
if($_GET[ios]==1){
		$display_back_btn = "display:none;";
	}else{
		$display_back_btn = "";
	}
?>
<div id="main_load_mod_popup_clean" style="display: none;">
<div style="width: 100%;background-color: #f7f7f8;
    height: 44px;
    z-index: 102;
    position: absolute;
    top: 0;
    transform: translate3d(0,0,0);
    border-bottom: 1px solid #e8e6e6;
    <?=$display_back_btn;?>
    ">
    <div class="back-full-popup" style="">
	  <div class="left" style="padding: 5px;position: fixed;z-index: 106;" >
        <a class="link back" onclick="backMain();">
            <div class="" style="color: #333"><i class="fa fa-close" style="font-size:22px;"></i></div>
        	<!-- <i class="fa fa-angle-left" style="font-size:20px;font-weight: 600;"></i>
          	<span class="ios-only" style="margin-left: 5px;font-size: 17px;">กลับ</span> -->
        </a>
      </div>
      <div class="title font-24" style="margin-top: 8px;width: 100%;" align="center" ><b><span id="header_clean" ></span></b></div>
    </div>
</div>
<div class="css-full-popup " id="load_mod_popup_clean" style="position:fixed;overflow-y: scroll;-webkit-overflow-scrolling: touch;z-index:101  "> 
<?  /// include "load/loading/page_main.php" ; ?>
</div>

</div>
