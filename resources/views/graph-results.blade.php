@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <a class="btn btn-primary resultsButton" href="/home" role="button">Back to questions</a>
    </div>

    @for($i=1; $i <= count($chartData); $i++)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="line_top_{{ $i }}" style="width: 100%; height: 400px"></div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
    @endFor
</div>

@endsection

@section('javascript')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

        google.charts.load('current', {'packages':['line']});

        $( document ).ready(function() {
            @foreach($chartData as $chKey=>$data)
                var $title_{{ $chKey }} = '{{ $data['title'] }}';
                var $element_{{ $chKey }} = 'line_top_{{ $chKey }}';

                var $counts_{{ $chKey }} = [
                @for($i=0; $i < count($data['counts']); $i++)
                        [
                        @foreach($data['counts'][$i] as $ck => $count)
                        <?php echo  !$ck ? "'" . $count . "'" :  $count ?>,
                        @endforeach
                        ],

                    @endfor
                ];


            var $labels_{{ $chKey }} = [' <?php echo implode($data['labels'], "','") ?>'];

            google.charts.setOnLoadCallback(function () {
                drawChart($element_{{ $chKey }}, $counts_{{ $chKey }}, $labels_{{ $chKey }}, $title_{{ $chKey }});
            });

            @endforeach



            function drawChart($el, $countsArray, $labelsArray, $title) {

                var data = new google.visualization.DataTable();
                for ($i = 0; $i < $labelsArray.length; $i++) {
                    var $dataType = $i == 0 ? 'string' : 'number';
                    data.addColumn($dataType , $labelsArray[$i]);
                }

                data.addRows(
                    $countsArray
                );

                var options = {
                    chart: {
                        title: $title
                    },
                    chartArea: {left: 20, top: 0, width: '50%', height: '50%'},
//                    width: 900,
//                    height: 500,
                    axes: {
                        x: {
                            0: {side: 'bottom'}
                        }
                    },
//                    backgroundColor: '#f5f8fa',

                };

                var chart = new google.charts.Line(document.getElementById($el));

          chart.draw(data, google.charts.Line.convertOptions(options));
            }

        });
    </script>


@endsection

