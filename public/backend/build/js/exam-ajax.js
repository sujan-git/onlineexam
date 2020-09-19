$(document).ready(function(){
	$("#submitform").click(function(event){
		event.preventDefault(); //prevent default action 
		const forminfo = $("form[name='examdata']");
		const post_url = forminfo.attr("action"); //get form action url
		const request_method =forminfo.attr("method"); //get form GET/POST method
		const form_data = forminfo.serialize(); //Encode form elements for submission
		//console.log(post_url,request_method,form_data);
		$.ajax({
			url : post_url,
			type: request_method,
			data : form_data
		}).done(function(data){ 
			if(typeof(data) != "object"){
				data = jQuery.parseJSON(data);
			}
			let class_ = null;
			if(data.status = true){
				class_ = 'alert alert-success';
			}else{
				class_ = 'alert alert-danger';
			}
			let html = data.msg;
			$("#formresponse").find('#msg-db').html('');
			$("#formresponse").addClass(class_).find('#msg-db').append(html);

			forminfo.each(function(){
    			this.reset();
			});
			setTimeout(function(){
				$("#formresponse").removeClass(class_).find('#msg-db').html('');
				if(data.act == 'Updat'){
					form = $("#update-form");
					form.each(function(){
    					this.reset();
					});
					location.href = config.routes.list;
				}
			}, 2000);
		});	
		//return false;
	});
})
