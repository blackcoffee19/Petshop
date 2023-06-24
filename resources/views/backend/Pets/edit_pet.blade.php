@extends('admin')
@section('content')
{{-- <div class="col-sm-7 col-md-8 mx-auto mt-4">
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
                    <input type="submit" value="{{$site}} product" id="add_pet" class="btn btn-primary px-3 col-3" disabled>
                </div>
            </form>
        </div>
    </div>
</div> --}}
<main>
    <div class="container">
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>Add New Pet</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}" class="text-inherit">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('listpet')}}" class="text-inherit">List Pet</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{$site}} Pet
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{route('listpet')}}" class="btn btn-light">Back to List Pet</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card p-6 card-lg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>{{$site}} Pet</span></h2>
                                    </div>
                                    <div class="card-body">
                                        @if($errors->any())
                                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                                        @endif

                                        <form method="POST"action="{{$site == "Add" ? route('addpet'):route('editpet',[$pet_edit->id_product])}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mt-3 row form-group">
                                                <label for="type_pet" class="col-md-4 col-form-label text-md-right" >Type of Pet <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <select class="form-select text-capitalize {{$errors->has('breed_pet')?'is-invalid':''}}" name="type_pet" id="type_pet">
                                                        <option>Choose one type</option>
                                                        @foreach ($types as $type)
                                                            <option value="{{$type->id_type}}" {{$site == "Edit"? ($pet_edit->Breed->TypeProduct->id_type == $type->id_type ? 'selected' : ''):'' }}>{{$type->name_type}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('breed_pet'))
                                                        <p class="text-danger mt-1">{{$errors->first('breed_pet')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="breed_pet" class="col-md-4 col-form-label text-md-right">Breed <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <select name="breed_pet" id="breed_pet" class="form-select text-capitalize {{$errors->has('breed_pet')?'is-invalid':''}}">
                                                    </select>
                                                    @if ($errors->has('breed_pet'))
                                                    <p class="text-danger mt-1">{{$errors->first('breed_pet')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">Name Pet <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input class="form-control {{$errors->has('name_pet')?'is-invalid':''}}" type="text" name="name_pet" id="name_pet" value="{{$site == "Edit" ? $pet_edit->product_name:''}}">
                                                    <span id="check_name"></span>
                                                    @if ($errors->has('name_pet'))
                                                        <p class="text-danger mt-1">{{$errors->first('name_pet')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mt-3 form-group row">
                                                <div class="col-md-3 form-floating">
                                                    <select name="gender_pet" id="gender_pet" class="form-select">
                                                        <option value="1" {{$site=="Edit"?($pet_edit->gender == 1 ? 'selected':''):'selected'}}>Male</option>
                                                        <option value="2" {{$site=="Edit"?($pet_edit->gender == 2 ? 'selected':''):''}}>Female</option>
                                                        <option value="3" {{$site=="Edit"?($pet_edit->gender == 3 ? 'selected':''):''}}>Unknow</option>
                                                    </select>
                                                    <label for="gender_pet" class="col-md-4">Gender<span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-3 mx-auto form-floating">
                                                    <input class="form-control {{$errors->has('age_pet')? 'is-invalid':''}}" type="text" name="age_pet" id="age_pet" value="{{$site == "Edit"? $pet_edit->age : ''}}">
                                                    <label for="age_pet" class="ms-2">Age <span class="text-danger">*</span></label>
                                                    @if ($errors->has('age_pet'))
                                                        <p class="text-danger mt-1">{{$errors->first('age_pet')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mt-3 form-group row">
                                                <div class="col-md-3 form-floating">
                                                    <input class="form-control" type="text" name="status_pet" id="status_pet" value="{{$site=="Edit"?$pet_edit->status:''}}">
                                                    <label for="status_pet" class="ms-2">Status</label>
                                                </div>
                                                <div class="col-md-3 mx-auto form-floating">
                                                    <input class="form-control" type="text" name="food_pet" id="food_pet" value="{{$site=="Edit"?$pet_edit->food:''}}">
                                                    <label for="food_pet" class="ms-2">Food</label>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="describe" class="col-md-4 col-form-label text-md-right">Description</label>
                                                <div class="col-md-6">
                                                    <textarea id="describe" class="form-control @error('description') is-invalid @enderror" name="describe">{{$site == "Edit"? $pet_edit->description:''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="quantity_pet" class="col-md-4 col-form-label text-md-right">Quantity <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input id="quantity_pet" type="text" class="form-control {{$errors->has('quantity_pet')? 'is-invalid':''}}" name="quantity_pet" value="{{$site=="Edit"?$pet_edit->quantity:''}}" required>
                                                    @if ($errors->has('quantity_pet'))
                                                        <p class="text-danger mt-1">{{$errors->first('quantity_pet')}}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label for="original_price" class="col-md-4 col-form-label text-md-right">Original Price <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input id="original_price" type="text" class="form-control {{$errors->has('original_price')? 'is-invalid':''}}" name="original_price" value="{{$site=="Edit"?$pet_edit->original_price:0}}" required>
                                                    @if ($errors->has('original_price'))
                                                        <p class="text-danger mt-1">{{$errors->first('original_price')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="price_pet" class="col-md-4 col-form-label text-md-right">Display Price <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input id="price_pet" type="text" class="form-control {{$errors->has('price_pet')?'is-invalid':''}}" name="price_pet" value="{{$site=="Edit"?$pet_edit->per_price:0}}" required>
                                                    @if ($errors->has('price_pet'))
                                                        <p class="text-danger mt-1">{{$errors->first('price_pet')}}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label for="sale_pet" class="col-md-4 col-form-label text-md-right">Sale <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input id="sale_pet" type="text" class="form-control {{$errors->has('sale_pet')?'is-invalid':''}}" name="sale_pet" value="{{$site=="Edit"?$pet_edit->sale:0}}" required>
                                                    @if ($errors->has('sale_pett'))
                                                        <p class="text-danger mt-1">{{$errors->first('sale_pet')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group mt-5 row">
                                                <label for="photos" class="col-form-label col-12 mb-3">Images</label>
                                                @php
                                                    $count = $site=="Edit"?count($pet_edit->Library):0;
                                                @endphp
                                                @for ($i = 0; $i < $count; $i++)
                                                <div class="col-3 d-flex flex-column">
                                                    <input type="file" class="image_review mb-3 form-control"  name="photos[]" >
                                                    <div></div>
                                                    <div class="position-relative">
                                                        <img src="{{ asset('resources/image/pet/' . $pet_edit->Library[$i]->image) }}" alt="" style="max-width:100px; height:auto;" class="m-3">
                                                        <div class="position-absolute top-0 start-0 translate-middle ">
                                                            <input type="checkbox" class="btn-check" id="btn-check-{{$i}}" name="remove_image[]" autocomplete="off" value="{{$i}}">
                                                            <label for="btn-check-{{$i}}"><i class="bi bi-x-circle text-danger fs-5"></i></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endfor
                                                @for ($i = 0; $i < 4-$count; $i++)
                                                <div class="col-3 d-flex flex-column">
                                                    <input type="file" class="image_review mb-3 form-control"name="photos[]" >
                                                    <div></div>
                                                </div>
                                                @endfor
                                            </div>
                                            <div class="form-group row mt-3 mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
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
        });
        $('.image_review').change(function(){
            let preview = $(this).next();
            preview.empty();
            var files = $(this)[0].files;
            var promises = [];
            // console.log(preview);
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();
                promises.push(new Promise(function(resolve, reject) {
                    reader.onload = function(event) {
                        var img = $('<img>').attr('src', event.target.result).attr('style',
                            'width:100px;');
                        preview.append(img);
                        resolve();
                    };
                    reader.onerror = function(event) {
                        reject(event.target.error);
                    };
                    reader.readAsDataURL(file);
                }));
            }

            Promise.all(promises).then(function() {
                console.log('All images loaded');
            }).catch(function(error) {
                console.log(error);
            });
        });
    })

</script>
@endsection
