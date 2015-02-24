function initialize() {
    if($('.modal').children().length)
        $('.modal').modal('show')
}

function parseJSON(string) {
    try {
        string = $.parseJSON(string)
        
        return string
    } catch(error) {
        console.log(error)
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