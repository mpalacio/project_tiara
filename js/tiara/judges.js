$(document).ready(function() {
	$('body').on('click', '#submit-judging', function() {
		$("[data-segment-contestant-id]").each(function() {
			var val = $(this).val();
			if(val.length == 0) {
				$(this).closest('td').addClass('has-error');
			}
		});
		return false;
	});
});