@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
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