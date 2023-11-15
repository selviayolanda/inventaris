@extends('template.main')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="x_content">
            <form class="form-horizontal" method="POST" action="{{url('ruang/update/'.$ruang->id_ruang)}}">
                {{csrf_field( )}}
                <span class="section">Edit data ruang</span>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama ruang<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" id="" name="nama_ruang" value="{{$ruang->nama_ruang}}" placeholder="namamu" required="required" />
                    </div>
                </div>                                       
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kode ruang<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="kode_ruang" value="{{$ruang->kode_ruang}}" required='required' /></div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Keterangan<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="keterangan" value="{{$ruang->keterangan}}" required='required' /></div>
                </div>
                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <button type='submit' class="btn btn-primary">Edit</button>
                            <button type='reset' class="btn btn-success">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection