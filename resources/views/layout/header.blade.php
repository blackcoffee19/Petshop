<div class="border-bottom " >
    <div class="bg-light py-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-12 text-center text-md-start"><span> Super Value Deals - Save more with coupons</span>
          </div>
          <div class="col-6 text-end d-none d-md-block">
            <div class="dropdown">
              <a class="dropdown-toggle text-decoration-none  text-muted" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-1">
                  <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#selectedlang)">
                      <path d="M0 0.5H16V12.5H0V0.5Z" fill="#012169" />
                      <path
                        d="M1.875 0.5L7.975 5.025L14.05 0.5H16V2.05L10 6.525L16 10.975V12.5H14L8 8.025L2.025 12.5H0V11L5.975 6.55L0 2.1V0.5H1.875Z"
                        fill="white" />
                      <path
                        d="M10.6 7.525L16 11.5V12.5L9.225 7.525H10.6ZM6 8.025L6.15 8.9L1.35 12.5H0L6 8.025ZM16 0.5V0.575L9.775 5.275L9.825 4.175L14.75 0.5H16ZM0 0.5L5.975 4.9H4.475L0 1.55V0.5Z"
                        fill="#C8102E" />
                      <path d="M6.025 0.5V12.5H10.025V0.5H6.025ZM0 4.5V8.5H16V4.5H0Z" fill="white" />
                      <path d="M0 5.325V7.725H16V5.325H0ZM6.825 0.5V12.5H9.225V0.5H6.825Z" fill="#C8102E" />
                    </g>
                    <defs>
                      <clipPath id="selectedlang">
                        <rect width="16" height="12" fill="white" transform="translate(0 0.5)" />
                      </clipPath>
                    </defs>
                  </svg>
                </span>English
              </a>
              
              <ul class="dropdown-menu">

                <li><a class="dropdown-item " href="#"><span class="me-2">

                      <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_5543_19744)">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.5H16V12.5H0V0.5Z" fill="white" />
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.5H5.3325V12.5H0V0.5Z" fill="#002654" />
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.668 0.5H16.0005V12.5H10.668V0.5Z"
                            fill="#CE1126" />
                        </g>
                        <defs>
                          <clipPath id="clip0_5543_19744">
                            <rect width="16" height="12" fill="white" transform="translate(0 0.5)" />
                          </clipPath>
                        </defs>
                      </svg>

                    </span>Français</a></li>
                <li><a class="dropdown-item " href="#"><span class="me-2">

                      <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_5543_19751)">
                          <path d="M0 8.5H16V12.5H0V8.5Z" fill="#FFCE00" />
                          <path d="M0 0.5H16V4.5H0V0.5Z" fill="black" />
                          <path d="M0 4.5H16V8.5H0V4.5Z" fill="#DD0000" />
                        </g>
                        <defs>
                          <clipPath id="clip0_5543_19751">
                            <rect width="16" height="12" fill="white" transform="translate(0 0.5)" />
                          </clipPath>
                        </defs>
                      </svg>

                    </span>Deutsch</a></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="py-4 pt-lg-3 pb-lg-0">
      <div class="container">
        <div class="row w-100 align-items-center gx-lg-2 gx-0">
          <div class="col-xxl-3 col-md-2">
            <a class="navbar-brand d-none d-lg-block" href="{{route('home')}}">
              <img src="{{asset('resources/image/logo/axit-logo.svg')}}" >
            </a>
          </div>
          <div class="d-flex justify-content-between w-100 d-lg-none">
            <a class="navbar-brand" href="{{route('home')}}">
              <img src="{{asset('resources/image/logo/axit-logo.svg')}}" >
            </a>
            <div class="d-flex align-items-center lh-1">
              <div class="list-inline me-4">
                <div class="list-inline-item">
                  <a class="text-muted position-relative btn_showcart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    href="#offcanvasExample" role="button" aria-controls="offcanvasRight">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-shopping-bag">
                      <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                      <line x1="3" y1="6" x2="21" y2="6"></line>
                      <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                      @if (Auth::check())
                      <span class="fw-bold countCart" >
                        @php
                          $sum=0;
                            foreach (Auth::user()->Cart->where('order_code','=',null) as $key => $value) {
                              $sum+=$value->qty;
                            }
                            echo $sum;
                        @endphp

                      </span>
                      @endif
                      @if (Session::has("cart"))
                      <span class="fw-bold countCart" >
                        @php
                          $sum=0;
                          foreach (Session::get('cart') as $key => $value) {
                            $sum+=$value["qty"];
                          }
                          echo $sum;
                        @endphp
                      </span>
                      @endif
                      @if (!Auth::check() && !Session::has("cart"))
                      <span class="fw-bold countCart" >0</span>
                      @endif
                    </span>
                  </a>
                </div>
                <div class="list-inline-item">
                  @if (Auth::check())
                      <a class="text-muted"  href="{{route('profie')}}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                          </svg>
                          {{Auth::user()->name}}
                      </a>
                      <a href="{{route('signout')}}" class="text-muted" >
                        <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
                      </a>
                      {{-- <a href="{{route('signout')}}" class=" me-4 text-black"><i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i></a> --}}
                  @else
                      <a class="text-decoration-none text-dark mx-2 sign" data-bs-toggle="modal" data-bs-target="#userModal" href="#!">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                          </svg>
                      </a>
                  @endif
                </div>
                

              </div>
              <!-- Button -->
              <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                  class="bi bi-text-indent-left text-primary" viewBox="0 0 16 16">
                  <path
                    d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                </svg>
              </button>

            </div>
          </div>
          <div class="col-xxl-6 col-lg-5 d-none d-lg-block mx-auto">

            <form action="{{route('productlist')}}" method="get">
              <div class="input-group ">
                <input class="form-control rounded" type="search" name="search2" placeholder="Search for products">
                <span class="input-group-append">
                  <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-search">
                      <circle cx="11" cy="11" r="8"></circle>
                      <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                  </button>
                </span>
              </div>

            </form>
          </div>
          {{-- <div class="col-md-2 col-xxl-3 d-none d-lg-block">
            <!-- Button trigger modal -->
            <button type="button" class="btn  btn-outline-gray-400 text-muted" data-bs-toggle="modal"
              data-bs-target="#locationModal">
              <i class="feather-icon icon-map-pin me-2"></i>Location
            </button>
          </div> --}}
          <div class="col-lg-4 col-xxl-3 text-end d-none d-lg-block mx-auto">
            <div class="list-inline">
              @if (Auth::check())
              <div class="list-inline-item me-5">

                  <a href="{{route('favourite')}}" class="text-muted position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-heart">
                      <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                      </path>
                    </svg>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary countFav">
                      {{count(Auth::user()->Favourite)}}
                    </span>
                  </a>
              </div>    
              @endif
              <div class="list-inline-item me-5">
                <a class="text-muted position-relative btn_showcart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                  href="#offcanvasExample" role="button" aria-controls="offcanvasRight">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-shopping-bag">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                  </svg>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                    @if (Auth::check())
                      <span class="fw-bold countCart" >
                        @php
                          $sum=0;
                            foreach (Auth::user()->Cart->where('order_code','=',null) as $key => $value) {
                              $sum+=$value->qty;
                            }
                            echo $sum;
                        @endphp

                      </span>
                      @endif
                      @if (Session::has("cart"))
                      <span class="fw-bold countCart" >
                        @php
                          $sum=0;
                          foreach (Session::get('cart') as $key => $value) {
                            $sum+=$value["qty"];
                          }
                          echo $sum;
                        @endphp
                      </span>
                      @endif
                    @if (!Auth::check() && !Session::has("cart"))
                    <span class="fw-bold countCart" >0</span>
                    @endif
                  </span>
                </a>
              </div>
              <div class="list-inline-item">
                  @if (Auth::check())
                      <a class="text-muted"  href="{{route('profie')}}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                          </svg>
                          {{Auth::user()->name}}
                      </a>
                      <a href="{{route('signout')}}" class="text-muted" >
                        <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
                      </a>
                      {{-- <a href="{{route('signout')}}" class=" me-4 text-black"><i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i></a> --}}
                  @else
                      <a href="#!" class="text-muted" data-bs-toggle="modal" data-bs-target="#userModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-user">
                          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                          <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                      </a>
                  @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

 
  <nav class="navbar navbar-expand-lg navbar-light navbar-default py-0 py-lg-4">
    <div class="container px-0 px-md-3">
      <div class="dropdown me-3 d-none d-lg-block">
        <button class="btn btn-primary px-6 " type="button" id="product_list" data-bs-toggle="dropdown"
          aria-expanded="false">
          <span class="me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-grid">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
            </svg></span> All Departments
        </button>
        <ul class="dropdown-menu" aria-labelledby="product_list">
          <li><a class="dropdown-item" href="./pages/shop-grid.html">Dairy, Bread & Eggs</a></li>
          <li><a class="dropdown-item" href="./pages/shop-grid.html">Snacks & Munchies</a></li>
          <li><a class="dropdown-item" href="./pages/shop-grid.html">Fruits & Vegetables</a></li>
          <li><a class="dropdown-item" href="./pages/shop-grid.html">Cold Drinks & Juices</a></li>
          <li><a class="dropdown-item" href="./pages/shop-grid.html">Breakfast & Instant Food</a></li>
          <li><a class="dropdown-item" href="./pages/shop-grid.html">Bakery & Biscuits</a></li>
          <li><a class="dropdown-item" href="./pages/shop-grid.html">Chicken, Meat & Fish</a></li>
        </ul>
      </div>
      <div class="offcanvas offcanvas-start p-4 p-lg-0" id="navbar-default">
        <div class="d-flex justify-content-between align-items-center mb-2 d-block d-lg-none">
          <a href="{{route('home')}}"><img src="{{asset('resources/image/logo/axit-logo.svg')}}"></a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="d-block d-lg-none my-4">
          <form action="{{route('productlist')}}" method="get">
            <div class="input-group ">
              <input class="form-control rounded" type="search" name="search2" placeholder="Search for products">
              <span class="input-group-append">
                <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  </svg>
                </button>
              </span>
            </div>
          </form>
          {{-- <div class="mt-2">
            <button type="button" class="btn  btn-outline-gray-400 text-muted w-100 " data-bs-toggle="modal"
              data-bs-target="#locationModal">
              <i class="feather-icon icon-map-pin me-2"></i>Pick Location
            </button>
          </div> --}}
        </div>
        <div class="d-block d-lg-none mb-4">
          <a class="btn btn-primary w-100 d-flex justify-content-center align-items-center" data-bs-toggle="collapse"
            href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-grid">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
              </svg></span> All Departments
          </a>
          <div class="collapse mt-2" id="collapseExample">
            <div class="card card-body">
              <ul class="mb-0 list-unstyled">
                <li><a class="dropdown-item" href="./pages/shop-grid.html">Dairy, Bread & Eggs</a></li>
                <li><a class="dropdown-item" href="./pages/shop-grid.html">Snacks & Munchies</a></li>
                <li><a class="dropdown-item" href="./pages/shop-grid.html">Fruits & Vegetables</a></li>
                <li><a class="dropdown-item" href="./pages/shop-grid.html">Cold Drinks & Juices</a></li>
                <li><a class="dropdown-item" href="./pages/shop-grid.html">Breakfast & Instant Food</a></li>
                <li><a class="dropdown-item" href="./pages/shop-grid.html">Bakery & Biscuits</a></li>
                <li><a class="dropdown-item" href="./pages/shop-grid.html">Chicken, Meat & Fish</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="d-none d-lg-block">
          <ul class="navbar-nav align-items-center justify-content-evenly">
            <li class="nav-item dropdown">
              <a class="nav-link" href="{{route('home')}}" >
                Home
              </a>
            </li>
            <li class="nav-item dropdown dropdown-fullwidth">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Product List
              </a>
              <div class=" dropdown-menu pb-0">
                <div class="row p-2 p-lg-4">
                  @foreach ($types as $type)
                  <div class="col-lg-3 col-6 mb-4 mb-lg-0">
                    <h4 class="text-primary ps-3 text-uppercase">{{$type->name_type}}</h4>
                    @foreach ($type->Breed as $breed)
                    <a class="dropdown-item text-capitalize" href="{{route('productlist',[$type->name_type,$breed->breed_name])}}">{{$breed->breed_name}}</a>
                        
                    @endforeach
                  </div>
                  @endforeach
                </div>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{route('contact')}}">
                Contact
              </a>
            </li>
          </ul>
        </div>
        <div class="d-block d-lg-none h-100" data-simplebar="">
          <ul class="navbar-nav ">
            <li class="nav-item dropdown">
              <a class="nav-link" href="{{route('home')}}">
                Home
              </a>
            </li>
            <li class="nav-item dropdown dropdown-fullwidth">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Product List
              </a>
              <div class=" dropdown-menu pb-0">
                <div class="row p-2 p-lg-4">
                  @foreach ($types as $type)
                  <div class="col-lg-3 col-6 mb-4 mb-lg-0">
                    <h4 class="text-primary ps-3  text-uppercase">{{$type->name_type}}</h4>
                    @foreach ($type->Breed as $breed)
                    <a class="dropdown-item text-capitalize" href="{{route('productlist',[$type->name_type,$breed->breed_name])}}">{{$breed->breed_name}}</a>
                        
                    @endforeach
                    
                  </div>
                  @endforeach
                </div>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{route('contact')}}">
                Contact
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>
{{-- Modal Login --}}
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign In</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('signin')}}">
          @csrf
          <div class="mb-3">
            <label for="username" class="form-label">Email</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Your signed email" >
          </div>
          <div class="mb-5">
            <label for="pass1" class="form-label">Password</label>
            <input type="password" class="form-control" name="pass1"id="pass1" placeholder="Enter Your Password" >
          </div>

          <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
      </div>
      <div class="modal-footer border-0 justify-content-center">

        If you don't have an account? <a href="{{route('signup')}}">Sign up</a>
      </div>
    </div>
  </div>
