@extends('admin')
@section('content')
<main>
    <div class="container">
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>Order Detail</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('listorder') }}">List Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('listorder') }}" class="btn btn-light">Back to all orders</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-12 col-12 mb-5">
                <div class="card h-100 card-lg">
                    <div class="card-body p-6">
                        <div class="d-md-flex justify-content-between">
                            <div class="d-flex align-items-center mb-2 mb-md-0">
                                <h2 class="mb-0">
                                    Order ID: #{{ $order->id_order }}
                                    <span style="padding-left: 50px">
                                        <h2>Order Name: {{ $order->order_code }}</h2>
                                    </span>
                                </h2>
                                {{-- <span class="badge bg-light-warning text-dark-warning ms-2">Pending</span> --}}
                                <span style="padding-left: 50px">
                                    @switch($order->status)
                                        @case($order->status == 'finished')
                                            <span class="badge ms-2 bg-light-primary text-dark-primary">
                                                {{ $order->status }}</span>
                                        @break

                                        @case($order->status == 'delivery')
                                            <span class="badge ms-2 bg-light-warning text-dark-warning">
                                                {{ $order->status }}</span>
                                        @break

                                        @case($order->status == 'transaction failed')
                                            <span class="badge ms-2 bg-light-danger text-dark-danger">
                                                {{ $order->status }}</span>
                                        @break

                                        @case($order->status == 'cancel')
                                            <span class="badge ms-2 bg-light-danger text-dark-danger">
                                                {{ $order->status }}</span>
                                        @break

                                        @case($order->status == 'unconfimred')
                                            <span class="badge ms-2 text-bg-dark"> {{ $order->status }}</span>
                                        @break

                                        @case($order->status == 'confirmed')
                                            <span class="text-primary"> {{ $order->status }}</span>
                                        @break
                                        @default
                                    @endswitch
                                </span>
                            </div>
                        </div>
                        <div class="mt-8">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-12">
                                    <div class="mb-6">
                                        <h6>Customer Details</h6>
                                        <p class="mb-1 lh-lg">{{ $order->receiver }}<br>
                                            {{ $order->email }}<br>
                                            {{ $order->phone }}</p>
                                        @if ($order->id_user)
                                        <a href="">View Profile</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="mb-6">
                                        <h6>Shipping Address</h6>
                                        <p class="mb-1 lh-lg">{{ $order->address }}

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="mb-6">
                                        <h6>Order Details</h6>
                                        <p class="mb-1 lh-lg">Order ID: <span
                                                class="text-dark">{{ $order->id_order }}</span><br>
                                            Order Date: <span class="text-dark">{{ date_format(date_create($order->updated_at), 'j/m/Y')}}</span><br>
                                            Shipping Fee: <span class="text-dark">
                                                ${{ number_format($order->shipping_fee, 2, '.', ' ') }}</span><br>
                                            Coupon: <span class="text-dark">
                                                @if ($order->code_coupon != null)
                                                    {{ $order->Coupon->title }}
                                                @else
                                                    No Coupon
                                                @endif
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mb-0 text-nowrap table-centered">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Products</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                        @endphp
                                        @foreach ($order->Cart as $item)
                                            @php
                                                $subtotal += $item->price * (1 - $item->sale / 100)*$item->amount;
                                                $prices = $item->price;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <a href="{{ route('productdetail', $item->id_product) }}">
                                                        <img src="{{ asset('resources/image/pet/' . $item->Product->Library[0]->image) }}" alt="{{ $item->Product->Library[0]->image }}" style="width: 60px;">
                                                        <span style="padding-left: 50px">{{ $item->Product->product_name }}</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="text-body">
                                                        ${{ number_format($prices, 2, '.', ' ') }}/unit
                                                    </span></td>
                                                <td>units: {{ $item->amount }}</td>
                                                <td>${{number_format($prices * $item->amount,2, '.', ' ') }}
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark ">
                                                Sub Total :
                                            </td>
                                            <td class="fw-medium text-dark ">
                                                <strong class="text-primary">${{ number_format($subtotal, 2, '.', ' ') }}</strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark ">
                                                Coupon
                                            </td>
                                            <td class="fw-medium text-dark  ">
                                                <!-- text -->
                                                <strong class="text-danger">
                                                    @if ($order->code_coupon != null)
                                                        @php
                                                            $subtotal = $order->Coupon->discount >= 10 ? $subtotal * (1 - $order->Coupon->discount / 100) : $subtotal - $order->Coupon->discount;
                                                        @endphp
                                                        -{{ $order->Coupon->discount >= 10 ? number_format($order->Coupon->discount, 2, '.', ' ') . '%' :"$". number_format($order->coupon->discount, 2, '.', ' ') }}
                                                    @else
                                                        ---
                                                    @endif
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td class="border-bottom-0 pb-0"></td>
                                            <td colspan="1" class="fw-medium text-dark ">
                                                Shipping Cost
                                            </td>
                                            <td class="fw-medium text-dark  ">
                                                <strong class="text-primary">${{ number_format($order->shipping_fee, 2, '.', ' ') }}</strong>
                                                @php
                                                    $subtotal += $order->shipping_fee;
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td colspan="1" class="fw-semi-bold text-dark ">
                                                Grand Total
                                            </td>
                                            <td class="fw-semi-bold text-dark ">
                                                <h5 class="text-info">
                                                    ${{ number_format($subtotal, 2, '.', ' ') }}
                                                </h5>
                                            </td>@section('admin_script')
                                            <script>
                                                $(document).ready(function(){
                                                    $('#order_status').change(function(){
                                                        $('#submitOrder').removeAttr('disabled');
                                                    })  
                                                })
                                            </script>
                                        @endsection
                    </div>
                    <div class="card-body p-6">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <h6>Payment Info</h6>
                                <span>{{ $order->method }}</span>
                                <h5 class="text-dark">{{$order->delivery_method}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
