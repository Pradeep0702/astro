@extends('frontlayout.mainlayout')
@section('section')
<section id="hero-banner">
    <div class="container">
    <h1>Turning Ideas Into Popular Brands rr</h1>
    <p class="mw-100 para-font-hero">From concept to creation, we transform your unique ideas into recognizable and beloved brands. Through strategic design, targeted marketing, and consistent branding efforts, we ensure your business stands out in the competitive market, resonating with your audience and driving sustained growth.</p>
    </div>
    <div class="gap-3 d-flex align-items-center">
        <a href="{{ route('front.work') }}" class="btn btn-outline-primary w-100">Case Study</a>
        <a href="{{route('front.getstarted')}}" class="btn btn-primary w-100">Schedule a Meeting</a>     
    </div>    
</section>
<section id="logos">  
    <div class="logo-top-new"> 
        <x-logoslide/>
    </div>
</section>
<section id="whatwedo" class="ptb"> 
    <div class="container-fluid res-container">
            <h2 class="font-size-heading">Our Expertise You Can Trust For Stellar Results</h2>   
    <p class="para-font">Rely on our extensive experience and proven strategies to deliver outstanding results. We combine industry knowledge with innovative approaches to ensure your business achieves its goals.</p> 
        <div class="row service-card-group mx-md-5 mx-lg-5 g-4"> 
            <x-servicecard href="#" title='development' image="images/service/web.webp"/>
            <x-servicecard href="#" title="marketing" image="images/service/dm.webp"/> 
            <x-servicecard href="#" title="design" image="images/service/smm.webp"/>  
            <x-servicecard href="#" title="app development" image="images/service/app.webp"/> 
            <div class="text-center">
                <a href="{{ route('front.services') }}" class="btn btn-outline-primary">View All Services <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
<section id="cta" class="ptb">
    <div class="container-fluid res-container">
        <div class="row mx-md-3 mx-lg-3 align-items-center mx-md-5 mx-lg-5">
            <div class="col-md-8 text-center text-md-start text-lg-start">
                <h6>Make A Difference Today, Call Now !</h6>
                <p>Transform your startup into a popular brand. Reach out and let's make it happen !</p>
            </div>
            <div class="col-md-4 text-center text-md-end text-lg-end">
                <a href="{{route('front.getstarted')}}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>
</section>
<section id="customer-review" class="ptb">
    <div class="container-fluid res-container">
     <h5 class="font-size-heading">See What Our Clients Have To Say About Us</h5>
     <p class="para-font">Read how our clients describe their journey with us and our impact on their success.</p>
        <div class="row mx-md-5 mx-lg-5 g-4 review-card-group"> 
            <div class="col-md-12">
                <div class="reviews">
                    @foreach($testimonials as $testimonial)
                      <x-reviewcard image="{{$testimonial->image}}" para="{{$testimonial->review}}" name="{{$testimonial->name}}" company="{{$testimonial->desgination}}"/>   
                    @endforeach                        
                </div>
                <div class="reviews-btn-slide">
                    <button class="reviews-prev"><i class="bi bi-arrow-left"></i></button>
                    <button class="reviews-next"><i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="record" class="ptb">
    <div class="container-fluid res-container">
        <div class="row record-card-group mx-md-5 mx-lg-5 gy-4 gx-md-4 gx-lg-4">
            <div class="col-6 col-md-3 card-record">
                <div class="card bg-pink h-100">
                    <h5>164+</h5>
                    <p>Satisfied Clients</p>
                </div>              
            </div> 
            <div class="col-6 col-md-3 card-record">
                <div class="card bg-purple h-100">
                    <h5>574+</h5>
                    <p>Projects Delivered</p>
                </div>       
            </div>
            <div class="col-6 col-md-3 card-record">
                <div class="card bg-green h-100">
                    <h5>8,500+</h5>
                    <p>Creative Designs</p>
                </div>
            </div>
            <div class="col-6 col-md-3 card-record">
                <div class="card bg-yellow h-100">
                    <h5>8+</h5>
                    <p>Years Experience</p>
                </div>        
            </div>
        </div>
    </div> 
</section>
<section id="industry" class="ptb">
    <div class="container-fluid res-container">
        <h3 class="font-size-heading">Innovative Solutions To Lift Every Industry We Touch!</h3>
        <p class="para-font">Revolutionary ideas to elevate every industry we serve, driving progress and success with revolutionary ideas that make things easier, better, and more efficient for everyone involved !</p>
        <div class="row mx-md-5 mx-lg-5">
            <div class="col-md-12">
                <div id="myTabs">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Hospitality</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#tab2">Tour & Travels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#tab3">Healthcare</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#tab4">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#tab5">Retail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#tab6">Professional Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#tab7">Jewelers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#tab8">Home Services</a>
                        </li>
                    </ul>
                </div>
                <select class="form-select mt-3" id="mobileNavSelect"></select>
                <div class="tab-content mt-5" id="pills-tabContent">
                    <div id="tab1" class="tab-pane fade show active" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('images/quote.png') }}" class="img-fluid quote-img" alt=""/>
                                <figure>
                                    <blockquote>
                                        “Social IT uplifted our brand with stellar social media marketing and awareness campaigns. Our engagement and customer inquiries have soared !”
                                    </blockquote>
                                    <figcaption>
                                        Kishan Pareta, Jalwa - Rooftop Restaurant and NightClub
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-9 d-flex justify-content-center">
                                <img src="{{ asset('images/hospitality.webp') }}" class="img-fluid" alt="hospitality"/>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane fade" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('images/quote.png') }}" class="img-fluid quote-img" alt=""/>
                                <figure>
                                    <blockquote>
                                        “Social IT transformed our business with an exceptional website, effective SEO, and impactful social media marketing. Our bookings have increased significantly !”
                                    </blockquote>
                                    <figcaption>
                                        Tarun Ramnani, Real rental Cabs
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-9 d-flex justify-content-center">
                                <img src="{{ asset('images/tour-and-travels.webp') }}" class="img-fluid" alt="tour-and-travels"/>
                            </div>
                        </div>
                    </div>
                      <div id="tab3" class="tab-pane fade" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('images/quote.png') }}" class="img-fluid quote-img" alt=""/>
                                <figure>
                                    <blockquote>
                                        “The awareness campaigns by Social IT were a game-changer for us. Our social media presence and patient inquiries have skyrocketed!”
                                    </blockquote>
                                    <figcaption>
                                        Palkesh Agarwal, Sudha Hospital
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-9 d-flex justify-content-center">
                                <img src="{{ asset('images/healthcare.webp') }}" class="img-fluid" alt="healthcare"/>
                            </div>
                        </div>
                    </div>
                      <div id="tab4" class="tab-pane fade" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('images/quote.png') }}" class="img-fluid quote-img" alt=""/>
                                <figure>
                                    <blockquote>
                                        “Thanks to Social IT’s lead generation and ad campaigns, we saw a significant increase in admissions. Their website development was top-notch!”
                                    </blockquote>
                                    <figcaption>
                                         Meenakshi Porwal, Principal - Springdales Childrens School
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-9 d-flex justify-content-center">
                                <img src="{{ asset('images/education.webp') }}" class="img-fluid" alt="education"/>
                            </div>
                        </div>
                    </div>
                      <div id="tab5" class="tab-pane fade" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('images/quote.png') }}" class="img-fluid quote-img" alt=""/>
                                <figure>
                                    <blockquote>
                                        “Social IT’s lead generation and awareness campaigns delivered over 10+ million ad impressions, driving massive reach and sales for our brand!”
                                    </blockquote>
                                    <figcaption>
                                        Rajat Agarwal, Siddhi Vinayak Wedding Hub 
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-9 d-flex justify-content-center">
                                <img src="{{ asset('images/retail.webp') }}" class="img-fluid" alt="retail"/>
                            </div>
                        </div>
                    </div>
                      <div id="tab6" class="tab-pane fade" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('images/quote.png') }}" class="img-fluid quote-img" alt=""/>
                                <figure>
                                    <blockquote>
                                        “Social IT’s strategic social media marketing and lead generation campaigns brought us quality leads and boosted our client base significantly !”
                                    </blockquote>
                                    <figcaption>
                                        CA Mohit Jain
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-9 d-flex justify-content-center">
                                <img src="{{ asset('images/professional-service.webp') }}" class="img-fluid" alt="professional-service"/>
                            </div>
                        </div>
                    </div>
                      <div id="tab7" class="tab-pane fade" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('images/quote.png') }}" class="img-fluid quote-img" alt=""/>
                                <figure>
                                    <blockquote>
                                        “Social IT’s awareness ad campaigns greatly improved our online visibility. Their social media marketing has been instrumental in our brand growth!”
                                    </blockquote>
                                    <figcaption>
                                        Avijit Goel, Gondilal Kiva Jewellers
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-9 d-flex justify-content-center">
                                <img src="{{ asset('images/jeweller.webp') }}" class="img-fluid" alt="jeweller"/>
                            </div>
                        </div>
                    </div>
                      <div id="tab8" class="tab-pane fade" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('images/quote.png') }}" class="img-fluid quote-img" alt=""/>
                                <figure>
                                    <blockquote>
                                        “Social IT created a stunning, user-friendly website for us. Their expertise in design and development exceeded our expectations !”
                                    </blockquote>
                                    <figcaption>
                                        Avdesh Gupta, Maintaino
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-9 d-flex justify-content-center">
                                <img src="{{ asset('images/home-services.webp') }}" class="img-fluid" alt="home-services"/>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </div>       
    </div> 
