<x-adminlayout title="Create Testimonial"> 
    <div class="content-wrapper">
        <div>
            <a href="{{route('testimonial.index')}}" class="btn btn-primary f-14"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div> 
        <div class="card mt-3">
           <div class="card-header py-3"><h5>Create Testimonial</h5></div>
           <div class="card-body">
              <form id="submitform" method="post">
                @csrf
                @method('post')
                 <div class="row">
                     <div class="col-md-6">
                         <x-form labelname="Client Name" name="c_name">
                            <input type="text" name="c_name" class="form-control f-14" placeholder="Client Name"/>
                         </x-form>                       
                     </div>
                     <div class="col-md-6">
                        <x-form labelname="Client Desgination" name="cd">
                           <input type="text" name="cd" class="form-control f-14" placeholder="Client Desgination"/>
                        </x-form>                       
                    </div>              
                    <div class="col-md-6">
                         <x-form labelname="Client Image (Image Size 347 X 161)" name="c_image">
                            <input accept="image/webp" data-default-file="" value="" type="file" name="c_image" class="file"/>
                         </x-form>                                               
                    </div>
                    <div class="col-md-6">
                          <x-form labelname="Client Review (215 character)" name="c_review">
                            <textarea name="c_review" placeholder="Client Message here" class="form-control f-14" id="client-review"></textarea>
                          </x-form> 
                    </div>               
                 </div>
                 <button class="btn btn-primary f-14" id="submitbtn">Submit <i class="fas fa-long-arrow-alt-right"></i></button>
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
                url:"{{route('testimonial.store')}}",
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success:function(res){
                     if(res.code == 200){
                       window.location.href="{{route('testimonial.index')}}"
                     }    
                     if(res.code == 400) {
                         $.each(res.message, function(key, value) {
                             $(`#${key}`).html(value); 
                         });
                     }   
                     $('#submitbtn').html('Submit <i class="fas fa-long-arrow-alt-right"></i>');
                     $('#submitbtn').attr('disabled',false)     
                }
            }) 
        });
    </script>        
@endpush
</x-adminlayout>
