@extends('frontlayout.mainlayout')
@section('section')
<section id="hero-banner">
   <h1>Services</h1>
   <p class="para-font-hero">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi esse culpa, earum, nostrum, nemo exercitationem ipsa facilis accusamus beatae omnis eius hic iusto et porro quod aperiam laudantium illo nulla quaerat rerum libero nisi eveniet delectus. Quos illo voluptate aliquam culpa excepturi placeat nemo accusamus vel, amet omnis quas! Ex.</p>
   <div class="gap-md-3 gap-3 d-flex">
      <a class="btn btn-outline-primary">Case Study</a>
      <a class="btn btn-primary">Schedule a Meeting</a>    
   </div>
</section>
<section id="service-page" class="ptb">
   <div class="container-fluid res-container">
      <div class="row g-4">
        @foreach($categories as $index =>  $categorie)
            <div class="col-lg-3 col-md-3 col-12">
            <div class="service-card" data-bs-toggle="collapse" data-bs-target="#sub{{$index}}">
                <div class="d-flex justify-content-between align-items-start">
                    <span>{!!$categorie->category_icon !!}</span>
                    <i class="bi bi-chevron-down toggle-icon"></i>
                </div>
                <div class="service-title" >{{$categorie->category_name}}</div>
                <div class="collapse" id="sub{{$index}}">
                    <div class="subcategory-list">
                        @foreach($categorie->menu as $index =>  $subBategorie)
                            <div class="subcategory-item">
                                <div class="ms-2">
                                    <a href="{{route('front.serviceurl',$subBategorie->menu_slug)}}"><div class="sub-title"><li>{{$subBategorie->menu_name}}</li></div></a>
                                </div>
                            </div>        
                        @endforeach          
                    </div>
                </div>
            </div>
            </div>            
        @endforeach        
      </div>
   </div>
</section>
@include('frontlayout.contactform')
@endsection
@push('js')
<script>
    document.querySelectorAll('.service-card').forEach(card => {
      const icon = card.querySelector('.toggle-icon');
      const collapse = card.querySelector('.collapse');
      
      collapse.addEventListener('show.bs.collapse', () => {
        icon.classList.add('rotated');
      });
      
      collapse.addEventListener('hide.bs.collapse', () => {
        icon.classList.remove('rotated');
      });
    });
  </script>    
@endpush