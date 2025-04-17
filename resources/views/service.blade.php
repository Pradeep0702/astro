<x-slayout 
    heading="{{$singlepageddata->hero_section['title']}}" 
    heading2="{{$singlepageddata->info_card_section['heading']}}" 
    hpara="{{$singlepageddata->hero_section['description']}}" 
    h2para=""
    ch1="{{$singlepageddata->info_card_section['card1']['title']}}" 
    ch2="{{$singlepageddata->info_card_section['card2']['title']}}"
    ch3="{{$singlepageddata->info_card_section['card3']['title']}}"
    cpara1="{{$singlepageddata->info_card_section['card1']['description']}}" 
    cpara2="{{$singlepageddata->info_card_section['card2']['description']}}" 
    cpara3="{{$singlepageddata->info_card_section['card3']['description']}}" 
    cardicon1="{{$singlepageddata->info_card_section['card1']['icon']}}"
    cardicon2="{{$singlepageddata->info_card_section['card2']['icon']}}"
    cardicon3="{{$singlepageddata->info_card_section['card3']['icon']}}"
>
@section('title',$singlepageddata->meta_data['title'])
@section('description',$singlepageddata->meta_data['des'])
@section('keywords',$singlepageddata->meta_data['keywords'])

<section class="search_section_top">
<section id="service-inner-page-2nd" class="ptb">
         <div class="container-fluid res-container">
             <div class="row mx-md-5 mx-lg-5 g-4">
                     <div class="col-md-12"><img src="{{asset('upload/'.$singlepageddata->page_banner_section['image'])}}" class="img-fluid w-100 rounded" alt=""/></div>  
                     <div class="col-md-5">
                         <div class="card-header mb-3">{{$singlepageddata->page_banner_section['subtitle']}}</div>
                         <div class="card-body">
                             <h3>{{$singlepageddata->page_banner_section['title']}}</h3>
                         </div>
                     </div>
                     <div class="col-md-7">
                        <p>{!! nl2br($singlepageddata->page_banner_section['description']) !!}</p>
                     </div>
                </div>
           </div>
     </section>   
     @foreach ($singlepageddata->main_section as $index => $section)     
        @php
        $orderClass1 = $loop->iteration % 2 == 0 ? 'order-1 order-md-2' : 'order-2 order-md-1';
        $orderClass2 = $loop->iteration % 2 == 0 ? 'order-2 order-md-1' : 'order-1 order-md-2';
       @endphp
       <x-servicesection order="{{$orderClass1}}" order2="{{$orderClass2}}" imgsection="{{asset('upload/'.$section['image'])}}" headertitle="{{$section['subtitle']}}" title="{{$section['title']}}" p="{{$section['description']}}"/>
     @endforeach
     <section id="faq" class="ptb">
        <div class="container-fluid res-container">
            <h6 class="font-size-heading mb-5">Frequently Asked Questions</h6>        
            <div class="row mx-md-3 mx-lg-3 mt-3">
                <div class="accordion accordion-flush" id="faq"> 
                    @foreach ($singlepageddata->faq_section as $index => $faqsection)
                     <x-accodian q="{{$faqsection['q']}}" ans="{{$faqsection['ans']}}" id="{{$index}}"/>
                     @endforeach
                </div>
             </div> 
        </div>
    </section>  
</x-slayout>