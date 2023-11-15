@extends('template.main')
@section('title','Tambah data jenis')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="x_content">
            <form class="form-horizontal" method="POST" action="{{url('/jenis/store')}}">
            	{{csrf_field( )}}
                <span class="section">Tambah data jenis</span>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama jenis<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" id="" name="nama_jenis" placeholder="namamu" required="required" />
                    </div>
                </div>                                       
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kode jenis<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="kode_jenis" required='required' /></div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Keterangan<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="keterangan" required='required' /></div>
                </div>
                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <button type='submit' class="btn btn-primary">Submit</button>
                            <button type='reset' class="btn btn-success">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>

@endsection