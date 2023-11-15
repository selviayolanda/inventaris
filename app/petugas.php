<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
     Protected $table ='petugas';
    Protected $primaryKey = 'id_petugas';
    public $timestamps = false;
    Protected $fillable =array('username','password','nama_petugas','id_level');

    public function level(){
    	return $this->belongsTo('App\level','id_level');
    }
    public function inventaris(){
    	return $this->belongsTo('App\inventaris','id_inventaris');
    }
}
