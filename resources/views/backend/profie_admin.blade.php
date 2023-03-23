@extends('admin')
@section('content')
<div class="col-sm-7 col-md-8 mx-auto mt-4">
    <div class="row bg-light shadow rounded" >
        @if (Session::has('error'))
            <div class="alert alert-danger mt-3 text-center">{{Session::get('loi')}}</div>
        @endif
        @if (Session::has("message"))
            <div class="alert alert-success mt-3 text-center">{{Session::get("thongbao")}}</div>
        @endif
        <div class="col-12 mx-auto mb-4 mt-2">
            <form  action="{{route('changeuser')}}" method="POST" class="w-75 mx-auto row" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user"value={{Auth::user()->id_user}}>
                <img src="../resources/image/user/{{Auth::user()->image ?Auth::user()->image : 'user.png'}}" class="mb-3 col-5 mx-auto img-fluid border" alt="">
                <label for="new_image">Change image:</label>
                <input type="file" class="form-control mb-4" name="image" id="image" value="{{Auth::user()->image}}">
                <hr>
                <label class="form-label"  for="new_name">Full Name: </label>
                <input  type="text" class="form-control mb-3" name="new_name" id="new_name" value="{{Auth::user()->name}}">
                @if ($errors->has('new_name'))
                    <div class="text-danger mb-3">{{$errors->first('new_name')}}</div>
                @endif
                <label for="gender" class="form-label">Gender </label>
                <select name="gender" id="gender" class="form-control">
                    <option value="1"{{Auth::user()->gender == 1? "selected": ""}}>Male</option>
                    <option value="2"{{Auth::user()->gender == 2? "selected": ""}}>Female</option>
                    <option value="3"{{Auth::user()->gender == 3? "selected": ""}}>Other</option>
                    <option value=""{{Auth::user()->gender == null? "selected": ""}}>Unknown</option>
                </select>
                <label class="form-label" for="new_address">Address: </label>
                <input type="text" class="form-control mb-3" name="new_address" id="new_address" value="{{Auth::user()->address}}">
                @if ($errors->has('new_address'))
                    <div class="text-danger mb-3">{{$errors->first('new_address')}}</div>
                @endif
                <label class="form-label" for="new_phone">Phone Number: </label>
                <input type="text" class="form-control mb-3" name="new_phone" id="new_phone" value="{{Auth::user()->phone_number}}">
                @if ($errors->has('new_phone'))
                    <div class="text-danger mb-3">{{$errors->first('new_phone')}}</div>
                @endif
                <label class="form-label" for="new_email">Email: </label>
                <input type="text" class="form-control mb-3" name="new_email" id="new_email" value="{{Auth::user()->email}}">
                @if ($errors->has('new_email'))
                    <div class="text-danger mb-3">{{$errors->first('new_email')}}</div>
                @endif
                <label class="form-label" for="new_password1">Enter New Password: </label>
                <input type="password" class="form-control mb-3" name="new_password1" id="new_password1" >
                @if ($errors->has('new_password1'))
                    <div class="text-danger mb-3">{{$errors->first('new_password1')}}</div>
                @endif
                <label class="form-label" for="new_password2">Re enter password: </label>
                <input type="password" class="form-control mb-3" name="new_password2" id="new_password2" >
                @if ($errors->has('new_password2'))
                    <div class="text-danger mb-3">{{$errors->first('new_password2')}}</div>
                @endif
                <input type="submit" value="Change" class="btn btn-warning col-3 mx-auto">
            </form>
        </div>
    </div>
</div>
@endsection

