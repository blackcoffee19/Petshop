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
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    <!-- font-family: 'Montserrat', sans-serif;
    font-family: 'Poppins', sans-serif; -->
    
</head>
<body>
    <div class="container-fluid" style="height: 620px;">
        <div class="row h-100">
            <div class="col-lg-6 col-md-10 col-sm-12 mx-auto my-auto card px-5 py-3 shadow">
                <h1 class="text-center">Admin Site</h1>
                <h3 class="text-center text-black-50">Login</h3>
                <hr>
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <form action="{{route('admin_login')}}" method="post" class="mt-4">
                    @csrf
                    <div class="mb-3 row">
                        <label for="username" class="col-3 col-form-label text-end" >Admin email</label>
                        <div class="col-8 ">
                            <input type="text" name="username" id="username" class="form-control {{$errors->has('username')?'is-invalid':''}}">
                        </div>
                        @if ($errors->has('username'))
                            <p class="text-danger text-center">{{$errors->first('username')}}</p>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label for="pass" class="col-3 col-form-label text-end">Password</label>
                        <div class="col-8">
                            <input type="password" name="pass" id="pass" class="form-control {{$errors->has('pass')?'is-invalid':''}}">
                        </div>
                        @if ($errors->has('pass'))
                            <p class="text-danger text-center">{{$errors->first('pass')}}</p>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <input type="submit" value="Login" class="btn btn-primary text-uppercase col-4 mx-auto">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</body>
</html>
