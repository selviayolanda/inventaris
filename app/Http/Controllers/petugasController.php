<?php

namespace App\Http\Controllers;

use Request;
use App\petugas;
use App\level;
use Hash;

class petugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['petugas'] = petugas::with('level')->get();
        return view('petugas.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['level'] = level::get();
         return view('petugas.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $petugas = new petugas;
        $petugas->username = Request::get('username');
        $petugas->password = Hash::make(Request::get('password'));
        $petugas->nama_petugas = Request::get('nama_petugas');
        $petugas->id_level = Request::get('id_level');
        $petugas->save();
        return redirect('petugas');
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
        $data['petugas'] = petugas::find($id);
        $data['level'] = level::get();
        return view('petugas.edit',$data);
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
         $petugas = petugas::find($id);
        $petugas->fill($request->all());
        $petugas->update();
        return redirect('petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = petugas::find($id)->delete();
        return redirect('petugas');
    }
}
