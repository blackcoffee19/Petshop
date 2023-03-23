@extends('admin')
@section('content')
    <div class="col-sm-7 col-md-8 mx-auto mt-4">
        <div class="row">
            @if (Session::has("error"))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            <div class="bg-light p-4 rounded-2 ms-5 col-md-10 col-lg-6" >
                <p class="h2 text-capitalize">{{$site}} <span class="text-secondary ms-3">Type</span></p>
                <hr>
                @if ($errors->has('name_type'))
                    <div class="alert alert-danger mb-3">{{$errors->first('name_type')}}</div>
                @endif
                <form action="{{$site == 'Add'? route('addtype') : route('edittype',[$type_pet->id_type])}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name_type">Name Type:</label>
                        <input class="form-control" type="text" name="name_type" id="name_type" value="{{$site == 'Edit'? $type_pet->name_type:''}}" placeholder="Enter new type of pet">
                    </div>
                    <div class="mt-3">
                        <a href="{{route('listtype')}}" class="me-3"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Back</a>
                        <input type="submit" value="{{$site}} Type" class="btn btn-primary px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
