/**
 * Judges Script
 * 
 * @namespace admin
 * @version 1.0.0
 */
$(document).ready(function() {
    initialize()
    
    /**
     * Create Judge Event Handler
     *
     * @author Gertrude R
     * @since 1.0.0 Judge Script
     * @version 1.0.1
     */
    $('#judges').delegate('#create-judge', 'click', function(event) {
        event.preventDefault()
        
        var href = $(this).attr("href")
        
        $.ajax({
            url: href,
            success: function(response) {
                try {
                    response = $.parseJSON(response)
                    
                    if (response.status == "success") {
                        $('.modal').html(response.success.data.modal).modal('show')
                        
                        //window.history.replaceState({}, null, href)
                    }
                } catch(e) {
                    console.log(e)
                }
            }
        })
    })
    
    $('#get-judge').click(function(event) {
        event.preventDefault()
        
        var href = $(this).attr("href")
        
        $.ajax({
            url: href,
            success: function(response) {
                try {
                    response = $.parseJSON(response)
                    
                    if (response.status == "success") {
                        $('.modal').html(response.data.modal).modal('show')
                        
                        //window.history.replaceState({}, null, href)
                    }
                } catch(e) {
                    console.log(e)
                }
            }
        })
    })
    /**
     * Save Judge Event Handler
     *
     * @author Gertrude R
     * @since 1.0.0 Judge Script
     * @version 1.0.0
     */
    $('.modal').delegate('#save-judge', 'click', function() {
        var judge = new Judge()
        judge.get()
        
        var href = $('.modal form').attr('action')
        
        $.post(href, {
            judge: JSON.stringify(judge)
        }, function(response) {
            response = parseJSON(response)
            
            if (response.status == 'success') {
                $('#judges').html(response.success.data.partial)
                
                $('.modal').modal('hide')
            }
        })
    })
});

function Judge() {
    this.first_name = null;
    
    this.last_name = null;
    
    this.username =null;
    
    this.password = null;
    
    this.get = function() {
        this.first_name = $.trim($('#first-name').val())
        this.last_name = $.trim($('#last-name').val())
        this.username = $.trim($('#username').val())
        this.password = $.trim($('#password').val())
    }
}