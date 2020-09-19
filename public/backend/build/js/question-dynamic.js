
  var count = 0;
  var html = `<div id="singleqn">
                         <label>Question</label> 
                         <textarea class="form-control qns" placeholder="Enter Question Here" name= "question[]"></textarea></br>
                         <div class="form-row options" id="options">
                            <div class="form-group col-md-3">
                              
                              <input type="text" class="form-control" placeholder="Option A" name="optA[]">
                            </div>
                            <div class="form-group col-md-3">
                              
                              <input type="text" class="form-control" placeholder="Option B" name="optB[]">
                            </div>
                            <div class="form-group col-md-3">
                              
                              <input type="text" class="form-control" placeholder="Option C" name="optC[]">
                            </div>
                            <div class="form-group col-md-3">
                               <input type="text" class="form-control" placeholder="Option D" name="optD[]">
                            </div>
                          </div></br>
                          <input type="text" class="form-control ans" placeholder="Mention Correct Answer Or Option" name="answer[]" list="answer">
                          <datalist id="answer">
                            <option>Option A</option>
                            <option>Option B</option>
                            <option>Option C</option>
                            <option>Option D</option>
                          </datalist>
                          </br><input type="checkbox" name="is_entry[]"  id="entryQn"/> Mark as Entry Type</br>
                          <button type="button" class="btn btn-info" id="addmore">Add More Question</button>
                      </div>`;
	$(document).on("click", '#addmore', function() {
    $(this).removeClass("btn btn-info");
    $(this).addClass("btn btn-danger");
    $(this).attr("id","remove");
    $(this).text("Remove");
    count++;
   console.log(count);
    if(count >= 10){
      alert("Limit Reached:"+count);
    }else{  
        $("#question").append(html);
    }
   // console.log(count);
  });


  $(document).on("click", '#remove', function(){
      count--;
      $(this).parent().remove();
      if (count == 0){
        $("#question").append(html);
      }
  });

