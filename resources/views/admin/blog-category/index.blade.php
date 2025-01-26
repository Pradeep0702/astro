<x-adminlayout title="Blog Category"> 
    <div class="content-wrapper">   
        <div>
            <a href="{{route('blog-category.create')}}" class="btn btn-primary f-14"><i class="fas fa-plus"></i> Add Category</a>
        </div>   
        <div class="card border-0 mt-3 p-3" id="table-card">           
            <table class="table table-striped table-bordered" id="datatable">
                <thead>
                 <tr>
                     <th>Sr No</th>
                     <th>Category Name</th>           
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
     ajax: '{{route('blogcategory.getdata')}}',
     processing: true,
     serverSide: true,   
     columns: [ 
            { data:'index'},
            { data:'c_name'},    
            { data:'action',"orderable":false},
      ]     
    });    
</script>  
<x-delete href="blogcategory.delete"/>
@endpush   
 </x-adminlayout>
