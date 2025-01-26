@extends('frontlayout.mainlayout')
@section('section')
<section id="hero-banner" class="work">
   <h1>Only when you see, <br> you will understand us</h1>
   <p class="para-font-hero">Explore our portfolio to see how we turn ideas into impactful digital solutions that drive success.</p>
</section>
<section id="allwork" class="ptb">
   <h2 class="text-center font-size-heading">Our Recent Work</h2>
   <p class="para-font">Unveil Our Latest Work and Witness Creativity in Motion</p>
   <div class="container-fluid res-container">
      <div class="row mx-md-5 mx-lg-5">
         <div class="col-md-12">
            <div id="myTabs">
               <ul class="nav nav-pills nav-fill" role="tablist">
                  @foreach ($datas as $key=>$data)
                  <li class="nav-item">
                     <a class="nav-link {{$key == 0  ? 'active' : '' }}" data-bs-toggle="pill" href="#tab{{$key}}">{{$data->category_name}}</a>
                  </li>
                  @endforeach
               </ul>
            </div>
            <select class="form-select mt-3" id="mobileNavSelect">
            </select>           
            <div class="tab-content  mt-5" id="pills-tabContent">
               @foreach ($datas as $key => $data)
               <div id="tab{{$key}}" class="tab-pane fade {{$key == 0 ? 'show active' : '' }}" role="tabpanel">
                   <div class="row mx-md-3 mx-lg-3 g-4">
                       @foreach ($catdatas as $catdata)
                           @php
                               $cate_name = $catdata->withdata->first()->category_name ?? '';
                           @endphp
                           @if ($data->category_name == $cate_name || $data->category_name == 'All')
                               <div class="col-md-3">
                                   <a href="{{ route('front.workurl', ['workurl' => $catdata->slug]) }}">
                                       <div class="card">
                                           <img src="{{asset('upload/' . $catdata->thumbnail_image) }}" class="img-fluid" alt=""/>
                                           <div class="readmore"><img src="{{ asset('images/right.png') }}" class="img-fluid"/></div>
                                       </div>
                                   </a>
                               </div>
                           @endif
                       @endforeach
                   </div>
               </div>
           @endforeach           
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
@include('frontlayout.contactform')
@endsection