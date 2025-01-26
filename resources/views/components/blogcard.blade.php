@php 
$decodecontent= htmlspecialchars_decode(strip_tags($des));
$withouttags = strip_tags($decodecontent);
strip_tags($withouttags);
@endphp
<div class="col-12 col-sm-2 col-md-4 col-lg-4">
    <a href="{{route('front.blogurl',$url)}}">
       <div class="card h-100">
          <img data-src="{{asset('upload/'.$image)}}" src="{{asset('upload/'.$image)}}" class="img-fluid lazy" alt=""/> 
          <div class="card-body">
             <h2 class="title">{{$title}}</h2>
             <p class="des text-truncate">{!! $withouttags !!}</p>
          </div>
          <div class="card-footer d-flex">
             <div class="authorname">{{date('d M Y',strtotime($date))}}</div>
             <div class="category">{{$cat}}</div>
          </div>
       </div>
    </a>
 </div>