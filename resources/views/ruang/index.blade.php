@extends('template.main')
@section('title','Data ruang')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data ruang <small></small></h2>
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
                          <th>Id ruang</th>
                          <th>Nama ruang</th>
                          <th>Kode ruang</th>
                          <th>Keterangan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach ($ruang as $data)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$data->id_ruang}}</td>
                          <td>{{$data->nama_ruang}}</td>
                          <td>{{$data->kode_ruang}}</td>
                          <td>{{$data->keterangan}}</td>
                          <td class="color-primary">
                          	<a href="{{url('/ruang/edit/'.$data->id_ruang)}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil"></i>Edit</a>
                        	<a href="{{url('ruang/destroy/'.$data->id_ruang)}}" onclick="return confirm('Apakah anda akan menghapus data ini?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>Hapus</a>
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