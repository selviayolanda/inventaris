@extends('template.main')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan harian kembali<small>Data laporan</small></h2>
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
                    
                            <a href="{{url('/laporan/cetakhk?tanggal1='.Request::get('tanggal1').'&tanggal2='.Request::get('tanggal2'))}}" target="_blank" class="btn btn-primary key">Cetak</a> <br><br>
                            <form class="navbar-from navbar-right" role="search" action="{{url('harikembali')}}">
                                <div class="input-group">
                                    <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Hari tanggal</label>
                                        <input type="date" name="tanggal1" class="form-control">
                                    </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>ke tanggal</label>
                                            <input type="date" name="tanggal2" class="form-control">
                                        </div>
                                    </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label></label>
                                                <button style="margin-top: 7px" class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama pegawai</th>
                                                <th>Kode peminjaman</th>
                                                <th>Nama</th>
                                                <th>Tanggal pinjam</th>
                                                <th>Tanggal kembali</th>
                                                <th>Kondisi </th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $in =>$peminjaman)
                                            <tr>
                                                <th>{{ $in+1}}</th>
                                                <th>{{ $peminjaman->nip}}</th>
                                                <td>{{ $peminjaman->nama_pegawai}}</td>
                                                <td>{{ $peminjaman->kode_peminjaman}}</td>
                                                <td>{{ $peminjaman->nama}}</td>
                                                <td>{{ $peminjaman->tanggal_pinjam}}</td>
                                                <td>{{ $peminjaman->tanggal_kembali}}</td>
                                                <td>{{ $peminjaman->kondisi}}</td>
                                                <td>{{ $peminjaman->status}}</td>
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
</div>
@endsection
