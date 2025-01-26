@extends('frontlayout.mainlayout')
@section('section')
<section id="hero-banner" class="blogs">
   <h1>Our latest articles <br> and insights</h1>
   <p class="para-font-hero">Explore our blogs for expert tips, industry trends, and valuable insights.</p>
</section>
<section id="blog-area" class="ptb">
   <div class="container-fluid res-container">
      <div class="row mx-md-5 mx-lg-5 g-4" id="blog-cards-group"></div>
      <div class="text-center mt-5">        
         <button class="btn btn-primary" data-page="0" id="loadmore" onclick="loadmore()">Load More</button>
      </div>
   </div>
</section>
@include('frontlayout.contactform')
@endsection
@push('js')
 <script>
      $('document').ready( function(){
         $('#blog-cards-group').html('<div class="text-center"><div class="spinner-border" role="status"></div></div>');
         $.ajax({
            url:"{{route('front.blogshow')}}",
            type:'GET',               
            success:function(res){  
               $('#blog-cards-group').html(res.html);
               if(res.code == 404){
                  $('#loadmore').css('display','none');
                  $('#blog-cards-group').html('<h2>Data Not Found</h2>') 
               } 
            }
         });
      })
    function loadmore(){   
      $('#loadmore').html('<div class="spinner-border" role="status"></div>');
      $('#loadmore').attr('disabled',true);      
      var page = $('#loadmore').data('page'); 
      var pagecount = page + 6;    
      $.ajax({
            url:"{{route('front.blogshow')}}",
            type:'GET', 
            data:{'page':pagecount} ,            
            success:function(res){ 
               if(res.code == 404){
                  $('#loadmore').css('display','none'); 
               } 
               $('#loadmore').data('page',pagecount);
               $('#blog-cards-group').append(res.html);
               $('#loadmore').html('Load More');
               $('#loadmore').attr('disabled',false); 

            }
         }); 
    }
 </script>    
@endpush
