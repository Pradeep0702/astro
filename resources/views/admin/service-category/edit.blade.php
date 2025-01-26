<x-adminlayout title="Edit Category"> 
    <div class="content-wrapper">
        <div>
            <a href="{{route('service-category.index')}}" class="btn btn-primary f-14"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div> 
        <div class="card mt-3">
           <div class="card-header py-3"><h5>Edit Category</h5></div>
           <div class="card-body">
              <form id="submitform" method="post">
                @csrf
                @method('put')
                 <div class="row">
                     <div class="col-md-12">
                        <x-form labelname="Category Name" name="c_name">
                            <input value="{{$data->category_name}}" type="text" name="c_name" class="form-control f-14" placeholder="Category Name"/>
                         </x-form>           
                     </div> 
                     <div class="col-md-4">
                        <x-form labelname="Category Box Background Color" name="bg">
                            <input type="color" id="bg" name="bg" class="form-control f-14" value="{{$data->category_design['bg']}}"/>
                         </x-form> 
                     </div> 
                     <div class="col-md-4">
                        <x-form labelname="Category Box Text Color" name="text_color">
                            <input type="color" id="text_color" name="text_color" class="form-control f-14" value="{{$data->category_design['text_color']}}"/>
                         </x-form> 
                     </div>   
                     <div class="col-md-4">
                        <x-form labelname="Demo Text" name="text">
                            <input type="text" id="text" class="form-control f-14"/>
                         </x-form> 
                     </div> 
                     <div class="col-md-12">
                        <x-form labelname="Menu Icon Code" name="icon">
                            <input type="text" id="text" value="{{$data->category_icon}}" name="icon" class="form-control f-14"/>
                         </x-form> 
                     </div>                        
                 </div>
                 <button class="btn btn-primary f-14" id="submitbtn">Update <i class="fas fa-long-arrow-alt-right"></i></button>
              </form>              
           </div>
        </div>   
        <div class="card mt-3">
            <div class="card-header py-3"><h5>Color Result</h5></div>
            <div class="card-body">
                <h3 class="resultextbg rounded p-3">Hello</h3>       
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
            url:"{{route('service-category.update',"$data->id")}}",
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success:function(res){
                     if(res.code == 200){
                       window.location.href="{{route('service-category.index')}}"
                     } 
                     if(res.code == 400){
                        $.each(res.message, function(key, value) {
                            $(`#${key}`).html(value); 
                        });
                     }                   
                     $('#submitbtn').html('Update <i class="fas fa-long-arrow-alt-right"></i>');
                     $('#submitbtn').attr('disabled',false)     
                }
            }) 
    }); 

    
    $('#bg').on('input',function(){
        const bg = $('#bg').val();
        $('.resultextbg').css('background-color',bg);
     })

     $('#text_color').on('input',function(){
        const textColor = $('#text_color').val();
        $('.resultextbg').css('color',textColor);
     })

     $('#text').on('input',function(){
        const text = $('#text').val();
        if(text.length > 1){
          $('.resultextbg').html(text);
        }else{
            $('.resultextbg').html('Hello');
        }
     })

     $('#bg').trigger('input');
     $('#text_color').trigger('input');
</script>        
@endpush
</x-adminlayout>
