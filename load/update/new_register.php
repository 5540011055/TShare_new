 
<script>
 
 setInterval(function() {
 //alert(0);
 var url_check_user_online_update = "go.php?name=load/update/register&file=new&driver=<?=$user_id?>";
 $('#check_new_online_register').load(url_check_user_online_update);
 //alert(0);
  
}, 5000); // 60000 milliseconds = one minute
 
	</script>
	<div id="check_new_online_register"></div> 