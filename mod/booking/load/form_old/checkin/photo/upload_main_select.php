   
 	<div id="area"  ><div>
 
            <!-- development area -->

            <!-- SAMPLE -->
            <section>
 
                <!-- description -->
                <!-- /description -->
<style>
                    #area div p { display: block; width: 400px; }
                    #area div p span { display: block; padding: 2px 0; width: 0; background: #193; text-align: center;width: 400px;  }
                    #area b, #area img { display: block; width: 400px; }
                    #area img { margin: 10px 0; width: 400px; }
                    #area input {  }
                    #area u { display: block; padding: 15px; text-align: center; background: #ddd; border-radius: 6px;width: 400px;  }
                </style>
				
				
<div id="file_photo_loads">


				 <input type="file" class="form-control" value="ยังไม่มีภาพถ่าย" readonly  style="padding-left:5px; padding-right:5px; width:125px" name="load_chat_camera_select" id="load_chat_camera_select"  accept="image/*"  capture="camera">
			
			
<div>
   
         
                    <script>

  

                            $('input[name=load_chat_camera_select]').change(function(e) {
								
								
								
								
								var pictype=document.getElementById('upload_pic_type').value;
								
  
							// alert(pictype);
			 
							 
							 
                              //  var file = e.target.files[0];
								
							  var file=document.getElementById('load_chat_camera_select').files[0];	 
///
 
setTimeout(function () {
                                // CANVAS RESIZING
                                canvasResize(file, {
                                    width: 800,
                                    height: 1600,
                                    crop: false,
                                    quality: 100,
                                    rotate: 0,
                                    callback: function(data, width, height) {

                                        // SHOW AS AN IMAGE
                                        // =================================================
                                        var img = new Image();
										
									//	image_id_card
 
									   
									 $("#image_"+pictype).attr('src', data);
 
 			   
									    // /SHOW AS AN IMAGE
                                        // =================================================


                                        // IMAGE UPLOADING
                                        // =================================================

                                        // Create a new formdata
                                        var fd = new FormData();
                                        // Add file data
    var f = canvasResize('dataURLtoBlob', data);
       f.name = file.name;
     fd.append($('#area input').attr('name'), f);

     var xhr = new XMLHttpRequest();
										
	var url="go.php?name=register/photo&file=upload_pic";
	url=url+"&type="+document.getElementById('upload_pic_type').value;
	url=url+"&code="+document.getElementById('check_code').value;
										
 					
										
                                        xhr.open('POST', url, true);
                                        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                                        xhr.setRequestHeader("pragma", "no-cache");
                                        //Upload progress
                                        xhr.upload.addEventListener("progress", function(e) {
                                            if (e.lengthComputable) {
                                                var loaded = Math.ceil((e.loaded / e.total) * 100);
                                              
											  
											    $("#area_image_album_load_"+pictype).css({
                                                    'width': loaded + "%"
                                                }).html("อัพรูปภาพสำเร็จ"+loaded+ "%");
												
												
										 document.getElementById('check_photo_'+pictype).value=1;
												
												
												
												
												
												$("#area_image_album_load_"+pictype).html();
												//////////////////
							 
												
												  
												 
												 
												 
												 if(loaded==100){
												 
												 
												 
												  
												  
												setTimeout(function () {
												  				
												$("#image_"+pictype).fadeIn(3000); 
												}, 1000); //w
												  
												 
												  
												//  $("#area_image_album_load_main").fadeOut(1000); 
												//  $("#area_image_album_load").fadeOut(1000); 
												/// $("#div_btn_send_album").fadeIn(1000); 
												  
												 }
												
												/*
												setTimeout(function () {
												
												$("#topLoader").fadeOut(1000); 
												}, 3000); //w
												
												*/
                                            }
                                        }, false);
                                        // File uploaded
                                        xhr.addEventListener("load", function(e) {
                                            var response = JSON.parse(e.target.responseText);
                                            if (response.filename) {
                                                // Complete
												

												
                                                $('#area p span').html('done');
                                                $('#area b').html(response.filename);
                                                $('<img>').attr({
                                                    'src': response.filename
                                                }).appendTo($('#area div'));
                                            }
                                        }, false);
                                        // Send data
                                        xhr.send(fd);

                                        // /IMAGE UPLOADING
                                        // =================================================               
                                    }
                                });


////////////

}, 3000); //w
                            });
           
		   
		   
                    </script>

 
 
   
                    <script src="js/camera/canvasResize.js"></script>   
					