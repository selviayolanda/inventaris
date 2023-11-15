<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventaris extends Model
{
     Protected $table ='inventaris';
    Protected $primaryKey = 'id';
    public $timestamps = false;
    Protected $fillable =array('created_at','nama','kondisi','keterangan','jumlah','id_jenis','tanggal_register','id_ruang','kode_inventaris','id_petugas');
    
     public function jenis(){
        return $this->belongsTo('App\jenis','id_jenis');
    }
     public function ruang(){
    	return $this->belongsTo('App\ruang','id_ruang');
    }
     public function peminjaman(){
    return $this->hasMany('App\peminjaman','id_peminjaman');
    }
     public function detail_pinjam(){
    return $this->hasMany('App\detail_pinjam','id_detail_pinjam');
    }
}
