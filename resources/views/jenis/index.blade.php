@extends('template.main')
@section('title','Data jenis')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Jenis <small></small></h2>
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
                          <th>NO</th>
                          <th>Id jenis</th>
                          <th>Nama jenis</th>
                          <th>Kode jenis</th>
                          <th>Keterangan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach ($jenis as $data)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$data->id_jenis}}</td>
                          <td>{{$data->nama_jenis}}</td>
                          <td>{{$data->kode_jenis}}</td>
                          <td>{{$data->keterangan}}</td>
                          <td class="color-primary">
                          	<a href="{{url('/jenis/edit/'.$data->id_jenis)}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil"></i>Edit</a>
                        	<a href="{{url('jenis/destroy/'.$data->id_jenis)}}" onclick="return confirm('Apakah anda akan menghapus data ini?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>Hapus</a>
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