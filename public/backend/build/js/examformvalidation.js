// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='examdata']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      examname: "required",
      month: "required",
      date: {
      	required: true,
      	number:true,
      },
      year: {
      	required: true,
      	number:true,
      },
      fullmarks: {
      	required: true,
      	number:true,
      },
      passmarks: {
      	required: true,
      	max: function() {
                return parseInt($('#fm').val());
            }
      },
      timeduration: {
      	required: true,
      	number:true,
      },
    },
    // Specify validation error messages
    messages: {
	      examname: "Please enter title of Examination",
	    
	     month: {
	       // select: "Please Select suitable option",
	        required: "Please provide a month"
	      },
	    date: {        
	       // select: "Please Select suitable option",
	        required: "Please provide a date",
	      
	    },

	    year: {        
	       // select: "Please Select suitable option",
	        required: "Please provide an year"
	      
	    },

	    timeduration: {        
	        number: "Please provide time duration in min",
	        required: "Please Enter Time Duration"
	      },

	    fullmarks: {        
	        number: "Please provide fullmarks as number",
	        required: "Please Enter fullmarks"
	      },

	      passmarks: {        
	        max: "Pass Marks Must Be Less Than Full Marks",
	        required: "Please Enter  pass marks"
	      },
	},
	
    submitHandler: function(form) {
    	console.log($("#fm").val())
      form.submit();
    }
  });
});
