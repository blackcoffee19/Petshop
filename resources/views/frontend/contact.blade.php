@extends('welcome')
@section('content')
<main class="container-fluid">
    <div class="row position-relative w-100 mb-3 m-0" style="height: 250px;">
        <div class="position-absolute w-100 h-100" style="background-color: #13289D;z-index: 0; opacity: 0.8;"></div>
        <div class="w-50 mx-auto my-auto " style="z-index: 1; ">
            <h1 class="mx-auto text-uppercase text-center text-light ">Contact us</h1>
            <p class="text-center text-white-50">Some text introduct about us here</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-10 py-4 mx-auto">
            <form action="{{route('contact')}}" method="post">
                @csrf
                <h4 class="text-center mb-4 ">Get us contact to us</hh4>
                <div class="input-group my-4">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control " placeholder="Add mail for us reply you"  name="contact-email" id="contact-email" >
                </div>
                <div class="mb-3 ">
                    <label for="contact-mess" class="form-label ">Mail us</label>
                    <textarea name="contact-mess" id="contact-mess" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="row">
                    <input type="submit" value="Send Mail" id="contact-submit" class="btn btn-primary h4 col-3 mx-auto" disabled>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-md-12 my-4 mx-auto d-flex flex-column justify-content-center align-items-center" >
            <div class="card w-100 mb-3 px-2 rounded-2" >
                <div class="row g-0 w-100">
                    <div class="col-8 ps-3 pt-3">
                        <h4>Company name</h4>
                        <p class="text-black-50">Ltd Group 2</p>
                        <hr style="width: 30px;">
                        <p class="text-black-50">Location: Somewhere in earth</p>
                        <p class="text-black-50">Phone: +84 9900999</p>
                    </div>
                    <div class="col-4 ps-3 pt-3" style="background-color: #13289D; color: #ffffff;">
                        <p class="text-light-50">Phone 1</p>
                        <h5 class="text-light">32323-3223</h5>
                        <hr style="width: 30px;">
                        <p class="text-light-50">Phone 2</p>
                        <h5 class="text-light">12221-321312</h5>
                    </div>
                </div>
            </div>
            <div class="w-100" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.2773997461!2d106.6662743!3d10.7868348!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed2392c44df%3A0xd2ecb62e0d050fe9!2zRlBUIEFwdGVjaCBIQ00gMSAtIEjhu4cgVGjhu5FuZyDEkMOgbyBU4bqhbyBM4bqtcCBUcsOsbmggVmnDqm4gUXXhu5FjIFThur8gKFNpbmNlIDE5OTkp!5e0!3m2!1svi!2s!4v1681138419228!5m2!1svi!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15676.791013354139!2d106.62482322759305!3d10.796160954898076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752906e3d6f0b9%3A0xd0590229ecc51bfc!2zOTQvMzAgTmd1eeG7hW4gVGjhur8gVHJ1eeG7h24!5e0!3m2!1svi!2s!4v1675313665044!5m2!1svi!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#contact-mess').change(function(){
                if($(this).val().length >0){
                    $('#contact-submit').removeAttr('disabled');
                }else{
                    $('#contact-submit').attr('disabled','disabled');
                }
            })
        })
    </script>
@endsection