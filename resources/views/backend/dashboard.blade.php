@extends('admin')
@section('content')
    <div class="col-sm-7 col-md-8 mx-auto mt-4">
        <div class="row">
            <h1 class="col-12 my-3">Dashboard</h1>
            <div class="col-12 d-flex my-3 flex-row justify-content-between" style="height: fit-content;">
                <div class="row bg-light rounded-2 shadow db-1 p-2">
                    <i class="fa-sharp fa-solid fa-eye rounded col-2 d-flex flex-column justify-content-center align-items-center" style="background-color: #9493FE;height: 30px;width: 30px;"></i>
                    <div class="col-7 db-2" >
                        <p class="text-black-50">Views</p>
                        <p>112.000</p>
                    </div>
                </div>
                <div class="row bg-light rounded-2 shadow db-1 p-2">
                    <i class="fa-sharp fa-solid fa-user rounded col-2 d-flex flex-column justify-content-center align-items-center" style="background-color: #54C6E8;height: 30px;width: 30px;"></i>
                    <div class="col-7 db-2">
                        <p class="text-black-50">Users</p>
                        <p>10.000</p>
                    </div>
                </div>
                <div class="row bg-light rounded-2 shadow db-1 p-2">
                    <i class="fa-sharp fa-solid fa-users rounded col-2 d-flex flex-column justify-content-center align-items-center" style="background-color: #5BD8B2;height: 30px;width: 30px;"></i>
                    <div class="col-7 db-2">
                        <p class="text-black-50">Following</p>
                        <p>12.000</p>
                    </div>
                </div>
                <div class="row bg-light rounded-2 shadow db-1 p-2">
                    <i class="fa-sharp fa-solid fa-bookmark rounded col-2 d-flex flex-column justify-content-center align-items-center" style="background-color: #FE7975;height: 30px;width: 30px;"></i>
                    <div class="col-7 db-2">
                        <p class="text-black-50">Saved</p>
                        <p>112</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3 bg-light rounded-2 py-3 px-2">
            <h5>Profile Visit</h5>
            <div class="w-100" id="chart" style="height: 300px;">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-4 bg-light p-1 rounded-2">
                <p class="fs-5 ms-4 mt-2">New Oders</p>
                <hr>
                @foreach ($orders as $order)
                <div class="mx-4">
                    <a href="{{route('editorder',[$order->id_order])}}" class="text-black">Order #{{$order->order_code}}</a>
                    <p class="text-black-50">Customer: <a href="">{{$order->cus_name}}</a></p>
                    <span style="display: none">{{$sum =0}}</span>
                    @foreach ($order->Cart as $cart)
                    <span style="display: none">{{$sum +=$cart->qty * $cart->Product->per_price}}</span>
                    @endforeach
                    <p class="text-end">Bill total: <span style="font-weight: 700">${{$sum}}</span></p>
                </div>  
                <hr>
                @endforeach
                <a href="{{route('listorder')}}">View All >></a>
            </div>
            <div class="col-7 mx-auto bg-light p-1 rounded-2">
                <p class="fs-5 ms-4 mt-2">Latest Comments</p>
                <hr>
                <table class="table mx-auto" style="width: 90%;">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $cmt)
                        <tr style="height: 60px;">
                            <td class="w-25">
                                {{$cmt->User->name}}
                            </td class="w-75">
                            <td>{{$cmt->context}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('admin_script')
<script>
    anychart.onDocumentReady(function() {

      // set the data
      let data = [
        ["Jan",5],
        ["Feb",15],
        ["Mar",20],
        ["Apr",10],
        ["May",6],
        ["Jul",30],
        ["Aug",18],
        ["Sep",4],
        ["Oct",23],
        ["Nov",22],
        ["Dec",13]
      ];
      //create a chart
      let chart = anychart.column();
      //create a column series
      let series = chart.column(data);
      //set the padding between column groups
      chart.barGroupsPadding(0);
      //set the container id
      chart.container("chart");
      //initiate drawing the chart
      chart.draw();
    });
  </script>

@endsection