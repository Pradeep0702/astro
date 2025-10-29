@if(session()->has('type') && session()->has('message'))
<script>
let ToastFire = Swal.mixin({
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
ToastFire.fire({
  icon: "{{session('type')}}",
  title: "{{session('message')}}"
});
</script>
@endif