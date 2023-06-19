
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
              <div class="list-inline me-4 dropdown dropdown-fullwidth">
                @if (Auth::check())
                  @if (Auth::user()->admin == 0)
                    <div class="list-inline-item me-3">
                      <a href="{{ route('wishlist') }}" class="text-muted position-relative">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-heart">
                              <path
                                  d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                              </path>
                          </svg>
                          <span
                              class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                              <span class="fw-bold countFav">
                                  {{ count(Auth::user()->Favourite) }}
                              </span>
                          </span>
                      </a>
                  </div>  
                  @endif
                  <div class="list-inline-item me-3">
                      <a href="#!" class=" text-muted dropdown-toggle user_dropdown position-relative dropdown_news " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20"
                              height="20" fill="currentColor">
                              <path
                                  d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                          </svg>
                          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                              <span class="fw-bold ">
                                  {{ isset($news) ? count($news) : 0 }}
                              </span>
                          </span>
                      </a>
                      <div class=" dropdown-menu dropdown-menu-end dropdown-menu-lg shadow p-0 border-0">
                        <div class="border-bottom p-5 d-flex justify-content-between align-items-center">
                          <div>
                              <h5 class="mb-1">Notifications</h5>
                              <p class="mb-0 small">You have {{isset($news)? count($news):0}} unread notificates</p>
                          </div>
                        </div>
                        <div data-simplebar style="height: 250px">
                            <ul class="list-group list-group-flush notification-list-scroll fs-6 ">
                                @if (isset($news))
                                    @foreach ($news as $new)
                                        <li class="list-group-item px-5 py-4 list-group-item-action">
                                            @if (Auth::check() && Auth::user()->admin == "0")
                                                @if ($new->link == 'show_coupon')
                                                <a href="javascript:void(0)"  class="text-muted modal_coupon" data-bs-toggle="modal" data-bs-target="#couponModal" data-coupon="{{$new->attr}}">
                                                    <div class="d-flex">
                                                        <img src="{{ asset('resources/image/icons/tags.svg') }}" class="avatar avatar-md rounded-circle me-3" width="40" height="40"/>
                                                        <div class="ms-4">
                                                            <p class="mb-1 text-dark">
                                                                {{$new->title}}
                                                            </p>
                                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" fill="currentColor"
                                                                    class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                    <path
                                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                                </svg><small class="ms-2">
                                                                @php
                                                                    $date_new = $new->created_at;
                                                                    $date_cur =  date('Y-m-d H:i:s');
                                                                    $difference = strtotime($date_cur) - strtotime($date_new);
                                                                    $days= $difference/(60*60*24);
                                                                    if($days>30){
                                                                        if(($days /30)%12 >1){
                                                                            echo floor(($days /30)%12 )." years";
                                                                        }else{
                                                                            echo floor($days /30) .' months';
                                                                        }
                                                                    }else if($days >1){
                                                                        echo floor($days). " days";
                                                                    }else{
                                                                        echo floor($difference/(60*60)). " hours";
                                                                    }
                                                                    // $time= $date_cur->diffInDays($date_new)>1 ? $date_cur->diffInDays($date_new)." days ago": (($date_cur->diffInDays($date_new) == 0)? ($date_cur->diffInHours($date_new)> 0? $date_cur->diffInHours($date_new).' hours before': $date_cur->diffInMinutes($date_new). " minutes ago"): $date_cur->diffInDays($date_new)." day ago");
                                                                @endphp    
                                                                </small></span>
                                                        </div>
                                                    </div>
                                                </a>
                                                @else
                                                <a href="{{ route($new->link, $new->attr) }}" class="text-muted">
                                                    <div class="d-flex">
                                                        <img src="{{ asset('resources/image/pet/'.$new->image) }}" alt="" class="avatar avatar-md rounded-circle" width="40" height="40"/>
                                                        <div class="ms-4">
                                                            <p class="mb-1 text-dark">
                                                                {{$new->title}}
                                                            </p>
                                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" fill="currentColor"
                                                                    class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                    <path
                                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                                </svg><small class="ms-2">
                                                                @php
                                                                    $date_new = $new->created_at;
                                                                    $date_cur =  date('Y-m-d H:i:s');
                                                                    $difference = strtotime($date_cur) - strtotime($date_new);
                                                                    $days= $difference/(60*60*24);
                                                                    if($days>30){
                                                                        if(($days /30)%12 >1){
                                                                            echo floor(($days /30)%12 )." years";
                                                                        }else{
                                                                            echo floor($days /30) .' months';
                                                                        }
                                                                    }else if($days >1){
                                                                        echo floor($days). " days";
                                                                    }else{
                                                                        echo floor($difference/(60*60)). " hours";
                                                                    }
                                                                    // $time= $date_cur->diffInDays($date_new)>1 ? $date_cur->diffInDays($date_new)." days ago": (($date_cur->diffInDays($date_new) == 0)? ($date_cur->diffInHours($date_new)> 0? $date_cur->diffInHours($date_new).' hours before': $date_cur->diffInMinutes($date_new). " minutes ago"): $date_cur->diffInDays($date_new)." day ago");
                                                                @endphp    
                                                                </small></span>
                                                        </div>
                                                    </div>
                                                </a>
                                                @endif
                                            @else
                                            <a href="javascript:void(0)" class="text-muted manager_notificate" data-bs-toggle="modal" data-bs-target="#viewModalOrder2" data-order="{{$new->id_news}}">
                                                <div class="d-flex">
                                                    <img src="{{ asset('resources/image/user/'.$new->image) }}" alt="" class="avatar avatar-md rounded-circle" width="40" height="40"/>
                                                    <div class="ms-4">
                                                        <p class="mb-1 text-dark">
                                                            {{$new->title}}
                                                        </p>
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                height="12" fill="currentColor"
                                                                class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                <path
                                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                            </svg><small class="ms-2">
                                                            @php
                                                                $date_new = $new->created_at;
                                                                $date_cur =  date('Y-m-d H:i:s');
                                                                $difference = strtotime($date_cur) - strtotime($date_new);
                                                                $days= $difference/(60*60*24);
                                                                if($days>30){
                                                                    if(($days /30)%12 >1){
                                                                        echo floor(($days /30)%12 )." years";
                                                                    }else{
                                                                        echo floor($days /30) .' months';
                                                                    }
                                                                }else if($days >1){
                                                                    echo floor($days). " days";
                                                                }else{
                                                                    echo floor($difference/(60*60)). " hours";
                                                                }
                                                            @endphp    
                                                            </small>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>                                                           
                                            @endif
                                        </li>
                                    @endforeach
                                @else
                                <li class="list-group-item px-5 py-4 list-group-item-action">
                                    <h4 class="text-muted text-center">There are no notificates</h4>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="border-top px-5 py-4 text-center">
                            <a href="#!" class=" "> View All </a>
                        </div>
                      </div>
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
                        if(Auth::user()->admin ==0){
                          $sum=0;
                          foreach (Auth::user()->Cart->where('order_code','=',null) as $key => $value) {
                            $sum+=$value->qty;
                          }
                          echo $sum;
                        }else{
                          echo count($orders);
                        }
                        @endphp
                      </span>
                      @endif
                      @if (Session::has("cart"))
                      <span class="fw-bold countCart" >
                        @php
                          $sum=0;
                          foreach (Session::get('cart') as $key => $value) {
                            $sum+=$value["amount"];
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
                <div class="list-inline-item dropdown dropdown-fullwidth">
                  @if (Auth::check())
                    <a class="text-muted  dropdown-toggle user_dropdown" role="button" href="#!" data-bs-toggle="dropdown" aria-expanded="false">
                      @if (Auth::user()->image)
                      <img src="{{asset('resources/image/user/'.Auth::user()->image)}}" alt="" class="img-thumbnail rounded-circle" style="width: 40px; height: 40px;object-fit: cover">
                      @else
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                      </svg>
                      @endif
                        {{Auth::user()->name}}
                        @if (!Auth::user()->email_verified)
                            <img src="{{asset('resources/image/icons/warning.png')}}" width="18" height="18" class=" my-auto ms-3 img-fluid rounded-circle">
                        @endif
                    </a>
                    <div class=" dropdown-menu pb-0 ">
                      <div class="list-group">
                        @if (Auth::user()->admin == '1')
                          <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
                        @endif
                        <a href="{{ route('accountorder') }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-truck"></i> Order</a>
                        <a href="{{ route('profie') }}" class="list-group-item list-group-item-action d-flex flex-row justify-content-between align-items-center">
                          <span><i class="fa-solid fa-gear"></i>  Setting</span>
                            @if (!Auth::user()->email_verified)
                            <img src="{{asset('resources/image/icons/warning.png')}}" width="15" height="15" class=" img-fluid rounded-circle">
                            @endif
                        </a>
                        @if(Auth::user()->admin == '0')
                        <a href="{{ route('accountaddress') }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-location-pin"></i>Address</a>
                        @endif
                        <a href="{{ route('signout') }}" class="list-group-item list-group-item-action"><i class="bi bi-box-arrow-in-right"></i> Sign out</a>
                      </div>
                    </div>
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
              <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
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
          <div class="col-lg-4 col-xxl-3 text-end d-none d-lg-block mx-auto ">
            <div class="list-inline position-relative dropdown dropdown-fullwidth">
              @if (Auth::check())
                @if (Auth::user()->admin == '0')
                  <div class="list-inline-item me-3">
                    <a href="{{ route('wishlist') }}" class="text-muted position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-heart">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                            <span class="fw-bold countFav">
                                {{ count(Auth::user()->Favourite) }}
                            </span>
                        </span>
                    </a>
                </div>  
              @endif  
                <div class="list-inline-item me-3">
                  <a href="#!" class=" text-muted dropdown-toggle user_dropdown position-relative dropdown_news " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20"
                          height="20" fill="currentColor">
                          <path
                              d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                      </svg>
                      <span
                          class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                          <span class="fw-bold ">
                              {{ isset($news) ? count($news) : 0 }}
                          </span>
                      </span>
                  </a>
                  <div class=" dropdown-menu dropdown-menu-end dropdown-menu-lg shadow p-0 border-0">
                    <div class="border-bottom p-5 d-flex justify-content-between align-items-center">
                      <div>
                          <h5 class="mb-1">Notifications</h5>
                          <p class="mb-0 small">You have {{isset($news)? count($news):0}} unread notificates</p>
                      </div>
                    </div>
                    <div data-simplebar style="height: 250px">
                      <ul class="list-group list-group-flush notification-list-scroll fs-6 ">
                        @if (isset($news))
                          @foreach ($news as $new)
                            <li class="list-group-item px-5 py-4 list-group-item-action">
                              @if (Auth::check() && Auth::user()->admin == "0")
                                @if ($new->link == 'show_coupon')
                                <a href="javascript:void(0)"  class="text-muted modal_coupon" data-bs-toggle="modal" data-bs-target="#couponModal" data-coupon="{{$new->attr}}">
                                    <div class="d-flex">
                                        <img src="{{ asset('resources/image/icons/tags.svg') }}" class="avatar avatar-md rounded-circle me-3" width="40" height="40"/>
                                        <div class="ms-4">
                                            <p class="mb-1 text-dark">
                                                {{$new->title}}
                                            </p>
                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                    height="12" fill="currentColor"
                                                    class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                </svg><small class="ms-2">
                                                @php
                                                    $date_new = $new->created_at;
                                                    $date_cur =  date('Y-m-d H:i:s');
                                                    $difference = strtotime($date_cur) - strtotime($date_new);
                                                    $days= $difference/(60*60*24);
                                                    if($days>30){
                                                        if(($days /30)%12 >1){
                                                            echo floor(($days /30)%12 )." years";
                                                        }else{
                                                            echo floor($days /30) .' months';
                                                        }
                                                    }else if($days >1){
                                                        echo floor($days). " days";
                                                    }else{
                                                        echo floor($difference/(60*60)). " hours";
                                                    }
                                                    // $time= $date_cur->diffInDays($date_new)>1 ? $date_cur->diffInDays($date_new)." days ago": (($date_cur->diffInDays($date_new) == 0)? ($date_cur->diffInHours($date_new)> 0? $date_cur->diffInHours($date_new).' hours before': $date_cur->diffInMinutes($date_new). " minutes ago"): $date_cur->diffInDays($date_new)." day ago");
                                                @endphp    
                                                </small></span>
                                        </div>
                                    </div>
                                </a>
                                @else
                                  <a href="{{ route($new->link, $new->attr) }}" class="text-muted">
                                    <div class="d-flex">
                                      <img src="{{ asset('resources/image/pet/'.$new->image) }}" alt="" class="avatar avatar-md rounded-circle" width="40" height="40"/>
                                      <div class="ms-4">
                                        <p class="mb-1 text-dark">
                                            {{$new->title}}
                                        </p>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                height="12" fill="currentColor"
                                                class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                            </svg><small class="ms-2">
                                            @php
                                                $date_new = $new->created_at;
                                                $date_cur =  date('Y-m-d H:i:s');
                                                $difference = strtotime($date_cur) - strtotime($date_new);
                                                $days= $difference/(60*60*24);
                                                if($days>30){
                                                    if(($days /30)%12 >1){
                                                        echo floor(($days /30)%12 )." years";
                                                    }else{
                                                        echo floor($days /30) .' months';
                                                    }
                                                }else if($days >1){
                                                    echo floor($days). " days";
                                                }else{
                                                    echo floor($difference/(60*60)). " hours";
                                                }
                                                // $time= $date_cur->diffInDays($date_new)>1 ? $date_cur->diffInDays($date_new)." days ago": (($date_cur->diffInDays($date_new) == 0)? ($date_cur->diffInHours($date_new)> 0? $date_cur->diffInHours($date_new).' hours before': $date_cur->diffInMinutes($date_new). " minutes ago"): $date_cur->diffInDays($date_new)." day ago");
                                            @endphp    
                                            </small></span>
                                        </div>
                                    </div>
                                  </a>
                                @endif
                              @else
                                  <a href="javascript:void(0)" class="text-muted manager_notificate" data-bs-toggle="modal" data-bs-target="#viewModalOrder2" data-order="{{$new->id_news}}">
                                  <div class="d-flex">
                                    <img src="{{ asset('resources/image/user/'.$new->image) }}" alt="" class="avatar avatar-md rounded-circle" width="40" height="40"/>
                                    <div class="ms-4">
                                      <p class="mb-1 text-dark">
                                          {{$new->title}}
                                      </p>
                                      <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                              height="12" fill="currentColor"
                                              class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                              <path
                                                  d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                              <path
                                                  d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                          </svg><small class="ms-2">
                                          @php
                                              $date_new = $new->created_at;
                                              $date_cur =  date('Y-m-d H:i:s');
                                              $difference = strtotime($date_cur) - strtotime($date_new);
                                              $days= $difference/(60*60*24);
                                              if($days>30){
                                                  if(($days /30)%12 >1){
                                                      echo floor(($days /30)%12 )." years";
                                                  }else{
                                                      echo floor($days /30) .' months';
                                                  }
                                              }else if($days >1){
                                                  echo floor($days). " days";
                                              }else{
                                                  echo floor($difference/(60*60)). " hours";
                                              }
                                          @endphp    
                                          </small>
                                      </span>
                                    </div>
                                  </div>
                                  </a>                                                           
                              @endif
                            </li>
                          @endforeach
                        @else
                        <li class="list-group-item px-5 py-4 list-group-item-action">
                            <h4 class="text-muted text-center">There are no notificates</h4>
                        </li>
                        @endif
                      </ul>
                    </div>
                    <div class="border-top px-5 py-4 text-center">
                        <a href="#!" class=" "> View All </a>
                    </div>
                  </div>
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
                        if(Auth::user()->admin ==0){
                          $sum=0;
                          foreach (Auth::user()->Cart->where('order_code','=',null) as $key => $value) {
                            $sum+=$value->amount;
                          }
                          echo $sum;
                        }else{
                          echo count($orders);
                        }
                        @endphp
                      </span>
                      @endif
                      @if (Session::has("cart"))
                      <span class="fw-bold countCart" >
                        @php
                          $sum=0;
                          foreach (Session::get('cart') as $key => $value) {
                            $sum+=$value["amount"];
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
              <div class="list-inline-item dropdown dropdown-fullwidth">
                  @if (Auth::check())
                      <a class="text-muted dropdown-toggle user_dropdown" role="button" href="#!" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Auth::user()->image)
                            <img src="{{asset('resources/image/user/'.Auth::user()->image)}}" alt="" class="img-thumbnail rounded-circle" style="width: 40px; height: 40px;object-fit: cover">
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-user">
                          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                          <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        @endif
                          {{Auth::user()->name}}
                          @if (!Auth::user()->email_verified)
                              <img src="{{asset('resources/image/icons/warning.png')}}" width="18" height="18" class=" my-auto ms-3 img-fluid rounded-circle">
                          @endif
                      </a>
                      <div class=" dropdown-menu pb-0 ">
                        <div class="list-group">
                          @if (Auth::user()->admin == '1')
                            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
                          @endif
                          <a href="{{ route('accountorder') }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-truck"></i> Order</a>
                          <a href="{{ route('profie') }}" class="list-group-item list-group-item-action d-flex flex-row justify-content-between align-items-center">
                            <span><i class="fa-solid fa-gear"></i>  Setting</span>
                              @if (!Auth::user()->email_verified)
                              <img src="{{asset('resources/image/icons/warning.png')}}" width="15" height="15" class=" img-fluid rounded-circle">
                              @endif
                          </a>
                          @if(Auth::user()->admin == '0')
                          <a href="{{ route('accountaddress') }}" class="list-group-item list-group-item-action"><i class="fa-solid fa-location-pin"></i>Address</a>
                          @endif
                          <a href="{{ route('signout') }}" class="list-group-item list-group-item-action"><i class="bi bi-box-arrow-in-right"></i> Sign out</a>
                        </div>
                      </div>
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
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            
            @if (Auth::check() && Auth::user()->admin ==1)
            <li class="nav-item dropdown">
              <a class="nav-link" href="{{route('dashboard')}}" >
                  Admin Site
              </a>
            </li>   
            @endif
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
@if (Auth::check() && Auth::user()->admin != 0)
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <div class="text-start">
            <h5 id="offcanvasRightLabel" class="mb-0 fs-4">New Orders</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div>
        <ul class="list-group list-group-flush">
          @if (isset($orders) && count($orders)>0)
              @foreach ($orders as $order)
                <li class='list-group-item py-3 ps-0 border-top border-bottom'>
                  <div class='row align-items-center'>
                      <div class='col-1'>
                          @if ($order->id_user && isset($order->User->image))
                              <img src="{{asset('resources/image/user/'.$order->User->image)}}" alt="" width="40" height="40" class="img-fluid rounded-circle">
                          @else
                              <img src="{{asset('resources/image/user/user.png')}}" alt="" width="40" height="40" class="img-fluid rounded-circle">
                          @endif
                      </div>
                      <div class='col-2 '>
                          <span>#{{$order->order_code}}</span><br>
                          <small class="text-muted">{{date_format(date_create($order->created_at),"F j Y, g:i a")}}</small>
                      </div>
                      <div class='col-2'>Items: <p>{{count($order->Cart)}}</p>
                      </div>
                      <div class="col-2">
                        @php
                        $sum =0;
                        foreach ($order->Cart as $cart) {
                          $sum += $cart->price*(1 - $cart->sale/100)*$cart->amount;
                        };   
                        if($order->code_coupon){
                            if($order->Coupon->discount >= 10){
                                $sum = $sum*(1 - $order->Coupon->discount/100);
                            }else{
                                $sum -= $order->Coupon->discount;
                            }
                        }
                        $sum += $order->shipping_fee;
                        echo "$".number_format($sum,2,'.',' ');
                        @endphp
                      </div>
                      <div class="col-2">
                        @switch($order->status)
                          @case('confirmed')
                              <h5 class="badge bg-warning text-capitalize">{{$order->status}}</h5>
                              @break
                          @case('unconfirmed')
                              <h5 class="badge bg-dark text-capitalize">{{$order->status}}</h5>
                              @break
                          @case('delivery')
                              <h5 class="badge bg-primary text-capitalize">{{$order->status}}</h5>
                              @break
                        @endswitch
                      </div>
                      <div class="col-3">
                        @switch($order->status)
                          @case('confirmed')
                            <button type="button" class="btn btn-danger check_order" data-bs-toggle="modal" data-bs-target="#viewModalOrder" data-order="{{$order->id_order}}" >
                                Update          
                            </button>
                            @break
                          @case('unconfirmed')
                            <button type="button" class="btn btn-primary check_order" data-bs-toggle="modal" data-bs-target="#viewModalOrder" data-order="{{$order->id_order}}" >
                                Confirm  
                            </button>
                            @break
                          @case('delivery')
                            <button type="button" class="btn btn-primary check_order" data-bs-toggle="modal" data-bs-target="#viewModalOrder" data-order="{{$order->id_order}}" >
                                Update
                            </button>
                          @break        
                        @endswitch
                      </div>
                  </div>
                </li>
              @endforeach
          @else
          <li class='list-group-item py-3 ps-0 border-top border-bottom'>
            <h4 class="text-muted text-center text-uppercase">
                There are no New Order
            </h4>
          </li>
          @endif
        </ul>
      </div>
    </div>
</div>

@else
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <div class="text-start">
            <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <ul class="list-group list-group-flush" id="listCartmodal">
            </ul>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('checkout') }}" class="btn btn-primary">Continue Shopping</a>
                <a href="javascript:void(0);" class="btn btn-outline-secondary" id="clearCart">Clear Cart</a>
            </div>
        </div>
    </div>
</div>
@endif