@extends('template.main')
@section('title','Tambah data petugas')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="x_content">
            <form class="form-horizontal" method="POST" action="{{url('petugas/update/'.$petugas->id_petugas)}}">
            	{{csrf_field( )}}
                <span class="section">Edit petugas</span>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="username" value="{{$petugas->username}}" /></div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="password" value="{{$petugas->password}}" /></div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama petugas<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" id="" name="nama_petugas" placeholder="namamu" value="{{$petugas->nama_petugas}}" />
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Level<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="id_level" >
                            @foreach ($level as $data)
                                <option @if ($data->id_level==$petugas->id_level)selected="" @endif value="{{$data->id_level}}">{{$data->nama_level}}</option>
                            @endforeach
                        </select>
                    </div>
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