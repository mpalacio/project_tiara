$(document).ready(function() {
    $('.container').delegate('.segment-change-status', 'click', function(event) {
        event.preventDefault()
        
        var href = $(this).attr('href')
        
        $.post(href, {
        }, function(response) {
            response = parseJSON(response)
            
            if (response.status == 'success')
                $('.container.main').html(response.success.data.partial)
        })
    })
})