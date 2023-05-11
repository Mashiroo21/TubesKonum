{{-- @extends('index')
@section('content')
<div class="container" style="">
    <h1>Prediksi Harga Barang</h1>

    <form method="GET" action="prediksi/hari">
        @csrf
        <label for="hari">Jumlah Hari :</label>
        <input type="number" name="hari" id="hari" min="1" required>
        @error('hari')
            <div>{{ $message }}</div>
        @enderror
        <br><br>
        <button type="submit">Prediksi</button>
    </form>
</div>


@if (isset($predictions))
<script src="{{ asset('chart.js/chart.js') }}"></script>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
    const predictions = @json($predictions);

    const labels = predictions.map(prediction => prediction[0]);
    const data = predictions.map(prediction => prediction[1]);

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Prediksi Harga',
                data: data,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {}
    });
</script>
@endif
@endsection --}}


<html>
<head>
    <title>Prediksi Harga Barang</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    
    <h1>Prediksi Harga Barang</h1>

    <form method="get" action="prediksi/hari">
        @csrf 
        <label for="hari">Jumlah Hari :</label>
        <input type="number" name="hari" id="hari" min="1" required>
        @error('hari')
            <div>{{ $message }}</div>
        @enderror
        <br><br>
        <button type="submit">Prediksi</button>
    </form>

    <a href="{{route('Home')}}">Kembali</a>

    @if (isset($predictions))
        <script src="{{ asset('chart.js/chart.js') }}"></script>
        <canvas id="myChart" width="400" height="400"></canvas>
        <script>
            const predictions = @json($predictions);

            const labels = predictions.map(prediction => prediction[0]);
            const data = predictions.map(prediction => prediction[1]);

            const ctx = document.getElementById('myChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Prediksi Harga',
                        data: data,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {}
            });
        </script>
    @endif
</body>
</html>
