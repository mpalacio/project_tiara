$(document).ready(function() {
    $('.contestant-criteria-score').inputmask({'mask':'(9)|(99)', greedy: false, rightAlign: true})
    
    $('.contestant-criteria-score').keyup(function(event) {
	if (event.which == 13) {
	    var score = $(this).val()
		score = parseFloat(score)
	    
	    if (score) {
		var percentage = $(this).attr('data-percentage')
		    percentage = parseFloat(percentage)
		
		if (score < 0 || score > percentage) {
		    $(this).closest('.form-group').attr('class', 'form-group has-error')
		    
		} else {
		    $(this).closest('.form-group').attr('class', 'form-group')
		    
		    var scores = 0.00;
	    
		    $(this).closest('tr').find('.contestant-criteria-score').each(function(){
			var score = parseFloat($(this).val())
			
			if (score)
			    scores = scores + score
		    })
	    
		    $(this).closest('tr').find('.contestant-total-score').text(scores)
		    
		    $(this).closest('.form-group').attr('class', 'form-group has-success')
		    
		    var contestant = new Contestant()
			contestant.get(this)
			
		    var href = window.location.href
		    var id = $(this).attr('data-criteria')
		    // Send
		    $.ajax({
			url: href + '/score/' + id,
			type:'post', 
			data: {
			    contestant: JSON.stringify(contestant)
			}
		    })
		    
		    $('.table').next('.contestant-criteria-score').focus()
		}
		
	    } else {
		$(this).closest('.form-group').attr('class', 'form-group has-error')
	    }
	    
	} else {
	    $(this).closest('.form-group').attr('class', 'form-group')
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