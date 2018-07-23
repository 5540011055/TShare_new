<style>
#xxx {

    width: 100%;
    padding: 15px;
    background-color: #ddd;
    position: fixed;
    top: 100px;
    bottom: 0px;
    right: -500px;
}


</style>
<div style="width: 100%;display: none;" id="xxx" >
	<p>The Caterpillar and Alice looked at each other for some time in silence:
at last the Caterpillar took the hookah out of its mouth, and addressed
her in a languid, sleepy voice.</p>
</div>



<button class=""waves-effect waves-light btn" onclick="tt();">SLIDE Out</button>


<script>

	function tt(){
		/*$( "h1" ).toggle( "slide" , {
	        direction: 'left' 
	    }, 500);*/
	    $('#xxx').css('display','block');
	    $("#xxx").animate({
		   "left":"0px"
		},200);
	}
</script>