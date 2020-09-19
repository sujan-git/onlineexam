$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"

  /*--------Form Validation----------*/
    /*$("form[name='register-form']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        fname: "required",
        lname: "required",
        dob:{
          required:true,
          date:true,
        },
        address:"required",
        phone:"required",
        profile:"required",
        verify_document:"required",
        gender:"required",
        fathername:"required",
        mothername:"required",
        email:{
          required:true,
          email:true
        },
        profile:{
          required:true,
         // extension:"jpg|jpeg|png|gif"
        },
        verify_document:{
          required:true,
         // extension:"jpg|jpeg|png|gif"
        }

      },
      // Specify validation error messages




      submitHandler: function(form) {

        form.submit();
      }
    });*/
  /*--------Form Validation----------*/


  /*---------Image Preview On Change----------*/
    var verify_document;var verify_photo;
      $("#image_preview").hide();
      
      $("#photo").on('change', function(){
        let check = checkExtension(this);
        if(check != false){
           verify_photo = readURL(this,'profile_image', 400,400 );
        }
      });
      $("#vdoc").on('change', function(){
        let check = checkExtension(this);
        if(check != false){
            verify_document = readURL(this, 'document',1000,750);
        }
        
      });

      function checkExtension(input){
        const fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
          if ($.inArray($(input).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
              alert("Only these formats are allowed : "+fileExtension.join(', '));
              $("#btnSubmit").attr("disabled", true);
              return false;
          }else{
            $("#btnSubmit").attr("disabled", false);
          }
      }

     
      function readURL(input,id,hth,wdh) {
          
          if (input.files && input.files[0]) {
              const id_ = '#'+ id;
              var reader = new FileReader();
              reader.onload = function (e) {
                  var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height > hth || width > wdh) {
                        alert("Height and Width must not exceed Mentioned Limits");
                        $(input).val('').clone(true);
                        return false;
                    }else{
                      $(id_)
                      .attr('src', e.target.result)
                      .width(400)
                      .height(400);
                      $("#image_preview").show();
                    }
                    
                    
                };
                  
              };

              reader.readAsDataURL(input.files[0]);
          }
          
      }
  /*---------Image Preview On Change----------*/


  /*---------Form Submit Via Ajax----------*/
   /* $("#btnSubmit").on('click', function(e){
      e.preventDefault(); //prevent default action 
      const forminfo = $("form[name='register-form']");
      const post_url = forminfo.attr("action"); //get form action url
      const request_method =forminfo.attr("method"); //get form GET/POST method
      const form_data = forminfo.serialize(); //Encode form elements for submission
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $.ajax({
        url : post_url,
        type: request_method,
        data : form_data
      }).done(function(data){

      }); 
          
      
    }); */
    
  /*---------Form Submit Via Ajax----------*/
});
