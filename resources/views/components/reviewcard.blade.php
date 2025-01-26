<div class="card">
    <div class="card-header">
       <img src="{{asset('upload/'.$image)}}" class="img-fluid" alt="{{$name}}"/>
       <img src="{{asset('images/quote.png')}}" class="img-fluid" alt="quote"/>
    </div>
    <div class="card-body">       
       <p>{{$para}}</p>
    </div>
    <div class="card-footer">
        <strong class="text-capitalize">{!! $name !!}</strong>
        <span>{{$company}}</span>
    </div>
</div>
