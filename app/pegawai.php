<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    Protected $table ='pegawai';
    Protected $primaryKey = 'id_pegawai';
    public $timestamps = false;
    Protected $fillable =array('nama_pegawai','nip','alamat');

    public function peminjaman(){
    return $this->hasMany('App\peminjaman','id_peminjaman');
	}
}
