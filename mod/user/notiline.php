<script>
   $('.text-topic-action-mod').html('สมัครแจ้งเตือนไลน์');
</script>
<style type="text/css">
  
  
 
</style>

<div class="page-header" style="    margin-top: 50px;
    padding: 16px 35px;">
        <!-- <h1><a >LINE</a><small> notify</small></h1> -->
      <!-- </div> -->
      
        <legend>กรุณาจำ ชื่อผู้ใช้งานของตัวเอง"<?=$_COOKIE["app_remember_user"];?>"</legend>
      
        <div class="form-group" >
          
          <!-- <input type="text" class="form-control" id="usernameline" placeholder="Email"  name="usernameline" value="<?=$_COOKIE["app_remember_user"];?>" > -->
        </div>
        <button id="state_one" type="image"  class="btn btn_se_line" onclick="regisAuthss()">รับการแจ้งเตือน</button>
        <button id="state_two" type="image"  class="btn btn_se_line" onclick="saveregisAuthss()">ยืนยันการสมัครแจ้งเตือนไลน์</button>
      
        
      
    
     
   
   
      <!-- <a class="btn btn-default" href="listuser.php" role="button">list User</a> -->
    </div>
    
<style>
   .btn_se_line{
      margin-top: 100px;
    bottom: 50px;
    /* right: 6%; */
    padding: 10px;
    font-size: 18px;
    background-color: #3b5998;
    color: #fff;
    width: 100%;
    /* transform: translate(0%,-50%); */
    z-index: 200;
    margin-bottom: 20px
   }
</style>

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
</script>