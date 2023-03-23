@extends('welcome')
@section('content')
<main class="container-fluid mb-5" style="min-height: 600px;">
    <div class="row h-100" >
        <div class="col-md-3 col-sm-3 col-lg-3 d-flex row shadow h-100 px-0 text-center">
            <div class="col-8 mx-auto mt-2">
                <img src="../resources/image/user/{{Auth::user()->image ?Auth::user()->image : 'no_image.jpg'}}" class=" mb-3 w-100" height="150" style="object-fit: contain" alt="">
                <p class="h4">{{Auth::user()->name}}</p>
            </div>
            <ul class="list-unstyled w-100 text-center px-0" id="list-option-profie">
                <li class="py-4 active-profie"><a class="fs-5 text-decoration-none" data-bs-site="profie" type="button">Edit Profie</a></li>
                <li class="py-4 "><a class="fs-5 text-decoration-none" data-bs-site="order" type="button">Your orders</a></li>
                <li class="py-4 "><a class="fs-5 text-decoration-none" data-bs-site="favourite" type="button">Favourite</a></li>
                <li class="py-4 "><a class="fs-5 text-decoration-none" data-bs-site="comment" type="button">Comment</a></li>
                <li class="py-4 "><a class="fs-5 text-decoration-none" data-bs-site="setting" type="button">Setting</a></li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-9 col-lg-9 row">
            <div class="collapse show col-lg-7 col-md-12 mx-auto" id="editprofie">
                @if (Session::has('error'))
                    <div class="alert alert-danger mt-3 text-center">{{Session::get('error')}}</div>
                @endif
                @if (Session::has("message"))
                    <div class="alert alert-success mt-3 text-center">{{Session::get("message")}}</div>
                @endif
                <form  action="{{route('changeuser')}}" method="POST" class="w-75 mx-auto row" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_user"value={{Auth::user()->id_user}}>
                    <img src="{{asset('resources/image/user/'.Auth::user()->image)}}" class="mb-3 col-3 mx-auto img-fluid" alt="">
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="changeImg" id="changeImg">
                        <label for="changeImg">Change user image</label>
                    </div>
                    <input type="file" class="form-control mb-4" name="profie_image" id="profie_image" disabled>
                    <hr>
                    <label class="form-label"  for="profie_name">Full Name: </label>
                    <input  type="text" class="form-control mb-3" name="profie_name" id="profie_name" value="{{Auth::user()->name}}">
                    @if ($errors->has('profie_name'))
                        <div class="text-danger mb-3">{{$errors->first('profie_name')}}</div>
                    @endif
                    <div class="col-6 mb-3"> 
                        <label for="profie_gender" class="form-label">Gender </label>
                        <select name="profie_gender" id="profie_gender" class="form-select">
                            <option value="1"{{Auth::user()->gender == 1? "selected": ""}}>Male</option>
                            <option value="2"{{Auth::user()->gender == 2? "selected": ""}}>Female</option>
                            <option value="3"{{Auth::user()->gender == 3? "selected": ""}}>Other</option>
                            <option value=""{{Auth::user()->gender == null? "selected": ""}}>Unknown</option>
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="dateOfBirth" class="form-label">Day of Birth</label>
                        <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control" min="1920-12-31" max="2010-12-31" value="{{Auth::user()->dob}}">
                    </div>
                    <label class="form-label" for="profie_address">Address: </label>
                    <input type="text" class="form-control mb-3" name="profie_address" id="profie_address" value="{{Auth::user()->address}}">
                    <div class="text-danger mb-3" id="valiPhone">{{$errors->first('profie_address')}}</div>
                    <label class="form-label" for="profie_phone">Phone Number: </label>
                    <input type="text" class="form-control mb-3" name="profie_phone" id="profie_phone" value="{{Auth::user()->phone_number}}">
                    <span class="text-danger mb-3" id="invalidPhone"></span>
                    <label class="form-label" for="profie_email">Email: </label>
                    <input type="text" class="form-control mb-3" name="profie_email" id="profie_email" value="{{Auth::user()->email}}">
                    <span class="text-danger mb-3" id="invalidEmail"></span>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="changePass" id="changePass" class="form-check-input">
                        <label for="changePass" class="form-check-label">Change password</label>
                    </div>
                    <label class="form-label" for="new_password1">Enter New Password: </label>
                    <input type="password" class="form-control mb-3" name="new_password1" id="new_password1" disabled>
                    <span class="text-danger mb-3" id="invalidPass"></span>
                    <label class="form-label" for="new_password2">Re enter password: </label>
                    <input type="password" class="form-control mb-3" name="new_password2" id="new_password2" disabled>
                    @if ($errors->has('new_password2'))
                        <div class="text-danger mb-3">{{$errors->first('new_password2')}}</div>
                    @endif
                    <input type="submit" value="Change" id="profie_change" class="btn btn-warning col-3 mx-auto" disabled>
                </form>
            </div>
            <div class="collapse col-12" id="orders">
                <h3 class="ms-4 mt-4">Your Orders</h3>
                <hr class="ms-4 mb-3">
                <div class="ms-4">
                    <table class="table table-responsive table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <button class="btn"><i class="fa-solid fa-arrow-down text-primary"></i> Date</button>
                                </th>
                                <th>
                                    Your order
                                </th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->Order->sortByDesc('created_at') as $order)
                            <tr>
                                <td>{{date('d/m/Y', strtotime($order->created_at))}}</td>
                                <td>
                                    <table class="table">
                                        @foreach ($order->Cart as $cart)
                                        <tr>
                                            <td style="width: 30%">
                                                <img src="{{asset('resources/image/pet/'.$cart->Product->image)}}" alt="" class="border rounded me-4" height="100" style="max-width: 100;">
                                            </td>
                                            <td style="width: 60%">{{$cart->Product->product_name}}</td>
                                            <td style="width: 10%">{{$cart->qty}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>{{$order->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="collapse" id="favourite">
                <h3 class="ms-4 mt-4">Your Favourites</h3>
                <hr class="ms-4 mb-3">
                <div class="ms-4">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>
                                    Your favourite
                                </th>
                                <th>
                                    View
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="./alaska.png" alt="" class="border rounded me-4" height="100" style="max-width: 100;">
                                    Dog name
                                </td>
                                <td>
                                    <a href="" class="text-decoration-none">View more</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="collapse col-lg-8 mx-auto col-md-12" id="comment">
                <h3 class="ms-4 mt-4">Your Comments</h3>
                <hr class="ms-4 mb-3">
                <div class="ms-4">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>
                                    Items
                                </th>
                                <th>
                                    Comment
                                </th>
                                <th>
                                    View
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->Comment as $cmt)
                            <tr>
                                <td style="width: 40%">
                                    <img src="{{asset('resources/image/pet/'.$cmt->Product->image)}}" alt="" class="border rounded me-4" style="height: 100px;width: 100px; object-fit: contain">
                                    {{$cmt->Product->product_name}}
                                </td>
                                <td style="width: 40%">
                                    <p>{{$cmt->context}}</p>
                                </td>
                                <td style="width: 20%">
                                    <a href="{{route('productdetail',$cmt->id_product)}}" class="text-decoration-none">View more</a>
                                </td>
                            </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="collapse" id="setting">
                <h3>Setting</h3>

            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#list-option-profie li').on('click',function(e){
                if(!$(this).hasClass('active-profie')){
                    $(this).siblings().removeClass('active-profie');
                    $(this).addClass('active-profie');
                };
                // $('.collapse').removeClass('show');
                switch($(this).children().data('bsSite')){
                    case "profie":
                        if(!$('#editprofie').hasClass('show')){
                            $('#editprofie').addClass('show');
                            $('#editprofie').siblings().removeClass('show');
                        }
                        break;
                    case "order":
                        if(!$('#orders').hasClass('show')){
                            $('#orders').addClass('show');
                            $('#orders').siblings().removeClass('show');
                        }
                        break;
                    case "favourite":
                        if(!$('#favourite').hasClass('show')){
                            $('#favourite').addClass('show');
                            $('#favourite').siblings().removeClass('show');
                        }
                        break;
                    case "comment":
                        if(!$('#comment').hasClass('show')){
                            $('#comment').addClass('show');
                            $('#comment').siblings().removeClass('show');
                        }
                        break;
                    case "setting":
                        if(!$('#setting').hasClass('show')){
                            $('#setting').addClass('show');
                            $('#setting').siblings().removeClass('show');
                        }
                        break;
                };
            });
            
            if($('input[name=changeImg]').is(':checked')){
                $('input[name=profie_image]').removeAttr('disabled');
            }else{
                $('input[name=profie_image]').attr('disabled','disabled');
            }
            $('input[name=changeImg]').click(function(){
                if($('input[name=changeImg]').is(':checked')){
                    $('input[name=profie_image]').removeAttr('disabled');
                }else{
                    $('input[name=profie_image]').attr('disabled','disabled');
                };   
            });
            if($('input[name=changePass]').is(':checked')){
                $('input[name=new_password1]').removeAttr('disabled');
                $('input[name=new_password2]').removeAttr('disabled');
            }else{
                $('input[name=new_password1]').attr('disabled','disabled');
                $('input[name=new_password2]').attr('disabled','disabled');
            };
            $('input[name=changePass]').click(function(){
                if($('input[name=changePass]').is(':checked')){
                    $('input[name=new_password1]').removeAttr('disabled');
                    $('input[name=new_password2]').removeAttr('disabled');
                }else{
                    $('input[name=new_password1]').attr('disabled','disabled');
                    $('input[name=new_password2]').attr('disabled','disabled');
                };
            });
            let valPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            let valiEmail = /^[a-zA-Z0-9]{5,}@gmail\.com$/;
            let valiPhone = /^[0-9]{9,11}$/;
            $('input[name=profie_email]').change(function(){
                if(!valiEmail.test($(this).val().trim())){
                    $(this).addClass('is-invalid');
                    $('#invalidEmail').html('Invalid Email');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalidEmail').html('');
                }
            });
            $('input[name=profie_phone]').change(function(){
                if(!valiPhone.test($(this).val().trim())){
                    $(this).addClass('is-invalid');
                    $('#invalidPhone').html('Invalid Phone number');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalidPhone').html('');
                }
            });
            $('input[name=new_password1]').change(function(){
                if(!valPass.test($(this).val().trim())){
                    $(this).addClass('is-invalid');
                    $('#invalidPass').html('Password must contains at least 1 capital letter, 1 number and min length 8 characters');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalidPass').html('');
                };
            });
            $('input[name=profie_name],input[name=profie_gender],input[name=profie_phone],input[name=profie_email], input[name=dateOfBirth],#profie_gender, input[name=new_password1],input[name=new_password2]').change(function(){

                if($('input[name=profie_name]').val().trim().length>0&&$('input[name=profie_email]').val().trim().length>0 &&$('input[name=profie_phone]').val().trim().length>0 ){
                    $('#profie_change').removeAttr('disabled');
                }else{
                    $('#profie_change').attr('disabled','disabled');
                }
            })
        })       
    </script>
@endsection