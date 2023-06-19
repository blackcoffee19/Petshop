@extends('welcome')
@section('content')
<main>
    <section>
    <div class="container d-flex flex-column">
        <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="offset-lg-1 col-lg-10  py-8 py-xl-0">
            <div class="row justify-content-center align-items-center">
            <div class="col-md-5 col-lg-4 col-6 mx-auto">
                <div class=" mb-6 mb-lg-0">
                    <h1>{{Session::get('success_signup')}}</h1>
                    <p class="mb-8">Thank you for sign up for memmbership.<br>
                        It still need a last step to verified your account.
                    </p>
                    <div class="w-100 d-flex flex-row justify-content-between align-items-center">
                        <a href="https://mail.google.com/mail/" class="btn btn-success rounded-pill">Check Mail</a>
                        <a href="{{route('index')}}" class="btn btn-warning rounded-pill">Do It Later</a>
                    </div>
                </div>

            </div>
            <div class="col-md-5 col-lg-4 col-5 mx-auto">
                <div>
                    <img src="{{asset('resources/image/svg-graphics/confirmation.svg')}}" alt="" class="img-fluid">
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</main>
@endsection