@extends('welcome')
@section('content')
<main>
    <section>
    <div class="container d-flex flex-column">
        <div class="row min-vh-100 justify-content-center pt-7">
        <div class="offset-lg-1 col-lg-10  py-4 py-xl-0">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5 col-lg-4 col-6 mx-auto">
                    @if (Session::has('reset_error'))
                        <div class="alert alert-danger">
                            {{Session::get('reset_error')}}
                        </div>
                    @endif
                    @if ($site == "send")
                        <div class=" mb-6 mb-lg-0 mb-5">
                            <h1>Resset your password</h1>
                            <form action="{{route('send_ressetmail')}}" method="post">
                                @csrf
                                <label for="email_resset" class="form-label">
                                    Enter your email
                                </label>
                                <input type="email" name="email_resset" id="email_resset" class="form-control mt-2" placeholder="Your email used to sign in your account" value="{{Session::has('email')?Session::get('email'):''}}"required>
                                <span id="msg_email_resset" class="text-danger"></span>
                                <input type="submit" name="submit_sendmail" value="Resset Password" class="btn btn-primary mt-2">
                            </form>
                        </div>
                    @endif
                    @if(Session::has("success"))
                        <div class="alert alert-success mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Mail has been send!</h3>
                                    <p>{{Session::get('success')}}</p>
                                    <a href="https://mail.google.com/mail/" class="btn btn-warning rounded-pill my-2">Check Mail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($site == "create")
                        <div class=" mb-6 mb-lg-0">
                            <h1>Create new password</h1>
                            <form action="{{route('create_newpassword')}}" method="post">
                                @csrf
                                <input type="hidden" name="account_email" value="{{$email}}">
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">
                                        Create new password
                                    </label>
                                    <input type="password" name="new_password2" id="new_password2" class="form-control my-2" placeholder="New Password" required>
                                    <span id="msg_register_password" class="text-danger"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="reenter_password" class="form-label">
                                        Re-enter password
                                    </label>
                                    <input type="password" name="reenter_password" id="reenter_password" class="form-control my-2" placeholder="Re enter Password" required>
                                    <span id="error_pass" class="text-danger"></span>
                                </div>
                                <input type="submit" name="submit_newpassword" id="submit_newpassword" value="Create Password" class="btn btn-primary">
                            </form>
                        </div>
                    @endif
                </div>
                <div class="col-md-5 col-lg-4 col-5 mx-auto">
                    <div>
                        <img src="{{asset('resources/image/svg-graphics/my_password.svg')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</main>
@endsection