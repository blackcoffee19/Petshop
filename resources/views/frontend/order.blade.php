@extends('welcome')
@section('content')
<div class="container-fluid position-relative pb-5" style="min-height:630px;margin-top:20px;">
    @if (Session::has('error'))
        <div class="alert alert-danger">{{Session::get('error')}}</div>
    @endif
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class=" position-absolute" style="bottom: 0; left:0">
        <defs>
            <linearGradient id="grad1" x1="0%" y1="0%" x2="0%" y2="100%">
              <stop offset="0%" style="stop-color:#a8e063;stop-opacity:1" />
              <stop offset="100%" style="stop-color:#428722;stop-opacity:1" />
            </linearGradient>
          </defs>
        <path style="fill:url(#grad1)" d="M0,192L30,170.7C60,149,120,107,180,106.7C240,107,300,149,360,160C420,171,480,149,540,144C600,139,660,149,720,160C780,171,840,181,900,154.7C960,128,1020,64,1080,37.3C1140,11,1200,21,1260,74.7C1320,128,1380,224,1410,272L1440,320L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="bottom: 20px; left:25px; opacity:0.5" class=" position-absolute" style="bottom: 0; left:0">
        <defs>
            <linearGradient id="grad1" x1="0%" y1="0%" x2="0%" y2="100%">
              <stop offset="0%" style="stop-color:#a8e063;stop-opacity:1" />
              <stop offset="100%" style="stop-color:#428722;stop-opacity:1" />
            </linearGradient>
          </defs>
        <path style="fill:url(#grad1)" d="M0,192L30,170.7C60,149,120,107,180,106.7C240,107,300,149,360,160C420,171,480,149,540,144C600,139,660,149,720,160C780,171,840,181,900,154.7C960,128,1020,64,1080,37.3C1140,11,1200,21,1260,74.7C1320,128,1380,224,1410,272L1440,320L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    </svg>

    <div class="row  position-relative">
        <div class="col-lg-5 col-md-6 mx-auto d-flex flex-column align-content-center">
            <ul class="nav nav-pills nav-fill gap-2 p-1 mb-5 small bg-success rounded-5 shadow-sm" id="pillNav2" role="tablist" >
              <li class="nav-item" role="presentation">
                <a class="nav-link active2 rounded-5 text-dark" id="btn-shipment" data-bs-toggle="tab" role="tab" aria-selected="true" >Shipment Details</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link rounded-5 text-white" id="btn-payment" data-bs-toggle="tab" role="tab" aria-selected="false">Payment</a>
              </li>
            </ul>
            <form action="{{route('order')}}" method="POST">
                @csrf
                <div class="position-relative pb-5" id="shipment-site" style="height: max-content;">
                    <div class="position-absolute h-100 w-100 shadow"  style="filter: blur(2px);z-index:0; background-color: #ffffff; "></div>
                    <div class="position-relative w-75 mx-auto" style="z-index: 2; " >
                            @if (Auth::check())
                            <input type="hidden" name="id_user" value="{{Auth::user()->id_user}}">
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label">Full name </label>
                                <input type="text" class="form-control" name="name" value="{{Auth::check()? Auth::user()->name:''}}">
                                <span class="text-danger"id="valiName"></span>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone number </label>
                                <input type="text" class="form-control" name="phone" value="{{Auth::check()? Auth::user()->phone_number:''}}">
                                <span class="text-danger" id="valiPhone"></span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email contact </label>
                                <input type="text" class="form-control" name="email" value="{{Auth::check()? Auth::user()->email:''}}">
                                <span class="text-danger" id="valiEmail"></span>
                            </div>
                            <label for="province" class="form-label">Province</label>
                            <select name="province" id="province" class="form-select" >
                            </select>
                            <label for="district" class="form-label mt-3">District</label>
                            <select name="district" id="district" class="form-select" disabled>
                            </select>
                            <label for="ward" class="form-label mt-3">Ward</label>
                            <select name="ward" id="ward" class="form-select" disabled>
                            </select>
                            <label for="address" class="form-label mt-3">Address</label>
                            <input type="text" name="address" id="address" class="form-control" disabled>
                            <div class="mt-4 d-flex flex-row justify-content-around align-items-center w-50 mx-auto">
                                <input type="reset" value="Clear" class="btn btn-outline-secondary">
                                <input type="button" disabled value="Next" id="next" class="btn btn-success text-uppercase">
                            </div>
                    </div>
                </div>
                <div class="position-relative pb-5 " id="payment-site" style="height: max-content;">
                    <label for="payment" class="form-label">Select method</label>
                    <select name="method" id="method" class="form-select mb-5">
                        <option value="cod" selected>Cash on Delivery</option>
                        <option value="credit">Credit/Debt cart</option>
                    </select>
                    <div class="collapse mb-5" id="pay">
                        <div class="card card-body">
                            <h4>Vui lòng chuyển tiền vào tài khoản sau đây và gửi ảnh chụp hóa đơn thanh toán</h4>
                            <table class="table mb-3">
                                <tr>
                                    <td>Ngân hàng</td>
                                    <td>Sacombank</td>
                                </tr>
                                <tr>
                                    <td>Số tài khoản: </td>
                                    <td>080881923230</td>
                                </tr>
                                <tr>
                                    <td>Chủ tài khoản</td>
                                    <td>Đỗ Ngọc Cát Tường</td>
                                </tr>
                            </table>
                            <div class="mb-3">
                                <label for="file_img" class="form-label"></label>
                                <input type="file" class="form-control " name="file_img">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button id="back" class="btn btn-success text-uppercase col-3 mx-auto">Back</button>
                        <input type="submit" class="btn btn-success text-uppercase col-5 mx-auto" name="submit" disabled value="Submit">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4 mx-auto" >
            <h3>Your Cart</h3>
            <hr style="width: 220px;">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="h5 text-center">No</th>
                        <th class="h5 text-center">Item</th>
                        <th class="h5 text-center">Quantity</th>
                        <th class="h5 text-center">Per price</th>
                    </tr>
                </thead>
                <tbody>
                    <span class="d-none">{{$sum = 0}}</span>
                    @if (Auth::check())
                        @for ($i = 0; $i < count($carts); $i++)
                            <span class="d-none">{{$sum += $carts[$i]->Product->per_price * $carts[$i]->qty}}</span>
                            <tr>
                                <td class="text-center col-1" style="font-size: 1.2rem">{{$i+1}}</td>
                                <td class="text-center col-6" style="font-size: 1.2rem">
                                    <a href="{{route('productdetail',[$carts[$i]->id_product])}}" class="text-decoration-none">
                                        {{$carts[$i]->Product->product_name}}</td>
                                    </a>
                                <td class="text-center col-2" style="font-size: 1.2rem">{{$carts[$i]->qty}}</td>
                                <td class="text-center col-3" style="font-size: 1.2rem">${{$carts[$i]->Product->per_price}}</td>

                            </tr>
                        @endfor
                    @else
                            @for( $i = 0; $i < count($carts); $i++)
                            <span class="d-none">{{$sum += $carts[$i]['per_price'] * $carts[$i]['qty']}}</span>
                            <tr>
                                <td class="text-center col-1" style="font-size: 1.2rem">{{$i+1}}</td>
                                <td class="text-center col-6" style="font-size: 1.2rem">
                                    <a href="{{route('productdetail',[$carts[$i]['id_product']])}}" class="text-decoration-none">
                                        {{$carts[$i]['name']}}</td>
                                    </a>
                                <td class="text-center col-2" style="font-size: 1.2rem">{{$carts[$i]['qty']}}</td>
                                <td class="text-center col-3" style="font-size: 1.2rem">${{$carts[$i]['per_price']}}</td>
                            </tr>
                            @endfor
                    @endif
                </tbody>
                <tfoot>
                    <tr style="height:60px">
                        <td colspan="2" class="text-center h4">
                            Total
                        </td>
                        <td colspan="2" class="text-center h4 text-danger">
                            ${{$sum}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            const host = "https://vapi.vnappmob.com";
            const getProvince = host+"/api/province/";
            $.getJSON(getProvince,function(data){
                $('#province').append("<option selected>--Choose 1 province--</option>");
                console.log(data);
                $.each(data.results,function(key,value){
                    $('#province').append(`<option value='${value.province_id}'>${value.province_name}</option>`);
                });
            });
            $('#province').change(function async(e){
                e.preventDefault();
                let getDistric = host+"/api/province/district/"+$(this).val();
                $('#district').removeAttr('disabled');
                let str = "<option selected>--Choose 1 district--</option>";
                $.getJSON(getDistric,function(data){
                    $.each(data.results,function(key,value){
                        str+=`<option value=${value.district_id}>${value.district_name}</option>`;
                    })
                    $('#district').html(str);
                });
            });
            $('#district').change(function(e){
                e.preventDefault();
                $('#ward').removeAttr('disabled');
                $('#province option:selected').val($('#province option:selected').text());
                let str = '<option selected>--Choose 1 ward--</option>';
                let getWard = host+"/api/province/ward/"+$(this).val();
                $.getJSON(getWard,function(data){
                    $.each(data.results,function(key,value){
                        str+=`<option value=${value.ward_id}>${value.ward_name}</option>`;
                    });
                    $('#ward').html(str);
                });
            });
            $('#ward').change(function(e){
                e.preventDefault();
                $('#district option:selected').val($('#district option:selected').text());
                if($(this).val().length>0){
                    $('input[name=address]').removeAttr('disabled');
                }else{
                    $('input[name=address]').attr('disabled','disabled');
                }
                $('#ward option:selected').val($('#ward option:selected').text());
            })
            
            $('#payment-site').hide();
            $('#next, #back').click(function(e){
                e.preventDefault();
                if($('#method').val()=="credit"){
                    $('#pay').addClass("show");
                    $("input[name='submit']").attr('disabled','disabled');     
                }else{
                    $("input[name='submit']").removeAttr('disabled');     
                };
                $('#shipment-site').toggle();
                $('#payment-site').toggle();
                if($('#btn-shipment').attr('aria-selected')){
                    $('#btn-shipment').attr('aria-selected',false);
                    $('#btn-payment').attr('aria-selected',true);
                    $('#btn-shipment').toggleClass('active2').toggleClass('text-dark').toggleClass('text-white');
                    $('#btn-payment').toggleClass('active2').toggleClass('text-white').toggleClass('text-dark');
                }  else{
                    $('#btn-shipment').attr('aria-selected',true);
                    $('#btn-payment').attr('aria-selected',false);
                    $('#btn-shipment').toggleClass('active2').toggleClass('text-white').toggleClass('text-dark');
                    $('#btn-payment').toggleClass('active2').toggleClass('text-dark').toggleClass('text-white');
                }
            });
            $('#method').change(function(e){
                e.preventDefault();
                if($(this).val() == "credit"){
                    $('#pay').addClass("show");
                    $("input[name='submit']").attr('disabled','disabled');     
                }else{
                    $('#pay').removeClass("show");
                    $("input[name='submit']").removeAttr('disabled');     
                }
            });
            let valiPhone = /^[0-9]{9,11}$/;
            let valiEmail = /^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$/;
            $('input[name=phone]').focusout(function(e){
                e.preventDefault();
                if(!valiPhone.test($(this).val())){
                    $('#valiPhone').text("Invail Phone. Try again");
                    $('#next').attr('disabled','disabled');      
                    $(this).addClass('is-invalid');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#valiPhone').text('');
                }
            });
            $("input[name='name']").focusout(function(e){
                e.preventDefault();
                if($(this).val().trim().length==0){
                    $('#valiName').text("Please add name for order");
                    $('#next').attr('disabled','disabled');      
                    $(this).addClass('is-invalid');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#valiName').text('');
                }
            });
            $('input[name=email]').focusout(function(e){
                e.preventDefault();
                if(!valiEmail.test($(this).val())){
                    $('#valiEmail').text("Invaild Email. Try again");
                    $('#next').attr('disabled','disabled');
                    $(this).addClass('is-invalid');      
                }else{
                    $(this).removeClass('is-invalid');
                    $('#valiEmail').text('');
                };
            });
            $('input[name=name],input[name=phone],input[name=email],input[name=address]').on('blur', function(e) {
                e.preventDefault();
                if($('input[name=name]').val().trim().length > 0 && $('input[name=email]').val().trim().length >0 && $('input[name=phone]').val().trim().length>0 && $('input[name=address]').val().trim().length>0){
                    $('#next').removeAttr('disabled');
                }else{
                    $('#next').attr('disabled','disabled');
                };
            });
            $('input[name=file_img]').change(function(e){
                e.preventDefault();
                if($(this).val()){
                    $("input[name='submit']").removeAttr('disabled');
                }else{
                    $("input[name='submit']").attr('disabled','disabled')
                }
            });
        })
    </script>
@endsection