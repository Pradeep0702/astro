@extends('frontlayout.mainlayout')
@section('title',$data->title)
@section('description',$data->meta_d)
@section('keywords',$data->meta_key)
@section('section')
 <section id="blog-content" class="ptb">
 <div class="container-fluid mt-5">
    <div class="row mx-md-5 mx-lg-5">  
        <div class="col-lg-8">
            <article class="custom-shadow p-4 mb-4 bg-white rounded">
                <h1 class="blog-title mb-3">{{$data->title}}</h1>
                <p class="text-muted">{{date('d M Y',strtotime($data->created_at))}}</p>
                <img src="{{public_path('upload/'.$data->thumbnail_image)}}" class="img-fluid post-img mb-4" alt="Blog Post Image">
                <p>{!! htmlspecialchars_decode($data->content) !!}</p>
                </article>
        </div>
        <div class="col-lg-4">        
            <div class="p-4 mb-4 bg-white rounded custom-shadow">
                <h4 class="fst-italic mb-3">Recent Posts</h4>
                <div class="list-group sidebar">
                    @foreach ($recentposts as $recentpost)
                     <a href="{{route('front.blogurl',['blogurl'=>$recentpost->slug])}}" class="list-group-item">{{$recentpost->title}}</a>
                      @endforeach
                     @if ($recentposts->isEmpty())
                        <a href="javascript:void(0)" class="list-group-item">Not Found</a>
                     @endif
                </div>
            </div>
        </div>
    </div>
 </div>
 </section>
@include('frontlayout.contactform')
@endsection