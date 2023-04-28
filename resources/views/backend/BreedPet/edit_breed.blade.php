@extends('admin')
@section('content')
<div class="col-sm-7 col-md-8 mx-auto mt-4">
    <div class="row">
        <div class="ms-4 bg-light p-4 rounded-2 col-6" >
            <p class="h2 text-capitalize">{{$site}} <span class="text-secondary ms-3">Breed</span></p>
            <hr>
            <h1>hjvjvjhv</h1>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name_breed">Name Breed:</label>
                    <input class="form-control" type="text" name="name_breed" id="name_breed" value="{{$site == 'Edit'? $breed_edit->breed_name:''}}" placeholder="Enter new breed of pet">
                </div>
                <div class="mt-3">
                    <a href="{{route('listtype')}}" class="me-3"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Back</a>
                    <input type="submit" value="{{$site}} Breed" class="btn btn-primary px-3">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
