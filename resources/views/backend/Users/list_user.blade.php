@extends('admin')
@section('content')
<div class="col-sm-7 col-md-8 mx-auto mt-4 bg-light " style=" overflow: scroll">
    <div class="row">
        <div class="mx-auto p-4 rounded-2"  >
            <div class="row">
                <h2 class="col-3">User</h2>
                <div class="col-3">
                    <select name="sortType" id="sortType" class="form-select">
                        <option value="all" {{!$sortType == "all"? "selected":""}}>All Users</option>
                        <option value="admin"{{$sortType =='admin'?"selected":""}}>Admin</option>
                        <option value="user"{{$sortType =='user'?"selected":""}}>User</option>
                    </select>
                </div>
            </div>
            <hr>
            @if (Session::has("message"))
            <div class="alert alert-success">{{Session::get("message")}}</div>
            @endif
            @if (Session::has("error"))
            <div class="alert alert-danger">{{Session::get("error")}}</div>
            @endif
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Authory</th>
                        <th>Image</th>
                        <th>Del</th>
                        <th>Edt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id_user}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->gender == 1? "Male": ($user->gender == 2?"Female":($user->gender==3?"Other":"Unknow"))}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>{{$user->admin == 1?"Admin": "Guest"}}</td>
                        <td>
                            <img src="{{asset('../resources/image/user/'.($user->image ? $user->image: 'no_image.jpg'))}}" alt="{{$user->name}}" class="img-thumbnail" width="70px">
                        </td>
                        <td>
                            <a href="{{route('deleteUser',[$user->id_user])}}"><i class="fa-sharp fa-solid fa-trash text-danger"></i></a>
                        </td>
                        <td>
                            <a href="{{route('edituser',[$user->id_user])}}"><i class="fa-sharp fa-solid fa-pen text-secondary"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if (!$sortType)
            {{$users->links()}}
            @endif
        </div>
    </div>
</div>
@endsection
@section('admin_script')
    <script>
        $(document).ready(function(){
            $('#sortType').change(function(){
                window.location.assign(window.location.pathname+'?sortType='+$(this).val());
            })
        })
    </script>
@endsection