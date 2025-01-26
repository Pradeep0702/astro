<script>
    function status(e){        
        $.ajax({
           url:"{{route("$href")}}",
           type:"GET",
           data:{'id':e},
           success:function(res){
            tabledata.draw();
           }
        });         
     }
</script>