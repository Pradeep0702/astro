<x-adminlayout title="Bussiness Contact"> 
    <div class="content-wrapper">      
        <div class="card border-0 mt-3 p-3" id="table-card">           
            <table class="table table-bordered" id="datatable">
                <thead>
                 <tr>
                     <th>Sr No</th>
                     <th>Full Name</th>
                     <th>Company Name</th>
                     <th>Number of Location</th>
                     <th>Number</th>
                     <th>Email</th>                   
                     <th>Date</th>
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
     ajax: '{{route('b.getdata')}}',
     processing: true,
     serverSide: true,   
     columns: [ 
            { data:'DT_RowIndex'},
            { data:'full_name'}, 
            { data:'company_name',"orderable":false},
            { data:'number_of_location',"orderable":false}, 
            { data:'mobile_number',"orderable":false},    
            { data:'email',"orderable":false},
            { data:'date',"orderable":false},
            { data:'action',"orderable":false},
      ]     
    });    
</script>  
<x-delete href="b.delete"/>
@endpush   
 </x-adminlayout>
