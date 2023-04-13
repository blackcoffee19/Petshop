@extends('welcome')
@section('content')
<div class="container-fluid position-relative pt-3 mt-4" style="height:fit-content; padding-bottom:100px">
    @if ($message=Session::get('message'))
        <div class="alert alert-danger w-50 mx-auto">
            {{$message}}
        </div>
    @endif
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class=" position-absolute" style="bottom: 0; left:0"><path fill="#0099ff" fill-opacity="1" d="M0,192L30,170.7C60,149,120,107,180,106.7C240,107,300,149,360,160C420,171,480,149,540,144C600,139,660,149,720,160C780,171,840,181,900,154.7C960,128,1020,64,1080,37.3C1140,11,1200,21,1260,74.7C1320,128,1380,224,1410,272L1440,320L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class=" position-absolute" style="bottom: 20px; left:25px; opacity:0.5"><path fill="#0099ff" fill-opacity="1" d="M0,192L30,170.7C60,149,120,107,180,106.7C240,107,300,149,360,160C420,171,480,149,540,144C600,139,660,149,720,160C780,171,840,181,900,154.7C960,128,1020,64,1080,37.3C1140,11,1200,21,1260,74.7C1320,128,1380,224,1410,272L1440,320L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
    <div class="row  position-relative">
        <div class="col-sm-4 mx-auto d-flex flex-column align-content-center justify-content-center">
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
            <div class="bg-light rounded-pill shadow-lg mx-auto border mb-2 mt-5 py-2 px-8">
                <a class="h4 fw-normal text-decoration-none text-center" href="{{route('google-auth')}}" style="vertical-align: middle;font-family: 'Montserrat', sans-serif;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1" height="30" viewBox="0 0 24 24" width="30">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/><path d="M1 1h22v22H1z" fill="none"/>
                    </svg>
                    Sign in with Google
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
                    <div class="carousel-item card {{$i == 0? "active": ""}} card-product rounded-2 shadow">
                        <div class="card-body">
                            <div class="text-center position-relative ">
                              <div class=" position-absolute top-0 start-0">
                                @if ($random_pet[$i]->sale !=0)
                                <span class="badge bg-success">-{{$random_pet[$i]->sale}}%</span>
                                @endif
                                @php 
                                    $today =new DateTime();
                                    $pet_createdate = DateTime::createFromFormat('Y-m-d H:i:s',$random_pet[$i]->created_at);
                                    if($today->diff($pet_createdate)->format('%a') <4){
                                      echo "<span class='badge bg-danger'>HOT</span>";
                                    }
                                @endphp
                              </div>
                              <a href="{{route('productdetail',$random_pet[$i]->id_product)}}"> 
                                  <img src="{{asset('resources/image/pet/'.$random_pet[$i]->image)}}" alt="{{$random_pet[$i]->product_name}}" class="mb-3 img-fluid mx-auto" style="width: 212px; height: 212px; object-fit: contain">
                              </a>
                              <div class="card-product-action">
                                <a href="#!" class="btn-action btn_modal" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-bs-product="{{$random_pet[$i]->id_product}}"><i
                                    class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                <a class="btn-action {{Auth::check()? 'addFav':''}}" 
                                {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$random_pet[$i]->id_product"}} >
                                  <i class="bi {{Auth::check() ? (count(Auth::user()->Favourite->where('id_product','=',$random_pet[$i]->id_product))>0 ? 'bi-heart-fill text-danger' : 'bi-heart'): 'bi-heart'}}"></i></a>
                                <a role="button" class="btn-action  compare_pet" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"  data-bs-product="{{$random_pet[$i]->id_product}}">
                                  <i class="bi bi-arrow-left-right"></i>
                                </a>
                              </div>
                            </div>
                            <div class="text-small mb-1">
                                <a href="{{route('productdetail',$random_pet[$i]->id_product)}}" class="text-decoration-none text-muted">
                                    <small class="text-capitalize">{{$random_pet[$i]->Breed->breed_name}}</small>
                                </a>
                            </div>
                            <h2 class="fs-6">
                                <a href="{{route('productdetail',$random_pet[$i]->id_product)}}" class="text-inherit text-decoration-none">{{$random_pet[$i]->product_name}}</a>
                            </h2>
                            <div>
                                @php
                                    $rating = 0;
                                    if (count($random_pet[$i]->Comment->where('rating','!=',null)) >0) {
                                      foreach ($random_pet[$i]->Comment->where('rating','!=',null) as $cmt) {
                                        $rating += $cmt->rating;
                                      }
                                      $rating /= count($random_pet[$i]->Comment->where('rating','!=',null));
                                    }
                                @endphp
                                <p>
                                    @for ($j = 0; $j < floor($rating); $j++)
                                    <i class="bi bi-star-fill fs-4 text-warning"></i>
                                    @endfor
                                    @if (is_float($rating))
                                    <i class="bi bi-star-half fs-4 text-warning"></i>
                                    @endif
                                    @for ($j = 0; $j < 5-ceil($rating); $j++)
                                    <i class="bi bi-star fs-4 text-warning"></i>
                                    @endfor
                                    <span class="text-black-50 ms-3">({{$rating}})</span>
                                  </p>
                                  <span class="ms-2 text-primary">({{count($random_pet[$i]->Comment->where('rating','!=',null))}} solds)</span>
                            </div>
                          <div class="d-flex justify-content-between align-items-center mt-3">
                            <div >
                              @if ($random_pet[$i]->sale>0)
                              <span class="fs-4 text-danger">${{$random_pet[$i]->per_price *(1- $random_pet[$i]->sale /100)}}</span>
                                <span class="text-decoration-line-through text-muted">${{$random_pet[$i]->per_price}}</span>
                              @else
                              <span class=" fs-4 text-black">${{$random_pet[$i]->per_price}}</span>
                                @endif
                            </div>
                            <div>
                                <button data-bs-id="{{$random_pet[$i]->id_product}}" type="button" class="btn btn-primary btn addToCart">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  class="feather feather-plus">
                                  <line x1="12" y1="5" x2="12" y2="19"></line>
                                  <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg> Add</button>
                          </div>
                        </div>
                    </div>
                    </div>
                    @endfor
                    
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