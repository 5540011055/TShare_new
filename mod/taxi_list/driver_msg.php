<script>
$('#text_mod_topic_action').text('ส่งข้อความแจ้งเตือน');
</script>
<style>
	.select-dropdown{
   padding-left: 10px;
/*   margin: 0 0 20px 0;*/
   }
   .initialized{
   display: none;
   }
  .select-wrapper input.select-dropdown{
  	 margin: 0 0 20px 0;
  }
  textarea{
  	border: 1px solid #9e9e9e;
  /*	border-bottom: 1px solid #9e9e9e;
    border-top: 0;
    border-right: 0;
    border-left: 0;*/
    padding: 10px;
    height: unset;
  }
</style>
<div style="margin-top: 50px;">
      <div class="row" style="padding-top: 10px;">
      <form id="send_msg_form">
      	<div class="input-field col s12">
			<i class="material-icons prefix">send</i>
		    <select name="type" id="type">
		      <option value="0" selected>ทั้งหมด</option>
		      <option value="1">LAB(แลป)</option>
		      <option value="2">แท็กซี่</option>
		    </select>
		    <label class="font-21"><?=ประเภท;?></label>
		  </div>
		<div class="input-field col s12 box-dv" style="display: none;">
			<div>
				เลือก	
			</div>
		  </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">textsms</i>
          <input type="text" id="topic" class="autocomplete" name="topic">
          <!--<textarea id="autocomplete-input" class="autocomplete"></textarea>-->
          <label for="autocomplete-input">หัวข้อ</label>
        </div>
        <div class="input-field col s12">
          <span style="font-size: 1rem;color: #9e9e9e;font-weight: bold;">ข้อความ</span>
          <textarea rows="4" name="content" ></textarea>
         
        </div>
        <div class="input-field col s12" style="margin-top: 35px;">
         <button type="submit" id="submit_user_bank" type="button" class="btn waves-effect waves-light lighten-2 " style="width:100%;background-color:#3b5998;  border-radius: 0px;color: #fff;">
		                  <span class="font-24">บันทึก</span>
		 </button>
        </div>
        </form>
      </div>
</div>

<script>
	$(document).ready(function() {

       $('select').material_select();
		
		$('#type').change(function(){
			var value = $(this).val();
			console.log(value);
			if(value!=0){
//				$('.box-dv').fadeIn(500);
			}else{
//				$('.box-dv').fadeOut(500);
			}
		});
		
		
		$( "#send_msg_form" ).submit(function( event ) {
			var url = 'send_messages/send_msg.php';
			$.post(url,$( this ).serialize() ,function(res){
				console.log(res);
			});
		  event.preventDefault();
		});
		
    });
    
    
</script>