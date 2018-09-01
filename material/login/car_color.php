<ons-list id="kitten-list" class="list">
	      <ons-list-header class="list-header"><b class="font-14">ที่นิยม</b></ons-list-header>
<?php 
	if($_GET[plate]>0){
		foreach($_POST[data] as $val){ 
		if($val[plate]>0){ ?>
		
	    <ons-list-item id="item_plate_color_<?=$val[id];?>" class="list-item" onclick="selectPlateColor('<?=$val[id];?>','<?=$val[name_th];?>');" data-img="<?=$val[img];?>">
	            <div class="left list-item__left">
	                <img class="list-item__thumbnail" src="../img/<?=$val[img];?>" style="border: 1px solid #eee;">
	                <!--<span class="brand-small list-item__thumbnail" style="<?=$img_pos;?>" ></span>-->
	            </div>
	            <div class="center list-item__center"><?=$val[name_th];?></div>
	    </ons-list-item>
	    
		<?	}	?>
<?php }
	}else{
		
	foreach($_POST[data] as $val){ 
		
	?>
	    <ons-list-item id="item_car_color_<?=$val[id];?>" class="list-item" onclick="selectCarColor('<?=$val[id];?>','<?=$val[name_th];?>');" data-img="<?=$val[img];?>">
	            <div class="left list-item__left">
	                <img class="list-item__thumbnail" src="../img/<?=$val[img];?>" style="border: 1px solid #eee;">
	                <!--<span class="brand-small list-item__thumbnail" style="<?=$img_pos;?>" ></span>-->
	            </div>
	            <div class="center list-item__center"><?=$val[name_th];?></div>
	    </ons-list-item>

<?php }

	}
?>
	
</ons-list>