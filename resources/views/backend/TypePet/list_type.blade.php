@extends('admin')
@section('content')
<main>
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- pageheader -->
                        <div>
                            <h2>Categories</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Type Products</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ Route('addtype') }}" class="btn btn-primary">Add New Type</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-xl-12 col-12 mb-5">
                    <div class="card h-100 card-lg">
                        <div class="card-body p-0">
                            @if (Session::has("message"))
                                <div class="alert alert-success">{{Session::get("message")}}</div>
                            @endif
                            @if (Session::has("error"))
                                <div class="alert alert-danger">{{Session::get("error")}}</div>
                            @endif
                            <div class="table-responsive ">
                                <table
                                    class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                                    <thead class="bg-light">
                                        <tr>
                                            <th style="width: 20%">No.</th>
                                            <th style="width: 30%">Name</th>
                                            <th>Amount of Breeds</th>
                                            <th>Amount of Pets</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product-table">
                                        @foreach ($types as $type)
                                        <tr>
                                            <td>{{$type->id_type}}</td>
                                            <td>{{$type->name_type}}</td>
                                            <td>{{count($type->Breed)}}</td>
                                            <td>
                                                @php
                                                $num = 0;
                                                    foreach ($type->Breed as $breed) {
                                                        $num += count($breed->Product);
                                                    }
                                                    echo $num;
                                                @endphp
                                            </td>
                                            <td>
                                                <a href="{{route('deleteType',[$type->id_type])}}"><i class="fa-sharp fa-solid fa-trash text-danger"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('edittype',[$type->id_type])}}"><i class="fa-sharp fa-solid fa-pen text-secondary"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
