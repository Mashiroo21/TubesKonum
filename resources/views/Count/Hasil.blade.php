@extends('index')
@section('content')
<div class="container" style="">
    <h1>Hasil Prediksi</h1>
    <canvas id="chart"></canvas>
</div>
<script>
    var predictions = @json($predictions);

    var labels = [];
    var data = [];

    for (var i = 0; i < predictions.length; i++) {
        labels.push(predictions[i][0]);
        data.push(predictions[i][1]);
    }

    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Prediksi Harga',
                data: data,
                borderColor: 'blue',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection