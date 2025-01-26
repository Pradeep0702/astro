<x-adminlayout title="Pending Blogs"> 
    <div class="px-4 py-2 border-top-0 emp-dashboard">
       <div class="d-lg-flex d-md-flex d-block py-3 pb-4 align-items-center">
        <div>
            <a href="{{route('blog.index')}}" class="btn btn-primary f-14"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div>                
       </div>              
    </div>
    <div class="content-wrapper">
       <div class="container-fluid">
           <div class="row g-4"> 
             @foreach ($pendingblogs as $pendingblog)
              <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('upload/'.$pendingblog->thumbnail_image)}}" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title my-3">{{$pendingblog->title}}</h5>
                      <a href="javascript:void(0);" onclick="blogview({{$pendingblog->id}})" class="btn f-14 btn-primary py-1 rounded-0">View</a>
                      <a href="{{route('blog.edit',$pendingblog->id)}}" class="btn f-14 btn-success py-1 rounded-0">Edit</a>
                      <a href="{{route('blog.accpectblog',['id'=>$pendingblog->id])}}" class="btn f-14 btn-outline-success py-1 rounded-0">Approve</a>
                    </div>
                  </div>
              </div>
             @endforeach
             @if($pendingblogs->count() == 0)
               <div class="alert alert-danger">No Pending Blog Found</div>
             @endif
            </div>
       </div> 
       <div id="blogview"></div>
    </div>
    @push('js')
       <script>         
         function blogview(e){
            $.ajax({
                url:"{{route('blog.blogview')}}",
                data:{'id':e},
                success:function(res){
                    $('#blogview').html(res.html);
                    var myModal = new bootstrap.Modal(document.getElementById('blogmodel'),{});
                    myModal.show(); 
                }
            })
         }
      </script>  
    @endpush
 </x-adminlayout>