</div>
{{-- Shopping cart --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header border-bottom">
    <div class="text-start">
      <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="">
      <!-- alert -->
      <div class="alert alert-danger p-2" role="alert">
        You’ve got FREE delivery. Start <a href="#!" class="alert-link">checkout now!</a>
      </div>
      <ul class="list-group list-group-flush" id="listCart">
        {{-- <span style="display: none">{{$sum =0}}</span>
          <!-- list group -->
          @if (Auth::check())
          @foreach (Auth::user()->Cart->where('order_code','=',null) as $key => $cart)
            <span class="d-none">{{$sum += $cart->Product->per_price * $cart->qty}}</span>
            <li class="list-group-item py-3 ps-0 border-top border-bottom">
                <!-- row -->
                <div class="row align-items-center">
                  <div class="col-3 col-md-2">
                    <!-- img --> 
                    <img src="{{asset('resources/image/pet/'.$cart->Product->image)}}" alt="{{$cart->Product->product_name}}" class="img-fluid" style="width: 200px"></div>
                  <div class="col-4 col-md-6 col-lg-5">
                    <!-- title -->
                    <a href="{{route('productdetail',[$cart->id_product])}}" class="text-inherit">
                      <h6 class="mb-0">{{$cart->Product->product_name}}</h6>
                    </a>
                    <span><small class="text-muted">{{$cart->Product->Breed->TypeProduct->name_type}}</small></span>
                    <!-- text -->
                    <div class="mt-2 small lh-1"> 
                        <a href="{{route('removeId',$cart->id_cart)}}" class="text-decoration-none text-inherit"> 
                            <span class="me-1 align-text-bottom">
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-trash-2 text-success">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                              </svg>
                            </span>
                            <span class="text-muted">Remove</span>
                        </a>
                    </div>
                  </div>
                  <!-- input group -->
                  <div class="col-3 col-md-3 col-lg-3">
                    <!-- input -->
                    <!-- input -->
                    <div class="input-group input-spinner  ">
                        <a href="{{route('minus',[$cart->id_cart])}}" class="text-decoration-none btn">
                            <i class="fa-solid fa-minus text-danger"></i>
                        </a>
                        <input type="text" value="{{$cart->qty}}" name="quantity"class="form-control form-input">
                        @if ($cart->qty < $cart->Product->quantity)
                        <a href="{{route('addmore',[$cart->id_cart])}}" class="text-decoration-none btn" >
                            <i class="fa-solid fa-plus text-danger"></i>
                        </a>
                        @else
                        <a class="disabled btn border-0">
                            <i class="fa-solid fa-plus "></i>
                        </a>
                        @endif
                    </div>
      
                  </div>
                  <!-- price -->
                  <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                    <span class="fw-bold">${{$cart->Product->per_price * $cart->qty}}</span>
                  </div>
                </div>
      
            </li>
          @endforeach
          <li class="list-group-item py-3 ps-0 border-top border-bottom">
            <div class="text-black-50 text-end">
                <h4>Total: <span class="h4 text-danger">${{$sum}}</span></h4>
            </div>          
          </li>
          @endif
          @if (Session::has("cart"))
              @for ($i = 0; $i < count(Session::get("cart")); $i++)
                  <span class="d-none">{{$sum += Session::get("cart")[$i]["per_price"] * Session::get("cart")[$i]["qty"]}}</span>
                  <li class="list-group-item py-3 ps-0 border-top">
                      <!-- row -->
                      <div class="row align-items-center">
                        <div class="col-3 col-md-2">
                          <img src="{{asset('resources/image/pet/'.Session::get('cart')[$i]['image'])}}" alt="{{Session::get("cart")[$i]["name"]}}" class="img-fluid" style="width: 200px">
                          </div>
                        <div class="col-7 col-md-8 col-lg-5">
                          <!-- title -->
                          <a href="{{route('productdetail',[Session::get('cart')[$i]['id_product']])}}" class="text-inherit">
                            <h6 class="mb-0">{{Session::get("cart")[$i]["name"]}}</h6>
                          </a>
                          {{-- <span><small class="text-muted">{{Auth::user()->Cart[$i]->Product->Breed->TypeProduct->name_type}}</small></span>
                          <!-- text -->
                          <div class="mt-2 small lh-1"> 
                              <a href="{{route('removeId',$i)}}" class="text-decoration-none text-inherit"> 
                                  <span class="me-1 align-text-bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                      class="feather feather-trash-2 text-success">
                                      <polyline points="3 6 5 6 21 6"></polyline>
                                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                      </path>
                                      <line x1="10" y1="11" x2="10" y2="17"></line>
                                      <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                  </span>
                                  <span class="text-muted">Remove</span>
                              </a>
                          </div>
                        </div>
                        <!-- input group -->
                        <div class="col-3 col-md-3 col-lg-3">
                          <!-- input -->
                          <!-- input -->
                          <div class="input-group input-spinner  ">
                              <a href="{{route('minus',$i)}}" class="text-decoration-none btn">
                                  <i class="fa-solid fa-minus text-danger"></i>
                              </a>
                              <input type="text" value="{{Session::get("cart")[$i]["qty"]}}" name="quantity"class="form-control form-input">
                              @if (Session::get("cart")[$i]["qty"] < Session::get("cart")[$i]["max"])
                              <a href="{{route('addmore',$i)}}" class="text-decoration-none btn" >
                                  <i class="fa-solid fa-plus text-danger"></i>
                              </a>
                              @else
                              <a class="disabled btn border-0">
                                  <i class="fa-solid fa-plus "></i>
                              </a>
                              @endif
                          </div>
            
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                          <span class="fw-bold">${{Session::get("cart")[$i]["per_price"] * Session::get("cart")[$i]["qty"]}}</span>
                        </div>
                      </div>
                    </li>
              @endfor
              <li class="list-group-item py-3 ps-0 border-top border-bottom">
                <div class="text-black-50 text-end">
                    <h4>Total: <span class=" h4 text-danger">${{$sum}}</span></h4>
                </div>          
              </li>
          @endif
          @if (!Session::has("cart") && !Auth::check())
              <li class="list-group-item py-3 ps-0 border-top border-bottom">
                  <div class="text-black-50 text-center">
                      Cart emty
                  </div>          
              </li>
          @endif --}}
      </ul>
      <!-- btn -->
      <div class="d-flex justify-content-between mt-4">
        <a href="{{route('order')}}" class="btn btn-primary">Buy Now</a>
      </div>
    </div>
  </div>
</div>

