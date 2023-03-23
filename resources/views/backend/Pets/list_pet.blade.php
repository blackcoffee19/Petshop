@extends('admin')
@section('content')
<div class="col-sm-7 col-md-8 mx-auto mt-4 bg-light overflow-x-scroll">
    <div class="row">
        <div class="mx-auto  p-4 rounded-2 ">
            <div class="row">
                <h2 class="col-3">List Pets</h2>
                <div class="col-4">
                    <select name="sortT" id="sortT" class="form-select">
                        <option {{!$sortType? "selected":""}}>Sort Type Pet</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id_type}}" class="text-capitalize" {{$sortType == $type->id_type?"selected":""}}>{{$type->name_type}}</option>
                        @endforeach
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
            <table class="table table-light overflow-x-scroll table-bordered" style="width: 90%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type Pet</th>
                        <th>Pet Name</th>
                        <th>Breed</th>
                        <th>Image</th>
                        <th></th>
                        <th>Del</th>
                        <th>Edt</th>
                        <th class="des-collapse" style="display: none">Status</th>
                        <th class="des-collapse" style="display: none">Gender</th>
                        <th class="des-collapse" style="display: none">Age</th>
                        <th class="des-collapse" style="display: none">Quantity</th>
                        <th class="des-collapse" style="display: none">Sold</th>
                        <th class="des-collapse" style="display: none">Price</th>
                        <th class="des-collapse" style="display: none">Food</th>
                        <th class="des-collapse" style="display: none">Rating</th>
                        <th class="des-collapse" style="display: none">Describe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $pet)
                    <tr>
                        <td>{{$pet->id_product}}</td>
                        <td>{{$pet->Breed->TypeProduct->name_type}}</td>
                        <td>{{$pet->product_name}}</td>
                        <td>{{$pet->Breed->breed_name}}</td>
                        <td>
                            <img src="{{asset('/../resources/image/pet/'.$pet->image)}}" alt="{{$pet->id_product}}" class="img-fluid" style="max-width: 150px;">
                        </td>
                        <td>
                            <a class="text-decoration-underline text-primary pet-colla"  data-bs-toggle="collapse" href=".collapsePet{{$pet->id_product}}" aria-expanded="false" aria-controls="collapsePet{{$pet->id_product}}">More</a>
                        </td>
                        <td>
                            <a href="{{route('deletePet',[$pet->id_product])}}"><i class="fa-sharp fa-solid fa-trash text-danger"></i></a>
                        </td>
                        <td>
                            <a href="{{route('editpet',[$pet->id_product])}}"><i class="fa-sharp fa-solid fa-pen text-secondary"></i></a>
                        </td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->status}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->gender==1?"Male":($pet->gender==2?"Female":"unknown")}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->age}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->quantity}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->sold}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->per_price}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->food}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->rating}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if (!$sortType)
            {{$pets->links()}}
            @endif
        </div>
    </div>
</div>

@endsection
@section('admin_script')
    <script>
        $(document).ready(function(){
            $('.pet-colla').click(function(e){
                e.preventDefault();
                $('.des-collapse').toggle();
            });
            $('#sortT').change(function(){
                window.location.assign(window.location.pathname+'?sortType='+$(this).val());
            })  
        })
    </script>
@endsection