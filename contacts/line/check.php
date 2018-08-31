<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript">
   

    console.log('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
 </script>
 <?
 @session_start();
 include('../../TShare_new/includes/class.mysql.php');
 $db = new DB();
 $db->connectdb('admin_apptshare','admin_MANbooking','252631MANbooking');
 $username_full=$_POST[username];
 $username_short='driver_'.$_POST[username];
 $res[checkcode] = $db->select_query("SELECT * FROM web_driver WHERE id >0  AND username ='".$username_full."' "); 
 $rows[checkcode] = $db->rows($res[checkcode]); 
 if($rows[checkcode]){
   $arr[checkcode] = $db->fetch($res[checkcode]);

 }
 if($arr[checkcode][id]){
   ?>
   <script>
    $( "#popup_work_main_menu" ).show();
  </script>
  <?
}


else{ ?>
 <div style="padding:10px; background-color:#FF0000 ; border-radius: 25px; font-weight:normal"><font color="#FFFFFF"><center>
 ไม่มีชื่อในระบบ</font> </div>
 <?
}
?>



<div id="popup_work_main_menu"    style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:999999; background-color:#FFFFFF; position:fixed;  display:none; margin-top:0px; overflow:hidden">


  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>

      <td   ><table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td height="50" align="center" bgcolor="#f7f7f8" style="font-size:20px; color:#333"><b>ยืนยันตัวตนของคุณ</td>
            </tr>
          </tbody>
        </table></td>
      </tr>
    </table>





    <div   id="load_work_main_menu"   style="margin-top: 0px; height:100%; overflow:auto; padding-bottom:50px;padding: 16px 35px;  "  >

     <table width="100%" border="0" cellspacing="2" cellpadding="2">
       <tbody>
         <tr>
           <td align="center"><font style='font-size:22px'>คุณแน่ใจหรือไม่ว่าคุณคือ<b></td>
           </tr>
           <tr>
             <td align="center"><font style='font-size:20px; color:#FF0000'><?=$arr[checkcode][name]?> (<?=$arr[checkcode][nickname]?>)</font ><center>        <img src='../../data/pic/driver/small/<?=$arr[checkcode][username];?>.jpg'  width='150'     class='IMGSHOP'  style='border-radius: 15px;border: 2px solid #dadada;margin-top:10px'  /></td>
             </tr>
             <tr>
               <td align="center" style="padding-top: 50px;"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                 <tbody>
                   <tr>
                     <td width="50%"><button type="button" class="btn btn-warning btn-lg" style="width:100%;border-radius: 25px;"  id="active_no">ไม่แน่ใจ</button></td>
                     <td width="50%"><button type="button" class="btn " style="color: #fff;
    padding: 10px;
    font-size: 18px;
    width: 100%;
    border-radius: 25px;
    background-color: #3b5998;" id="active_yes">แน่ใจ</button></td>
                   </tr>
                 </tbody>
               </table></td>
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
  function getParameterByName(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      console.log(name)
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    console.log(getParameterByName('code'))
    var state = getParameterByName('state');
    console.log(location.href)
    console.log(state)
    var geturl = location.href;
    console.log(geturl)

  $('#active_yes').click(function(){ 
   $.ajax({
    type: 'POST',
    url: 'curl_updatelinenoti.php',
    data: { code: getParameterByName('code'),user: '<?=$username_full;?>',url2:geturl},
            //contentType: "application/json",
            dataType: 'json',
            success: function(res) {
              console.log(res)
              console.log(res.status)
              console.log(res.user)
              if (res.status == 200 ) {


                 $.post('call_back.php?driver='+res.user,function(response){
                   $('#sendlogin').html(response);
                 });
              }
               //  swal({
               //    title: "ทำรายการสำเร็จ!",
               //    text: "",
               //    html: false,
               //    type: "success"
               // },
               // function () {
               //    $('.close-small-popup').click();
               //    $('.button-close-popup-mod').click();
               //    location.href='https://www.welovetaxi.com/app/TShare_new';
               // });
                //console.log(getParameterByName('code'))
              }
            });  

    // window.location.href = "https://goldenbeachgroup.com/app/crontab/line/authorize.php?driver=<?=$arr[checkcode] [id]?>"; 	  

  //  $( "#popup_work_main_menu" ).html('');

});
</script>
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