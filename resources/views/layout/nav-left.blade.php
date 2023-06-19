<div class="col-lg-3 col-md-4 col-12 border-end  d-none d-md-block">
    <div class="pt-10 pe-lg-10">
        <ul class="nav flex-column nav-pills nav-pills-dark">
            @if ( Auth::user()->admin !='2')
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('accountorder') }}">
                        <i class="fa-solid fa-cart-shopping me-5"></i>Your Orders
                    </a>
                </li>            
                <li class="nav-item">
                    <a class="nav-link" href="{{route('accountaddress')}}">
                        <i class="fa-solid fa-location-pin me-5"></i>Address</a>
                </li>

            @else
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ route('allorder') }}">
                    <i class="fa-solid fa-cart-shopping me-5"></i>All User's Orders
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{route('profie')}}" >
                    <i class="fa-solid fa-gear me-5"></i>Settings
                </a>
            </li>
            <li class="nav-item">
                <hr>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{route('signout')}}">
                    <i class="fa-solid fa-arrow-right-from-bracket me-5"></i>Log out
                </a>
            </li>
        </ul>
    </div>
</div>
