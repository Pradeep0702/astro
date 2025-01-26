<x-adminlayout title="Work"> 
    <div class="content-wrapper">
        <div>
            <a href="{{route('work.create')}}" class="btn btn-primary f-14"><i class="fas fa-plus"></i> Add Work</a>
        </div>  
        <div class="card border-0 mt-3 p-3 table-responsive" id="table-card">           
            <table class="table table-striped table-bordered list-view" id="datatable">
                <thead>
                 <tr>
                     <th>Sr No</th>
                     <th>title</th>
                     <th>Category Name</th>
                     <th>Slug</th>
                     <th>Show Images</th>
                     <th>Action</th>
                 </tr>
                </thead>
                 <tbody>                   
                 </tbody>
            </table>
        </div>             
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1"  tabindex="-1" id="showimg" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <span>X</span>
            </button>
          </div>   
        <div class="offcanvas-body">
            <div class="container-fluid">
                 <div class="row show-images gy-2">
                                      
                 </div>
            </div>
        </div>
    </div>
@push('js')
<script>  
    const tabledata = new DataTable('#datatable', {
     ajax: '{{route('work.getdata')}}',
     processing: true,
     serverSide: true,   
     columns: [ 
            { data:'DT_RowIndex'},
            { data:'title'}, 
            { data:'category_name',"orderable":false},
            { data:'slug',"orderable":false},
            { data:'showimages',"orderable":false},
            { data:'action',"orderable":false},
      ]     
    });

    function showimages(e){
        $('.show-images').html('<div class="spinner-border" role="status"></div>');
         $.ajax({
             url:'{{route('work.getimages')}}',
             type:'get',
             data:{'id':e},
             success:function(res){
                 $('.show-images').html(res.html);
             }
         })
    }
</script> 
<x-delete href="work.delete"/> 
@endpush   
 </x-adminlayout>
