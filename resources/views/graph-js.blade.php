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
});