@extends('admin')
@section('content')
{{-- <div class="col-sm-7 col-md-8 mx-auto mt-4 bg-light overflow-x-scroll">
    <div class="row">
        <div class="mx-auto  p-4 rounded-2">
            <div class="row">
                <h2 class="col-4">List Orders</h2>
                <div class="col-3">
                    <select name="sortSelect" id="sortSelect" class="form-select">
                        <option value="all" {{$sort == "all" || $sort == null?"selected":""}}>All Order</option>
                        <option value="created_at" {{$sort == "created_at"?"selected":""}}>Nearest Orders</option>
                        <option value="finished" {{$sort == "status"?"selected":""}}>Finished</option>
                        <option value="confirmed" {{$sort == "status"?"selected":""}}>Confirmed</option>
                        <option value="delivery" {{$sort == "status"?"selected":""}}>Delivery</option>
                        <option value="unconfimred" {{$sort == "status"?"selected":""}}>Unconfimred</option>
                        <option value="cancel" {{$sort == "status"?"selected":""}}>Cancel</option>
                        <option value="transaction failed" {{$sort == "status"?"selected":""}}>Transaction failed</option>
                        <option value="user" {{$sort == "user"?"selected":""}}>User Orders</option>
                        <option value="guest" {{$sort == "guest"?"selected":""}}>Guest Orders</option>
                        <option value="cod" {{$sort == "cod"?"selected":""}}>Method: Cash on delivery</option>
                        <option value="credit" {{$sort == "credit"?"selected":""}}>Method: Online payment</option>
                    </select>
                </div>
            </div>
            <hr>
            @if (Session::has("message"))
            <div class="alert alert-success">{{Session::get("message")}}</div>
            @endif
            @if (Session::has("error"))
            <div class="alert alert-danger">{{Session::get("error")}}</div>
            @endif
            <table class="table w-100 table-light table-bordered table-responsive overflow-x-scroll">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order Code</th>
                        <th>User</th>
                        <th>Receiver</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Coupon</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Order date</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id_order}}</td>
                        <td>{{$order->order_code}}</td>
                        @if (str_contains($order->order_code,"guest"))
                        <td>Null</td>
                        @else
                        <td>{{$order->id_user == null ? "Not a user": $order->User->name }}</td>
                        @endif
                        <td>{{$order->cus_name}}</td>
                        <td>{{$order->cus_address}}</td>
                        <td>{{$order->cus_phone}}</td>
                        <td>{{$order->cus_email}}</td>
                        <td>
                        @if ($order->code_coupon)
                            {{$order->code_coupon}} <br>-{{$order->Coupon->discount}}%
                        @else
                        None
                        @endif
                        </td>
                        <td>{{$order->method}}</td>
                        <td>{{$order->status}}</td>
                        <td>
                            {{$order->created_at}}
                        </td>
                        <td>
                            <a href="{{route('editorder',[$order->id_order])}}"><i class="fa-sharp fa-solid fa-pen text-secondary"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$orders->links('pagination.custom')}}
        </div>
    </div>
</div> --}}
<main>
    <div class="container">
        <div class="row mb-8">
            <div class="col-md-12">
                <div>
                    <h2>Order List</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order List</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-12 mb-5">
                <div class="card h-100 card-lg">
                    <div class=" p-6 ">
                        <div class="row justify-content-between">
                            <div class="col-lg-4 col-md-5 col-12">
                                <select name="sortSelect" id="sortSelect" class="form-select">
                                    <option value="all" {{$sort == "all" || $sort == null?"selected":""}}>All Order</option>
                                    <option value="created_at" {{$sort == "created_at"?"selected":""}}>Nearest Orders</option>
                                    <option value="finished" {{$sort == "status"?"selected":""}}>Finished</option>
                                    <option value="confirmed" {{$sort == "status"?"selected":""}}>Confirmed</option>
                                    <option value="delivery" {{$sort == "status"?"selected":""}}>Delivery</option>
                                    <option value="unconfimred" {{$sort == "status"?"selected":""}}>Unconfimred</option>
                                    <option value="cancel" {{$sort == "status"?"selected":""}}>Cancel</option>
                                    <option value="transaction failed" {{$sort == "status"?"selected":""}}>Transaction failed</option>
                                    <option value="user" {{$sort == "user"?"selected":""}}>User Orders</option>
                                    <option value="guest" {{$sort == "guest"?"selected":""}}>Guest Orders</option>
                                    <option value="cod" {{$sort == "cod"?"selected":""}}>Method: Cash on delivery</option>
                                    <option value="credit" {{$sort == "credit"?"selected":""}}>Method: Online payment</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if (Session::has("message"))
                        <div class="alert alert-success">{{Session::get("message")}}</div>
                        @endif
                        @if (Session::has("error"))
                        <div class="alert alert-danger">{{Session::get("error")}}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                <thead class="p-2 bg-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Order Name</th>
                                        <th>Customer</th>
                                        <th>Date & TIme</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{$order->id_order}}</td>
                                            <td><a href="{{route('orderdetail',$order->id_order)}}" class="text-reset">{{ $order->order_code }}</a></td>
                                            <td>{{ $order->receiver }}</td>
                                            <td>{{ date_format(date_create($order->updated_at), 'j/m/Y') }}</td>
                                            <td>{{ $order->method }}</td>

                                            <td>
                                                @switch($order->status)
                                                    @case($order->status == 'finished')
                                                        <span
                                                            class="btn bg-light-primary text-dark-primary">{{ $order->status }}</span>
                                                    @break

                                                    @case($order->status == 'delivery')
                                                        <span
                                                            class="btn bg-light-warning text-dark-warning">{{ $order->status }}</span>
                                                    @break

                                                    @case($order->status == 'transaction failed')
                                                        <span
                                                            class="btn bg-light-danger text-dark-danger">{{ $order->status }}</span>
                                                    @break

                                                    @case($order->status == 'cancel')
                                                        <span
                                                            class="btn bg-light-danger text-dark-danger">{{ $order->status }}</span>
                                                    @break

                                                    @case($order->status == 'unconfirmed')
                                                        <span
                                                            class="btn bg-dark-secondary text-dark">{{ $order->status }}</span>
                                                    @break

                                                    @case($order->status == 'confirmed')
                                                        <span
                                                            class="btn bg-light-info text-dark-info">{{ $order->status }}</span>
                                                    @break
                                                    @default
                                                    @break
                                                @endswitch
                                            </td>
                                            <td>${{ number_format($order->total,2,'.',' ') }}</td>
                                            <td>
                                                <div class="dropdown"> <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{route('orderdetail',$order->id_order)}}">
                                                            <i class="bi bi-eye me-3 "></i></i>Detail</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="p-5">
                        {{ $orders->onEachSide(1)->links() }}
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
        $('#sortSelect').change(function(){
            window.location.assign(window.location.origin+'/index.php/admin/orders/list/'+$(this).val());
        })
    })
</script>
@endsection