<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inventaris;
use App\jenis;
use App\ruang;


class inventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function NoInventaris()
{
    $tgl = date('Y-m-d');
    $number = inventaris::where("created_at","like","%".$tgl."%")->count();
    $angka = $number +1;
    $codes = str_pad($angka, 1, rand(11,99),STR_PAD_LEFT);
    $code = 'INV-'.date('ymd').$codes;
    return $code;
}

    public function index()
    {
        $data['inventaris'] = inventaris::with('jenis','ruang')->get();
        return view('inventaris.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['nomat'] = self::NoInventaris();
          $data['jenis'] = jenis::get();
        $data['ruang'] = ruang::get();
         return view('inventaris.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventaris = new inventaris;
        $inventaris->fill($request->all());
        $inventaris->kode_inventaris = self::NoInventaris();
        $inventaris->created_at    = date('Y-m-d H:i:s');
        $inventaris->id_petugas    = ('1');
        $inventaris->tanggal_register    = date('Y-m-d');

        $act = $inventaris->save();
        return redirect('inventaris');
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
        
         $data['nomat'] = self::NoInventaris();
          $data['jenis'] = jenis::get();
        $data['ruang'] = ruang::get();
        $data['inventaris'] = inventaris::find($id);
        return view('inventaris.edit',$data);
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
        $inventaris = inventaris::find($id);
        $inventaris->fill($request->all());
        $inventaris->save();
        return redirect('inventaris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $inventaris = inventaris::find($id)->delete();
        return redirect('inventaris');
    }
}
