@extends('admin')
@section('content')
<div class="col-sm-7 col-md-8 mx-auto mt-4 bg-light overflow-x-scroll">
    <div class="row">
        <div class="mx-auto  p-4 rounded-2">
            <div class="row">
                <h2 class="col-4">List Orders</h2>
                <div class="col-3">
                    <select name="sortSelect" id="sortSelect" class="form-select">
                        <option value="all" {{$sortType == "all"?"selected":""}}>All Order</option>
                        <option value="created_at" {{$sortType == "created_at"?"selected":""}}>Nearest Orders</option>
                        <option value="status" {{$sortType == "status"?"selected":""}}>Not Paid</option>
                        <option value="user" {{$sortType == "user"?"selected":""}}>User Orders</option>
                        <option value="guest" {{$sortType == "guest"?"selected":""}}>Guest Orders</option>
                        <option value="cod" {{$sortType == "cod"?"selected":""}}>Method: Cash on delivery</option>
                        <option value="credit" {{$sortType == "credit"?"selected":""}}>Method: Online payment</option>
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
                        <th>Method</th>
                        <th>Status</th>
                        <th>Order date</th>
                        <th>Del</th>
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
                        <td>{{$order->User->name!=null?$order->User->name: "Not a user"}}</td>
                        @endif
                        <td>{{$order->cus_name}}</td>
                        <td>{{$order->cus_address}}</td>
                        <td>{{$order->cus_phone}}</td>
                        <td>{{$order->cus_email}}</td>
                        <td>{{$order->method}}</td>
                        <td>{{$order->status}}</td>
                        <td>
                            {{$order->created_at}}
                        </td>
                        <td>
                            <a href="{{route('deleteOrder',[$order->id_order])}}"><i class="fa-sharp fa-solid fa-trash text-danger"></i></a>
                        </td>
                        <td>
                            <a href="{{route('editorder',[$order->id_order])}}"><i class="fa-sharp fa-solid fa-pen text-secondary"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('admin_script')
<script>
    $(document).ready(function(){
        $('#sortSelect').change(function(){
            window.location.assign(window.location.pathname+'?sort='+$(this).val());
        })
    })
</script>
@endsection