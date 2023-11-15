<?php

namespace App\Http\Controllers;

use Request;
use App\Peminjaman;
use App\Pegawai;
use App\inventaris;
use App\detail_pinjam;
use DB;

class peminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function KodePeminjaman()
    {
        $tgl = date('Y-m-d');
        $number = peminjaman::where("created_at","like","%".$tgl."%")->count();
        $angka = $number +1;
        $codes = str_pad($angka, 1, rand(11,99),STR_PAD_LEFT);
        $code = 'PMJ-'.date('ymd').$codes;
        return $code;
    }

    public function index()
    {
        $data['peminjaman'] = peminjaman::with('pegawai','detail_pinjam')->get();
        return view('peminjaman.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['pegawai'] = pegawai::get();
         $data['nomat'] = self::KodePeminjaman();
        return view('peminjaman.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $de= new peminjaman;
        // $peminjaman->kode_peminjaman = self::KodePeminjaman();
        // $peminjaman->created_at    = date('Y-m-d H:i:s');
        // $peminjaman->id_pegawai    = Request::get('id_pegawai');
        // $peminjaman->tanggal_pinjam    = date('Y-m-d');
        // $peminjaman->tanggal_kembali    = date('Y-m-d');

        //$act = $peminjaman->save();
       // if ($act){
            //$id_inventaris = Request::get('dt_id_inventaris');
            //$jumlah_pinjam = Request::get('dt_jumlah_pinjam');
            //$kondisi = Request::get('dt_kondisi');

            //foreach ($id_inventaris as $i => $key) {
                //$ baru
            //}
        //}
        //return redirect('peminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['peminjaman'] = detail_pinjam::with(['inventaris','peminjaman'])->where('id_peminjaman',$id)->get();
        return view('peminjaman.show',$data);
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
    public function cari(){
        $id = Request::get('id');
        if ($id=='') {
            $data['val']        = 2;
        }else{
            $isi = Pegawai::where('nip','=',$id)->first();
            if (empty($isi)) {
                $data['val']        = 0;
            }else{
                $data['val']        = 1;
                $data['data']       = $isi;
            }
        }
        return response($data);
    }
    public function cari1(){
        $id = Request::get('id');
        if ($id=='') {
            $data['val']        = 2;
        }else{
            $isi = inventaris::with('ruang')->where('kode_inventaris','=',$id)->first();
            if (empty($isi)) {
                $data['val']        = 0;
            }else{
                $data['val']        = 1;
                $data['data']       = $isi;
            }
        }
        return response($data);
    }
    public function save(){

        $new = new peminjaman;
        $new->kode_peminjaman = self::KodePeminjaman();
        $new->created_at    = date('Y-m-d H:i:s');
        $new->tanggal_pinjam    = date('Y-m-d');
        $new->tanggal_kembali    = Request::get('tanggal_kembali');
        $new->id_pegawai    = Request::get('id_pegawai');

        $act = $new->save();
        if ($act){
            $id_inventaris =Request::get('dt_id_inventaris');
            $jumlah_pinjam =Request::get('dt_jumlah_pinjam');
            $kondisi =Request::get('dt_kondisi');
            foreach ($id_inventaris as $i => $key) {
                $baru = new detail_pinjam;
                $baru->kondisi = $kondisi[$i];
                $baru->id_inventaris = $key;
                $baru->id_peminjaman = $new->id_peminjaman;
                $baru->jumlah = $jumlah_pinjam[$i];
                $baru->status = "pinjam";
                $baru->save();
                $i++;
            }
            return redirect('peminjaman');
        }else{
            return redirect('peminjaman');
        }
    }
    
}
