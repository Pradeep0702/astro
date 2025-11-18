<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@if(Route::currentRouteName() != 'back.auth')
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script src="{{asset('backhand/js/script.js')}}"></script>  
@endif
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
     });


    function textEditore() {
            $('.summernoteService').summernote({
                placeholder: 'Write Here',
                tabsize: 2,
                height: 120,
                toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['undo', 'redo', 'codeview']]
                ],
            });
    }
    textEditore()

    $('.summernoteConent').summernote({
        placeholder: 'Write Here',
        tabsize: 2,
        height: 120,     
    });
</script>
@stack('js')
<x-alert/>
</body>
</html>