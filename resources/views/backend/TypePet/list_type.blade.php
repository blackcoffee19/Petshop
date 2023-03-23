@extends('admin')
@section('content')
<div class="col-sm-7 col-md-8 mx-auto mt-4 bg-light overflow-x-auto">
    <div class="row">
        <div class="mx-auto  p-4 rounded-2" >
            <h2>Types of pet</h2>
            <hr>
            @if (Session::has("message"))
            <div class="alert alert-success">{{Session::get("message")}}</div>
            @endif
            @if (Session::has("error"))
            <div class="alert alert-danger">{{Session::get("error")}}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name Type</th>
                        <th>Del</th>
                        <th>Edt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <td>{{$type->id_type}}</td>
                        <td>{{$type->name_type}}</td>
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
@endsection
