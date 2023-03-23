@extends('welcome')
@section('content')
<main class="container-fluid">
    <div class="row position-relative w-100 mb-3 m-0" style="height: 400px; background-image: url('../resources/image/aZnbQOw.jpg'); background-position: 0 -70px; background-size: cover;">
        <div class="position-absolute w-100 h-100" style="background-color: #13289D;z-index: 0; opacity: 0.8;"></div>
        <div class="w-50 mx-auto my-auto " style="z-index: 1; ">
            <h1 class="mx-auto text-uppercase text-center text-light ">Contact us</h1>
            <p class="text-center text-white-50">Some text introduct about us here</p>
        </div>
    </div>
    <div class="row my-4">
        <div class="mb-3 mx-auto row" style="width: 600px;">
            <p class="text-center mb-4 h3">Get us contact to us</p>
            <div class="input-group">
                <input type="text" class="form-control " placeholder="Enter your phone number"  name="" id="phone" value="" onchange="">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="card mb-3 mx-auto px-0" style="width: 600px;">
            <div class="row g-0 w-100">
                <div class="col-8 ps-3 pt-3">
                    <h4>Company name</h4>
                    <p class="text-black-50">Ltd asdsasvadsv</p>
                    <hr style="width: 30px;">
                    <p class="text-black-50">Location: Somewhere in earth</p>
                    <p class="text-black-50">Phone: +84 9900999</p>
                </div>
                <div class="col-4 ps-3 pt-3" style="background-color: #13289D; color: #ffffff;">
                    <p class="text-white-50">Phone</p>
                    <h5>32323-3223</h5>
                    <hr style="width: 30px;">
                    <p class="text-white-50">Phone2</p>
                    <h5>12221321312</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="mx-auto round" style="width: 600px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15676.791013354139!2d106.62482322759305!3d10.796160954898076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752906e3d6f0b9%3A0xd0590229ecc51bfc!2zOTQvMzAgTmd1eeG7hW4gVGjhur8gVHJ1eeG7h24!5e0!3m2!1svi!2s!4v1675313665044!5m2!1svi!2s" width="590" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</main>
@endsection
