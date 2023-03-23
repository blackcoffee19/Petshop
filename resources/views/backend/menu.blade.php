<div class="col-sm-4 col-md-3 mx-md-auto d-flex flex-column pt-5 bg-light rounded shadow position-sticky" style="top:0">
    <div class="mb-3 ps-4 d-flex flex-row justify-content-around align-items-center position-relative" style="height: 120px">
        <a  class="text-black fs-4 text-decoration-none flex-grow-1">
            <i class="fa-solid fa-user-tie fs-3 me-4"></i>&nbsp; Admin
            <br><span class="fs-5 text-black-50">{{Auth::user()->name}}</span>
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
</div>
