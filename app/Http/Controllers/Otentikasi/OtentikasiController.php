<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\petugas;

class OtentikasiController extends Controller
{
    public function index(){
        return view('otentikasi.login');
    }

    public function login(Request $request){
        // dd($request->all());
        $data = petugas::where('username',$request->username)->first();
        if($data){
            // dd($data->password);
            if($request->password==$data->password){
                session(['login_success' => true]);
                return redirect('/index');
            
            }
        }
        return redirect('/')->with('message','Email atau Password anda salah');
    }
    
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}


?>