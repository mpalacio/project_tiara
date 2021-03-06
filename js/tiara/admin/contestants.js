$(document).ready(function() {
    initialize()
    
    $('#birthday').datetimepicker({
        format: 'MM/DD/YYYY',
        keepOpen: true
    })
    
    $('#contestants').delegate('#create-contestant', 'click', function(event) {
        event.preventDefault()
        
        var href = $(this).attr("href")
        
        $.ajax({
            url: href,
            success: function(response) {
                try {
                    response = $.parseJSON(response)
                    
                    if (response.status == "success") {
                        $('.modal').html(response.data.modal).modal('show')
                        
                        $('#birthday').datetimepicker({
                            format: 'MM/DD/YYYY',
                            keepOpen: true
                        })
                        
                        // Initialize the jQuery File Upload widget:
                        $('#fileupload').fileupload({
                            formData: {
                                csrf_pt_token: $.cookie('csrf_pt_cookie')
                            },
                            previewMinWidth: 100,
                            previewMinHeight: 100,
                            previewMaxWidth: 100,
                            previewMaxHeight: 100,
                            previewCrop: true
                        });
                    }
                } catch(e) {
                    console.log(e)
                }
            }
        })
    })
    
    $('#get-contestants').click(function(event) {
        event.preventDefault()
        
        var href = $(this).attr("href")
        
        $.ajax({
            url: href,
            success: function(response) {
                try {
                    response = $.parseJSON(response)
                    
                    if (response.status == "success") {
                        $('.modal').html(response.data.modal).modal('show')
                    }
                } catch(e) {
                    console.log(e)
                }
            }
        })
    })
    
    $('.modal').delegate('#save-contestant', 'click', function() {
        var contestant = new Contestant()
        contestant.get()
        
        var href = $('.modal form').attr('action')
        $.post(href, {
            contestant: JSON.stringify(contestant)
        }, function(response) {
            response = parseJSON(response)
            
            if (response.status == 'success') {
                $('#contestants').html(response.success.data.partial)
                
                $('.modal').modal('hide')
            }
        })
    })
});

function Contestant() {
    this.first_name = null;
    
    this.middle_name = null;
    
    this.last_name = null;
    
    this.birthday = null;
    
    this.occupation = null;
    
    this.telephone = null;
    
    this.mobile = null;
    
    this.email = null;
    
    this.citizenship = null;
    
    this.get = function() {
        this.first_name = $.trim($('#first-name').val())
        this.middle_name = $.trim($('#middle-name').val())
        this.last_name = $.trim($('#last-name').val())
        this.birthday = $.trim($('#birthday').val())
        this.occupation = $.trim($('#occupation').val())
        this.telephone = $.trim($('#telephone').val())
        this.mobile = $.trim($('#mobile').val())
        this.email = $.trim($('#email').val())
        this.citizenship = $.trim($('#citizenship').val())
    }
}