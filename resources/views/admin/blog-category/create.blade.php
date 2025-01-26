<x-adminlayout title="Create Category"> 
    <div class="content-wrapper">
        <div>
            <a href="{{route('blog-category.index')}}" class="btn btn-primary f-14"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div> 
        <div class="card mt-3">
           <div class="card-header py-3"><h5>Create Category</h5></div>
           <div class="card-body">
              <form id="submitform" method="post">
                @csrf
                @method('post')
                 <div class="row">
                     <div class="col-md-12">                    
                         <x-form labelname="Category Name" name="c_name">
                            <input type="text" name="c_name" class="form-control f-14" placeholder="Category Name"/>
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
            url:"{{route('blog-category.store')}}",
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success:function(res){
                     if(res.code == 200){
                       window.location.href="{{route('blog-category.index')}}"
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
