@extends('template.main')
@section('content')

<div class="container-fluid">
	<div class="row">
        <div class="x_content"></div>
		      <div class="col-lg-12">
                            <div class="card-header bg-purple">
                                <h4 class="m-b-0 text-blue">Isi data peminjaman</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('save')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="card-body">
                                     <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Kode peminjaman</label>
                                                        <input type="text" class="form-control" name="kode_peminjaman" id="kode_peminjaman" class="form-control" value="{{$nomat}}" readonly="">
                                                        <input type="text" name="id_pegawai" id="id_pegawai">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Nip pegawai</label>
                                                        <input type="text" class="form-control" name="nip" id="nip" class="form-control" onkeyup="pegawai()">
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
                                                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat" id="alamat" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Kode inventaris</label>
                                                        <input type="text" class="form-control" name="kode_inventaris" id="kode_inventaris" class="form-control" onkeyup="inventaris()">
                                                        <input type="text" name="id_inventaris" id="id_inventaris">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                        </div>
                                        
                                        <div class="row">
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Nama barang</label>
                                                    <input type="text" class="form-control" name="nama" id="nama" readonly="">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Kondisi</label>
                                                    <input type="text" class="form-control" name="kondisi" id="kondisi" readonly="" >
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <div class="form-group">
                                                    <label>Ruang</label>
                                                    <input type="text" class="form-control" name="id_ruang" id="id_ruang" readonly="" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">jumlah barang</label>
                                                    <input type="text" class="form-control" name="jumlah" id="jumlah" name="jumlah" readonly="" >
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <div class="form-group">
                                                    <label>Jumlah pinjam</label>
                                                    <input type="text" class="form-control" name="jumlah_pinjam" id="jumlah_pinjam" name="jumlah_pinjam">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="control-label">&nbsp;</label><br>
                                                <a href="javascript:void(0)" onclick="TambahRow()" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="table-responsive m-t-40">
                                    <div class="kotak_detail">
                                        <table id="myTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama barang</th>
                                                    <th>Jumlah barang</th>
                                                    <th>Jumlah pinjam</th>
                                                    <th>Kondisi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="add-row">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 ">
                                                <div class="form-group">
                                                    <label>Tanggal pinjam</label>
                                                    <input type="text" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" value="{{date('d-m-Y')}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="form-group">
                                                    <label>Tanggal kembali</label>
                                                    <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" class="form-control" name="status" id="status" value="pinjam" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="control-label">&nbsp;</label><br>
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                  </div>
                                                <div class="col-md-1">
                                                <label class="control-label">&nbsp;</label><br>
                                                    <button type="submit" class="btn btn-danger">cancel</button>
                                                  </div>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
	</div>
</div>

@endsection
@push('bottom')
<script type="text/javascript">
    function pegawai(){
        idd = $("#nip").val()
        if (idd==''){
            $('#nama_pegawai').val('');
            $('#id_pegawai').val('');
            $('#alamat').val('');
        }
        $.ajax({
            url:"{{route('pegawai/cari')}}",
            type:"GET",
            dataType:"json",
            data:{
                id:$("#nip").val()
            },
            success:function(hasil){
                if (hasil.val==0) {
                    // alert('data tidak ditemukan ');
                    $('#nama_pegawai').val('');
                    $('#id_pegawai').val('');
                    $('#alamat').val('');
                }else if(hasil.val==2){
                    // alert('data tidak ditemukan 2');
                    $('#nama_pegawai').val('');
                    $('#id_pegawai').val('');
                    $('#alamat').val('');
                }else{
                    //alert('data tidak ditemukan 3');
                    $('#nama_pegawai').val(hasil.data.nama_pegawai);
                    $('#id_pegawai').val(hasil.data.id_pegawai);
                    $('#alamat').val(hasil.data.alamat);
                }
            }
        });
    }
    function inventaris(){
        idd = $("#kode_inventaris").val()
        if (idd==''){
            $('#nama').val('');
            $('#kondisi').val('');
            $('#id_ruang').val('');
            $('#jumlah').val('');
            $('#id_inventaris').val('');
        }
        $.ajax({
            url:"{{route('inventaris/cari')}}",
            type:"GET",
            dataType:"json",
            data:{
                id:$("#kode_inventaris").val()
            },
            success:function(hasil){
                if (hasil.val==0) {
                    // alert('data tidak ditemukan ');
                    $('#nama').val('');
                    $('#kondisi').val('');
                    $('#id_ruang').val('');
                    $('#jumlah').val('');
                    $('#id_inventaris').val('');
                }else if(hasil.val==2){
                    // alert('data tidak ditemukan 2');
                    $('#nama').val('');
                    $('#kondisi').val('');
                    $('#id_ruang').val('');
                    $('#jumlah').val('');
                    $('#id_inventaris').val('');
                }else{
                    //alert('data tidak ditemukan 3');
                    $('#nama').val(hasil.data.nama);
                    $('#kondisi').val(hasil.data.kondisi);
                    $('#id_ruang').val(hasil.data.ruang.nama_ruang);
                    $('#jumlah').val(hasil.data.jumlah);
                    $('#id_inventaris').val(hasil.data.id);
                }
            }
        });
    }
    function TambahRow(){
        var jumlah = parseInt($('#jumlah').val())
        var jumlah_pinjam =parseInt($('#jumlah_pinjam').val())
        if (jumlah_pinjam>jumlah) {
            alert('stok data tidak mencukupi untuk dibeli')
            $('#jumlah').val('')
        }else{
            val = $('#nama').val()
            if (val=='') {
                alert('data kosong')
            }else{
                i = 1;
                elem  = '<tr>'+
                '<td>'+i+'<input type="hidden" name="dt_id_inventaris[]" id="dt_id_inventaris" value="'+$('#id_inventaris').val()+'"></td>'+
                '<td>'+$('#nama').val()+'<input type="hidden" value="'+$('#jumlah_pinjam').val()+'" name="dt_jumlah_pinjam[]" id="dt_jumlah_pinjam"></td>'+
                '<td>'+$('#jumlah').val()+'</td>'+
                '<td>'+$('#jumlah_pinjam').val()+'</td>'+
                '<td>'+$('#kondisi').val()+ '<input type="hidden" name="dt_kondisi[]" id="dt_kondisi" value="'+$('#kondisi').val()+'"></td>'+

                '<td>'+
                    '<a href="javascript:void(0)" onclick="Delete(this)"class="btn btn-danger btn-sm">Hapus</a>'+
                '</td>'+
            '</tr>'

            $('#add-row').append(elem);


                Clean();
                i=i+1;
            }
        }
    }

    function Clean(){
        $('#id').val('')
        $('#nama').val('')
        $('#jumlah').val('')
        $('#id_ruang').val('')
        $('#jumlah_pinjam').val('')
        $('#kondisi').val('')
    }
    function Delete(e){
        $(e).parent().parent().remove()
    }
    
</script>
@endpush