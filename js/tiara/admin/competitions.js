$(document).ready(function() {
    initialize()
    
    $('#date').datetimepicker({
        format: 'MM/DD/YYYY',
        keepOpen: true
    })
    
    $('#create-competition').click(function(event) {
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
                        
                        $('#date').datetimepicker({
                            format: 'MM/DD/YYYY',
                            keepOpen: true
                        })
                    }
                } catch(e) {
                    console.log(e)
                }
            }
        })
    })
    
    $('.modal').delegate('#save-competition', 'click', function() {
        var competition = new Competition()
        competition.get()
        
        var href = $('.modal form').attr('action')
        $.post(href, {
            competition: JSON.stringify(competition)
        }, function() {
            
        })
    })
    
    $('.edit-competitions').click(function() {
        event.preventDefault()
        
        var href = $(this).attr("href")
        
        $.ajax({
            url: href,
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
    
    $('.modal').on('hidden.bs.modal', function() {
        window.history.replaceState({}, null, $('#competition').attr('href'))
    })
})

function Competition() {
    this.name = null;
    
    this.description = null;
    
    this.date = null;
    
    this.get = function() {
        this.name = $.trim($('#name').val())
        this.description = $.trim($('#description').val())
        this.date = $.trim($('#date').val())
    }
}