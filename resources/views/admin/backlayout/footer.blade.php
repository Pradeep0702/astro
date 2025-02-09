<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
@if(Route::currentRouteName() != 'back.auth')
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script src="{{asset('backhand/js/script.js')}}"></script>  
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('js')
<x-alert/>
</body>
</html>