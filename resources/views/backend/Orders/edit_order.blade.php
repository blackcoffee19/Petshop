@extends('admin')
@section('content')
<div class="col-sm-7 col-md-8 mx-auto mt-4">
    <div class="row">
        <div class="ms-4 bg-light p-4 rounded-2 col-10" >
            <p class="h2 text-capitalize">Edit <span class="text-secondary ms-3">Orders</span></p>
            <hr>
            @if (Session::has("error"))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            <form action="{{route('editorder',[$order->id_order])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="order_code" class="col-form-label col-3">Order Code</label>
                    <div class="col-6">
                        <input type="text" name="order_code" value="{{$order->order_code}}" class="form-control-plaintext" disabled>
                    </div>
                    <button type="button" class="col-2 btn btn-outline-dark" data-bs-toggle="collapse" data-bs-target="#showCart" aria-expanded="false" aria-controls="showCart">Show</button>
                    <div class="mt-2 collapse" id="showCart">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Breed</th>
                                    <th>Qty</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <span style="display: none">{{$sum=0}}</span>
                                @foreach ($order->Cart as $cart)
                                <tr>
                                    <span style="display: none">{{$sum += $cart->Product->per_price * $cart->qty}}</span>
                                    <td>{{$cart->Product->id_product}}</td>
                                    <td>{{$cart->Product->product_name}}</td>
                                    <td class="text-capitalize">{{$cart->Product->Breed->breed_name}}</td>
                                    <td>{{$cart->qty}}</td>
                                    <td>
                                        <img src="{{asset('/resources/image/pet/'.$cart->Product->image)}}" alt="{{$cart->Product->Breed->breed_name}}" style="width: 150px; object-fit: contain;">
                                    </td>
                                </tr>   
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-danger text-center" style="font-size: 1.2rem">Total</td>
                                    <td colspan="2"  class="font-bold" style="font-size: 1.2rem">{{$sum}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-form-label col-4" for="user_order">User</label>
                    <div class="col-8">
                        <input class="form-control-plaintext" type="text" name="user_order" id="user_order" value="{{$order->id_user!=null? $order->User->name:""}}" disabled>
                    </div>
                </div>
                <span class="text-black-50 mb-3">* You can't change any information of paid order.</span>
                <div class="mb-3 ">
                    <label class="form-label" for="receiver_name">Receiver</label>
                    <input class="form-control " type="text" name="receiver_name" id="receiver_name" value="{{$order->cus_name}}"disabled> 
                </div>
                <div class="mb-3">
                    <label class="form-label" for="order_address">Address</label>
                    <input class="form-control " type="text" name="order_address" id="order_address" value="{{$order->cus_address}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="order_phone">Phone receiver</label>
                    <input class="form-control " type="text" name="order_phone" id="order_phone" value="{{$order->cus_phone}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="order_email">Email contact</label>
                    <input class="form-control" type="text" name="order_email" id="order_email" value="{{$order->cus_email}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="order_cp">COUPON</label>
                    <input class="form-control" type="text" name="order_cp" id="order_cp" value="{{$order->code_coupon?$order->code_coupon:'NO COUPON'}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="order_method">Order Method</label>
                    <select name="order_method" id="order_method" class="form-select" disabled>
                        <option value="cod" {{$order->method == "cod"? "selected":''}}>Cash on Delivery</option>
                        <option value="credit" {{$order->method == "credit"? "selected":''}}>Online payment</option>
                    </select>
                </div>
                @if ($order->method == "credit" )
                    <div class="mb-3">
                        <img src="{{asset('resources/image/payment/'.$order->image)}}" alt="{{$order->order_code}}">
                    </div>
                @endif
                <div class="mb-3">
                    <label for="order_status">Status of order</label>
                    <select name="order_status" id="order_status" class="form-select" {{$order->status  == 'cancel' || $order->status  == 'transaction failed' || $order->status  == 'finished'? 'disabled':'' }}>
                        @if ($order->status == 'unconfimred')
                        <option value="unconfimred" {{$order->status =="unconfimred"?"selected":''}}>Unconfimred</option>
                        <option value="confirmed" {{$order->status =="confirmed"?"selected":''}}>Confirmed</option>
                        <option value="delivery" {{$order->status =="delivery"?"selected":''}}>Delivery</option>
                        @endif
                        @if ($order->status == 'confirmed')
                        <option value="confirmed" {{$order->status =="confirmed"?"selected":''}}>Confirmed</option>
                        <option value="delivery" {{$order->status =="delivery"?"selected":''}}>Delivery</option>
                        @endif
                        @if ($order->status == 'delivery')
                        <option value="delivery" {{$order->status =="delivery"?"selected":''}}>Delivery</option>
                        <option value="finished" {{$order->status =="finished"?"selected":''}}>Finished</option>
                        <option value="transaction failed" {{$order->status =="transaction failed"?"selected":''}}>Transaction Failed</option>
                        @endif
                        @if ($order->status  == 'cancel' || $order->status  == 'transaction failed')
                        <option value="cancel" {{$order->status =="cancel"?"selected":''}}>Cancel</option>
                        <option value="transaction failed" {{$order->status =="transaction failed"?"selected":''}}>Transaction Failed</option>
                        @endif
                        @if ($order->status == 'finished')
                        <option value="finished" {{$order->status =="finished"?"selected":''}}>Finished</option>
                            
                        @endif
                    </select>
                </div>
                <div class="mt-3">
                    <a href="{{route('listorder')}}" class="me-3"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Back</a>
                    <input type="submit" id="submitOrder" value="Change Order" class="btn btn-primary px-3" disabled>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('admin_script')
    <script>
        $(document).ready(function(){
            $('#order_status').change(function(){
                $('#submitOrder').removeAttr('disabled');
            })  
        })
    </script>
@endsection