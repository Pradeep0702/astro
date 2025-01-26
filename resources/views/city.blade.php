@extends('frontlayout.mainlayout')
@section('section')
<section id="hero-banner" class="city-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
              <h1>DALLAS DIGITAL MARKETING AGENCY</h1>
              <p class="lead">Empower Your Business Through Smart Digital Marketing Solutions</p>
              <div class="card">
               <a data-fslightbox="gallery" href="https://youtu.be/09h9BoxWHTw?si=QHug55RzBFEXGGBw">
                <img src="{{asset('images/pp.png')}}" class="img-fluid">
                </a> 
             </div>
              <p class="mt-4">Thrive is a digital marketing company in Dallas, Texas, specializing in strategic digital marketing solutions.</p>
            </div>
            <div class="col-md-6">
              <div class="card p-4 index card-form">
                <h3 class="mb-3">GET MY FREE PROPOSAL</h3>
                <form>
                  <div class="mb-3">
                    <select id="services" class="form-select">
                      <option>Select Services</option>
                      <option>SEO</option>
                      <option>Web Development</option>
                      <option>Social Media Marketing</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="website" class="form-label">Website Address? (If You Have One)</label>
                    <input type="text" class="form-control" id="website">
                  </div>
                  <div class="mb-3">
                    <label for="business" class="form-label">Tell us about your business</label>
                    <textarea class="form-control" id="business" rows="4"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary w-100">GET STARTED</button>
                </form>
                <p class="mt-3 text-center">In a hurry? <strong>Give us a call now at 866-908-4748</strong></p>
              </div>
            </div>
        </div>
    </div>      
</section>
<section id="logos">  
    <div class="logo-top-new"> 
        <x-logoslide/>
    </div>
</section>
<section id="getclients" class="ptb">
    <div class="container-fluid res-container">
         <div class="row mx-md-5 mx-lg-5 gy-4 gx-md-4 gx-lg-4">
             <h4 class="text-center font-size-heading">Our Dallas Digital Marketing Clients Get Results</h4> 
             <div class="col-md-6">
                  <div class="card">
                  <img src="{{asset('images/service/city.webp')}}" class="img-fluid"/>   
                  <div class="card-footer">"Thrive goes above and beyond"</div>
                  </div>
             </div>
             <div class="col-md-6">
                <div class="card">
                    <img src="{{asset('images/service/city.webp')}}" class="img-fluid"/> 
                    <div class="card-footer">"The results speak for themselves"</div>
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
<section id="service-page" class="ptb">
    <div class="container-fluid res-container">
          <h3 class="text-center font-size-heading">Dallas Digital Marketing Services</h3>
         <div class="row mx-md-5 mx-lg-5 g-3 mt-4">
               <div class="col-md-4">
                  <div class="card">
                      <div class="card-body">
                           <div class=""><i class="bi bi-megaphone"></i></div>
                          <div class="card-title">Social Media Marekting</div>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                      </div>
                  </div>
               </div>
               <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-graph-up-arrow"></i></div>
                        <div class="card-title">Search Engine Optimization</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-bar-chart"></i></div>
                        <div class="card-title">Search Engine Marketing</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-shop-window"></i></div>
                        <div class="card-title">Google My Bussiness</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-volume-up"></i></div>
                        <div class="card-title">Advertisement</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-shop"></i></div>
                        <div class="card-title">E-Commerce Development</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-code-slash"></i></div>
                        <div class="card-title">Web Development</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-code-square"></i></div>
                        <div class="card-title">App Development</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-brush"></i></div>
                        <div class="card-title">Logo Design</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-box"></i></div>
                        <div class="card-title">Branding and Packaging</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-newspaper"></i></div>
                        <div class="card-title">Print Media</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-laptop"></i></div>
                        <div class="card-title">UI/UX Design</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-aspect-ratio"></i></div>
                        <div class="card-title">Digital Banners</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
                    </div>
                </div>
             </div>          
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                         <div class=""><i class="bi bi-play-btn"></i></div>
                        <div class="card-title">Motion Graphics</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ad. </p>
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
                <h6>Make A Difference Today, Call Now !</h6>
                <p>Transform your startup into a popular brand. Reach out and let's make it happen !</p>
            </div>
            <div class="col-md-4 text-center text-md-end text-lg-end">
                <a href="{{route('front.getstarted')}}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>
</section>
<section id="Proposalform" class="ptb">
    <div class="container-fluid res-container">
        <h6 class="text-center mb-4 font-size-heading">Get My FREE Digital Marketing Proposal</h6>
        <div class="row mx-md-5 mx-lg-5 gy-4 gx-md-4 gx-lg-4 mt-4">
        <form>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name *</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone *</label>
                    <div class="input-group">
                        <span class="input-group-text">+91</span>
                        <input type="text" class="form-control" id="phone" placeholder="81234 56789" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="website" class="form-label">Website</label>
                    <input type="url" class="form-control" id="website" placeholder="http://">
                </div>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Company/Organization *</label>
                <input type="text" class="form-control" id="company" placeholder="Enter your company/organization" required>
            </div>
            <div class="mb-3">
                <label class="form-label">What services can we provide you? *</label>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="seo">
                            <label class="form-check-label" for="seo">Optimization (SEO)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="webDesign">
                            <label class="form-check-label" for="webDesign">Web Design</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="contentWriting">
                            <label class="form-check-label" for="contentWriting">Content Writing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="amazonMarketing">
                            <label class="form-check-label" for="amazonMarketing">Amazon Marketing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="linkBuilding">
                            <label class="form-check-label" for="linkBuilding">Link Building</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ppc">
                            <label class="form-check-label" for="ppc">Pay Per Click (PPC)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cro">
                            <label class="form-check-label" for="cro">Conversion Rate Optimization (CRO)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="photoVideo">
                            <label class="form-check-label" for="photoVideo">Photography / Video</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="emailMarketing">
                            <label class="form-check-label" for="emailMarketing">Email Marketing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="searchMarketing">
                            <label class="form-check-label" for="searchMarketing">Search Engine Marketing</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="socialMedia">
                            <label class="form-check-label" for="socialMedia">Social Media</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="reputationManagement">
                            <label class="form-check-label" for="reputationManagement">Reputation / Reviews Management</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="webHosting">
                            <label class="form-check-label" for="webHosting">Web Hosting / Maintenance</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="adaCompliance">
                            <label class="form-check-label" for="adaCompliance">ADA Compliance</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ecommerceOptimization">
                            <label class="form-check-label" for="ecommerceOptimization">eCommerce Optimization</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Enter your message"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning px-5">Submit</button>
            </div>
        </form>  
      </div>    
    </div>
</section>
@include('frontlayout.contactform')
@endsection
