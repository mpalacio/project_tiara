<script>
	$(document).ready(function(){
		$('.score').keypress(function(event) {
			if(event.which == 13) {
				console.log($('.score').next('.score').focus())
			}
		})
	})
</script>
<input type="text" class="score" />
<input type="text" class="score" />