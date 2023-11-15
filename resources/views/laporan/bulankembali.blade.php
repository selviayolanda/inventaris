@extends('template.main')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan bulan kembali<small>Data laporan</small></h2>
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
                   
                            
                                <div class="col-md-6">
                            <a href="{{url('/laporan/cetakbk?bulan='.Request::get('bulan'))}}" target="_blank" class="btn btn-primary key">Cetak</a> <br><br>
                            <form class="navbar-from navbar-right" role="search" action="">
                                <div class="input-group">
                                    <select class="form-control custom-select" name="bulan" tabindex="1">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
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
