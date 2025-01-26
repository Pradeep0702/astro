@extends('frontlayout.mainlayout')
@section('section')
<section id="hero-banner" class="career">
   <h1>Join our team and shape <br> the future with us</h1>
   <p class="para-font-hero">Shape your future with us and explore exciting opportunities to impact industries with innovative solutions.</p>
</section>
<section id="openingsjob" class="ptb">
   <div class="container-fluid res-container">
      <div class="row mx-md-5 mx-lg-5 gy-4">
        @foreach($datas as $key=>$data)<div class="col-12">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-6 col-md-6 text-capitalize jobtype">{{$data->title}}</div>
                     <div class="col-6 col-md-6 "></div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row align-items-center">
                     <div class="col-12 col-md-6">
                        <div class="desgination">{{$data->designation_name}}</div>
                     </div>
                     <div class="col-12 col-md-6 btngrp d-flex gap-3 justify-content-md-end">
                        <a class="btn btn-outline-primary"  data-bs-toggle="collapse" href="#job{{$key}}" role="button" aria-expanded="false" aria-controls="job">View Details</a>
                        <a href="javascript:void(0);" class="btn btn-primary scroll">Apply Now <i class="bi bi-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <span class="jobform"><i class="bi bi-geo-alt"></i> {{$data->work_type}}</span>
                  <span class="jobtime"><i class="bi bi-clock"></i> {{$data->job_type}}</span>                   
               </div>
               <div class="collapse" id="job{{$key}}">
                  <div class="card card-body border-0">
                     @foreach($data->job_details as $jsondata)<div class="my-2"><i class="bi bi-check-circle-fill"></i> {{$jsondata}}</div>@endforeach
                  </div>
               </div>
            </div>
         </div>
         @endforeach</div>
   </div>
</section>
<section id="joinform" class="ptb">
   <div class="container-fluid res-container">
      <div class="row mx-md-3 mx-lg-3">
         <div class="col-md-6 order-1 order-md-1 order-lg-1">
            <form id="careerform">
               @csrf
               @method('post')
               <h2 class="text-center">Would you like to join our team</h2>
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">                        
                        <input name="name" type="text" class="form-control" placeholder="Name">
                        <span id="name-error" class="badge text-danger fw-medium"></span>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">                        
                        <input name="number" type="text" class="form-control" placeholder="Number" inputmode="numeric" maxlength="10">
                        <span id="number-error" class="badge text-danger fw-medium text-wrap"></span>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">                        
                        <input name="email" type="email" class="form-control" placeholder="Email">
                        <span id="email-error" class="badge text-danger fw-medium text-wrap"></span>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <select class="form-control" name="designation">
                           <option value="">Select Desgination</option>
                           <option value="Performance Marketer">Performance Marketer</option>
                           <option value="Social Media Manager">Social Media Manager</option>
                           <option value="Business Development Manager">Business Development Manager</option>
                           <option value="Business Development Associate">Business Development Associate</option>
                           <option value="Graphic Designer">Graphic Designer</option>
                           <option value="Motion Graphic Designer">Motion Graphic Designer</option>
                           <option value="Android App Developer">Android App Developer</option>
                           <option value="IOS App Developer">IOS App Developer</option>
                           <option value="Web Designer"> Web Designer</option>
                           <option value="Web Developer">Web Developer</option>
                           <option value="Content Writer">Content Writer</option>
                           <option value="Content Creator">Content Creator</option>
                           <option value="Influencer marketer">Influencer marketer</option>
                           <option value="Photographer">Photographer</option>
                           <option value="Cinematographer">Cinematographer</option>
                         </select>
                         <span id="designation-error" class="badge text-danger fw-medium text-wrap"></span>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3 choosen">
                        <input type="file" name="file" class="form-control" placeholder="upload your cv">
                        <div class="formupload">
                           <i class="bi bi-cloud-arrow-up text-white"></i>
                           <div class="text-white">Upload Your CV</div>
                           <div class="filename text-white badge"></div>
                        </div>
                     </div>
                     <span id="file-error" class="badge text-danger fw-medium text-wrap"></span>
                  </div>
                  <div class="text-center">
                     <button class="btn btn-primary" id="submitbtn">Apply Now</button>
                  </div>
               </div>
            </form>
         </div>
         <div class="col-md-6 order-2 order-md-2 order-lg-2">
            <img src="{{asset('images/career.png')}}" alt="career" class="img-fluid"/>
         </div>
      </div>
   </div>
</section>
@endsection
@push('js')
<script>
   const notyf = new Notyf({dismissible: true,position: {x: 'right', y: 'top',}});
   $('#careerform').on('submit',function(e){
       e.preventDefault();
       $('#submitbtn').html('<div class="spinner-border" role="status"></div>');
       $('#submitbtn').attr('disabled',true); 
       $('#name-error').empty();
       $('#number-error').empty();
       $('#email-error').empty();
       $('#designation-error').empty();
       $('#file-error').empty();
       var formdata = new FormData(this);
       $.ajax({
         url:"{{route('apply.store')}}",
         type:'POST',
         data:formdata,
         contentType: false,
         processData: false,
         success:function(res){            
             $('#submitbtn').html('Apply Now');
             $('#submitbtn').attr('disabled',false); 
             if(res.code == 400){
               $('#name-error').html(res.message.name);
               $('#number-error').html(res.message.number);
               $('#email-error').html(res.message.email);
               $('#email-error').html(res.message.email);
               $('#designation-error').html(res.message.designation);
               $('#file-error').html(res.message.file);
             }
             if(res.code == 200){
                notyf.success('Successfully submitted'); 
                $('#careerform')[0].reset();
                $('.filename').empty()
             }
          }
       })
   });
    $('.scroll').on('click',function(e){ 
          document.getElementById('joinform').scrollIntoView({
           behavior: 'smooth'
           });
    })
</script>
@endpush