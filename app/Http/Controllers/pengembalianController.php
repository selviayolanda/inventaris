<?php

namespace App\Http\Controllers;

use Request;
use App\detail_pinjam;
use App\pegawai;
use App\inventaris;
use App\peminjaman;
use DB;

class pengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Request::get('q')==''){
            $data['data']     = [];
        }else{
            $cari = Request::get('q');
            $query = DB::table('detail_pinjam')
            ->join('peminjaman','detail_pinjam.id_peminjaman','=','peminjaman.id_peminjaman')
            ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id')
            ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
            ->select('peminjaman.kode_peminjaman','inventaris.nama','peminjaman.tanggal_pinjam','peminjaman.tanggal_kembali','inventaris.kondisi','pegawai.nama_pegawai','pegawai.nip','detail_pinjam.id_detail_pinjam')
            ->where('detail_pinjam.status','=','pinjam')
            ->where('pegawai.nip','like','%'.$cari.'%')
            ->orwhere('pegawai.nama_pegawai','like','%'.$cari.'%')
            ->get();
            $data['data'] = $query;
        }
        return view ('pengembalian.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function postkembali(){
        $id = Request::get('id_detail');
        $kondisi = Request::get('kondisi');
        $new = detail_pinjam::with('peminjaman')->find($id);
        $new->kondisi = $kondisi;
        $new->status = 'kembali';
        $act = $new->save();
        return redirect('pengembalian');
    }
}
