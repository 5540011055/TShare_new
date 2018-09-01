 <?php header ('Content-type: text/html; charset=utf-8');  

 include('../../TShare_new/includes/class.mysql.php');
 $db = new DB();
 $db->connectdb('admin_apptshare','admin_MANbooking','252631MANbooking');

 $tb_admin_chk = "web_driver";

$res[checkcode] = $db->select_query("SELECT * FROM web_driver WHERE id >0  AND username ='".$_GET['driver']."' "); 
$rows[checkcode] = $db->rows($res[checkcode]); 
	$arr[checkcode] = $db->fetch($res[checkcode]);
  
  echo $_POST['driver'];
  
  
?>
 
 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ลงทะเบียนสำเร็จ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
  
  
  
  
  
  
  
<style>
	#popup_work_main_menu {
	position: fixed;  
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	 overflow:hidden;
	/*background: url('images/loader.gif') 50% 50% no-repeat rgb(249,249,249); */background-color:#FFFFFF
}
.back-full-popup
{ 
font-size:22px;   padding:10px;  color:#FFFFF;  width:100%; background-color:<?=$maincolor?>;      
 border-top: 0px solid #000000; margin-bottom: 0px;  
  top:  0; position:fixed;
    z-index: 1; 
 
}
</style>
  
  <div id="popup_work_main_menu"    style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:999999; background-color:#FFFFFF; position:fixed;  display:nones; margin-top:0px; overflow:hidden">
  
    
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    
  <td   ><table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tbody>
      <tr>
        <td height="50" align="center" bgcolor="#16C464" style="font-size:22px; color:#FFFFFF"><b>ลงทะเบียนสำเร็จ</td>
        </tr>
      </tbody>
  </table></td>
    </tr>
</table>
 

 
 
 
 <div   id="load_work_main_menu"   style="margin-top: 0px; height:100%; overflow:auto; padding-bottom:50px;  "  ><br>
   <table width="100%" border="0" cellspacing="5" cellpadding="5">
   <tbody>
     <tr>
       <td align="center"><font style='font-size:22px'>คุณ<?=$arr[checkcode][name]?> (<?=$arr[checkcode][nickname]?>)<b></td>
     </tr>
     <tr>
       <td align="center"><font style='font-size:20px; color:#FF0000'>กาารลงทะเบียนของคุณสำเร็จแล้ว</font ><center>        <img src='../../data/pic/driver/small/<?=$arr[checkcode][username];?>.jpg'  width='150'     class='IMGSHOP'  style='border-radius: 15px;border: 2px solid #dadada;margin-top:10px'  /></td>
     </tr>
     <tr>
       <td align="center"> กรุณาปิดหน้าต่างเพื่อเข้าสู่ระบบไลน์</td>
     </tr>
   </tbody>
 </table>
 </div> 
 
 
              
				                </div>
  <script>
    	
  $('#active_no').click(function(){   
 
   $( "#popup_work_main_menu" ).hide();
 
  //  $( "#popup_work_main_menu" ).html('');

     	});
  </script>
  
    <script>
    	
  $('#active_yes').click(function(){   
 
window.location.href = "https://welovetaxi.com/app/contacts/line?driver=<?=$arr[checkcode] [id]?>"; 	  
 
  //  $( "#popup_work_main_menu" ).html('');

     	});
  </script>
  </body>
</html>
