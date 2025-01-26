<x-adminlayout title="Create Work"> 
    <div class="content-wrapper">
        <div>
            <a href="{{route('work.index')}}" class="btn btn-primary f-14"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div> 
        <div class="card mt-3">
           <div class="card-header py-3"><h5>Create Work</h5></div>
           <div class="card-body">
              <form id="submitform" method="post" class="d-zone" enctype="multipart/form-data">
                @csrf
                @method('post')
                 <div class="row">
                    <div class="col-md-12">
                        <x-form labelname="Work Category" name="category">
                            <select name="category" class="form-control f-14">
                                <option>Select Category</option>
                                @foreach ($datas as $data)
                                     @if($data->category_name != 'All') 
                                      <option value="{{$data->id}}">{{$data->category_name}}</option>
                                     @endif
                                @endforeach
                            </select>
                        </x-form> 
                     </div> 
                     <div class="col-md-6">
                         <x-form labelname="Title" name="title">
                            <input type="text" name="title" class="form-control f-14" placeholder="Title (Like Brand Name)"/>                           
                         </x-form>
                     </div>  
                     <div class="col-md-6">
                        <x-form labelname="Client Logo (1600 X 840)" name="c_logo">
                           <input type="file" name="c_logo" class="form-control f-14"/>                           
                        </x-form>
                    </div>
                     <div class="col-md-6">
                         <x-form labelname="Thumbnail Image (1446 X 1625)" name="t_image">
                            <input type="file" class="form-control file" name="t_image"/>
                         </x-form>             
                     </div> 
                     <div class="col-md-6">
                        <x-form labelname="Hero banner Image (1920 X 550)" name="hero_banner">
                           <input type="file" class="form-control file" name="hero_banner"/>
                        </x-form>             
                    </div>                  
                     <div class="col-md-12">
                         <x-form labelname="Content (Like About Brand)" name="content">
                            <textarea class="height-content-cus form-control" name="content"></textarea>
                         </x-form> 
                     </div>
                     <div class="col-md-4">
                        <x-form labelname="Facebook Url" name="fb">
                           <input type="url" class="form-control" name="fb"/>
                        </x-form>             
                     </div>
                     <div class="col-md-4">
                        <x-form labelname="Instagram Url" name="insta">
                           <input type="url" class="form-control" name="insta"/>
                        </x-form>             
                     </div> 
                     <div class="col-md-4">
                        <x-form labelname="Youtube Url" name="yt">
                           <input type="url" class="form-control" name="yt"/>
                        </x-form>             
                     </div>
                     <div class="col-md-4">
                        <x-form labelname="Pinterest Url" name="pt">
                           <input type="url" class="form-control" name="pt"/>
                        </x-form>             
                     </div>
                     <div class="col-md-4">
                        <x-form labelname="Linkedin Url" name="ld">
                           <input type="url" class="form-control" name="ld"/>
                        </x-form>             
                     </div>
                     <div class="col-md-4">
                        <x-form labelname="Twitter Url" name="tw">
                           <input type="url" class="form-control" name="tw"/>
                        </x-form>             
                     </div>
                     <div class="col-md-12">
                        <x-form labelname="Work Images (Multipule Upload)" name="workimages">
                            <input type="file" class="form-control" name="workimages[]" id="images" multiple required/>
                        </x-form>                     
                     </div>   
                     <div class="row">
                        <div class="col-md-6">
                           <label class="form-label">Video 1</label>
                           <div class="input-group mb-3">                               
                               <div class="input-group-text gap-2">
                                  <label class="btn btn-outline-secondary">
                                    <input type="radio" name="v1" id="option1" value="100" autocomplete="off"> 100%        
                                  </label>   
                                  <label class="btn btn-outline-secondary">
                                    <input type="radio" name="v1" id="option1" value="50" autocomplete="off"> 50%        
                                  </label>                    
                               </div>
                              <input type="text" class="form-control" name="video1">
                            </div>                         
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Video 2</label>
                            <div class="input-group mb-3">                               
                               <div class="input-group-text gap-2">
                                  <label class="btn btn-outline-secondary">
                                    <input type="radio" name="v2" id="option1" value="100" autocomplete="off"> 100%        
                                  </label>   
                                  <label class="btn btn-outline-secondary">
                                    <input type="radio" name="v2" id="option1" value="50" autocomplete="off"> 50%        
                                  </label>                    
                               </div>
                              <input type="text" class="form-control" name="video2">
                            </div>                         
                        </div>
                        <div class="col-md-6">
                           <label class="form-label">Video 3</label>
                           <div class="input-group mb-3">                               
                              <div class="input-group-text gap-2">
                                 <label class="btn btn-outline-secondary">
                                   <input type="radio" name="v3" id="option1" value="100" autocomplete="off"> 100%        
                                 </label>   
                                 <label class="btn btn-outline-secondary">
                                   <input type="radio" name="v3" id="option1" value="50" autocomplete="off"> 50%        
                                 </label>                    
                              </div>
                             <input type="text" class="form-control" name="video3">
                           </div>                         
                       </div>
                       <div class="col-md-6">
                        <label class="form-label">Video 4</label>
                        <div class="input-group mb-3">                               
                           <div class="input-group-text gap-2">
                              <label class="btn btn-outline-secondary">
                                <input type="radio" name="v4" id="option1" value="100" autocomplete="off"> 100%        
                              </label>   
                              <label class="btn btn-outline-secondary">
                                <input type="radio" name="v4" id="option1" value="50" autocomplete="off"> 50%        
                              </label>                    
                           </div>
                          <input type="text" class="form-control" name="video4">
                        </div>                         
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Video 5</label>
                        <div class="input-group mb-3">                               
                           <div class="input-group-text gap-2">
                              <label class="btn btn-outline-secondary">
                                <input type="radio" name="v5" id="option1" value="100" autocomplete="off"> 100%        
                              </label>   
                              <label class="btn btn-outline-secondary">
                                <input type="radio" name="v5" id="option1" value="50" autocomplete="off"> 50%        
                              </label>                    
                           </div>
                          <input type="text" class="form-control" name="video5">
                        </div>                         
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Video 6</label>
                        <div class="input-group mb-3">                               
                           <div class="input-group-text gap-2">
                              <label class="btn btn-outline-secondary">
                                <input type="radio" name="v6" id="option1" value="100" autocomplete="off"> 100%        
                              </label>   
                              <label class="btn btn-outline-secondary">
                                <input type="radio" name="v6" id="option1" value="50" autocomplete="off"> 50%        
                              </label>                    
                           </div>
                          <input type="text" class="form-control" name="video6">
                        </div>                         
                      </div>
                     </div>
                 </div>
                 <button class="btn btn-primary f-14" id="submitbtn">Submit <i class="fas fa-long-arrow-alt-right"></i></button>
              </form>              
           </div>
        </div>                     
    </div>    
@push('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#submitform').on('submit',function(e){
        e.preventDefault();
        $('.validation-error').empty();
        $('#submitbtn').html('<div class="spinner-border" role="status"></div> Loading...');
        $('#submitbtn').attr('disabled',true)
        const formdata = new FormData(this);
        $.ajax({
            url:"{{route('work.store')}}",
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success:function(res){
                     if(res.code == 200){
                       window.location.href="{{route('work.index')}}"
                     }  
                     if(res.code == 400){                  
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
