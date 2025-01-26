<x-adminlayout title="Edit Work"> 
    <div class="content-wrapper">
        <div>
            <a href="{{route('work.index')}}" class="btn btn-primary f-14"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div> 
        <div class="card mt-3">
           <div class="card-header py-3"><h5>Edit Work</h5></div>
           <div class="card-body">
              <form id="submitform" method="post" class="d-zone">
                @csrf
                @method('put')
                 <div class="row">
                    <div class="col-md-12">
                        <x-form labelname="Work Category" name="category">
                            <select name="category" class="form-control f-14">
                                <option>Select Category</option>
                                @foreach ($datas as $data)
                                     @if($data->category_name != 'All') 
                                      <option {{$data->id == $workdata->c_id ? 'selected' : ''}} value="{{$data->id}}">{{$data->category_name}}</option>
                                     @endif
                                @endforeach
                            </select>
                        </x-form>
                     </div> 
                     <div class="col-md-6">
                         <x-form labelname="Title" name="title">
                            <input value="{{$workdata->title}}" type="text" name="title" class="form-control f-14" placeholder="Title (Like Brand Name)"/>                           
                         </x-form>                       
                     </div>
                     <div class="col-md-6">
                        <x-form labelname="Client Logo (1600 X 840)" name="c_logo">
                           <input type="file" name="c_logo" class="form-control f-14"/>                           
                        </x-form>
                      </div>  
                     <div class="col-md-6">
                        <x-form labelname="Thumbnail Image (1446 X 1625)" name="t_image">
                            <input data-default-file="{{asset('upload/'.$workdata->thumbnail_image)}}" type="file" class="form-control file" name="t_image"/>
                         </x-form>             
                     </div> 
                     <div class="col-md-6">
                        <x-form labelname="Hero banner Image (1920 X 550)" name="hero_banner">
                           <input data-default-file="{{asset('upload/'.$workdata->hero_banner)}}" type="file" class="form-control file" name="hero_banner"/>
                        </x-form>             
                    </div>  
                     <div class="col-md-12">                     
                        <x-form labelname="Content (Like About Brand)" name="content">
                            <textarea id="content" class=" height-content-cus form-control" name="content">{{$workdata->content}}</textarea>
                         </x-form>                         
                     </div>
                     <div class="col-md-4">
                        <x-form labelname="Facebook Url" name="fb">
                           <input value="{{$workdata->sm_icons['facebook']}}" type="url" class="form-control" name="fb"/>
                        </x-form>             
                     </div>
                     <div class="col-md-4">
                        <x-form labelname="Instagram Url" name="insta">
                           <input value="{{$workdata->sm_icons['instagram']}}" type="url" class="form-control" name="insta"/>
                        </x-form>             
                     </div> 
                     <div class="col-md-4">
                        <x-form labelname="Youtube Url" name="yt">
                           <input value="{{$workdata->sm_icons['youtube']}}" type="url" class="form-control" name="yt"/>
                        </x-form>             
                     </div>
                     <div class="col-md-4">
                        <x-form labelname="Pinterest Url" name="pt">
                           <input value="{{$workdata->sm_icons['pinterest']}}" type="url" class="form-control" name="pt"/>
                        </x-form>             
                     </div>
                     <div class="col-md-4">
                        <x-form labelname="Linkedin Url" name="ld">
                           <input value="{{$workdata->sm_icons['linkedin']}}" type="url" class="form-control" name="ln"/>
                        </x-form>             
                     </div>
                     <div class="col-md-4">
                        <x-form labelname="Twitter Url" name="tw">
                           <input value="{{$workdata->sm_icons['twitter']}}" type="url" class="form-control" name="tw"/>
                        </x-form>             
                     </div>
                     <div class="col-md-12">
                        <x-form labelname="Work Images (Multipule Upload)" name="workimages">
                            <input  type="file" class="form-control" name="workimages[]" id="images" multiple/>
                        </x-form>
                        <div class="mb-3">
                            <div class="row g-4" id="imagePreview"></div>
                        </div>
                     </div> 
                     <div class="col-md-12 my-5">
                        <div class="row">
                         <ul id="sortable" class=" d-flex gap-3">  
                            @if(!empty($workdata->work_images))
                            @foreach($workdata->work_images as $img)
                              <div class="card w-25" id="sortable-card">
                                 <img data-src="{{$img}}" src="{{asset('upload/'.$img)}}" class="img-fluid"/>
                                 <button type="button" class="close"><i class="bi bi-x-lg"></i></button>
                              </div>
                            @endforeach              
                            @endif
                         </ul>
                    </div>
                     </div>
                      <div class="row">
                        <div class="col-md-6">
                           <label class="form-label">Video 1 </label>
                           <div class="input-group mb-3">                               
                               <div class="input-group-text gap-2">
                                  <label class="btn btn-outline-secondary">
                                    <input @if(!empty($video1) && $video1[0] == '100') {{'checked'}}   @endif  type="radio" name="v1" id="option1" value="100" autocomplete="off"> 100%        
                                  </label>   
                                  <label class="btn btn-outline-secondary">
                                    <input @if(!empty($video1) && $video1[0] == '50') {{'checked'}}   @endif type="radio" name="v1" id="option1" value="50" autocomplete="off"> 50%        
                                  </label>                    
                               </div>
                              <input type="text" class="form-control" name="video1" value="@if(!empty($video1) && $video1[1]) {{$video1[1]}}  @endif">
                            </div>                         
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Video 2</label>
                            <div class="input-group mb-3">                               
                               <div class="input-group-text gap-2">
                                  <label class="btn btn-outline-secondary">
                                    <input @if(!empty($video2) && $video2[0] == '100') {{'checked'}}   @endif type="radio" name="v2" id="option1" value="100" autocomplete="off"> 100%        
                                  </label>   
                                  <label class="btn btn-outline-secondary">
                                    <input  @if(!empty($video2) && $video2[0] == '50') {{'checked'}}   @endif type="radio" name="v2" id="option1" value="50" autocomplete="off"> 50%        
                                  </label>                    
                               </div>
                              <input type="text" class="form-control" name="video2" value="@if(!empty($video2) && $video2[1]) {{$video2[1]}}  @endif">
                            </div>                         
                        </div>
                        <div class="col-md-6">
                           <label class="form-label">Video 3</label>
                           <div class="input-group mb-3">                               
                              <div class="input-group-text gap-2">
                                 <label class="btn btn-outline-secondary">
                                   <input @if(!empty($video3) && $video3[0] == '100') {{'checked'}} @endif type="radio" name="v3" id="option1" value="100" autocomplete="off"> 100%        
                                 </label>   
                                 <label class="btn btn-outline-secondary">
                                   <input @if(!empty($video3) && $video3[0] == '50') {{'checked'}} @endif type="radio" name="v3" id="option1" value="50" autocomplete="off"> 50%        
                                 </label>                    
                              </div>
                             <input type="text" class="form-control" name="video3" value="@if(!empty($video3) && $video3[1]) {{$video3[1]}}  @endif">
                           </div>                         
                       </div>
                       <div class="col-md-6">
                        <label class="form-label">Video 4</label>
                        <div class="input-group mb-3">                               
                           <div class="input-group-text gap-2">
                              <label class="btn btn-outline-secondary">
                                <input @if(!empty($video4) && $video4[0] == '100') {{'checked'}} @endif type="radio" name="v4" id="option1" value="100" autocomplete="off"> 100%        
                              </label>   
                              <label class="btn btn-outline-secondary">
                                <input @if(!empty($video4) && $video4[0] == '50') {{'checked'}} @endif type="radio" name="v4" id="option1" value="50" autocomplete="off"> 50%        
                              </label>                    
                           </div>
                          <input type="text" class="form-control" name="video4" value="@if(!empty($video4) && $video4[1]) {{$video4[1]}}  @endif">
                        </div>                         
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Video 5</label>
                        <div class="input-group mb-3">                               
                           <div class="input-group-text gap-2">
                              <label class="btn btn-outline-secondary">
                                <input @if(!empty($video5) && $video5[0] == '100') {{'checked'}} @endif type="radio" name="v5" id="option1" value="100" autocomplete="off"> 100%        
                              </label>   
                              <label class="btn btn-outline-secondary">
                                <input @if(!empty($video5) && $video5[0] == '50') {{'checked'}} @endif type="radio" name="v5" id="option1" value="50" autocomplete="off"> 50%        
                              </label>                    
                           </div>
                          <input type="text" class="form-control" name="video5" value="@if(!empty($video5) && $video5[1]) {{$video5[1]}}  @endif">
                        </div>                         
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Video 6</label>
                        <div class="input-group mb-3">                               
                           <div class="input-group-text gap-2">
                              <label class="btn btn-outline-secondary">
                                <input @if(!empty($video6) && $video6[0] == '100') {{'checked'}} @endif type="radio" name="v6" id="option1" value="100" autocomplete="off"> 100%        
                              </label>   
                              <label class="btn btn-outline-secondary">
                                <input @if(!empty($video6) && $video6[0] == '50') {{'checked'}} @endif type="radio" name="v6" id="option1" value="50" autocomplete="off"> 50%        
                              </label>                    
                           </div>
                          <input type="text" class="form-control" name="video6" value="@if(!empty($video6) && $video6[1]) {{$video6[1]}}  @endif">
                        </div>                         
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
        $('#sortable img').each(function() {
          const dataSrc = $(this).attr('data-src');
          formdata.append('image_data[]', dataSrc);
        });
        $.ajax({
            url:"{{route('work.update',"$workdata->id")}}",
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
                     $('#submitbtn').html('Update <i class="fas fa-long-arrow-alt-right"></i>');
                     $('#submitbtn').attr('disabled',false)     
                }
            }); 
    });  
    $(document).ready(function() {
    $('#images').on('change', function(e) {
        var files = e.target.files;
        $('#imagePreview').html('');
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').append('<div class="col-md-3"><div class="card"><img src="' + e.target.result + '"></div></div>');
            }
            reader.readAsDataURL(file);
        }
    });
 });
$( function() {
    $( "#sortable" ).sortable();
  });
  $(document).on('click','.close',function(){
    $(this).closest(".card").remove();
  });

  $('#sortable-card .close').on('click', function() {
        var cardDiv = $(this).closest('.card');        
        var dataSrcValue = cardDiv.find('img').data('src');   
        $.ajax({
            url:'{{route('work.removeimg')}}',
            data:{'img':dataSrcValue},
            type:'GET',
            success:function(res){
                  
            }
        }) 
   });
</script>        
@endpush
</x-adminlayout>
