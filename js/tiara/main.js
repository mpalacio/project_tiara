function initialize() {
		$.ajaxSetup({
				data: {
						csrf_pt_token: $.cookie('csrf_pt_cookie')
				}
		})

		if($('.modal').children().length)
		{
				$('.modal').modal('show')
		}
}

$.extend( {
	redirectPost: function(location, args) {
		var form = '';
		$.each( args, function( key, value ) {
			value = value.split('"').join('\"')
			form += '<input type="hidden" name="'+key+'" value="'+value+'">';
		});
		$('<form action="' + location + '" method="POST">' + form + '</form>').appendTo($(document.body)).submit();
	}
});