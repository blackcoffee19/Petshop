@extends('welcome')
@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                            <h3 class="fs-5 mb-0">Account Order</h3>
                            <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3 " type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
                                <i class="bi bi-text-indent-left fs-3"></i>
                            </button>
                        </div>
                    </div>
                    @include('layout.nav-left')
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="py-6 p-md-6 p-lg-10">
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif
                            <h2 class="mb-6">Your Orders</h2>
                            <div class="table-responsive border-0">
                                <table class="table mb-0 table-centered ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>View Cart</th>
                                            <th>View Detail</th>
                                            <th>Date</th>
                                            <th>Promo</th>
                                            <th>Method</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="align-middle border-top-0 w-0">
                                                    <a data-bs-toggle="collapse" href=".collapseOrder{{ $order->id_order }}"
                                                        role="button" aria-expanded="false"
                                                        aria-controls="collapseOrder{{ $order->id_order }}">
                                                        <i class="bi bi-eye"></i> Cart
                                                    </a>
                                                </td>
                                                <td class="align-middle border-top-0 w-0">
                                                    <a data-bs-toggle="collapse"
                                                        href=".collapseDetail{{ $order->id_order }}" role="button"
                                                        aria-expanded="false"
                                                        aria-controls="collapseDetail{{ $order->id_order }}">
                                                        <i class="bi bi-eye"></i> Detail
                                                    </a>
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    {{ date_format(date_create($order->created_at), 'F j, Y') }}
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    {{ $order->Coupon ? ($order->Coupon->discount >= 10 ? $order->Coupon->code . ' : -' . $order->Coupon->discount . '%' : $order->Coupon->code . ' : - $' . number_format($order->Coupon->discount, 2, '.', ' ')) : '' }}
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    {{ $order->method }}
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    @switch($order->status)
                                                        @case('finished')
                                                            <span
                                                                class="badge bg-success text-capitalize">{{ $order->status }}</span>
                                                        @break

                                                        @case('confirmed')
                                                            <span
                                                                class="badge bg-warning text-capitalize">{{ $order->status }}</span>
                                                        @break

                                                        @case('delivery')
                                                            <span
                                                                class="badge bg-warning text-capitalize">{{ $order->status }}</span>
                                                        @break

                                                        @case('unconfirmed')
                                                            <span class="badge bg-dark text-capitalize">{{ $order->status }}</span>
                                                        @break

                                                        @case('cancel')
                                                            <span
                                                                class="badge bg-danger text-capitalize">{{ $order->status }}</span>
                                                        @break

                                                        @case('transaction failed')
                                                            <span
                                                                class="badge bg-secondary text-capitalize">{{ $order->status }}</span>
                                                        @break

                                                        @default
                                                    @endswitch
                                                </td>
                                                <td class="align-middle border-top-0">
                                                   ${{ number_format($order->total, 2, '.', ' ') }}
                                                </td>
                                                @if (Auth::user()->admin != '2')
                                                    <td class="align-middle border-top-0">
                                                        @if ($order->status == 'unconfirmed' || $order->status == 'confirmed')
                                                            <a href="" data-bs-toggle='modal' class='user_editorder btn btn-outline-primary me-3' data-bs-target='#editOrder' data-idorder='{{ $order->id_order }}' style="font-size: 1.2rem" >
                                                                <i class="bi bi-pencil-square"></i>
                                                            </a>
                                                            @if ($order->method == 'cod')
                                                            <a href="{{ route('cancelorder', $order->id_order) }}"
                                                                onclick="return confirm('You really want cancel this order?')"
                                                                style="font-size: 1.2rem" class="btn btn-outline-danger"><i
                                                                    class="bi bi-slash-circle text-danger"></i>
                                                            </a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                @else
                                                    <td  class="align-middle border-top-0">
                                                        @if ($order->status == 'unconfirmed' || $order->status == 'confirmed' || $order->status == "delivery")
                                                            @switch($order->status)
                                                                @case('confirmed')
                                                                    <button type="button" class="btn btn-danger check_order"
                                                                        data-bs-toggle="modal" data-bs-target="#viewModalOrder"
                                                                        data-order="{{ $order->id_order }}">
                                                                        Delivery
                                                                    </button>
                                                                @break

                                                                @case('unconfirmed')
                                                                    <button type="button" class="btn btn-primary check_order"
                                                                        data-bs-toggle="modal" data-bs-target="#viewModalOrder"
                                                                        data-order="{{ $order->id_order }}">
                                                                        Confirm
                                                                    </button>
                                                                    @break
                                                                @default        
                                                                    <button type="button" class="btn btn-success check_order" data-bs-toggle="modal" data-bs-target="#viewModalOrder" data-order="{{$order->id_order}}" >
                                                                        Finished
                                                                    </button>
                                                            @endswitch
                                                        @endif
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr class="collapse collapseDetail{{$order->id_order}}">
                                                <td class="align-middle border-top-0" colspan="1">{{$order->order_code}}</td>
                                                <td class="align-middle border-top-0" colspan="1">{{$order->receiver}}</td>
                                                <td  class=" border-top-0" colspan="2">{{$order->address}}</td>
                                                <td  class="align-middle border-top-0" colspan="1">{{$order->phone}}</td>
                                                <td  class="align-middle border-top-0" colspan="1">{{$order->email}}</td>
                                                <td  class="align-middle border-top-0" colspan="2">{{number_format($order->shipping_fee,2,'.',' ')}}đ</td>
                                            </tr>
                                            <tr class="collapse collapseOrder{{ $order->id_order }}">
                                                <td colspan="9">
                                                    <table class="table mb-0 text-nowrap table-centered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>&nbsp;</th>
                                                                <th>Price</th>
                                                                <th>Sale</th>
                                                                <th>Name</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @for ($i = 0; $i < count($order->Cart); $i++)
                                                            <tr>
                                                                <td>{{$i+1}}</td>
                                                                <td class="align-middle border-top-0 w-0">
                                                                    <a href="{{ route('productdetail',$order->Cart[$i]->Product->id_product)}}"> 
                                                                        @if (count($order->Cart[$i]->Product->Library)>0)
                                                                        <img src="{{ asset('resources/image/pet/'.$order->Cart[$i]->Product->Library[0]->image) }}" alt="Ecommerce" class="icon-shape icon-xl">
                                                                        @endif
                                                                    </a>
                                                                </td>
                                                                <td class="align-middle border-top-0" >
                                                                    ${{number_format($order->Cart[$i]->price,2,'.',' ')}}
                                                                </td>
                                                                <td class="align-middle border-top-0">
                                                                    @if ($order->Cart[$i]->sale >0)
                                                                    <span class="text-danger">{{$order->Cart[$i]->sale}}%</span>
                                                                    @endif
                                                                </td>
                                                                <td class="align-middle border-top-0" >
                                                                    <a href="#" class="fw-semi-bold text-inherit">
                                                                        <h6 class="mb-0">{{$order->Cart[$i]->Product->product_name}}</h6>
                                                                    </a>
                                                                </td>
                                                                <td>{{$order->Cart[$i]->amount}}
                                                                </td>
                                                            </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row pb-5">
                            <div class="col-auto mx-auto">
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection