@extends('index')
@section('content')
    <div class="container" style="">
        <div class="row ">
            <div class="col-12" style="text-align: center; font-family: 'Futura Md Bt'; color: black;">
                <b style="font-size: 40px;">Selamat Datang!</b><br>
                <p style="font-size: 20px">Komputasi Numerik - Regresi Kuadratik <br>
                Prediksi harga Kebutuhan pangan</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align: center;">
                <a class="btn btn-warning" style="width: 100px" href="{{route('Barang')}}">Buka List</a>
                <a class="btn btn-success" style="width: 100px">Prediksi</a>
            </div>
        </div>
    </div>
@endsection