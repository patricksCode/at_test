
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
        axes: {
            x: {
                0: {side: 'bottom'}
            }
        },
    };

    var chart = new google.charts.Line(document.getElementById($el));

    chart.draw(data, google.charts.Line.convertOptions(options));
}