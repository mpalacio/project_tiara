$(document).ready(function() {
    initialize()
    
    $('#create-judges').click(function(event) {
        event.preventDefault()
        
        var href = $(this).attr("href")
        
        $.ajax({
            url: href,
            type: "POST",
            success: function(response) {
                try {
                    response = $.parseJSON(response)
                    
                    if (response.status == "success") {
                        $('.modal').html(response.data.modal).modal('show')
                        
                        window.history.replaceState({}, null, href)
                    }
                } catch(e) {
                    console.log(e)
                }
            }
        })
    })
});

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