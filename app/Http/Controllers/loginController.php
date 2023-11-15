<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\petugas;
use Illuminate\Support\facades\Hash;
use DB;


class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(session::get('username')!=''){
            return redirect('/backend_home');
        }

        $check=DB::table('petugas')->where('username',$request->get('username'))->first();
        if($check){
            if(Hash::check($petugas->get('password'),$check->password)){
                session(['petugas'=>$check]);
                return redirect('/index');
            }else{
                dd('gagal');
            }
        }
        return redirect('/')->with('massage','username dan password anda salah' );
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

} 