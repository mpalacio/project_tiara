$(document).ready(function() {
    initialize()
    
    $('#criterias').delegate('.edit-criteria','click', function(event) {
        event.preventDefault()
        
        var href = $(this).attr("href")
        
        $.ajax({
            url: href,
            type: "POST",
            success: function(response) {
                try {
                    response = $.parseJSON(response)
                    
                    if (response.status == "success") {
                        $('.modal').html(response.success.data.modal).modal('show')
                        
                        $('#percentage').inputmask({'mask':'(9.9[9])|(99)|(99.9)|(99.99)', greedy: false})
                    }
                } catch(e) {
                    console.log(e)
                }
            }
        })
    })
    
    $('.modal').delegate('#update-criteria', 'click', function() {
        var criteria = new Criteria()
        criteria.get()
        
        var href = $('.modal form').attr('action')
        
        $.post(href, {
            criteria: JSON.stringify(criteria)
        }, function(response) {
            try {
                response = $.parseJSON(response)
                
                if (response.status == "success") {
                    $('#criterias').html(response.success.data.partial)
                    
                    $('.modal').modal('hide')
                }
            } catch(e) {
                console.log(e)
            }
        })
    })
})

function Criteria() {
    this.name = null;
    
    this.percentage = 0.00;
    
    this.description = null;
    
    this.get = function() {
        this.name = $.trim($('#name').val())
        this.percentage = $.trim($('#percentage').val())
        this.description = $.trim($('#description').val())
    }
}