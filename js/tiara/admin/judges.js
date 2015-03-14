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
    
    $('#judges').delegate('.import-judge', 'click', function(event) {
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
        
        var segment_judge = new Segment_judge()
            segment_judge.number = $.trim($('#number').val())
        
        var href = $('.modal form').attr('action')
        
        $.post(href, {
            judge: JSON.stringify(judge),
            segment_judge: JSON.stringify(segment_judge)
        }, function(response) {
            response = parseJSON(response)
            
            if (response.status == 'success') {
                $('#judges').html(response.success.data.partial)
                
                $('.modal').modal('hide')
            }
        })
    })
    /**
     * 
     */
    $('.modal').delegate('#select-segment-judges', 'change', function() {
        var s = $(this)
        
        $('.' + s.attr('data-target')).each(function() {
            $(this).prop('checked', s.is(':checked'))
        })
    })
    /**
     */
    $('.modal').delegate('#import-segment-judge', 'click', function() {
        var href = $('.modal form').attr('action')
        
        var segment_judges = [];
        
        $('.segment-judge:checked').each(function() {
            var segment_judge = new Segment_judge()
            
            segment_judge.judge_id = $(this).attr('data-judge')
            segment_judge.number = $(this).closest('tr').find('.segment-judge-number').val()
            segment_judges.push(segment_judge)
        })
        
        
        $.post(href, {
            segment_judges: JSON.stringify(segment_judges),
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

function Segment_judge() {
    this.segment_id = 0;
    
    this.judge_id = 0;
    
    this.number = 0;
}