<x-adminlayout title="All Admin User"> 
    <div class="content-wrapper">   
        <div>
            <a href="{{route('admin-user.create')}}" class="btn btn-primary f-14"><i class="fas fa-plus"></i> Add Admin User</a>
        </div>   
        <div class="card border-0 mt-3 p-3" id="table-card">           
            <table class="table table-striped table-bordered" id="datatable">
                <thead>
                 <tr>
                     <th>Sr No</th>
                     <th>Name</th> 
                     <th>Email</th> 
                     <th>Role</th>    
                     <th>Status</th>       
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
     ajax: '{{route('adminuser.getdata')}}',
     processing: true,
     serverSide: true,   
     columns: [ 
            { data:'DT_RowIndex'},
            { data:'name'},   
            { data:'email'}, 
            { data:'role'},
            { data:'status'},
            { data:'action',"orderable":false},
      ]     
    });    
</script>  
<x-delete href="adminuser.delete"/>
<x-status href="adminuser.status"/>
@endpush   
 </x-adminlayout>
