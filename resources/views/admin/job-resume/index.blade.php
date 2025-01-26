<x-adminlayout title="Resume"> 
    <div class="content-wrapper">      
        <div class="card border-0 mt-3 p-3" id="table-card">           
            <table class="table table-striped table-bordered" id="datatable">
                <thead>
                 <tr>
                     <th>Sr No</th>
                     <th>Name</th>
                     <th>phone</th>
                     <th>Email</th>
                     <th>Designation</th>
                     <th>Cv</th>
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
     ajax: '{{route('jobresume.getdata')}}',
     processing: true,
     serverSide: true,   
     columns: [ 
            { data:'index'},
            { data:'name'}, 
            { data:'phone',"orderable":false},
            { data:'email',"orderable":false}, 
            { data:'designation',"orderable":false},    
            { data:'cv',"orderable":false},
            { data:'date',"orderable":false},
            { data:'action',"orderable":false},
      ]     
    });    
</script>  
<x-delete href="jobresume.delete"/>
@endpush   
 </x-adminlayout>
