@extends('admin')
@section('content')
  <main>
    <div class="container">
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>User</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="#" class="text-inherit">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    User
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('adduser') }}" class="btn btn-primary">Add New User</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-12 mb-5">
                <div class="card h-100 card-lg">
                    <div class="p-6">
                        <div class="row justify-content-between">
                            <div class="col-md-4 col-lg-3 col-12">
                                <div class="input-group">
                                    <input class="form-control" type="search" name="searchUser" id="searchUser"placeholder="Search Users" aria-label="Search" value="{{isset($search)?$search:''}}"/>
                                    <label for="searchUser"class="input-group-text"><i class="fa-solid fa-magnifying-glass fa-lg"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <select name="sortType" id="sortType" class="form-select">
                                    <option value="all" {{!$sortType == "all"? "selected":""}}>All Users</option>
                                    <option value="admin"{{$sortType =='admin'?"selected":""}}>Admin</option>
                                    <option value="user"{{$sortType =='user'?"selected":""}}>User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @if (Session::has("message"))
                    <div class="alert alert-success">{{Session::get("message")}}</div>
                    @endif
                    @if (Session::has("error"))
                    <div class="alert alert-danger">{{Session::get("error")}}</div>
                    @endif
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table
                                class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Purchase Date</th>
                                        <th>Phone</th>
                                        <th>Rank</th>
                                        <th>Spent</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->id_user }}</td>
                                            <td>
                                                <img src="{{ asset('resources/image/user/' . $item->image) }}" alt="" style="width: 50px; ">
                                                {{ $item->name }}
                                            </td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ date_format(date_create($item->created_at), 'j/m/Y') }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                @if ($item->admin == '1')
                                                    Admin
                                                @endif
                                                @if ($item->admin == '2')
                                                    Manager
                                                @endif
                                                @if ($item->admin == "0")
                                                    User
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $sum =0;
                                                    foreach ($item->Order as $order) {
                                                        foreach ($order->Cart as $cart) {
                                                            $sum += $cart->price * (1-$cart->sale/100) *$cart->amount;
                                                        }
                                                        if($order->code_coupon){
                                                            $sum -= $order->Coupon->discount <10? $order->Coupon->discount:0;
                                                            $sum *= $order->Coupon->discount >=10 ? (1- $order->Coupon->discount/100) :1;
                                                        };
                                                        $sum += $order->shipping_fee;
                                                    };
                                                @endphp
                                                ${{ number_format($sum, 2, '.', ' ') }}
                                            </td>

                                            <td>
                                                @if ($item->admin != '1')
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href=""> 
                                                                    <i class="bi bi-eye me-3"></i>Detail
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item" href="{{route('edituser',[$item->id_user])}}">
                                                                    <i class="bi bi-pencil-square me-3"></i>Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="{{route('deleteUser',[$item->id_user])}}">
                                                                    <i class="fa-sharp fa-solid fa-trash me-3"></i>Delete
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="p-5">
                            @if (!$sortType)
                            {{$users->links('pagination.custom_pagi')}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('admin_script')
    <script>
        $(document).ready(function(){
            $('#sortType').change(function(){
                window.location.assign(window.location.pathname+'?sortType='+$(this).val());
            });
            $('.btn-user-order').click(function(){
                $.get(window.location.origin+'/index.php/ajax/userorder/'+$(this).data('iduser'),function(data){
                    console.log(data);
                    $('#order_modal').html(data);
                })
            })
        })
    </script>
@endsection