<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class petugasseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::truncate();
        user::create([
        	'id_petugas' => '2',
        	'username' => 'selvia',
        	'password' =>bcrypt('123'),
        	'nama_petugas' => 'akirayaaa',
        	'id_level' => Str::random(5),
        ]);
    }
}
