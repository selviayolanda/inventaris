<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
     Protected $table ='peminjaman';
    Protected $primaryKey = 'id_peminjaman';
    public $timestamps = false;
    Protected $fillable =array('kode_peminjaman','created_at','tanggal_pinjam','tanggal_kembali','id_pegawai');

    public function ruang(){
    	return $this->belongsTo('App\ruang','id_ruang');
    }
    public function pegawai(){
    	return $this->belongsTo('App\pegawai','id_pegawai');
    }
    public function inventaris(){
    return $this->hasMany('App\inventaris','id');
    }
    public function detail_pinjam(){
        return $this->belongsTo('App\detail_pinjam','id_detail_penjualan');
    }
}
