@extends('template.main')
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
	                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                                <h4>Data peminjaman </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Inventaris</th>
                                                <th>Jumlah</th>
                                                <th>Peminjaman</th>
                                                <th>Kondisi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($peminjaman as $data)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$data->inventaris->nama}}</td>
                                                <td>{{$data->jumlah}}</td>
                                                <td>{{$data->peminjaman->kode_peminjaman}}</td>
                                                <td>{{$data->kondisi}}</td>
                                                <td>{{$data->status}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
    </div>
</div>
@endsection