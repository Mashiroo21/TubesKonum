@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12" style="text-align: center; font-family: 'Futura Md Bt'; color: black;">
                <b style="font-size:25px">List Harga Berdasarkan Tanggal</b>
            </div>
        </div>

        <div class="row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBarangTambah"> 
                Tambah Data Barang
            </button>
        
            <p>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td align="center">No</td>
                        <td align="center">Barang</td>
                        <td align="center">Tanggal</td>
                        <td align="center">Harga</td>
                </thead>
        
                <tbody>
                    @foreach ($barang as $index=>$hb)
                        <tr>
                            <td align="center" scope="row">{{ $index + $barang->firstItem() }}</td>
                            <td>{{$hb->Nama_Barang}}</td>
                            <td>{{$hb->tanggal}}</td>
                            <td>{{$hb->harga}}</td>
                            <td align="center">
                                
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalBarangEdit{{$hb->id_barang}}"> 
                                    Edit
                                </button>
                                 <!-- Awal Modal EDIT data Barang -->
                                <div class="modal fade" id="modalBarangEdit{{$hb->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="modalBarangEditLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalBarangEditLabel">Form Edit Data Barang</h5>
                                            </div>
                                            <div class="modal-body">
        
                                                <form name="formBarangedit" id="formBarangedit" action="/barang/edit/{{ $hb->id_barang}} " method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                    <div class="form-group row">
                                                        <label for="id_barang" class="col-sm-4 col-form-label">Barang</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="Nama_Barang" name="Nama_Barang" placeholder="Masukan Nama Barang" value="{{ $hb->Nama_Barang}}">
                                                        </div>
                                                    </div>
        
                                                    <p>
                                                    <div class="form-group row">
                                                        <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="Tanggal" name="Tanggal" value="{{ $hb->tanggal}}">
                                                        </div>
                                                    </div>
        
                                                    <p>
                                                    <div class="form-group row">
                                                        <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" class="form-control" id="Harga" name="Harga" value="{{ $hb->harga}}">
                                                        </div>
                                                    </div>
                                                    
                                                    <p>
                                                    <div class="modal-footer">
                                                        <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="Barangtambah" class="btn btn-success">Edit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal EDIT data Barang -->
                                |
                                <a href="barang/hapus/{{$hb->id_barang}}" onclick="return confirm('Yakin mau dihapus?')">
                                    <button class="btn-danger">
                                        Delete
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

             <!--awal pagination-->
            Halaman : {{ $barang->currentPage() }} <br />
            Jumlah Data : {{ $barang->total() }} <br />
            Data Per Halaman : {{ $barang->perPage() }} <br />

            {{ $barang->links() }}
            <!--akhir pagination-->

            <!-- Awal Modal tambah data Barang -->
            <div class="modal fade" id="modalBarangTambah" tabindex="-1" role="dialog" aria-labelledby="modalBarangTambahLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalBarangTambahLabel">Form Input Data Barang</h5>
                        </div>
                        <div class="modal-body">
                            <form name="formBarangtambah" id="formBarangtambah" action="/barang/tambah " method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="id_Barang" class="col-sm-4 col-form-label">Nama Barang</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="Nama_Barang" name="Nama_Barang" placeholder="Masukan Nama Barang">
                                    </div>
                                </div>

                                <p>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="Tanggal" name="Tanggal" placeholder="Masukan tanggal">
                                    </div>
                                </div>

                                <p>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="Harga" name="Harga" placeholder="Masukan harga">
                                    </div>
                                </div>

                                <p>
                                <div class="modal-footer">
                                    <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" name="barangtambah" class="btn btn-success">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal tambah data Barang -->
        </div>
    </div>
@endsection