@extends('admin')
@section('content')
    <div class="col-sm-7 col-md-8 mx-auto mt-4">
        <div class="row">
            @if (Session::has("error"))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            <div class="bg-light p-4 rounded-2 ms-5 col-md-10 col-lg-6 " >
                <p class="h2 text-capitalize">{{$site}} <span class="text-secondary ms-3">User</span></p>
                <hr>
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <form action="{{$site == 'Add'? route('adduser') : route('edituser',[$user->id_user])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="user_name" id="user_name" value="{{$site == 'Edit'? $user->name:''}}" >
                        <label class="form-label" for="user_name">User Name</label>
                        <span id="invalid_name" class="text-danger"></span>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="email" id="email" value="{{$site == 'Edit'? $user->email:''}}" >
                        <label class="form-label" for="email">Email</label>
                        <span class="text-danger" id="invalid_email"></span>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="phone" id="phone" value="{{$site == 'Edit'? $user->phone_number:''}}" >
                        <label class="form-label" for="phone">Phone number</label>
                        <span class="text-danger" id="invalid_phone"></span>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-6 my-auto">
                            <label class="form-label" for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="1" {{$site == "Edit"? ($user->gender ==1? "selected": ''):'selected'}}>Male</option>
                                <option value="2" {{$site == "Edit"? ($user->gender ==2? "selected": ''):''}}>Female</option>
                                <option value="3" {{$site == "Edit"? ($user->gender ==3? "selected": ''):''}}>Other</option>
                            </select>
                        </div>
                        <div class="col-5 mx-auto">
                            <label for="user_birth" class="form-label">Date of birth</label>
                            <input type="date" name="user_birth" id="user_birth" class="form-control" min="1920-12-31" max="2010-12-31" value="{{$site == 'Edit' ? $user->dob:''}}">
                        </div>
                    </div>
                    <div class="mb-3 form-floating">
                        <select name="admin" id="admin" class="form-select">
                            <option value="1" {{$site == "Edit"? ($user->admin ==1? "selected": ''):''}}>Admin</option>
                            <option value="0" {{$site == "Edit"? ($user->admin ==0? "selected": ''):'selected'}}>Guest</option>
                        </select>
                        <label class="form-label" for="admin">Authory:</label>
                    </div>
                    @if ($site=="Add")
                        <div class="mb-3 form-floating">
                            <input type="password" class="form-control" id="pass1" name="pass1" >
                            <label for="pass1" class="form-label">Enter password</label>
                            <span id="invalid_pass1" class="text-danger"></span>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password" class="form-control" id="pass2" name="pass2">
                            <label for="pass2" class="form-label">Re-Enter password</label>
                            @if ($errors->has('pass2'))
                                <span class="text-danger">{{$errors->first('pass2')}}</span>
                            @endif
                        </div>
                    @else
                        <div class="mb-3 form-check-inline">
                            <input type="checkbox" name="changeUserPass" id="changeUserPass" class="form-check-input">
                            <label for="changeUserPass" class="form-check-label">Change password for user</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password" class="form-control" id="pass1" name="pass1" >
                            <label for="pass1" class="form-label">New password</label>
                            <span id="invalid_pass1" class="text-danger"></span>
                            @if ($errors->has('pass1'))
                                <span class="text-danger">{{$errors->first('pass1')}}</span>
                            @endif
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password" class="form-control" id="pass2" name="pass2">
                            <label for="pass2" class="form-label">Re-Enter password</label>
                            @if ($errors->has('pass2'))
                                <span class="text-danger">{{$errors->first('pass2')}}</span>
                            @endif
                        </div>
                    @endif
                    <div class="mb-3">
                        @if ($site == "Edit")
                            <img src="{{asset('../resources/image/user/'.($user->image?$user->image:'no_image.jpg'))}}" alt="user_image" width="250px">
                        @endif
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="checkImg" id="checkImg" class="form-check-input">
                            <label for="checkImg" class="form-check-label">{{$site == "Add"?"Add new Image":"Change new Image"}}</label>
                        </div>
                        <label for="img_user" class="form-label">User Image</label>
                        <input type="file" name="img_user" id="img_user" class=" form-control" disabled>
                    </div>
                    <div class="mt-5">
                        <a href="{{route('listuser')}}" class="me-3"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Back</a>
                        <input type="submit" value="{{$site}} User" class="btn btn-primary px-3" id="submit_btn" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('admin_script')
    <script>
        $(document).ready(function(){
            let valPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            let valiEmail = /^(\.?[a-zA-Z0-9]){5,}@gmail\.com$/;
            let valiPhone = /^[0-9]{9,11}$/;
            @if ($site == "Add")
                $('input[name=user_name], input[name=phone],input[name=email],input[name=pass1],input[name=pass2]').focusout(function(){
                    if($('input[name=user_name]').val().trim().length>0 && $('input[name=phone]').val().trim().length>0&& $('input[name=email]').val().trim().length>0 && $('input[name=pass1]').val().trim().length>0 && $('input[name=pass2]').val().trim().length>0){
                        $('#submit_btn').removeAttr('disabled');
                    }else{
                        $('#submit_btn').attr('disabled','disabled');
                    }
                });
                $('input[name=pass1]').focusout(function(){
                    if(!valPass.test($(this).val())){
                        $(this).addClass('is-invalid');
                        $('#invalid_pass1').html('Password must contains at least 1 capital letter, 1 number');
                        $('#submit_btn').attr('disabled','disabled');
                    }else{
                        $(this).removeClass('is-invalid');
                        $('#invalid_pass1').html('');
                    }
                });
                
            @else
                if($('input[name=changeUserPass]').is(':checked')){
                    $('input[name=pass1]').removeAttr('disabled');    
                    $('input[name=pass2]').removeAttr('disabled');    
                }else{
                    $('input[name=pass1]').attr('disabled','disabled');    
                    $('input[name=pass2]').attr('disabled','disabled');
                }
                $('input[name=changeUserPass]').change(function(){
                    if($('input[name=changeUserPass]').is(':checked')){
                        $('input[name=pass1]').removeAttr('disabled');    
                        $('input[name=pass2]').removeAttr('disabled');    
                    }else{
                        $('input[name=pass1]').attr('disabled','disabled');    
                        $('input[name=pass2]').attr('disabled','disabled');
                    }   
                });
                $('input[name=pass1]').focusout(function(){
                    if(!valPass.test($(this).val())){
                        $(this).addClass('is-invalid');
                        $('#invalid_pass1').html('Password must contains at least 1 capital letter, 1 number');
                        $('#submit_btn').attr('disabled','disabled');
                    }else{
                        $(this).removeClass('is-invalid');
                        $('#invalid_pass1').html('');
                    }
                });
                $('input[name=user_name], input[name=phone],input[name=email],input[name=img_user],#gender,#admin,input[name=user_birth],input[name=pass1]').change(function(){
                    if($('input[name=user_name]').val().trim().length>0 && $('input[name=phone]').val().trim().length>0&& $('input[name=email]').val().trim().length>0){
                        $('#submit_btn').removeAttr('disabled');
                    }else{
                        $('#submit_btn').attr('disabled','disabled');
                    }
                });
            @endif
            $('input[name=user_name]').change(function(){
                if($(this).val().trim().length==0){
                    $(this).addClass('is-invalid');
                    $('#invalid_name').html('User name cannot be blank');
                }else{
                    $('#invalid_name').html('');
                    $(this).removeClass('is-invalid');
                }
            })
            $('input[name=email]').change(function(){
                if(!valiEmail.test($(this).val())){
                    $(this).addClass('is-invalid');
                    $('#submit_btn').attr('disabled','disabled');
                    $('#invalid_email').html('Invalid Email user');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalid_email').html('');
                }
            });
            $('input[name=phone]').change(function(){
                if(!valiPhone.test($(this).val())){
                    $(this).addClass('is-invalid');
                    $('#invalid_phone').html('Invalid Phone number');
                    $('#submit_btn').attr('disabled','disabled');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#invalid_phone').html('');
                }
            });
            $('#checkImg').click(function(){
                if($('#checkImg').is(':checked')){
                    $('#img_user').removeAttr('disabled');
                }else{
                    $('#img_user').attr('disabled','disabled');
                }
            })
        })
    </script>
@endsection