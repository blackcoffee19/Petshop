@extends('admin')
@section('content')
<div class="col-sm-7 col-md-8 mx-auto mt-4">
    <div class="row">
        <div class="ms-5 bg-light p-4 col-md-10 col-lg-6 rounded-2" >
            <p class="h2">{{$site}}<span class="text-secondary ms-3"> Pet</span></p>
            <hr>
            <form action="{{$site == "Add" ? route('addpet'):route('editpet',[$pet_edit->id_product])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-floating">
                    <select class="form-select text-capitalize {{$errors->has('breed_pet')?'is-invalid':''}}" name="type_pet" id="type_pet">
                        <option>Choose one type</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id_type}}" {{$site == "Edit"? ($pet_edit->Breed->TypeProduct->id_type == $type->id_type ? 'selected' : ''):'' }}>{{$type->name_type}}</option>
                        @endforeach
                    </select>
                    <label for="type_pet" class="mb-2">Type of Pet</label>
                    @if ($errors->has('breed_pet'))
                    <p class="text-danger mt-1">{{$errors->first('breed_pet')}}</p>
                    @endif
                </div>
                <div class="mb-3 form-floating">
                    <select name="breed_pet" id="breed_pet" class="form-select text-capitalize {{$errors->has('breed_pet')?'is-invalid':''}}">
                    </select>
                    <label for="breed_pet" >Breed</label>
                    @if ($errors->has('breed_pet'))
                    <p class="text-danger mt-1">{{$errors->first('breed_pet')}}</p>
                    @endif
                </div>
                <div class="mb-3 form-floating">
                    <input class="form-control {{$errors->has('name_pet')?'is-invalid':''}}" type="text" name="name_pet" id="name_pet" value="{{$site == "Edit" ? $pet_edit->product_name:''}}">
                    <label for="name_pet">Name</label>
                    @if ($errors->has('name_pet'))
                        <p class="text-danger mt-1">{{$errors->first('name_pet')}}</p>
                    @endif
                </div>

                <div class="mb-3 row">
                    <div class="col-6 form-floating">
                        <select name="gender_pet" id="gender_pet" class="form-select">
                            <option value="1" {{$site=="Edit"?($pet_edit->gender == 1 ? 'selected':''):''}}>Male</option>
                            <option value="2" {{$site=="Edit"?($pet_edit->gender == 2 ? 'selected':''):''}}>Female</option>
                            <option value="3" {{$site=="Edit"?($pet_edit->gender == 3 ? 'selected':''):''}}>Unknow</option>
                        </select>
                        <label for="gender_pet" class="ms-2">Gender</label>
                    </div>
                    <div class="col-3 mx-auto form-floating">
                        <input class="form-control {{$errors->has('age_pet')? 'is-invalid':''}}" type="text" name="age_pet" id="age_pet" value="{{$site == "Edit"? $pet_edit->age : ''}}">
                        <label for="age_pet" class="ms-2">Age</label>
                        @if ($errors->has('age_pet'))
                            <p class="text-danger mt-1">{{$errors->first('age_pet')}}</p>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-3 mx-auto form-floating">
                        <input class="form-control {{$errors->has('quantity_pet')? 'is-invalid':''}}" type="text" name="quantity_pet" id="quantity_pet" value="{{$site=="Edit"?$pet_edit->quantity:''}}">
                        <label for="quantity_pet" class="ms-2">Quantity</label>
                        @if ($errors->has('quantity_pet'))
                            <p class="text-danger mt-1">{{$errors->first('quantity_pet')}}</p>
                        @endif
                    </div>
                    <div class="col-3 mx-auto form-floating">
                        <input class="form-control {{$errors->has('price_pet')?'is-invalid':''}}" type="text" name="price_pet" id="price_pet" value="{{$site=="Edit"?$pet_edit->per_price:''}}">
                        <label for="price_pet" class="ms-2">Price</label>
                        @if ($errors->has('price_pet'))
                            <p class="text-danger mt-1">{{$errors->first('price_pet')}}</p>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 form-floating">
                        <input class="form-control" type="text" name="status_pet" id="status_pet" value="{{$site=="Edit"?$pet_edit->status:''}}">
                        <label for="status_pet" class="ms-2">Status</label>
                    </div>
                    <div class="col-4 mx-auto form-floating">
                        <input class="form-control" type="text" name="food_pet" id="food_pet" value="{{$site=="Edit"?$pet_edit->food:''}}">
                        <label for="food_pet" class="ms-2">Food</label>
                    </div>
                </div>
                <div class="mb-3 form-floating">
                    <textarea name="describe" class="form-control" rows="3">{{$site == "Edit"? $pet_edit->description:''}}</textarea>
                    <label for="describe">Describe</label>
                </div>
                @if ($site=="Edit")
                    <div class="row mb-3"><img src="{{asset('/../resources/image/pet/'.$pet_edit->image)}}" alt="{{$site=="Edit"?$pet_edit->image:''}}" class="img-thumbnail col-5 mx-auto"></div>
                @endif
                <div class="mb-3 input-group">
                    <input type="file" class="form-control {{$errors->has('image_pet')?'is-invalid':''}}" name="image_pet" id="image_pet" value="{{$site=="Edit"?$pet_edit->image:''}}">
                    <label class="input-group-text" for="image_pet">Upload {{$site=="Edit"?'New':''}} Image</label>
                    @if ($errors->has('image_pet'))
                        <p class="text-danger mt-1">{{$errors->first('image_pet')}}</p>
                    @endif
                </div>
                <div class="mt-3 row">
                    <a href="" class="col-3"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Back</a>
                    <input type="reset" value="Reset" class="btn btn-outline-secondary col-2 me-4">
                    <input type="submit" value="Add product" id="add_pet" class="btn btn-primary px-3 col-3" disabled>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('admin_script')
<script>
    $(document).ready(function(){
        if($('#type_pet').val()!=null){
            $.get('index.php/admin/ajax/breed/'+$('#type_pet').val(),function(data){
                $("#breed_pet").html(data);
            })
        }
        $('#type_pet').on('change',function(e){
            let id_type =$(this).val();
            $.get('index.php/admin/ajax/breed/'+id_type,function(data){
                $("#breed_pet").html(data);
            })
        });
        $('#name_pet, #gender_pet, #age_pet,#quantity_pet,#price_pet,#status_pet').on('blur',function(e){
            e.preventDefault();
            if($('#name_pet').val()&&$('#gender_pet').val()&&$('#age_pet').val()&&$('#quantity_pet').val()&&$('#price_pet').val()&&$('#status_pet').val()){
                $('#add_pet').removeAttr('disabled');
            }else{
                $('#add_pet').attr('disabled','disabled')
            }
        })
    })

</script>
@endsection
