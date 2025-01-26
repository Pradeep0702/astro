<script>
function deletedata(e){
    Swal.fire({
    title: "Are you sure?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
    }).then((result) => {
    if (result.isConfirmed) {   
        $.ajax({
          url:"{{route("$href")}}",
          type:"GET",
          data:{'id':e},
          success:function(res){
            if(res.code == 200){
                tabledata.draw();
                Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
                });
              }
             if(res.code == 400 && res.page == 'blog'){
              tabledata.draw();
                Swal.fire({
                title: `${res.message}`,              
                icon: "error"
                });
             } 
          } 
        })
    }
    });        
 }
</script>