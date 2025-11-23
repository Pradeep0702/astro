<section id="navbar">
  <nav class="navbar navbar-expand-lg mx-lg-5 mx-md-5">
      <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('front.index') }}">
              <img src="{{ asset('images/logo.svg') }}" class="img-fluid" alt="logo">
          </a>
          <a href="javascript:void(0);" class="mobile-menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
              <div class="hamburger hamburger--slider js-hamburger">
                  <div class="hamburger-box">
                      <div class="hamburger-inner"></div>
                  </div>
              </div>
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mb-2 mb-lg-0">
                  <li class="nav-item dropdown has-megamenu">
                      <a class="nav-link dropdown-toggle" id="menuhovershow"  href="javscript:void(0)" >Services</a>
                      <div id="drop-show-menu" class="dropdown-menu megamenu" role="menu">
                          <div class="container-fluid">
                                <div class="row mx-md-3 mx-lg-3 row-cols-2 row-cols-lg-5">
                                  @foreach (Helpers::categories() as $categorie)
                                  @php $mainMenu = $categorie->menu->firstWhere('main_category_page', 1); @endphp
                                    <div class="col">                                        
                                        <a href="{{ $mainMenu ? route('front.serviceurl', $mainMenu->menu_slug) : 'javascript:void(0)' }}"><div class="{{\Str::slug($categorie->category_name)}} category-box">{!!$categorie->category_icon !!} <div class="ms-2">{{$categorie->category_name}}</div></div></a>
                                        <ul class="list-group border-0">
                                            @foreach ($categorie->menu as $menu)
                                                @if ($menu->main_category_page == 0)
                                                    <a  href="{{route('front.serviceurl',$menu->menu_slug)}}"><li class="list-group-item border-0 px-0 py-0"><i class="bi bi-chevron-right"></i> <span>{{$menu->menu_name}}</span></li></a>
                                                @endif 
                                            @endforeach
                                        </ul>
                                    </div>
                                  @endforeach                                   
                              </div>
                          </div>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route(config('constant.work')) }}">Work</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route(config('constant.career')) }}">Career</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route(config('constant.blog')) }}">Blogs</a>
                  </li>
              </ul>
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link contact-us" href="{{ route('front.contact') }}"><i class="bi bi-telephone-fill"></i> +91-88244-67277</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link demo" href="{{route('front.getstarted')}}">Get Started</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  <div class="offcanvas offcanvas-start" data-bs-scroll="false" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
      <div class="offcanvas-body bg-mobile-menu h-100" id="mobile-menu-nav">
          <div class="accordion accordion-flush" id="accordionFlushExample">
            @foreach (Helpers::categories() as $key=>$categorie)
              <div class="accordion-item">
                  <div class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$key}}" aria-expanded="false" aria-controls="flush-collapse{{$key}}">
                        {{$categorie->category_name}}
                      </button>
                    </div>
                  <div id="flush-collapse{{$key}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">
                        <ul class="list-group border-0">
                            @foreach ($categorie->menu as $menu)
                               <a  href="{{route('front.serviceurl',$menu->menu_slug)}}"><li class="list-group-item border-0 px-0 py-0"><i class="bi bi-chevron-right"></i>{{$menu->menu_name}}</li></a>
                            @endforeach
                        </ul>
                      </div>
                  </div>
              </div>  
              @endforeach
              <div class="accordion-item">
                  <div class="accordion-header">
                      <a href="{{ route(config('constant.work')) }}" class="accordion-button single-btn" type="button">Work</a>
                  </div>
              </div>
              <div class="accordion-item">
                  <div class="accordion-header">
                      <a href="{{ route(config('constant.career')) }}" class="accordion-button single-btn" type="button">Career</a>
                  </div>
              </div>
              <div class="accordion-item">
                  <div class="accordion-header">
                      <a href="{{ route(config('constant.blog')) }}" class="accordion-button single-btn" type="button">Blogs</a>
                  </div>
              </div>
              <div class="accordion-item">
                  <div class="accordion-header">
                      <a href="{{route('front.getstarted')}}" class="accordion-button single-btn demo" type="button">Get Started</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
