@extends('admin.backlayout.mainlayout')
@section('section')
<div class="body-wrapper clearfix">
   <header class="main-header clearfix bg-white" id="header">
      <div class="container-fluid">
         <div class="row align-items-center">
            <div class="col-10 col-md-8">
              <h2 class="header-page-title mb-0 pr-3 text-dark f-18 font-weight-bold d-flex align-items-center">
                 <span class="d-inline-block text-truncate mw-300">{{$title}}</span>                 
              </h2>
              <div class="d-block d-lg-none menu-collapse cursor-pointer position-relative" onclick="openMobileMenu()">
                 <div class="mc-wrap">
                    <div class="mcw-line"></div>
                    <div class="mcw-line center"></div>
                    <div class="mcw-line"></div>
                 </div>
              </div>
            </div>
            <div class="col-2 col-md-4">
              <div class="page-header-right float-end d-flex align-items-center justify-content-end">
                 <a href="{{route('back.logout')}}"><i class="fas fa-power-off"></i></a>
               </div>
            </div>
        </div> 
      </div> 
   </header>
   <div class="page-title d-block d-lg-none">
      <div class="page-heading">
         <h2 class="mb-0 pe-3 text-dark f-18 font-weight-bold d-flex align-items-center">
            <span class="d-inline-block text-truncate mw-300">{{$title}}</span>
            <span class="text-lightest f-12 f-w-500 ms-2 mw-250 text-truncate">
            <a href="#" class="text-lightest">Home</a> &bull;
            {{$title}}
            </span>
         </h2>
      </div>
   </div>
   <section class="main-container bg-additional-grey mb-5 mb-sm-0" id="fullscreen">      
      {{$slot}}
   </section> 
</div>
@endsection

