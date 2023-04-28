@extends('admin')
@section('content')
<div class="col-sm-7 col-md-8 mx-auto mt-4">
    <div class="row">
        <div class="mx-auto bg-light p-4 rounded-2" style="width: 95%;">
            <h2>Breed of pet</h2>
            <hr>
            @if (Session::has("message"))
            <div class="alert alert-success">{{Session::get("message")}}</div>
            @endif
            @if (Session::has("error"))
            <div class="alert alert-danger">{{Session::get("error")}}</div>
            @endif
            <table class="table">
                <th>AScsc</th>
                <tbody>
                    @foreach ($breeds as $breed)
                    <tr>
                        <td>{{$breed->id_breed}}</td>
                        <td>{{$breed->breed_name}}</td>
                        <td>{{$breed->TypeProduct->name_type}}</td>
                        <td>
                            <a href="{{route('deleteBreed',[$breed->id_breed])}}"><i class="fa-sharp fa-solid fa-trash text-danger"></i></a>
                        </td>
                        <td>
                            <a href="{{route('editbreed',[$breed->id_breed])}}"><i class="fa-sharp fa-solid fa-pen text-secondary"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
