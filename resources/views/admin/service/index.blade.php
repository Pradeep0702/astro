<x-adminlayout title="Service Page"> 
    <div class="content-wrapper">   
        <div>
            <a href="{{route('service.create')}}" class="btn btn-primary f-14"><i class="fas fa-plus"></i> Add Page</a>
        </div>   
        <div class="card border-0 mt-3 p-3" id="table-card">           
            <table class="table table-striped table-bordered" id="datatable">
                <thead>
                 <tr>
                     <th>Sr No</th>
                     <th>Category Name</th>     
                     <th>Page Name</th>       
                     <th>Action</th>
                 </tr>
                </thead>
                 <tbody id="sortable" class="text-capitalize">                   
                 </tbody>
            </table>
        </div>             
    </div>
@push('js')
<script>  
  
    const tabledata = new DataTable('#datatable', {
     ajax: '{{route('service.getdata')}}',
     processing: true,
     serverSide: true,   
     columns: [ 
            { data:'DT_RowIndex'},
            { data:'cat_name'}, 
            { data:'menu_name'},   
            { data:'action',"orderable":false},
        ]    
    });  
    
</script> 
<x-delete href="service.delete"/>
@endpush   
 </x-adminlayout>
