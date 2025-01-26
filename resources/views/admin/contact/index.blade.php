<x-adminlayout title="Contact"> 
    <div class="content-wrapper">      
        <div class="card border-0 mt-3 p-3" id="table-card">           
            <table class="table table-bordered" id="datatable">
                <thead>
                 <tr>
                     <th>Sr No</th>
                     <th>Name</th>
                     <th>phone</th>
                     <th>Email</th>
                     <th>Country</th>
                     <th>Message</th>
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
     ajax: '{{route('contact.getdata')}}',
     processing: true,
     serverSide: true,   
     columns: [ 
            { data:'DT_RowIndex'},
            { data:'name'}, 
            { data:'phone',"orderable":false},
            { data:'email',"orderable":false}, 
            { data:'country',"orderable":false},    
            { data:'message',"orderable":false},
            { data:'date',"orderable":false},
            { data:'action',"orderable":false},
      ]     
    });    
</script>  
<x-delete href="contact.delete"/>
@endpush   
 </x-adminlayout>
