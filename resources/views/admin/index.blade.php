@extends('admin.backlayout.mainlayout')
@section('section')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    :root{--primarybgColor:#F2F4F7}body,html{height:100%;background:var(--primarybgColor)}body{font-family:Poppins,sans-serif}.container{display:flex;justify-content:center;align-items:center;height:100%}.card{width:350px;margin:auto}.colored-toast.swal2-icon-success{background-color:#a5dc86!important}.colored-toast .swal2-close,.colored-toast .swal2-html-container,.colored-toast .swal2-title{color:#fff}
</style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-3">Login</h2>
            <form id="formsubmit">
                @csrf
                @method('post')
                @if(session('otp') != 1 )
                <div class="mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
                     <div class="text-danger badge" id="error_email"></div>
                </div>  
                @else 
                <div class="mb-3">
                    <input type="hidden" value="{{session('email')}}" name="re_email"/>
                    <input type="text" maxlength="6" inputmode="numeric" name="otp" class="form-control" placeholder="Enter Your OTP">
                     <div class="text-danger badge" id="error_otp"></div>
                </div>  
                @endif             
                <div class="d-grid gap-2">
                    @if(session('otp') != 1 )
                     <button type="submit" class="btn btn-primary btn-block" id="btn">Request OTP</button>
                     @else 
                     <button type="submit" class="btn btn-primary btn-block otp" id="btn">Login</button>
                    @endif 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
 <script>
  $("#formsubmit").on("submit",function(t){t.preventDefault(),$("#btn").html("Loading..."),$("#btn").attr("disabled",!0),$.ajax({url:"{{session('otp') != 1 ? route('back.emailauth') : route('back.otpverify') }}",type:"POST",data:$("#formsubmit").serialize(),success:function(t){$("#btn").html("Request OTP"),$(".otp").html("Login"),$("#btn").attr("disabled",!1),400==t.code&&($("#error_email").html(t.errors.email),$("#error_otp").html(t.errors.otp)),404==t.code&&($("#error_email").html(t.message),$("#error_otp").html(t.message)),200==t.code&&location.reload(),200==t.code&&!0==t.status&&(window.location.href="{{route('back.dashboard')}}")}})});
</script>
<x-alert/>
@endpush
@php session()->forget('otp'); @endphp