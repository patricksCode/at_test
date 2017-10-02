@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <a class="btn btn-primary resultsButton" href="/home" role="button">Back to questions</a>
    </div>

    @foreach($chartData as $id)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" >
                    <div class="panel-body" style="overflow-x: hidden;">
                        <div id="line_top_{{ $id }}" style="width: 100%; height: 400px"></div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
    @endForeach
</div>

@endsection

@section('javascript')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript" src="{{ url('/js/chart_js_functions.js') }}"></script>

    <script type="text/javascript" src="{{ url('/js/chart-config.js') }}"></script>

@endsection

