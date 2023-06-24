{{-- <div class="col-sm-4 col-md-3 mx-md-auto d-flex flex-column pt-5 bg-light rounded shadow position-sticky" style="top:0">
    <div class="mb-3 ps-4 d-flex flex-row justify-content-around align-items-center position-relative" style="height: 120px">
        <a  class="text-black fs-4 text-decoration-none flex-grow-1">
            <i class="fa-solid fa-user-tie fs-3 me-4"></i>&nbsp; Admin
            <br><span class="fs-4 text-black-50">{{Auth::user()->name}}</span>
            <br><span class="fs-5 text-primary">{{Auth::user()->position}}</span>
        </a>
        <div class="dropend">
            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                <i class="fa-solid fa-gear"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" >
                <li><a href="{{route('profieAdmin')}}" class="dropdown-item text-decoration-none" href="">Account</a></li>
                <li><a class="dropdown-item text-decoration-none" href="{{route('admin_login')}}">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="my-3 ps-4 py-2 menu_list {{$state == 'DB'?'active_cus':''}}">
        <a class="text-decoration-none text-black" href="{{route('dashboard')}}">Dashboard</a>
    </div>
    <div class=" mb-3 ps-4 pe-3 py-2 menu_list {{$state == 'Type'?'active_cus':''}}">
        <a class="text-decoration-none text-black text-uppercase" data-bs-toggle="collapse" href="#colla1" role="button" aria-expanded="false" aria-controls="colla1">Pet Types
            <i class="fa-solid fa-chevron-down float-end lh-base"></i>
        </a>
        <div class="collapse {{$state == 'Type'?'show':''}}" id="colla1">
            <ul class="list-unstyled">
                <li class="ms-2 mt-4"><a href="{{route('listtype')}}" class="text-black-50 text-capitalize text-decoration-none">List Type of pet</a></li>
                <li class="ms-2 mt-4"><a href="{{route('addtype')}}" class="text-black-50 text-capitalize text-decoration-none">Add new Type</a></li>
            </ul>
        </div>
    </div>
    <div class=" mb-3 ps-4 pe-3 py-2 menu_list {{$state == 'Breed'?'active_cus':''}}">
        <a class="text-decoration-none text-black text-uppercase" data-bs-toggle="collapse" href="#colla2" role="button" aria-expanded="false" aria-controls="colla2">Breeds
            <i class="fa-solid fa-chevron-down float-end lh-base"></i>
        </a>
        <div class="collapse {{$state == 'Breed'?'show':''}}" id="colla2">
            <ul class="list-unstyled">
                <li class="ms-2 mt-4"><a href="{{route('listbreed')}}" class="text-black-50 text-capitalize text-decoration-none">List Breeds</a></li>
                <li class="ms-2 mt-4"><a href="{{route('addbreed')}}" class="text-black-50 text-capitalize text-decoration-none">Add new breed</a></li>
            </ul>
        </div>
    </div>
    <div class=" mb-3 ps-4 pe-3 py-2  menu_list {{$state == 'Pet'?'active_cus':''}}">
        <a class="text-decoration-none text-black text-uppercase" data-bs-toggle="collapse" href="#colla3" role="button" aria-expanded="false" aria-controls="colla3">Pets
            <i class="fa-solid fa-chevron-down float-end lh-base"></i>
        </a>
        <div class="collapse w-100 {{$state == 'Pet'?'show':''}}" id="colla3">
            <ul class="list-unstyled ">
                <li class="ms-2 mt-4 "><a href="{{route('listpet')}}" class="text-black-50 text-capitalize text-decoration-none">List Pets</a></li>
                <li class="ms-2 mt-4"><a href="{{route('addpet')}}" class="text-black-50 text-capitalize text-decoration-none">Add new pet</a></li>
            </ul>
        </div>
    </div>
    <div class=" mb-3 ps-4 pe-3 py-2  menu_list {{$state == 'User'?'active_cus':''}}">
        <a class="text-decoration-none text-black text-uppercase" data-bs-toggle="collapse" href="#colla4" role="button" aria-expanded="false" aria-controls="colla4">Users
            <i class="fa-solid fa-chevron-down float-end lh-base"></i>
        </a>
        <div class="collapse w-100 {{$state == 'User'?'show':''}}" id="colla4">
            <ul class="list-unstyled ">
                <li class="ms-2 mt-4 "><a href="{{route('listuser')}}" class="text-black-50 text-capitalize text-decoration-none">List Users</a></li>
                <li class="ms-2 mt-4"><a href="{{route('adduser')}}" class="text-black-50 text-capitalize text-decoration-none">Add new user</a></li>
            </ul>
        </div>
    </div>
    <div class="mb-3 ps-4 pe-3 py-2  menu_list {{$state == 'Order'?'active_cus':''}}">
        <a class="text-decoration-none text-black text-uppercase" data-bs-toggle="collapse" href="#colla5" role="button" aria-expanded="false" aria-controls="colla5">Orders
            <i class="fa-solid fa-chevron-down float-end lh-base"></i>
        </a>
        <div class="collapse w-100 {{$state == 'Order'?'show':''}}" id="colla5">
            <ul class="list-unstyled ">
                <li class="ms-2 mt-4 "><a href="{{route('listorder')}}" class="text-black-50 text-capitalize text-decoration-none">List Orders</a></li>
            </ul>
        </div>
    </div>
    <div class="mb-3 ps-4 pe-3 py-2  menu_list {{$state == 'Slide'?'active_cus':''}}">
        <a class="text-decoration-none text-black text-uppercase" data-bs-toggle="collapse" href="#colla6" role="button" aria-expanded="false" aria-controls="colla6">Slide
            <i class="fa-solid fa-chevron-down float-end lh-base"></i>
        </a>
        <div class="collapse w-100 {{$state == 'Slide'?'show':''}}" id="colla6">
            <ul class="list-unstyled ">
                <li class="ms-2 mt-4 "><a href="{{route('listslide')}}" class="text-black-50 text-capitalize text-decoration-none">List Slide</a></li>
            </ul>
        </div>
    </div>
    <div class="mb-3 ps-4 pe-3 py-2  menu_list {{$state == 'Banner'?'active_cus':''}}">
        <a class="text-decoration-none text-black text-uppercase" data-bs-toggle="collapse" href="#colla7" role="button" aria-expanded="false" aria-controls="colla7">Banner
            <i class="fa-solid fa-chevron-down float-end lh-base"></i>
        </a>
        <div class="collapse w-100 {{$state == 'Banner'?'show':''}}" id="colla7">
            <ul class="list-unstyled ">
                <li class="ms-2 mt-4 "><a href="{{route('listbanner')}}" class="text-black-50 text-capitalize text-decoration-none">List Banner</a></li>
            </ul>
        </div>
    </div>
    <div class="mb-3 ps-4 pe-3 py-2  menu_list {{$state == 'Coupon'?'active_cus':''}}">
        <a class="text-decoration-none text-black text-uppercase" data-bs-toggle="collapse" href="#colla8" role="button" aria-expanded="false" aria-controls="colla8">Coupon
            <i class="fa-solid fa-chevron-down float-end lh-base"></i>
        </a>
        <div class="collapse w-100 {{$state == 'Coupon'?'show':''}}" id="colla8">
            <ul class="list-unstyled ">
                <li class="ms-2 mt-4 "><a href="{{route('listcoupon')}}" class="text-black-50 text-capitalize text-decoration-none">List Coupon</a></li>
            </ul>
        </div>
    </div>
</div> --}}
<nav class="navbar-vertical-nav d-none d-xl-block">
    <div class="navbar-vertical">
        <div class="px-4 py-5">
            <a href="{{ route('dashboard') }}" class="navbar-brand">
                <img src="{{ asset('resources/image/logo/axit-logo.svg') }}" alt="" />
            </a>
        </div>
        <div class="navbar-vertical-content flex-grow-1 " data-simplebar="">
            <ul class="navbar-nav flex-column" id="sideNavbar">
                <li class="nav-item">
                    <a class="nav-link menu_list {{$state == 'DB'?'active_cus':''}}" href="{{ route('dashboard') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-house"></i></span>
                            <span class="nav-link-text">Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item mt-6 mb-3">
                    <span class="nav-label">Store Managements</span>
                </li>
                <li class="nav-item mt-6 mb-3 menu_list {{$state == 'Type'?'active_cus':''}}">
                    <a class=" nav-link" data-bs-toggle="collapse" href="#colla1" role="button" aria-expanded="false" aria-controls="colla1">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-diagram-3"></i>
                            </span>
                            <span class="nav-link-text">Pet Types</span>
                        </div>
                    </a>
                    <div class="collapse {{$state == 'Type'?'show':''}}" id="colla1">
                        <ul class="list-unstyled">
                            <li class="ms-2 mt-4"><a href="{{route('listtype')}}" class="text-black-50 text-capitalize text-decoration-none">List Type of pet</a></li>
                            <li class="ms-2 mt-4"><a href="{{route('addtype')}}" class="text-black-50 text-capitalize text-decoration-none">Add new Type</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item  menu_list {{$state == 'Breed'?'active_cus':''}}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#colla2" role="button" aria-expanded="false" aria-controls="colla2">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-bezier"></i>
                            </span>
                            <span class="nav-link-text">Breeds</span>
                        </div>
                    </a>
                    <div class="collapse {{$state == 'Breed'?'show':''}}" id="colla2">
                        <ul class="list-unstyled">
                            <li class="ms-2 mt-4"><a href="{{route('listbreed')}}" class="text-black-50 text-capitalize text-decoration-none">List Breeds</a></li>
                            <li class="ms-2 mt-4"><a href="{{route('addbreed')}}" class="text-black-50 text-capitalize text-decoration-none">Add new breed</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu_list {{$state == 'Pet'?'active_cus':''}}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#colla3" role="button" aria-expanded="false" aria-controls="colla3">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="fa-sharp fa-solid fa-dog"></i>
                            </span>
                            <span class="nav-link-text">Pets</span>
                        </div>
                    </a>
                    <div class="collapse w-100 {{$state == 'Pet'?'show':''}}" id="colla3">
                        <ul class="list-unstyled ">
                            <li class="ms-2 mt-4 "><a href="{{route('listpet')}}" class="text-black-50 text-capitalize text-decoration-none">List Pets</a></li>
                            <li class="ms-2 mt-4"><a href="{{route('addpet')}}" class="text-black-50 text-capitalize text-decoration-none">Add new pet</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item  menu_list {{$state == 'User'?'active_cus':''}}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#colla4" role="button" aria-expanded="false" aria-controls="colla4">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-people-fill"></i>
                            </span>
                            <span class="nav-link-text">Users</span>
                        </div>
                    </a>
                    <div class="collapse w-100 {{$state == 'User'?'show':''}}" id="colla4">
                        <ul class="list-unstyled ">
                            <li class="ms-2 mt-4 "><a href="{{route('listuser')}}" class="text-black-50 text-capitalize text-decoration-none">List Users</a></li>
                            <li class="ms-2 mt-4"><a href="{{route('adduser')}}" class="text-black-50 text-capitalize text-decoration-none">Add new user</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item  menu_list {{$state == 'Order'?'active_cus':''}}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#colla5" role="button" aria-expanded="false" aria-controls="colla5">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-handbag-fill"></i>
                            </span>
                            <span class="nav-link-text">Orders</span>
                        </div>
                    </a>
                    <div class="collapse w-100 {{$state == 'Order'?'show':''}}" id="colla5">
                        <ul class="list-unstyled ">
                            <li class="ms-2 mt-4 "><a href="{{route('listorder')}}" class="text-black-50 text-capitalize text-decoration-none">List Orders</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu_list {{$state == 'Slide'?'active_cus':''}}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#colla6" role="button" aria-expanded="false" aria-controls="colla6">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-images"></i>
                            </span>
                            <span class="nav-link-text">Slide</span>
                        </div>
                    </a>
                    <div class="collapse w-100 {{$state == 'Slide'?'show':''}}" id="colla6">
                        <ul class="list-unstyled ">
                            <li class="ms-2 mt-4 "><a href="{{route('listslide')}}" class="text-black-50 text-capitalize text-decoration-none">List Slide</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu_list {{$state == 'Banner'?'active_cus':''}}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#colla7" role="button" aria-expanded="false" aria-controls="colla7">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-grid-1x2"></i>
                            </span>
                            <span class="nav-link-text">Banner</span>
                        </div>
                    </a>
                    <div class="collapse w-100 {{$state == 'Banner'?'show':''}}" id="colla7">
                        <ul class="list-unstyled ">
                            <li class="ms-2 mt-4 "><a href="{{route('listbanner')}}" class="text-black-50 text-capitalize text-decoration-none">List Banner</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu_list {{$state == 'Coupon'?'active_cus':''}}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#colla8" role="button" aria-expanded="false" aria-controls="colla8">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-tags-fill"></i>
                            </span>
                            <span class="nav-link-text">Coupons</span>
                        </div>
                    </a>
                    <div class="collapse w-100 {{$state == 'Coupon'?'show':''}}" id="colla8">
                        <ul class="list-unstyled ">
                            <li class="ms-2 mt-4 "><a href="{{route('listcoupon')}}" class="text-black-50 text-capitalize text-decoration-none">List Coupon</a></li>
                        </ul>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1" id="offcanvasExample">
    <div class="navbar-vertical">
        <div class="px-4 py-5 d-flex justify-content-between align-items-center">
            <a href="{{route('dashboard')}}" class="navbar-brand">
                <img src="{{ asset('resources/image/logo/axit-logo.svg') }}" alt="" />
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-house"></i></span>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item mt-6 mb-3">
                    <span class="nav-label">Store Managements</span>
                </li>
                <li class="nav-item menu_list {{$state == 'Type'?'active_cus':''}}">
                    <a class="nav-link" href="{{route('listtype') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"> <i class="bi bi-cart"></i></span>
                            <span class="nav-link-text">Type pet</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item menu_list {{$state == 'Breed'?'active_cus':''}}">
                    <a class="nav-link" href="{{ route('listbreed')}}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-list-task"></i></span>
                            <span class="nav-link-text">List Breed</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item menu_list {{$state == 'Pet'?'active_cus':''}}">
                    <a class="nav-link" href="{{route('listpet')}}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"> <i class="bi bi-bag"></i></span>
                            <span class="nav-link-text">Pets</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item menu_list {{$state == 'User'?'active_cus':''}}">
                    <a class="nav-link" href="{{route('listuser')}}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="bi bi-people"></i></span>
                            <span class="nav-link-text">Customers</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item  menu_list {{$state == 'Order'?'active_cus':''}}">
                    <a class="nav-link"  href="{{route('listorder')}}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                            <span class="nav-link-text">Orders</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item  menu_list {{$state == 'Slide'?'active_cus':''}}">
                    <a class="nav-link"  href="{{route('listcoupon')}}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                            <span class="nav-link-text">Slide</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item  menu_list {{$state =='Banner'?'active_cus':''}}">
                    <a class="nav-link"  href="{{route('listbanner')}}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                            <span class="nav-link-text">Banner</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item  menu_list {{$state =='Coupon'?'active_cus':''}}">
                    <a class="nav-link"  href="{{route('listbanner')}}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                            <span class="nav-link-text">Coupon</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
