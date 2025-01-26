@extends('frontlayout.mainlayout')
@php
    $iconPaths = [
        'facebook' => 'images/icon/facebook.png',
        'instagram' => 'images/icon/instagram.png',
        'youtube' => 'images/icon/youtube.png',
        'pinterest' => 'images/icon/pinterest.png',
        'linkedin' => 'images/icon/linkedin.png',
        'twitter' => 'images/icon/twitter.png',
    ];
    $showDiv = false;
    foreach($data->sm_icons as $key => $icon) {
        if (array_key_exists($key, $iconPaths) && !empty($icon)) {
            $showDiv = true;
            break;
        }
    }
    $video1_width = $video1[0];
    $video2_width = $video2[0];
    $video3_width = $video3[0];
    $video4_width = $video4[0];
    $video5_width = $video5[0];
    $video6_width = $video6[0];
    
    $video1_url = $video1[1];
    $video2_url  = $video2[1];
    $video3_url = $video3[1];
    $video4_url  = $video4[1];
    $video5_url  = $video5[1];
    $video6_url  = $video6[1];
    
@endphp
@section('section')
<section class="work">
    <img src="{{asset('upload/'.$data->hero_banner)}}" class="img-fluid" alt="hero_banner"/>
</section>
<section id="singlework" class="ptb">
    <div class="container-fluid res-container"> 
         <div class="row mx-md-3 mx-lg-3 g-4">
           <div class="col-12 col-md-4">
            <img src="{{asset('upload/'.$data->client_logo)}}" class="img-fluid" alt="{{$data->title}}"/>
           </div>
           <div class="col-12 col-md-8">
            <h3 class="mb-3">About {{$data->title}}</h3>             
            @if($showDiv)
            <div class="icon alert alert-secondary rounded-0 border-start border-top-0 border-bottom-0 border-end-0 border-5 border-secondary">
                @foreach($data->sm_icons as $key => $icon)
                    @if(array_key_exists($key, $iconPaths) && !empty($icon))
                        <a target="_blank" href="{{$icon}}">
                            <img src="{{asset($iconPaths[$key])}}" alt="{{$key}}" class="sm-icon img-fluid"/>
                        </a>
                    @endif
                @endforeach
            </div>
           @endif
             <p>{{$data->content}}</p>
           </div>
         </div>
    </div>
</section>
<section id="work-show-page" class="ptb">
  <div class="container-fluid res-container"> 
     <div class="row mx-md-3 mx-lg-3 g-3">
        @if($video1 != 'no')
        <div class="col-md-{{$video1_width == '50' ? '6' : '12'}}">
            <iframe width="100%" height="{{$video1_width == '50' ? '360' : '720'}}" src="{{$video1_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        @endif
        @if($video2 != 'no')
        <div class="col-md-{{$video2_width == '50' ? '6' : '12'}}">
            <iframe width="100%" height="{{$video2_width == '50' ? '360' : '720'}}" src="{{$video2_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        @endif
        @if($video3 != 'no')
        <div class="col-md-{{$video3_width == '50' ? '6' : '12'}}">
            <iframe width="100%" height="{{$video3_width == '50' ? '360' : '720'}}" src="{{$video3_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        @endif
        @if($video4 != 'no')
        <div class="col-md-{{$video4_width == '50' ? '6' : '12'}}">
            <iframe width="640" height="{{$video4_width == '50' ? '360' : '720'}}" src="{{$video4_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        @endif
        @if($video5 != 'no')
        <div class="col-md-{{$video5_width == '50' ? '6' : '12'}}">
            <iframe width="100%" height="{{$video5_width == '50' ? '360' : '720'}}" src="{{$video5_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        @endif
        @if($video6 != 'no')
        <div class="col-md-{{$video6_width == '50' ? '6' : '12'}}">
            <iframe width="100%" height="{{$video6_width == '50' ? '360' : '720'}}" src="{{$video6_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        @endif
    </div> 
    <div class="row mx-md-3 mx-lg-3">
     @foreach ($data->work_images as $item)
      <div class="col-md-12 my-2">
          <img src="{{asset('upload/'.$item)}}" class="img-fluid" alt=""/>
      </div>
      @endforeach
    </div>
</div>
</section>
<section id="prev-next" class="text-center">
     <div class="d-flex align-items-center justify-content-center gap-3">
        @if(!empty($prev->slug))
        <a href="{{route('front.workurl',['workurl'=>$prev->slug])}}" class="left button">
            <i class="me-2 bi bi-arrow-left fs-5"></i> Prev Project
        </a>
        @endif
        @if(!empty($prev->slug) && !empty($next->slug))
          <div class="vline"></div>  
        @endif
      
       
        @if(!empty($next->slug))
        <a href="{{route('front.workurl',['workurl'=>$next->slug])}}" class="right button">
            Next Project <i class="ms-2 bi bi-arrow-right fs-5"></i>
        </a>
        @endif
     </div>
</section>
@include('frontlayout.contactform')
@endsection