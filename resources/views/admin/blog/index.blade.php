<x-adminlayout title="Blog"> 
    <div class="content-wrapper">   
        <div>
            <a href="{{route('blog.create')}}" class="btn btn-primary f-14"><i class="fas fa-plus"></i> Add Blog</a>
       </div>  
       @if(session()->has('type') && session()->has('message')) 
       <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">   
        {{session('message')}}     
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
       @endif
        <div class="card border-0 mt-3 p-3" id="table-card">           
            <table class="table table-striped table-bordered" id="datatable">
                <thead>
                 <tr>
                     <th>Sr No</th>
                     <th>Category Name</th> 
                     <th>Title</th> 
                     <th>Slug</th>  
                     <th>Created_at/Updated_at</th>          
                     <th>Action</th>
                 </tr>
                </thead>
                 <tbody>                   
                 </tbody>
            </table>
        </div>             
    </div>
@push('js')
<script>  
    const tabledata = new DataTable('#datatable', {
     ajax: '{{route('blog.getdata')}}',
     processing: true,
     serverSide: true,   
     columns: [ 
            { data:'DT_RowIndex'},
            { data:'category_name'},   
            { data:'title'},
            { data:'slug'}, 
            { data:'cu'},
            { data:'action',"orderable":false},
      ]     
    });    
</script>  
<x-delete href="blog.delete"/>
@endpush   
 </x-adminlayout>
