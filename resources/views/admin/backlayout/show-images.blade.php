<div class="card">
    <div class="card-title f-20 mb-0 py-3 text-center text-capitalize">{{$datas->title}}</div>
</div>
@foreach ($datas->work_images as $item)
    <div class="col-md-12">
        <div class="card">
            <img src="{{asset('upload/'.$item)}}" class="img-fluid" alt=""/> 
        </div>         
     </div>
 @endforeach 
