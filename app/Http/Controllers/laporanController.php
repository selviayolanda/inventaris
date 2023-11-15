<?php

namespace App\Http\Controllers;


use Request;
use DB;
use App;
use App\peminjaman;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function haripinjam(){
        $tanggal1=Request::get('tanggal1');
        $tanggal2=Request::get('tanggal2');
        $query = DB::table('detail_pinjam')
            ->join('peminjaman','detail_pinjam.id_peminjaman','=','peminjaman.id_peminjaman')
            ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id')
            ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
            ->select('peminjaman.kode_peminjaman','inventaris.nama','peminjaman.tanggal_pinjam','peminjaman.tanggal_kembali','inventaris.kondisi','pegawai.nama_pegawai','pegawai.nip','detail_pinjam.id_detail_pinjam','detail_pinjam.status')
            ->where('detail_pinjam.status','=','pinjam')
            ->whereBetween('peminjaman.created_at',[$tanggal1,$tanggal2])
            ->orderBy('peminjaman.id_peminjaman','desc')
            ->get();

            $data['data'] = $query;
        return view('laporan.index',$data);
    }
     public function harikembali(){
        $tanggal1=Request::get('tanggal1');
        $tanggal2=Request::get('tanggal2');
        $query = DB::table('detail_pinjam')
            ->join('peminjaman','detail_pinjam.id_peminjaman','=','peminjaman.id_peminjaman')
            ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id')
            ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
            ->select('peminjaman.kode_peminjaman','inventaris.nama','peminjaman.tanggal_pinjam','peminjaman.tanggal_kembali','inventaris.kondisi','pegawai.nama_pegawai','pegawai.nip','detail_pinjam.id_detail_pinjam','detail_pinjam.status')
            ->where('detail_pinjam.status','=','kembali')
            ->whereBetween('peminjaman.created_at',[$tanggal1,$tanggal2])
            ->orderBy('peminjaman.id_peminjaman','desc')
            ->get();

            $data['data'] = $query;
        return view('laporan.harikembali',$data);
    }
    public function bulanpinjam(){
        $query = DB::table('detail_pinjam')
            ->join('peminjaman','detail_pinjam.id_peminjaman','=','peminjaman.id_peminjaman')
            ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id')
            ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
            ->select('peminjaman.kode_peminjaman','inventaris.nama','peminjaman.tanggal_pinjam','peminjaman.tanggal_kembali','inventaris.kondisi','pegawai.nama_pegawai','pegawai.nip','detail_pinjam.id_detail_pinjam','detail_pinjam.status')
             ->where('detail_pinjam.status','=','pinjam')
            ->whereMonth('peminjaman.created_at',Request::get('bulan'))
            ->get();

            $data['data'] = $query;
        return view('laporan.bulanpinjam',$data);
    }
    public function bulankembali(){
        $query = DB::table('detail_pinjam')
            ->join('peminjaman','detail_pinjam.id_peminjaman','=','peminjaman.id_peminjaman')
            ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id')
            ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
            ->select('peminjaman.kode_peminjaman','inventaris.nama','peminjaman.tanggal_pinjam','peminjaman.tanggal_kembali','inventaris.kondisi','pegawai.nama_pegawai','pegawai.nip','detail_pinjam.id_detail_pinjam','detail_pinjam.status')
             ->where('detail_pinjam.status','=','kembali')
            ->whereMonth('peminjaman.created_at',Request::get('bulan'))
            ->get();

            $data['data'] = $query;
        return view('laporan.bulankembali',$data);
    }
    public function cetak(){
        $tanggal1=Request::get('tanggal1');
        $tanggal2=Request::get('tanggal2');
        $query = DB::table('detail_pinjam')
            ->join('peminjaman','detail_pinjam.id_peminjaman','=','peminjaman.id_peminjaman')
            ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id')
            ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
            ->select('peminjaman.kode_peminjaman','inventaris.nama','peminjaman.tanggal_pinjam','peminjaman.tanggal_kembali','inventaris.kondisi','pegawai.nama_pegawai','pegawai.nip','detail_pinjam.id_detail_pinjam','detail_pinjam.status')
            ->where('detail_pinjam.status','=','pinjam')
            ->whereBetween('peminjaman.created_at',[$tanggal1,$tanggal2])
            ->orderBy('peminjaman.id_peminjaman','desc')
            ->get();

            $data['data'] = $query;
        return view('laporan.cetak',$data);
    }
    public function cetakhk(){
        $tanggal1=Request::get('tanggal1');
        $tanggal2=Request::get('tanggal2');
        $query = DB::table('detail_pinjam')
            ->join('peminjaman','detail_pinjam.id_peminjaman','=','peminjaman.id_peminjaman')
            ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id')
            ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
            ->select('peminjaman.kode_peminjaman','inventaris.nama','peminjaman.tanggal_pinjam','peminjaman.tanggal_kembali','inventaris.kondisi','pegawai.nama_pegawai','pegawai.nip','detail_pinjam.id_detail_pinjam','detail_pinjam.status')
            ->where('detail_pinjam.status','=','kembali')
            ->whereBetween('peminjaman.created_at',[$tanggal1,$tanggal2])
            ->orderBy('peminjaman.id_peminjaman','desc')
            ->get();

            $data['data'] = $query;
        return view('laporan.cetakhk',$data);
    }
    public function cetakbp(){
        $query = DB::table('detail_pinjam')
            ->join('peminjaman','detail_pinjam.id_peminjaman','=','peminjaman.id_peminjaman')
            ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id')
            ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
            ->select('peminjaman.kode_peminjaman','inventaris.nama','peminjaman.tanggal_pinjam','peminjaman.tanggal_kembali','inventaris.kondisi','pegawai.nama_pegawai','pegawai.nip','detail_pinjam.id_detail_pinjam','detail_pinjam.status')
            ->where('detail_pinjam.status','=','pinjam')
            ->whereMonth('peminjaman.created_at',Request::get('bulan'))
            ->get();

            $data['data'] = $query;
        return view('laporan.cetakbp',$data);
    }
    public function cetakbk(){
        $query = DB::table('detail_pinjam')
            ->join('peminjaman','detail_pinjam.id_peminjaman','=','peminjaman.id_peminjaman')
            ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id')
            ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
            ->select('peminjaman.kode_peminjaman','inventaris.nama','peminjaman.tanggal_pinjam','peminjaman.tanggal_kembali','inventaris.kondisi','pegawai.nama_pegawai','pegawai.nip','detail_pinjam.id_detail_pinjam','detail_pinjam.status')
            ->where('detail_pinjam.status','=','kembali')
            ->whereMonth('peminjaman.created_at',Request::get('bulan'))
            ->get();

            $data['data'] = $query;
        return view('laporan.cetakbk',$data);
    }
}
