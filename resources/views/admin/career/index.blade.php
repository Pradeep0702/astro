<x-adminlayout title="Career"> 
    <div class="content-wrapper">   
        <div>
            <a href="{{route('career.create')}}" class="btn btn-primary f-14"><i class="fas fa-plus"></i> Add Career</a>
        </div>    
        <div class="card border-0 mt-3 p-3" id="table-card">           
            <table class="table table-bordered table-striped w-100" id="datatable">
                <thead>
                 <tr>
                     <th>Sr No</th>
                     <th>Job Title Name</th>
                     <th>Designation Name</th>
                     <th>Job Type</th>
                     <th>Work Type</th>
                     <th>Job Details</th>
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
     ajax: '{{route('career.getdata')}}',
     processing: true,
     serverSide: true,   
     columns: [ 
            { data:'DT_RowIndex'},
            { data:'title'}, 
            { data:'designation_name',"orderable":false},
            { data:'job_type',"orderable":false}, 
            { data:'work_type',"orderable":false},    
            { data:'job_deatils',"orderable":false},
            { data:'status',"orderable":false},
            { data:'action',"orderable":false},
      ]     
    });    
</script>  
<x-delete href="career.delete"/>
<x-status href="career.status"/>
@endpush   
 </x-adminlayout>
