<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//otentikasi
route::get('/','otentikasi\OtentikasiController@index')->name('login');
route::post('login','otentikasi\OtentikasiController@login')->name('login');

//middleware
route::group(['middleware' => 'LoginMiddleware'], function(){

    //index
    route::get('/index', function () {return view('index');
    });

//pegawai
route::get('/pegawai','pegawaiController@index')->name('pegawai');
route::get('/pegawai/create','pegawaiController@create');
route::post('/pegawai/store','pegawaiController@store');
route::get('/pegawai/edit/{id_pegawai}','pegawaiController@edit');
route::post('/pegawai/update/{id_pegawai}','pegawaiController@update');
route::get('/pegawai/destroy/{id_pegawai}','pegawaiController@destroy');

//jenis
route::get('/jenis','jenisController@index')->name('jenis');
route::get('/jenis/create','jenisController@create');
route::post('/jenis/store','jenisController@store');
route::get('/jenis/edit/{id_jenis}','jenisController@edit');
route::post('/jenis/update/{id_jenis}','jenisController@update');
route::get('/jenis/destroy/{id_jenis}','jenisController@destroy');

//ruang
route::get('/ruang','ruangController@index')->name('ruang');
route::get('/ruang/create','ruangController@create');
route::post('/ruang/store','ruangController@store');
route::get('/ruang/edit/{id_ruang}','ruangController@edit');
route::post('/ruang/update/{id_ruang}','ruangController@update');
route::get('/ruang/destroy/{id_ruang}','jenisController@destroy');

//petugas
route::get('/petugas','petugasController@index')->name('petugas');
route::get('/petugas/create','petugasController@create');
route::post('/petugas/store','petugasController@store');
route::get('/petugas/edit/{id_petugas}','petugasController@edit');
route::post('/petugas/update/{id_petugas}','petugasController@update');
route::get('/petugas/destroy/{id_petugas}','petugasController@destroy');

//inventaris
route::get('/inventaris','inventarisController@index')->name('inventaris');
route::get('/inventaris/create','inventarisController@create');
route::post('/inventaris/store','inventarisController@store');
route::get('/inventaris/edit/{id}','inventarisController@edit');
route::post('/inventaris/update/{id}','inventarisController@update');
route::get('/inventaris/destroy/{id}','inventarisController@destroy');

//peminjaman
route::get('/peminjaman','peminjamanController@index')->name('peminjaman');
route::get('/peminjaman/create','peminjamanController@create');
//route::post('/peminjaman/store','peminjamanController@store');
route::post('/save','peminjamanController@save')->name('save');
route::get('/cari/pegawai','peminjamanController@cari')->name('pegawai/cari');
route::get('/cari/inventaris','peminjamanController@cari1')->name('inventaris/cari');
route::get('/peminjaman/show/{id_peminjaman}','peminjamanController@show');

//pengembalian
route::get('/pengembalian','pengembalianController@index')->name('pengembalian');
route::post('/kembalikan','pengembalianController@postkembali');

//laporan
route::get('/laporan','laporanController@haripinjam')->name('laporan');
route::get('/harikembali','laporanController@harikembali')->name('harikembali');
route::get('/bulanpinjam','laporanController@bulanpinjam')->name('bulanpinjam');
route::get('/bulankembali','laporanController@bulankembali')->name('bulankembali');
route::get('/laporan/cetak','laporanController@cetak')->name('cetak');
route::get('/laporan/cetakhk','laporanController@cetakhk')->name('cetakhk');
route::get('/laporan/cetakbp','laporanController@cetakbp')->name('cetakbp');
route::get('/laporan/cetakbk','laporanController@cetakbk')->name('cetakbk');

//logout
    route::get('logout','otentikasi\OtentikasiController@logout')->name('logout');

});

?>