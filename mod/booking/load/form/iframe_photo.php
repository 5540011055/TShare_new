<div style="margin-top: 15px; height:100%; overflow:hidden;  ">
<?php
if($_GET[type]=='slip'){
	$src = "mod/slide/photo_slip.php?id=".$_GET[id]."&type=slip&date=".$_GET[date];
}
else if($_GET[type]=='slip_trans'){
	$src = "mod/slide/photo_slip.php?id=".$_GET[id]."&type=slip_trans&date=".$_GET[date];
}
else{
	$src = "mod/slide/photo.php?id=".$_GET[id]."&type=".$_GET[type]."&date=".$_GET[date]."&plan=".$_GET[plan];
}
?>
<iframe src="<?=$src;?>" style="border:0" width="100%" height="100%"></iframe>
</div>
<script>
	$('.text-topic-action-photo').html('<span class="text-cap text-resize"><?=t_photo;?></span>');
</script>