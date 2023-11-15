@extends('template.main')
@section('title','Data inventaris')
@section('content')

  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-12 col-sm-12  ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Data inventaris<small></small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Settings 1</a>
                              <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode inventaris</th>
                          <th>Tanggal pinjam</th>
                          <th>Tanggal kembali</th>
                          <th>Nama pegawai</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach ($peminjaman as $data)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$data->kode_peminjaman}}</td>
                          <td>{{$data->tanggal_pinjam}}</td>
                          <td>{{$data->tanggal_kembali}}</td>
                          <td>{{$data->pegawai->nama_pegawai}}</td>
                          <td class="color-primary">
                              <a href="{{url('/peminjaman/show/'.$data->id_peminjaman)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Detail</a>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

	</div>
</div>

@endsection