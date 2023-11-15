@extends('template.main')
@section('content')

<div class="container-fluid">
	<div class="row">
        <div class="x_content"></div>
		      <div class="col-lg-12">
                            <div class="card-header bg-purple">
                                <h4 class="m-b-0 text-blue">Isi data inventaris</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{url('/inventaris/store')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="card-body">
                                     <hr>

                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">kode inventaris</label>
                                                        <input type="text" class="form-control" name="id" id="id" class="form-control" value="{{$nomat}}" disabled>
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Nama</label>
                                                    <input type="text" class="form-control" name="nama" id="nama">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Kondisi</label>
                                                    <select class="form-control btn btn-outline-primary w-100" id="kondisi" name="kondisi">
                                                        <option>--pilih--</option>
                                                            <option >Baik</option>
                                                            <option>Tidak baik</option>
                                                            <option >Sedang diperbaiki</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                           
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Keterangan</label>
                                                    <input type="text" class="form-control" name="keterangan" id="keterangan" name="keterangan" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label>Jumlah</label>
                                                    <input type="text" class="form-control" name="jumlah" id="jumlah" name="jumlah">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Jenis</label>
                                                     <select class="form-control btn btn-outline-primary w-100" id="id_jenis" name="id_jenis">
                                                        <option>--pilih--</option>
                                                            @foreach ($jenis as $data)
                                                                <option value="{{$data->id_jenis}}">{{$data->nama_jenis}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Tanggal registrasi</label>
                                                    <input type="text" class="form-control" name="tanggal_registrasi" id="tanggal_registrasi" value="{{date('d-m-Y')}}" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Ruang</label>
                                                    <select class="form-control btn btn-outline-primary w-100" id="id_ruang" name="id_ruang">
                                                        <option>--pilih--</option>
                                                            @foreach ($ruang as $data)
                                                                <option value="{{$data->id_ruang}}">{{$data->nama_ruang}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                           
                                            <!--/span-->
                                        </div>
                                        
                                    </div>
                                    <div class="ln_solid">
                    
                        <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-primary">Cancel</button>
                                    </div>

                </div>
                                </form>
                            </div>
                        </div>
	</div>
</div>

@endsection
