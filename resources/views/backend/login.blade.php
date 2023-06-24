<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{asset('')}}">
    <title>Admin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    <!-- font-family: 'Montserrat', sans-serif;
    font-family: 'Poppins', sans-serif; -->
    
</head>
<body>
    <div class="main-wrapper mt-5">
        <section class=" {{Session::has('permission_deinied') || Session::has('error')? 'my-lg-13 my-13':'my-lg-16 my-16'}}  mx-10">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    @if (Session::has('permission_deinied'))
                    <div class="col-12 row mb-5">
                        <div class="alert alert-danger col-lg-6 col-md-12 mx-auto">{{Session::get('permission_deinied')}}</div>
                    </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="col-12 row mb-5">
                            <div class="alert alert-danger col-lg-6 col-md-12 mx-auto">{{Session::get('error')}}</div>
                        </div>
                    @endif
                    <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                        @if (Session::has('permission_deinied') || Session::has('error'))
                        <img src="{{ asset('resources/image/svg-graphics/security_fail.png') }}" alt="" class="img-fluid">
                        @else
                        <img src="{{ asset('resources/image/svg-graphics/security_on.svg') }}" alt="" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                        <div class="mb-lg-9 mb-5">
                            <h1 class="mb-1 h2 fw-bold">Sign in to Admin Site</h1>
                            <p>Welcome back to Admin site. But to get in this site you must be an Admin.</p>
                        </div>
                        <form action="{{ route('admin_login') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 form-floating">
                                    <input type="email" name="username" id="username" class="form-control {{$errors->has('username')?'is-invalid':''}}" required>
                                    <label for="username" class="ms-2">Email</label>
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{$errors->first('username')}}</span>
                                    @endif
                                </div>
                                <div class="col-12 mb-5">
                                    <div class="password-field position-relative form-floating">
                                        <input type="password" name="pass" id="pass" class="form-control {{$errors->has('pass')?'is-invalid':''}}">
                                        <label for="pass" >Password</label>
                                    </div>
                                    @if ($errors->has('pass'))
                                        <span class="text-danger text-center">{{$errors->first('pass')}}</span>
                                    @endif
                                </div>
                                <div class="col-5">
                                    <a href="{{route('home')}}" class="btn btn-warning">Back to Pet Shop</a>
                                </div>
                                <div class="col-6 mx-auto d-grid"> 
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</body>
</html>
