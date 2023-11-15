@extends('template.main')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Entri data pengembalian<small>Data pengembalian</small></h2>
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
                    <h2>Pengembalian</h2>
                            <div class="col-md-6">
                                <form class="navbar-from navbar-right" role="search" action="{{url('pengembalian')}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{Request::get('q')}}" placeholder=" Cari berdasarkan nip dan nama pegawai " name="q" id="srch-term">
                                        <div class="input-group-btn">
                                            <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>NIP</th>
                                                <th>Nama pegawai</th>
                                                <th>Kode peminjaman</th>
                                                <th>Nama barang</th>
                                                <th>Tanggal pinjam</th>
                                                <th>Tanggal kembali</th>
                                                <th>Kondisi </th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="add-row">
                                             @if(isset($data))
                                             @foreach ($data as $j => $row)
                                            <tr>
                                                <th scope="row">{{$row->nip}}</th>
                                                <td>{{$row->nama_pegawai}}</td>
                                                <td>{{$row->kode_peminjaman}}</td>
                                                <td>{{$row->nama}}</td>
                                                <td>{{$row->tanggal_pinjam}}</td>
                                                <td>{{$row->tanggal_kembali}}</td>
                                                <td>{{$row->kondisi}}</td>
                                                <td>
                                                    <a href="javascript:void(0)" onclick="ShowModal('{{$row->id_detail_pinjam}}')" class="btn btn-info btn-warning btn-sm" data-id="{{$row->id_detail_pinjam}}">Kembalikan</a>
                                                </td>
                                            </tr>
                                           @endforeach
                                           @else
                                           <tr>
                                               <td colspan="6" class="text-center">Belum ada yang dicari</td>
                                           </tr>
                                           @endif
                                        </tbody>
                                    </table>
                                </div>
                                <button id="show-modal" data-toggle="modal" data-target="#form-modalsimpan" style="display: none;"></button>

                                <div id="form-modalsimpan" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                      </div>
                                      <form class="form-horizontal" action="{{url('kembalikan')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_detail" id="id_detail">
                                        <div class="model-body">
                                          <div class="model-group">
                                            <label class="col-md-3 control-label">Kondisi</label>
                                            <div class="col-md-9">
                                              <select class="form-control custom-select" name="kondisi">
                                                 <option value="Baik">Baik</option>
                                                 <option value="Rusak">Rusak</option>
                                                 <option value="Sedang diperbaiki">Sudah diperbaiki</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn-btn-primary" id="btn-simpan">Simpan</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                  </div>

    </div>
</div>
@endsection
@push('bottom')
<script type="text/javascript">
  function TambahRow(){
    val = $('#nama_barang').val()
    if (val=='') {
      alert('data kosong')
    }else{
      i = 1;
        elem = '<tr>'+
                '<td>'+i+'<input type="hidden" name ="dt_id_inventaris[]" id="dt_id_inventaris" value="'+$('#id_inventaris').val()+'"></td>'+'<td>'+$('#nama_barang').val()+'<input type="hidden" name="dt_jumlah_pinjam[]" id="dt_jumlah_pinjam" value="1"></td>'+'<td>'+$('#jumlah').val()+'</td>'+'<td>'+$('#jumlah').val()+'</td>'+
                '<td>1</td>'+
                '<td>'+
                  '<a href="javascript:void(0)" onclick="Delete(this)" class="btn btn-danger btn-sm>Hapus</a>'+
                  '</td>'+
                '</tr>'
      $('#add-row').append(elem)
      Clear()
      i=i+1;
    }
  }
  function ShowModal(id){
    $('#show-modal').click()
    $('#id_detail').val(id)
  }
</script>
@endpush