<x-adminlayout title="Edit Admin User"> 
    <div class="content-wrapper">
        <div>
            <a href="{{route('admin-user.index')}}" class="btn btn-primary f-14"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div> 
        <div class="card mt-3">
           <div class="card-header py-3"><h5>Edit Admin User</h5></div>
           <div class="card-body">
            <form id="submitform" method="post">
                @csrf          
                @method('PUT')
                 <div class="row">
                     <div class="col-md-6">
                        <x-form labelname="Name" name="name">
                            <input value="{{$data->name}}" type="text" name="name" class="form-control f-14" placeholder="Name"/>
                        </x-form>
                     </div>
                     <div class="col-md-6">
                         <x-form labelname="Email" name="email">
                            <input value="{{$data->email}}" type="text" name="email" class="form-control f-14" placeholder="Email"/>
                         </x-form>                    
                     </div>
                     <div class="col-md-6">
                        <x-form labelname="Role Type" name="role_type">
                            <select class="form-control f-14" name="role_type">                      
                                <option {{$data->role == 'admin' ? 'selected' : ''}} value="admin">Admin</option>
                                <option {{$data->role == 'user' ? 'selected' : ''}}  value="user">User</option>
                              </select> 
                        </x-form>                                                     
                    </div>                                    
                 </div>
                 <button class="btn btn-primary f-14" id="submitbtn">Update <i class="fas fa-long-arrow-alt-right"></i></button>
              </form> 
           </div>
        </div>                     
    </div>    
@push('js')
<script>
     $(document).ready(function(){
    $(document).on('submit','#submitform',function(e){
        e.preventDefault();
        $('.validation-error').empty();
        $('#submitbtn').html('<div class="spinner-border" role="status"></div> Loading...');
        $('#submitbtn').attr('disabled',true)
        const formdata = new FormData(this);        
        $.ajax({
            url:"{{route('admin-user.update',$data->id)}}",
            type: 'POST',
            data: formdata ,
            contentType: false,
            processData: false,
            success:function(res){
                     if(res.code == 200){
                       window.location.href="{{route('admin-user.index')}}"
                     }    
                     if(res.code == 400) {
                        $.each(res.message, function(key, value) {
                            $(`#${key}`).html(value); 
                        });
                     }                 
                     $('#submitbtn').html('Update <i class="fas fa-long-arrow-alt-right"></i>');
                     $('#submitbtn').attr('disabled',false);
                     
                }
            }) 
    });
  });
</script>        
@endpush
 </x-adminlayout>
