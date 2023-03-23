@extends('welcome')
@section('content')
<div class="container-fluid position-relative pb-4 mt-4" style="height:fit-content;">
    @if ($message=Session::get('message'))
        <div class="alert alert-danger w-50 mx-auto">
            {{$message}}
        </div>
    @endif
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class=" position-absolute" style="bottom: 0; left:0"><path fill="#0099ff" fill-opacity="1" d="M0,192L30,170.7C60,149,120,107,180,106.7C240,107,300,149,360,160C420,171,480,149,540,144C600,139,660,149,720,160C780,171,840,181,900,154.7C960,128,1020,64,1080,37.3C1140,11,1200,21,1260,74.7C1320,128,1380,224,1410,272L1440,320L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class=" position-absolute" style="bottom: 20px; left:25px; opacity:0.5"><path fill="#0099ff" fill-opacity="1" d="M0,192L30,170.7C60,149,120,107,180,106.7C240,107,300,149,360,160C420,171,480,149,540,144C600,139,660,149,720,160C780,171,840,181,900,154.7C960,128,1020,64,1080,37.3C1140,11,1200,21,1260,74.7C1320,128,1380,224,1410,272L1440,320L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
    <div class="row  position-relative">
        <div class="col-sm-4 mx-auto d-flex flex-column align-content-center">
            <div class=" flex-grow-1" id="signin" style='display: {{$sign == "signin" ? "block" : "none" }}'>
                <h1 class="text-center mb-4">Sign in</h1>
                <hr>
                <form action="{{route('signin')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="username"><i class="fa-regular fa-user"></i></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Email">
                    </div>
                    @if ($errors->has('username'))
                        <div class="text-danger mb-3">{{$errors->first('username')}}</div>
                    @endif
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="pass1"><i class="fa-regular fa-lock"></i></span>
                        <input type="password" name="pass1" id="pass1" class="form-control" placeholder="Enter your password">
                    </div>
                    @if ($errors->has('pass1'))
                        <div class="text-danger">{{$errors->first('pass1')}}</div>
                    @endif
                    <div class="my-5 mx-2 row">
                        <input type="submit" value="Login" class="btn btn-primary col-md-4">
                        <div class="col-auto text-center mx-auto pt-2">
                            <a class="text-center text-primary">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class=" flex-grow-1 " id="signup" style='display: {{$sign == "signup" ? "block" : "none" }}'>
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <h1 class="text-center mb-4">Sign up</h1>
                <hr>
                <span class="text-black-50">You must to input * statement</span>
                <hr>
                <form action="{{route('signup')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" name="user_fullname" id="user_fullname" class="form-control">
                        <label class="form-label" for="user_fullname">Full Name *</label>
                        <span id="invalidName" class="text-danger"></span>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label" for="user_gender">Gender *</label>
                            <select name="user_gender" id="user_gender" class="form-select">
                                <option value="1" selected>Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                                <option value="4">Unknow</option>
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="user_dob" class="form-label">Date of birth *</label>
                            <input type="date" name="user_dob" id="user_dob" class="form-control" min="1920-12-31" max="2010-12-31">
                            <span id="invalidDOB" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" name="user_address" id="user_address" class="form-control">
                        <label class="form-label" for="user_address">Address</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" name="user_phone" id="user_phone" class="form-control">
                        <label class="form-label" for="user_phone">Phone number *</label>
                        <span id="invalidPhone" class="text-danger"></span>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" name="user_email" id="user_email" class="form-control">
                        <label class="form-label" for="user_email">Email *</label>
                        <span id="invalidEmail" class="text-danger"></span>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" name="user_pass1" id="user_pass1" class="form-control" >
                        <label class="form-label" for="user_pass1">Password *</label>
                        <span id="invalidPass1" class="text-danger"></span>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" name="user_pass2" id="user_pass2" class="form-control">
                        <label class="form-label" for="user_pass2">Re-password *</label>
                        <span id="invalidPass2" class="text-danger"></span>
                    </div>
                    <div class="mb-4">
                        <label for="user_img" class="form-label">Add an image</label>
                        <input type="file" name="user_img" id="user_img" class="form-control">
                    </div>
                    <div class="form-check form-check-inline mb-3">
                        <input type="checkbox" name="condition" id="condition" value="agree" class="form-check-input">
                        <label class="form-check-label" for="condition">Agree with all <a href="" >condition</a> & <a href="" >Term</a></label>
                    </div>
                    <div class="my-3 mx-2 row">
                        <input type="submit" id="signup_submit" value="Sign in" class="btn btn-primary col-md-4 mx-auto" disabled>
                    </div>
                </form>
            </div>
            <div class="bg-light rounded-pill p-2 shadow-lg w-75 mx-auto border mb-2 mt-5 py-2">
                <a class="h5 ms-3 fw-normal text-decoration-none" href="{{route('google-auth')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 24 24" width="30">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/><path d="M1 1h22v22H1z" fill="none"/>
                    </svg>
                    <span class="">&nbsp;Sign in with Google</span>
                </a>
            </div>
            <div class="d-flex flex-row justify-content-center">
            
                <a class="text-center text-decoration-none text-light">Term & Condition</a>
                &nbsp;/&nbsp;
                <a href="{{route('policy')}}" class="text-center text-decoration-none text-light">Privacy Policy</a>
            </div>
        </div>
        <div class="col-auto mx-auto my-auto" style="width: 300px;">
            <div id="carousel_login" class="carousel slide" style="width: fit-content; margin-left: auto; margin-right: auto;">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carousel_login" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carousel_login" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carousel_login" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" style="width: fit-content;height: 480px; margin-left: auto; margin-right: auto;">
                    @for ($i = 0; $i < count($random_pet); $i++)
                    <div class="carousel-item card {{$i == 0? "active": ""}} rounded-2 shadow"  style="max-height: 460px; height: fit-content;" >
                        <img src="../resources/image/pet/{{$random_pet[$i]->image}}" class="card-img-top rounded" style="object-fit: contain; height: 220px;" alt="{{$random_pet[$i]->image}}">
                        <div class="card-body"  style="line-height:0.2rem; text-align: center;">
                            <p class="card-title fs-4 mb-4 mt-3">{{$random_pet[$i]->product_name}}</p>
                            <p class="card-text text-black-50 fw-light">Age: {{$random_pet[$i]->age}}</p>
                            <p class="card-text text-black-50 fw-light">Gender: {{$random_pet[$i]->age == 1? "male":"female"}}</p>
                            <p class="card-text text-black-50 fw-light my-4 d-flex flex-row justify-content-around">Price:<span class="fs-5 text-dark">${{$random_pet[$i]->per_price}}</span></p>
                            <p class="text-warning">
                                @for ($j = 0; $j < $random_pet[$i]->rating; $j++)
                                <i class="fa-solid fa-star"></i>
                                @endfor
                                @for ($k = 0; $k < 5-$random_pet[$i]->rating; $k++)
                                <i class="fa-solid text-secondary fa-star"></i>
                                @endfor
                            </p>
                            <a href="{{route('productdetail',[$random_pet[$i]->id_product])}}" class="btn btn-primary w-100 fs-6">
                                More detail
                            </a>
                        </div>
                    </div>
                    @endfor
                    {{-- {{dd($random_pet[2]->product_name)}} --}}
                    <div class="carousel-item card rounded-2 shadow"  style="max-height: 460px; height: fit-content;" >
                        <img src="../resources/image/ememyers-21.jpg" class="card-img-top rounded" style="object-fit: contain; height: 220px;" alt="...">
                        <div class="card-body"  style="line-height:0.5rem; text-align: center;">
                            <p class="card-title fs-4 mb-4 mt-3">Emma Myers</p>
                            <p class="card-text text-black-50 fw-light">Wife Materials</p>
                            <p class="card-text text-black-50 fw-light">Gender: female</p>
                            <p class="card-text text-black-50 fw-light my-4 d-flex flex-row justify-content-around">Price:<span class="fs-5 text-dark">Sold</span></p>
                            <p class="text-warning">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <a href="#" class="btn btn-primary w-100 fs-6">
                                More detail
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item card rounded-2 shadow"  style="max-height: 460px; height: fit-content;" >
                        <img src="../resources/image/wednesday-1.jpg" class="card-img-top rounded" style="object-fit: contain; height: 220px;" alt="...">
                        <div class="card-body"  style="line-height:0.5rem; text-align: center;">
                            <p class="card-title fs-5 mb-4 mt-3">Wednesday Addams</p>
                            <p class="card-text text-black-50 fw-light">aka: Jena Ortega</p>
                            <p class="card-text text-black-50 fw-light">Gender: female</p>
                            <p class="card-text text-black-50 fw-light my-4 d-flex flex-row justify-content-around">Price:<span class="fs-5 text-dark">Sold</span></p>
                            <p class="text-warning">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <a href="#" class="btn btn-primary w-100 fs-6">
                                More detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            let valPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            let valiEmail = /^[a-zA-Z0-9]{5,}@gmail\.com$/;
            let valiPhone = /^[0-9]{9,11}$/;
            
            $('#condition,input[name=user_fullname],input[name=user_phone],input[name=user_email],input[name=user_pass1],input[name=user_pass2],input[name=user_dob]').change(function(){
                if($('#condition').is(':checked') && $('input[name=user_fullname]').val().trim().length>0 && $('input[name=user_phone]').val().trim().length>0 && $('input[name=user_email]').val().trim().length>0 && $('input[name=user_pass1]').val().trim().length >0 && $('input[name=user_pass2]').val().trim().length>0){
                    $('#signup_submit').prop('disabled',false);
                }else{
                    $('#signup_submit').prop('disabled',true);
                }
            })
            $('input[name=user_phone]').change(function(){
                if(!valiPhone.test($(this).val().trim())){
                    $(this).addClass('is-invalid');
                    $('#invalidPhone').html('Invalid phone number');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalidPhone').html('');
                }
            });
            $('input[name=user_email]').change(function(){
                if(!valiEmail.test($(this).val().trim())){
                    $(this).addClass('is-invalid');
                    $('#invalidEmail').html('Invalid Email');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalidEmail').html();
                };
            });
            $('input[name=user_dob]').change(function(){
                if($(this).val()==null){
                    $(this).addClass('is-invalid');
                    $('#invalidDOB').html('Choose your date of birth');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalidDOB').html();
                };
            });
            $('input[name=user_fullname]').change(function(){
                if($(this).val()==null){
                    $(this).addClass('is-invalid');
                    $('#invalidName').html('Your must to enter your name');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalidName').html();
                };
            });
            $('input[name=user_pass1]').change(function(){
                if(!valPass.test($(this).val())){
                    $(this).addClass('is-invalid');
                    $('#invalidPass1').html('Password is invalid. >= 8 characters, at least 1 capital, at least 1 normal, at least 1 number)');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalidPass1').html('');
                };
            });
            $('input[name=user_pass2]').change(function(){
                if(!valPass.test($(this).val()) || $(this).val() !== $('input[name=user_pass1]').val()){
                    $(this).addClass('is-invalid');
                    $('#invalidPass2').html('Password not match each other');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalidPass2').html('');
                }
            })
        })
    </script>
@endsection