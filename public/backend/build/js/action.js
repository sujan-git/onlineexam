
	/*$(".edit-info").on('click',function(e){
		const id = $(this).attr('data-id');
		$.ajax({
					url : config.routes.edit,
					type:'post',
					data: {
	        			"id": id
	        		}
					}).done(function(data){ 
					if(typeof(data) != "object"){
						data = jQuery.parseJSON(data);
					}
					
				});
	});*/

	$(".del-info").on('click',function(e){
		//e.preventDefault();
			$('#delmodal').modal('show');
			const id = $(this).attr('data-id');
			console.log(id);
			$(".modal-footer").find("#confirmdel").click(function () {
				$('#delmodal').modal('hide'); 
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
	        	$.ajax({
					url : config.routes.delete,
					type:'post',
					data: {
	        			"id": id
	        		}
					}).done(function(data){ 
					if(typeof(data) != "object"){
						data = jQuery.parseJSON(data);
					}

					if(data.status = true){
						class_ = 'alert alert-success';
					}else{
						class_ = 'alert alert-danger';
					}
					let html = data.msg;
					$("#formresponse").find('#msg-db').html('');
					$("#formresponse").addClass(class_).find('#msg-db').append(html);
					if(data.status){
						setTimeout(function(){
						
							$("#formresponse").removeClass(class_).find('#msg-db').html('');
								location.reload();
							}, 2000);
					}
				
				});	
	        	
			});
		});