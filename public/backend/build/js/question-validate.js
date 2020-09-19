	

	$('textarea.qns').each(function() {
	        $(this).rules("add", 
	            {
	                required: true,
	                messages: {
	                    required: "Please Provide Question",
	                }
	            });
	    });

	$('input.ans').each(function() {
	        $(this).rules("add", 
	            {
	                required: true,
	                messages: {
	                    required: "Plese Provide answer for this question",
	                }
	            });
	    });