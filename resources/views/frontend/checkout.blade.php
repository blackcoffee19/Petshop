@extends('welcome')
@section('content')
    <main class="container-fluid">
        <section class="mb-lg-14 mb-8 mt-8">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card py-1 border-0 mb-8">
                            <div>
                                <h1 class="fw-bold">Shop Cart</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12">

                        <div class="py-3">
                            <ul class="list-group list-group-flush">
                                @php
                                    $sum = 0;
                                @endphp
                                @if (isset($carts) && count($carts) > 0)
                                    @if (Auth::check())
                                        @foreach ($carts as $cart)
                                            <li class="list-group-item py-3 py-lg-0 px-0 border-top">
                                                <div class="row align-items-center">
                                                    <div class="col-3 col-md-2">
                                                        @if (count($cart->Product->Library)>0)
                                                            <img src="{{ asset('resource/image/pet/'.$cart->Product->Library[0]->image) }}" alt="Ecommerce" class="img-fluid">
                                                        @endif
                                                    </div>
                                                    <div class="col-3 col-md-2">
                                                        <a href="{{ route('productsdetail', $cart->id_product) }}"
                                                            class="text-inherit">
                                                            <h6 class="mb-0">{{ $cart->Product->name }}</h6>
                                                        </a>
                                                        <div class="mt-2 small lh-1">
                                                            <a href="{{ route('removeId', $cart->id_cart) }}" class="text-decoration-none text-inherit">
                                                                <span class="me-1 align-text-bottom">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-trash-2 text-success">
                                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                                        <path
                                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                        </path>
                                                                        <line x1="10" y1="11" x2="10"
                                                                            y2="17"></line>
                                                                        <line x1="14" y1="11" x2="14"
                                                                            y2="17"></line>
                                                                    </svg>
                                                                </span>
                                                                <span class="text-muted">Remove</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-6 mx-auto ">
                                                        <form method='POST' action="{{ route('cartadd', $cart->id_cart) }}" class="row">
                                                            @csrf
                                                            <input type="hidden" name="max_quan" value="{{ $cart->Product->quantity }}">
                                                            <div class=" col-6">
                                                                <div class="input-group input-spinner ">
                                                                    <button type="button" class="btn btn-outline-secondary btn_minus" style="border-radius: 10px 0 0 10px;" data-field="quantity">
                                                                        <i class="bi bi-dash-lg"></i>
                                                                    </button>
                                                                    <input type="text" name="quan"
                                                                        class="border border-secondary text-center pt-1 fs-4 text-secondary"
                                                                        style="width: 50px;" value="{{ $cart->amount }}" />
                                                                    <button type="button" class="btn btn-outline-secondary btn_plus" style="border-radius: 0 10px 10px 0;">
                                                                        <i class="bi bi-plus-lg"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 mx-auto">
                                                                <button type="submit" class="btn btn-primary d-none">
                                                                    <i class="feather-icon icon-shopping-bag "></i>Save
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                                        <span  class="fw-bold">
                                                            {{ number_format($cart->Product->sale > 0 ? $cart->Product->per_price * (1 - $cart->Product->sale / 100) : $cart->Product->price, 2, '.', ' ') }}
                                                        </span>
                                                    </div>
                                                </div>
                                                @php
                                                    $price = $cart->Product->sale > 0 ? $cart->Product->per_price * (1 - $cart->Product->sale / 100) : $cart->Product->price;
                                                    $sum += ($price * $cart->amount);
                                                @endphp
                                            </li>
                                        @endforeach
                                    @else
                                        @foreach ($carts as $key => $cart)
                                            <li class="list-group-item py-3 py-lg-0 px-0 border-top">
                                                <div class="row align-items-center">
                                                    <div class="col-3 col-md-2">
                                                        @if (isset($cart->Product))
                                                            <a href="{{ route('productdetail', $cart->Product->id_product) }}">
                                                                <img src="{{ asset('/resources/image/pet/' . $cart['image']) }}" alt="Ecommerce" class="img-fluid">
                                                            </a>
                                                        @else
                                                            <a href="{{ route('productdetail', $cart['id_product']) }}">
                                                                <img src="{{ asset('/resources/image/pet/' . $cart['image']) }}" alt="Ecommerce" class="img-fluid">
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <div class="col-2 col-md-2">
                                                        @if (isset($cart->Product))
                                                            <a href="{{ route('productdetail', $cart->Product->id_product) }}" class="text-inherit">
                                                                <h6 class="mb-0">{{ $cart['name'] }}</h6>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('productdetail', $cart['id_product']) }}"
                                                                class="text-inherit">
                                                                <h6 class="mb-0">{{ $cart['name'] }}</h6>
                                                            </a>
                                                        @endif
                                                        <div class="mt-2 small lh-1">
                                                            <a href="{{ route('removeId', $key) }}" class="text-decoration-none text-inherit">
                                                                <span class="me-1 align-text-bottom">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-trash-2 text-success">
                                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                                        <path
                                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                        </path>
                                                                        <line x1="10" y1="11"
                                                                            x2="10" y2="17"></line>
                                                                        <line x1="14" y1="11"
                                                                            x2="14" y2="17"></line>
                                                                    </svg>
                                                                </span>
                                                                <span class="text-muted">Remove</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-6 mx-auto">
                                                        <form method='POST' action="{{ route('cartadd', $key) }}" class="row">
                                                            @csrf
                                                            <input type="hidden" name="max_quan" value="{{ $cart['max'] }}">
                                                            <div class="col-5 col-md-6 col-lg-5 mx-auto">
                                                                <div class="input-group input-spinner ">
                                                                    <button type="button" class="btn btn-outline-secondary btn_minus" style="border-radius: 10px 0 0 10px;" data-field="quantity">
                                                                        <i class="bi bi-dash-lg"></i>
                                                                    </button>
                                                                    <input type="text" name="quan" class="border border-secondary text-center pt-1 fs-4 text-secondary" style="width: 50px;" value="{{ $cart['amount'] }}" />
                                                                    <button type="button" class="btn btn-outline-secondary btn_plus" style="border-radius: 0 10px 10px 0;">
                                                                        <i class="bi bi-plus-lg"></i>
                                                                    </button>
                                                                </div>
                                                                @if ($errors->has('quan'))
                                                                    <span class="text-danger">{{ $errors->first('cart_quant') }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-1 mx-auto">
                                                                <button type="submit" class="btn btn-primary d-none">
                                                                    <i class="feather-icon icon-shopping-bag "></i>Save
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- price -->
                                                    <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                                        <span
                                                            class="fw-bold">${{ number_format($cart['sale'] > 0 ? $cart['per_price'] * (1 - $cart['sale'] / 100) : $cart['per_price'], 2, '.', '') }}
                                                            </span>
                                                    </div>
                                                </div>
                                            </li>
                                            @php
                                                $price = $cart['sale'] > 0 ? $cart['per_price'] * (1 - $cart['sale'] / 100) : $cart['per_price'];
                                                $sum += ($price * $cart['amount']);
                                            @endphp
                                        @endforeach
                                    @endif
                                @else
                                    <li class="list-group-item py-3 py-lg-0 px-0 border-top">
                                        <div class="row ">
                                            <h4 class="text-muted col-12 mb-5">There are no Item in Cart</h4>
                                            <a href="{{ route('home') }}" class="btn btn-dark col-4 mx-auto">Back to
                                                Homepage</a>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                            <!-- btn -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
                                <a href="{{ route('order') }}" class="btn btn-dark">Buy Now</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-12">
                        <hr class="d-lg-none">
                        <div class="mb-5 card mt-6">
                            <div class="card-body p-6">
                                <h2 class="h5 mb-4">Summary</h2>
                                <div class="card mb-2">
                                    <ul class="list-group list-group-flush" id="summary">
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div>Item Subtotal</div>
                                            </div>
                                            <span id="item_subtotal"
                                                data-subtotal="{{ $sum }}">${{ number_format($sum, 2, '.', '') }}
                                                </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div>Service Fee <i class="bi bi-exclamation-circle text-muted" data-bs-toggle="tooltip"
                                                    title="Shipping fee depends on the shipping address"></i></div>
                                            </div>
                                            <span>$2</span>
                                        </li>
                                        @if (Auth::check())
                                        <li id="added_coupon"
                                            class="list-group-item d-flex justify-content-between align-items-start {{ isset($coupon) ? '' : 'd-none' }}">
                                            <div class="me-2">
                                                <div>Coupon</div>
                                            </div>
                                            <div id="coupon_title">{{ isset($coupon) ? $coupon->title : '' }}</div>
                                            <div class="ms-auto text-danger">
                                                <span
                                                    id="discount">{{ !isset($coupon) ? ($coupon->freeship ? '- ' . number_format($coupon->discount, 0, '', '') . ' đ' : '- ' . $coupon->discount . '%') : '' }}</span>
                                            </div>
                                        </li>   
                                        @endif
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div class="fw-bold">Total</div>
                                            </div>
                                            @php
                                                $coupon = isset($coupon)? $coupon: 0;
                                                if($coupon >=10){
                                                    $total =  $sum*(1-$coupon/100) + 2;
                                                }else{
                                                    $total =  $sum - $coupon+2;
                                                }
                                            @endphp
                                            <span class="fw-bold" id="total_items"
                                                data-total="{{ $sum}}">${{number_format($total,2,'.','')}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-grid mb-1 mt-4">
                                    <a href="{{ route('order') }}"
                                        class="btn btn-primary btn-lg d-flex justify-content-between align-items-center">Go
                                        to Checkout <span class="fw-bold"
                                            id="total_cart">${{$total}}</span></a>
                                </div>
                                <p><small>By placing your order, you agree to be bound by the Freshcart <a
                                            href="#!">Terms of Service</a>
                                        and <a href="#!">Privacy Policy.</a> </small>
                                </p>
                                <div class="mt-8">
                                    <h2 class="h5 mb-3">Add Promo or Gift Card</h2>
                                    <div class="mb-1">
                                        <input type="text" class="form-control" id="giftcard"
                                            placeholder="{{ Auth::check() ? 'Promo or Gift Card' : 'Sign In to Add Promo' }}"
                                            value="{{ $coupon != null && Auth::check() ? $coupon->code : '' }}" {{ Auth::check() ? '' : 'disabled' }}>
                                    </div>
                                    <div class="d-grid mt-2">
                                        <button type="button" id="checkCoupon" class="btn btn-outline-dark mb-1"
                                            {{ Auth::check() ? '' : 'disabled' }}>Redeem</button>
                                    </div>
                                    <div class='d-none text-danger' id="wrong_code"></div>
                                    <p class="text-muted mb-0"> <small>Terms &amp; Conditions apply</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section ('script')
<script>
    $(document).ready(function() {
        $('#checkCoupon').click(function() {
            if ($('#giftcard').val().length > 0) {
                $.get(window.location.origin + "/index.php/ajax/add-coupon/" + $('#giftcard').val(),function(data) {
                    let total = parseInt($('#total_items').data('total'));
                    let subtotal = parseInt($('#item_subtotal').data('subtotal'));
                    if (data) {
                        let dataJson = jQuery.parseJSON(data);
                        if (!dataJson['error']) {
                            $('#added_coupon').removeClass('d-none');
                            $('#wrong_code').addClass('d-none');
                            $('#giftcard').removeClass('is-invalid')
                            $('#giftcard').addClass('is-valid');
                            $('#coupon_title').html(dataJson['title']);
                            if (dataJson['code'].includes('FREESHIP')) {
                                $('#discount').html('- $' + dataJson['discount']);
                                total -= parseFloat(dataJson['discount']);
                            } else {
                                $('#discount').html('- ' + dataJson['discount'] + '%');
                                total *= (1 - parseFloat(dataJson['discount']) / 100);
                            };
                            total += 2;
                            $('#total_items').html("$"+Math.floor(total));
                            $('#total_cart').html("$"+Math.floor(total));
                        } else {
                            total += 2;
                            $('#total_items').html("$"+Math.floor(total));
                            $('#total_cart').html("$"+Math.floor(total));
                            $('#added_coupon').addClass('d-none');
                            $('#giftcard').removeClass('is-valid');
                            $('#giftcard').addClass('is-invalid');
                            $('#wrong_code').removeClass('d-none').html(dataJson['error']);
                        }
                    } else {
                        total += 2;
                        $('#total_items').html("$"+Math.floor(total));
                        $('#total_cart').html("$"+Math.floor(total));
                        $('#added_coupon').addClass('d-none');
                        $('#giftcard').removeClass('is-valid');
                        $('#giftcard').addClass('is-invalid');
                        $('#wrong_code').removeClass('d-none').html("This code is not exited");
                    }

                })
            }
        })
    })
</script>
@endsection