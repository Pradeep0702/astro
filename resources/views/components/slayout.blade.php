@extends('frontlayout.mainlayout')
@section('section')
<section id="hero-banner">    
    <h1>{!! $heading !!}</h1>
    <p class="para-font-hero">{!! $hpara !!}</p>
    <div class="gap-md-3 gap-3 d-flex">
          <a href="{{ route('front.work') }}" class="btn btn-outline-primary w-100">Case Study</a>
        <a href="{{route('front.getstarted')}}" class="btn btn-primary w-100">Schedule a Meeting</a>      
    </div>
</section>
<section id="service-inner-page" class="ptb">
    <h2 class="text-center mb-5">{{$heading2}}</h2>   
     <div class="container-fluid res-container">  
        <div class="row mx-md-5 mx-lg-5 g-4">
             <div class="col-md-4 col-lg-4">
                <div class="card h-100">
                    <div class="card-header">{!! html_entity_decode($cardicon1) !!}</div>                    
                    <div class="card-body">
                      <div class="card-title">{!! $ch1 !!}</div>
                       <p>{!! $cpara1 !!}</p>
                    </div>
                </div>
             </div> 
             <div class="col-md-4 col-lg-4">
                <div class="card h-100">
                    <div class="card-header">{!! html_entity_decode($cardicon2) !!}</div>
                    <div class="card-body">
                        <div class="card-title">{!! $ch2 !!}</div>
                         <p>{!! $cpara2 !!}</p>
                      </div>
                </div>
             </div>
             <div class="col-md-4 col-lg-4">
                <div class="card h-100">
                    <div class="card-header">{!! html_entity_decode($cardicon3) !!}</div>
                    <div class="card-body">
                        <div class="card-title">{!! $ch3 !!}</div>
                         <p>{!! $cpara3 !!}</p>
                      </div>
                </div>
             </div> 
        </div>
     </div>
</section>
 {{$slot}}
@include('frontlayout.contactform')
@endsection