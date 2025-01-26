<x-adminlayout title="Edit Career"> 
    <div class="content-wrapper">
        <div>
            <a href="{{route('career.index')}}" class="btn btn-primary f-14"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div> 
        <div class="card mt-3">
           <div class="card-header py-3"><h5>Edit Career</h5></div>
           <div class="card-body">
              <form id="submitform" method="post">
                @csrf
                @method('put')
                 <div class="row">
                     <div class="col-md-6">
                        <x-form labelname="Job Title Name" name="title">
                            <input value="{{$data->title}}" type="text" name="title" class="form-control f-14" placeholder="Job Title Name"/>
                        </x-form>                                             
                     </div>
                     <div class="col-md-6">
                        <x-form labelname="Designation Name" name="d_name">
                            <input value="{{$data->designation_name}}" type="text" name="d_name" class="form-control f-14" placeholder="Designation Name"/>
                         </x-form>                      
                     </div>
                     <div class="col-md-6">
                        <x-form labelname="Job Type" name="job_type">
                            <select class="form-control f-14" name="job_type">                      
                                <option {{$data->job_type == 'Full Time' ? 'selected' : ''}} value="Full Time">Full Time</option>
                                <option {{$data->job_type == 'Part Time' ? 'selected' : ''}} value="Part Time">Part Time</option>
                              </select>  
                        </x-form>              
                    </div>
                    <div class="col-md-6">
                        <x-form labelname="Work From Typ" name="work_from_type">
                              <select class="form-control f-14" name="work_from_type">                      
                                <option {{$data->work_type == 'Remote' ? 'selected' : ''}} value="Remote">Remote</option>
                                <option {{$data->work_type == 'Work Form Offic' ? 'selected' : ''}} value="Work Form Office">Work Form Office</option>
                              </select>
                        </x-form>                
                    </div>                  
                    <div class="col-md-9" id="first-input">
                        <div class="mb-3">
                          <label class="form-label">Job Details</label>
                           @foreach ($data->job_details as $key=>$details) 
                            <div class="input-group my-3 close-row">
                                <input value="{{$details}}" name="job_details[]" type="text" class="f-14 form-control" aria-describedby="basic-addon1" required>
                                <button type="button" class="btn btn-danger closeRow" onclick="closeinput()" id="basic-addon1">X</button>                            </div>
                          @endforeach 
                        </div>
                    </div>   
                    <div class="col-md-3">
                        <div class="mb-3">   
                            <label class="form-label invisible "></label>
                            <button type="button" class="btn btn-primary f-13 w-100" id="addbtn">Add Row</button>
                        </div>
                   </div>                               
                 </div>
                 <button class="btn btn-primary f-14" id="submitbtn">Update <i class="fas fa-long-arrow-alt-right"></i></button>
              </form>              
           </div>
        </div>                     
    </div>    
 @push('js')
 <script>
    $('#submitform').on('submit',function(e){
        e.preventDefault();
        $('.validation-error').empty();
        $('#submitbtn').html('<div class="spinner-border" role="status"></div> Loading...');
        $('#submitbtn').attr('disabled',true)
        const formdata = new FormData(this);
        $.ajax({
            url:"{{route('career.update',"$data->id")}}",
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success:function(res){
                     if(res.code == 200){
                       window.location.href="{{route('career.index')}}"
                     }  
                     if(res.code == 400) {
                        $.each(res.message, function(key, value) {
                            $(`#${key}`).html(value); 
                        });
                     }                   
                     $('#submitbtn').html('Update <i class="fas fa-long-arrow-alt-right"></i>');
                     $('#submitbtn').attr('disabled',false)     
                }
            }) 
    });
    $('#addbtn').click(function () {    
        $('#first-input').append('<div class="input-group mb-3 close-row"><input name="job_details[]" type="text" class="f-14 form-control" aria-describedby="basic-addon1" required><button type="button" class="close input-group-text  closeRow" onclick="closeinput()"id="basic-addon1">X</button></div>')         
    });
    $(document).on("click", ".closeRow", function(){
        $(this).closest(".close-row").remove();
     });
 </script>        
 @endpush
 </x-adminlayout>
