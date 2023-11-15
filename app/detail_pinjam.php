<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_pinjam extends Model
{
    Protected $table ='detail_pinjam';
    Protected $primaryKey = 'id_detail_pinjam';
    public $timestamps = false;
    Protected $fillable =array('id_inventaris','jumlah','id_peminjaman','status','kondisi');

    public function peminjaman(){
    return $this->belongsTo('App\peminjaman','id_peminjaman');
	}
	 public function inventaris(){
    return $this->belongsTo('App\inventaris','id_inventaris','id');
	}
}
