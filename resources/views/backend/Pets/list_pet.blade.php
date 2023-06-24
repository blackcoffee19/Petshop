@extends('admin')
@section('content')
{{-- <div class="col-sm-7 col-md-8 mx-auto mt-4 bg-light overflow-x-scroll">
    <div class="row">
        <div class="mx-auto  p-4 rounded-2 ">
            <div class="row">
                <h2 class="col-3">List Pets</h2>
                <div class="col-4">
                    <select name="sortT" id="sortT" class="form-select">
                        <option {{!$sortType? "selected":""}} value="0">Sort Type Pet</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id_type}}" class="text-capitalize" {{$sortType == $type->id_type?"selected":""}}>{{$type->name_type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3 mx-auto ">
                    <div class="input-group">
                        <input type="search" name="seachPet" id="seachPet" class="form-control" value="{{isset($search)?$search:''}}">
                        <label for="seachPet"class="input-group-text"><i class="fa-solid fa-magnifying-glass fa-lg"></i>
                        </label>
                    </div>
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
                        <th class="des-collapse" style="display: none">Rating</th>
                        <th class="des-collapse" style="display: none">Sold</th>
                        <th class="des-collapse" style="display: none">Price</th>
                        <th class="des-collapse" style="display: none">Food</th>
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
                        @php
                            $rating = 0;
                            if (count($pet->Comment->where('rating','!=',null)) >0) {
                              foreach ($pet->Comment->where('rating','!=',null) as $cmt) {
                                $rating += $cmt->rating;
                              }
                              $rating /= count($pet->Comment->where('rating','!=',null));
                            }
                        @endphp
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$rating}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{count($pet->Comment->where('rating','!=',null))}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->per_price}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->food}}</td>
                        <td class="collapse collapsePet{{$pet->id_product}}">{{$pet->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$pets->links('pagination.custom')}}
        </div>
    </div>
</div> --}}
<main>
    <div class="container">
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>Products</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pets</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ Route('addpet') }}" class="btn btn-primary">Add Pet</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-12 col-12 mb-5">
                <div class="card h-100 card-lg">
                    <div class="px-6 py-6 ">
                        <div class="row justify-content-between">
                            <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0 ">
                                <div class="input-group">
                                    <input type="search" name="seachPet" id="seachPet" class="form-control" value="{{isset($search)?$search:''}}">
                                    <label for="seachPet"class="input-group-text"><i class="fa-solid fa-magnifying-glass fa-lg"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-2 col-12">
                                <select name="sortT" id="sortT" class="form-select">
                                    <option {{isset($sortType) ? (!$sortType? "selected":""):"selected"}} value="0">Sort Type Pet</option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id_type}}" class="text-capitalize" {{isset($sortType)? ($sortType == $type->id_type?"selected":""):""}}>{{$type->name_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 col-12">
                                <form action="{{route("sortPet")}}" method="get">
                                <select class="form-select" name="sortS" onchange="this.form.submit()">
                                    <option value="dateL" {{isset($sort)? ($sort == "dateL"? "selected": ""): "selected"}}>Latest Update</option>
                                    <option value="dateO" {{isset($sort)? ($sort == "dateO"? "selected": ""): ""}}>Oldest Update</option>
                                    <option value="descP" {{isset($sort)? ($sort == "descP"? "selected": ""): ""}}>Desc Price</option>
                                    <option value="ascP" {{isset($sort)? ($sort == "ascP"? "selected": ""): ""}}>Asc Price</option>
                                    <option value="descR" {{isset($sort)? ($sort == "descR"? "selected": ""): ""}}>Desc Rating</option>
                                    <option value="ascR" {{isset($sort)? ($sort == "ascR"? "selected": ""): ""}}>Asc Rating</option>
                                </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if (Session::has("message"))
                        <div class="alert alert-success">{{Session::get("message")}}</div>
                        @endif
                        @if (Session::has("error"))
                        <div class="alert alert-danger">{{Session::get("error")}}</div>
                        @endif
                        <div class="table-responsive">
                            <table
                                class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                <thead class="bg-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Proudct Name</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Rating</th>
                                        <th>Create at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pets as $item)
                                        <tr>
                                            <td>{{ $item->id_product }}</td>
                                            <td>
                                                @foreach ($item->Library as $library)
                                                    <img src="{{ asset('resources/image/pet/'.$library->image) }}" alt="" style="width:50px; height:auto;">
                                                @endforeach
                                            </td>
                                            <td>{{ $item->product_name }}
                                            </td>
                                            <td>
                                                {{ $item->Breed->breed_name }}
                                            </td>
                                            <td>
                                                @if ($item->active == '1')
                                                    <span class="btn bg-light-primary text-dark-primary">Active</span>
                                                @else
                                                    <span class="btn bg-light-danger text-dark-danger">Deactivate</span>
                                                @endif
                                            </td>
                                            <td>${{ number_format($item->per_price, 2,'.',' ') }}</td>
                                            <td>{{ number_format($item->quantity, 0) }}</td>
                                            @php
                                                $rating = 0;
                                                if (count($item->Comment->where('rating','!=',null)) >0) {
                                                foreach ($item->Comment->where('rating','!=',null) as $cmt) {
                                                    $rating += $cmt->rating;
                                                }
                                                $rating /= count($item->Comment->where('rating','!=',null));
                                                }
                                            @endphp
                                            <td>
                                                @for ($i = 0; $i < floor($rating); $i++)
                                                <i class="bi bi-star-fill text-warning"></i>
                                                @endfor
                                                @if (is_float($rating))
                                                <i class="bi bi-star-half fs-4 text-warning"></i>
                                                @endif
                                                @for ($i = 0; $i < 5-ceil($rating); $i++)
                                                <i class="bi bi-star text-warning"></i>
                                                @endfor
                                                {{number_format($rating,1,'.')}}
                                            </td>
                                            <td>{{ date_format(date_create($item->created_at), 'j/m/Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href=""><i class="bi bi-eye me-3 "></i>Detail</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{route('editpet',[$item->id_product])}}">
                                                                <i class="bi bi-pencil-square me-3 "></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{route('deletePet',[$item->id_product])}}">
                                                                <i class="fa-sharp fa-solid fa-trash text-danger me-3"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="p-5">
                            {{isset($no_pagi) ? "":$pets->links('pagination.custom_pagi')}}
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
            $('.pet-colla').click(function(e){
                e.preventDefault();
                $('.des-collapse').toggle();
            });
            $('#sortT').change(function(){
                window.location.assign(window.location.origin+'/index.php/admin/pets/list/'+$(this).val());
            });
            $('#seachPet').change(function(){
                window.location.assign(window.location.origin+'/index.php/admin/pets/search?q='+$(this).val());
            })  
        })
    </script>
@endsection