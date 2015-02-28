$(document).ready(function() {
    $('.contestant-criteria-score').inputmask({'mask':'(9.9[9])|(99)|(99.9)|(99.99)', greedy: false})
    
    $('.contestant-criteria-score').on('focusout', function() {
	var score = $(this).val()
	
	if (score) {
	    var href = window.location.href
	    
	    var contestant = new Contestant()
	    contestant.get(this)
	    
	    var id = $(this).attr('data-criteria')
	    var percentage = $(this).closest('.input-group').children('#percentage-addon').attr('data-percentage')
		percentage = parseFloat(percentage)
		score = parseFloat(score)
		
	    
	//    $.ajax({
	//	url: href + '/score/' + id,
	//	type:'post', 
	//	data: {
	//	    contestant: JSON.stringify(contestant)
	//	}
	//    })
	}
    })
    
    $('#judge-sheet').popover({
	title: 'Submit Scores? <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
	placement: 'auto left',
	trigger: 'manual',
	html: true,
	content: '<p>Scores are final and are irrevocable.</p><button id="confirm" class="btn btn-primary btn-block">Confirm</button>'
    })
    
    $('#judge-sheet').click(function(event) {
	event.preventDefault()
	
	var complete = true
	
	var panel = null
	
	$('.form-group').attr('class', 'form-group')
	
	var contestants = $('.contestant-criteria-score').map(function(index, element) {
	    var contestant = new Contestant()
	    contestant.get(element)
	    
	    if (contestant.score == 0)
	    {
		$(element).closest('.form-group').addClass('has-error')
		
		if (panel == null) {
		    
		    panel = $(element).closest('.panel-contestant')
		    
		    $.scrollTo(panel, 800, {
			offset: function() {
			    return {
				top: panel.position().top - 50
			    }
			}
		    })
		}
		
		complete = false
	    }
	    
	    return contestant
	}).get()
	
	if (complete) {
	    $(this).popover('show')
	    
	} else {
	    
	}
	
    })
    
    $('body').delegate('#confirm', 'click', function() {
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
		    $('#judge-sheet').popover('hide')
		}
	    })
	}
    })
    
    $('body').delegate('.popover .close', 'click', function(event) {
	$('#judge-sheet').popover('hide')
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