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
    
    $('.contestant-criteria-score').on('focusout', function() {
	var score = $(this).val()
	
	if (score) {
	    var href = window.location.href
	    
	    var contestant = new Contestant()
	    contestant.get(this)
	    
	    var id = $(this).attr('data-criteria')
	    
	    $.ajax({
		url: href + '/score/' + id,
		type:'post', 
		data: {
		    contestant: JSON.stringify(contestant)
		}
	    })
	}
    })
    
    $('#judge-sheet').click(function(event) {
	event.preventDefault()
	
	var complete = true
	
	var contestants = $('.contestant-criteria-score').map(function(index, element) {
	    var contestant = new Contestant()
	    contestant.get(element)
	    
	    if (contestant.score == 0)
		complete = false
	    
	    return contestant
	}).get()
	
	if (complete) {
	    $.ajax({
		url: $(this).attr('href'),
		type: 'post',
		data: {
		    contestants: JSON.stringify(contestants)
		},
		success: function(response) {
		    
		}
	    })
	}
	else
	{
	    alert('kulang!');
	}
    })
});

function Contestant()
{
    this.id = 0
    
    this.criteria = {
	id: 0
    }
    
    this.score = 0

    this.get = function(element) {
	this.id = $(element).attr('data-segment-contestant')
	this.criteria.id = $(element).attr('data-criteria')
	this.score = $(element).val()
    }
}