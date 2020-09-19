/*Hide/Show Options*/
$(document).on("click", '#entryQn', function() {
  		let div = $(this).parent().children()[3];
  		if($(this).prop('checked')){
  			$(this).val('1');
  			$(div).hide();
  		}else{
  			$(this).val('0');
  			$(div).show();
  		} 		
  		
  })

/*Set dynamic name and value to checkboxes dynamically*/
$(document).on("click", '#submitform', function(e) {
	e.preventDefault();
	let checkbox = $("input[type=checkbox]");
	$(checkbox).each(function(key,value){
		if($(this).prop('checked')){
			$(this).attr('name',`is_entry[${key}]`);
			$(this).val('1');
		}else{
			$(this).attr('name',`is_entry[${key}]`);
			$(this).val('0');
		}
	});
	console.log(count);
	if((count) ==10){
		$("#questionForm").submit();
		//Try Submitting Via Ajax later!

	}else{		
			alert(`Question Limit Not Reached. You Have submitted ${count} Questions`);	
	}
});
