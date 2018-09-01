<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ตรวจสอบข้อมูล</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>

<body>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="../../driver_master/bootstrap/css/bootstrap.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tbody>
      <tr>
        <td height="50" align="center" bgcolor="#f7f7f8" style="font-size:20px; color:#333"><b id="title"></b></td>
        </tr>
      </tbody>
    </table>
    <br>
    <div id="">
    <form method="post" id="login_form"  enctype="multipart/form-data" style="padding: 16px 35px;">
      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
        <tbody>
          <tr>
            <td align="center" style="font-size:18px; "><strong>กรอกชื่อผู้ใช้งานแอพ T-Share</strong></td>
          </tr>
          <tr>
            <td align="center">ตัวอย่าง HKT0001</td>
          </tr>
          <tr>
            <td align="center"><span class="form-group has-feedback">
              <input name="username"  class="form-control" id="username" style="height: auto;
    font-size: 17px;
    padding: 10px;
    border-radius: 25px;
    text-align: center;" placeholder="ชื่อผู้ใช้งาน">
              <input type="hidden" name="code" id="code" class="form-control" id="username">

            </span></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="2" cellpadding="">
              <tbody>
                <tr>
                  <!-- <td style="display: none;"><button type="button" class="btn btn-warning btn-lg" style="width:100%;border-radius: 25px;"  id="reset_login">รีเซ็ต</button></td> -->
                  <td width="100%"><button type="button" class="btn " style="color: #fff;
    padding: 10px;
    font-size: 18px;
    width: 100%;
    border-radius: 25px;
    background-color: #3b5998;" id="submit_login">รับการแจ้งเตือน</button></td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td id="sendlogin">&nbsp;</td>
          </tr>
        </tbody>
      </table>



    </form>
  </div>
<!--   <div id="show_up">
   <table width="100%" border="0" cellspacing="5" cellpadding="5">
   <tbody>
     <tr>
       <td align="center"><font style='font-size:22px'>คุณ<?=$arr[checkcode][name]?> (<?=$arr[checkcode][nickname]?>)<b></td>
     </tr>
     <tr>
       <td align="center">
        <font style='font-size:20px; color:#FF0000'>กาารลงทะเบียนของคุณสำเร็จแล้ว</font >
        <center>        
          <img src='../../data/pic/driver/main/<?=$arr[checkcode][post_date];?>.jpg'  width='150'     class='IMGSHOP'  style='border-radius: 15px;border: 2px solid #dadada;margin-top:10px'  />
       </center>
     </td>
     </tr>
     <tr>
       <td align="center"> กรุณาปิดหน้าต่างเพื่อเข้าสู่ระบบไลน์</td>
     </tr>
   </tbody>
 </table>

  </div> -->



    <script>
       function getParameterByName(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    console.log(getParameterByName('code'))
    var state = getParameterByName('state');
    console.log(state)
    $('#code').val(getParameterByName('code'))
  //   if(state =='up'){
  //   $('#title').text('ลงทะเบียนสำเร็จ')

  //   $('#show_up').show()
  //   $('#show_other').hide()
  // }
  // else{
    $('#title').text('รับการแจ้งเตือนทางไลน์')
    $('#show_up').hide()
    $('#show_other').show()
  // }

 /// check login
 $("#submit_login").click(function(){
  if(document.getElementById('username').value=="") {
    alert('กรุณากรอกชื่อผู้ใช้งาน');
    document.getElementById('username').focus() ;
    return false ;
  }
//https://notify-bot.line.me/oauth/authorize?response_type=code&client_id=5TRXWH7TY64enTsqhng7OZ&redirect_uri=https://www.welovetaxi.com/app/TShare_new/index.php?regis=linenoti&scope=notify&state=two

  $.post('check.php',$('#login_form').serialize(),function(response){
   $('#sendlogin').html(response);
 });
});

 $("#reset_login").click(function(){

  alert('กรุณากรอกชื่อผู้ใช้งาน');
  document.getElementById('username').value="";
  return false ;


});
</script>








</body>
</html><!-- 
<div class="form-group" style="text-align: center; margin-top: 20px;">
  <legend style="font-size: 16px; color: #3b5998;">กรุณาจำชื่อผู้ใช้งานของตัวเอง</legend>
  <h2><?=$_COOKIE["app_remember_user"];?></h2>
</div>
<button id="state_one" type="image"  class="btn btn_se_line" onclick="regisAuthss()">รับการแจ้งเตือน</button>
<button id="state_two" type="image"  class="btn btn_se_line" onclick="saveregisAuthss()">ยืนยันการสมัครแจ้งเตือนไลน์</button>
</div>

 -->

<!-- <script>
 function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
  results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}
console.log(getParameterByName('code'))
console.log(getParameterByName('state'))
var state = getParameterByName('state');
console.log(state)
console.log('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
   //                                                alert(check_new_user);
   if(state =='one'){

    $('#state_one').show()
    $('#state_two').hide()
  }
  if(state =='two'){
    $('#state_one').hide()
    $('#state_two').show()
  }
  function regisAuthss(){
    var load = 'https://line.me/R/ti/p/%40lwt1228q';
      // var load = 'https://notify-bot.line.me/oauth/authorize?response_type=code&client_id=5TRXWH7TY64enTsqhng7OZ&redirect_uri=https://www.welovetaxi.com/app/TShare_new/index.php?regis=linenoti&scope=notify&state=two';
      //"load_page_mod_3.php?name=user&file=regisline&driver=<?=$_GET[driver]?>&place=<?=$_GET[place];?>";
       // $.post( url_load, function( data ) {
       //         $('#loginline').html(data);
       //            // console.log(data);
       //         });
	//var ss = '
  console.log(load)
  location.href = load;
}
function saveregisAuthss(){
  console.log(getParameterByName('code'))
  $.ajax({
    type: 'POST',
    url: 'https://www.welovetaxi.com/app/TShare_new/curl/savetokenLine.php',
    data: { code: getParameterByName('code'),user: '<?=$_COOKIE["app_remember_user"];?>'},
            //contentType: "application/json",
            dataType: 'json',
            success: function(res) {
              console.log(res)
              swal({
                title: "ทำรายการสำเร็จ!",
                text: "",
                html: false,
                type: "success"
              },
              function () {
                $('.close-small-popup').click();
                $('.button-close-popup-mod').click();
                location.href='https://www.welovetaxi.com/app/TShare_new';
              });
                //console.log(getParameterByName('code'))
              }
            });
}
</script> -->