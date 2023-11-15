<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
     Protected $table ='ruang';
    Protected $primaryKey = 'id_ruang';
    public $timestamps = false;
    Protected $fillable =array('nama_ruang','kode_ruang','keterangan');

    public function inventaris(){
        return $this->hasMany('App\inventaris','id_inventaris');
    }

    public function peminjaman(){
        return $this->hasMany('App\peminjaman','id_peminjaman');
    }
    	   
}
