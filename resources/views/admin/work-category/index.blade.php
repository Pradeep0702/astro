<x-adminlayout title="Work Category"> 
    <div class="content-wrapper">   
        <div>
            <a href="{{route('work-category.create')}}" class="btn btn-primary f-14"><i class="fas fa-plus"></i> Add Category</a>
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
                 <tbody id="sortable">                   
                 </tbody>
            </table>
        </div>             
    </div>
@push('js')
<script>  
  
    const tabledata = new DataTable('#datatable', {
     ajax: '{{route('workcategory.getdata')}}',
     processing: true,
     serverSide: true,   
     columns: [ 
            { data:'index'},
            { data:'c_name'},    
            { data:'action',"orderable":false},
      ],drawCallback: function(settings) {  
        console.log(settings.json.data) 
        $('#datatable').find('tbody tr').attr('role', 'row');          
        $.each(settings.json.data, function(index, item) {
            $('#datatable').find('tbody tr').eq(index).attr('data-id',item.id); 
        });
      }   
    });   
    $( "#sortable" ).sortable({
        update:function(){
            changeorder();
        }         
    });
    function changeorder(){
         var newdataid = [];
        $('#sortable tr').each(function() {
          const dataId = $(this).attr('data-id');     
          newdataid.push(dataId);
        });
        $.ajax({
            url:"{{route('workcategory.order')}}",
            type:'GET',
            data:{'id':newdataid},
            success:function(res){
                tabledata.draw();
            }
        }) 
    }
</script> 
<x-delete href="workcategory.delete"/>
@endpush   
 </x-adminlayout>