</section>
<section id="cta" class="ptb">
    <div class="container-fluid res-container">
        <div class="row mx-md-3 mx-lg-3 align-items-center mx-md-5 mx-lg-5">
            <div class="col-md-8 text-center text-md-start text-lg-start">
                <h6>Make a difference today, call now!</h6>
                <p>Call To Transform Lives And Shape A Better Tomorrow. Your Voice Matters.</p>
            </div>
            <div class="col-md-4 text-center text-md-end text-lg-end">
                <a href="{{route('front.getstarted')}}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>
</section>
<section id="recentworks" class="ptb">
    <div class="container-fluid res-container">
        <h3 class="font-size-heading">Our Recent Works</h3>
        <p class="para-font">Discover our recent projects that are transforming industries for the better.</p>
        <div class="row mx-md-5 mx-lg-5">
            <div class="work-slide"> 
                 @foreach($works as $work)
                 <a target="_blank" href="{{route('front.workurl',$work->slug)}}">
                  <div class="card">
                    <img src="{{ asset('upload/'.$work->thumbnail_image) }}" class="img-fluid" alt="{{$work->title}}"/>
                  </div>
                 </a>
                 @endforeach
            </div>
            <div class="text-center viewbtn-top">
                <a href="{{ route('front.work') }}" class="btn btn-outline-primary">View Portfolio <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div> 
</section>
<section id="blog-area" class="blog-home ptb">
    <h5 class="font-size-heading">Latest Transformative Insights</h5>
    <p class="para-font">Explore our blogs for expert tips, industry trends, and valuable insights.</p>
    <div class="container-fluid res-container">          
        <div class="row mx-md-3 mx-lg-3 blog-card-group mx-md-5 mx-lg-5 gx-4">
            <div class="blogs-slide">
                 @foreach($blogs as $blog)
                 <a href="{{route('front.blogurl',['blogurl'=>$blog->slug])}}">
                    <div class="card h-100">
                        <img src="{{asset('upload/'.$blog->thumbnail_image)}}" class="img-fluid" alt=""/> 
                        <div class="card-body">
                            <div class="card-title date">{{date('d M Y',strtotime($blog->created_at))}}</div>
                            <h2 class="title">{{$blog->title}}</h2>
                            <p class="des">{!! strip_tags($blog->content) !!}</p>
                        </div>                           
                    </div>
                 </a>
                 @endforeach
            </div> 
            <div class="blog-btn-slide">
                <button class="blogs-prev"><i class="bi bi-arrow-left"></i></button>
                <button class="blogs-next"><i class="bi bi-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>
<section id="faq" class="ptb">
    <div class="container-fluid res-container">   
    <h6 class="font-size-heading">Frequently Asked Questions</h6>
    <p class="para-font">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus nobis quasi exercitationem quibusdam ipsum quos autem repudiandae temporibus aspernatur ea?</p>    
    <div class="row mx-md-3 mx-lg-3 mx-md-5 mx-lg-5">
            
        </div> 
    </div>
</section>
@include('frontlayout.contactform')
@endsection
