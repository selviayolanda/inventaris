<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    Protected $table ='level';
    Protected $primaryKey = 'id_level';
    public $timestamps = false;
    Protected $fillable =array('nama_level');

    public function petugas(){
    return $this->hasMany('App\petugas','id_petugas');
	}
}
