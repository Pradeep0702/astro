@foreach ($datas as $data) @php $cat=""; @endphp @foreach($data->blogdata as $cat_name) @php $cat.= $cat_name->category_name @endphp @endforeach
<x-blogcard image="{{$data->thumbnail_image}}" title="{{$data->title}}" url="{{$data->slug}}" des="{{$data->content}}" date="{{$data->created_at}}" cat="{{$cat}}"/>
@endforeach