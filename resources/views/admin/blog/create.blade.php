<x-adminlayout title="Create Blog"> 
    <div class="content-wrapper">
        <div>
            <a href="{{route('blog.index')}}" class="btn btn-primary f-14"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div> 
        <div class="card mt-3">
           <div class="card-header py-3"><h5>Create Blog</h5></div>
           <div class="card-body">
              <form id="submitform" method="post" class="d-zone">
                @csrf
                @method('post')
                 <div class="row">
                    <div class="col-md-12">
                       <x-form labelname="Blog Category" name="category">
                          <select name="category" class="form-control f-14">
                          <option value="">Select Category</option>
                          @foreach ($datas as $data)
                               <option value="{{$data->id}}">{{$data->category_name}}</option>
                          @endforeach
                         </select>
                       </x-form>
                     </div> 
                     <div class="col-md-12">
                         <x-form labelname="Blog Title" name="title">
                          <input type="text" name="title" class="form-control f-14" placeholder="Title"/>
                         </x-form>          
                     </div>  
                     <div class="col-md-12">
                        <x-form labelname="Blog Meta Description" name="meta_d">
                        <input type="text" name="meta_d" class="form-control f-14" placeholder="Meta Description"/>
                        </x-form>          
                     </div>
                     <div class="col-md-12">
                       <x-form labelname="Blog Meta Keywords (Use a comma after a keyword like abc , xyz)" name="meta_key">
                        <input type="text" name="meta_key" class="form-control f-14" placeholder="Meta Keywords"/>
                      </x-form>          
                     </div>
                      <div class="col-md-12">
                        <x-form labelname="Thumbnail Image (Image Size 1600 X 840)" name="t_image">
                          <input accept="image/webp" type="file" class="form-control file" name="t_image"/>
                        </x-form> 
                      </div> 
                      <div class="col-md-12">
                         <x-form labelname="Content" name="content">
                          <textarea id="content-area" class="form-control" name="content"></textarea>
                        </x-form>
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
            url:"{{route('blog.store')}}",
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success:function(res){
                     if(res.code == 200){
                       window.location.href="{{route('blog.index')}}"
                     }      
                     if(res.code == 400){
                      $.each(res.message, function(key, value) {
                            $(`#${key}`).html(value); 
                        });                    
                     }   
                     if(res.code == 404){
                       $('#title').html(res.message); 
                     }           
                     $('#submitbtn').html('Submit <i class="fas fa-long-arrow-alt-right"></i>');
                     $('#submitbtn').attr('disabled',false)     
              }
          }) 
       }); 
     $('#content-area').summernote({  
            fontNames: ['Poppins', 'Arial Black', 'Comic Sans MS', 'Courier New'],         
            callbacks: {
             onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            },onMediaDelete:function(target, editor, editable) {
                     var deletesrc = target[0].src.split('/').pop(); 
                     deleteImage(deletesrc);                    
            }
        }
     });
  function sendFile(file, editor, welEditable) {
    data = new FormData();
    data.append("file", file);
    data.append("_token","{{csrf_token()}}");
    $.ajax({
      data: data,
      type: "POST",
      url: "{{route('blog.upload.image')}}",
      cache: false,
      contentType: false,
      processData: false,
      success: function(res) {
        $('#content-area').summernote('insertImage', res.url);
      }
    });
  } 
  function deleteImage(e){
    data = new FormData();
    data.append("file", e);
    data.append("_token","{{csrf_token()}}");
    $.ajax({
      data: data,
      type: "POST",
      url: "{{route('blog.delete.image')}}",
      cache: false,
      contentType: false,
      processData: false,
      success: function(res) {
        $('#content-area').summernote('insertImage', res.url);
      }
    });
  }
</script>        
@endpush
</x-adminlayout>
