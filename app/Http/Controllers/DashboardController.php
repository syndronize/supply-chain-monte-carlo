<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use Validator;
use App\Models\UserModel;

class DashboardController extends Controller
{
    public function __construct(){
        $this->rules = [
            'nm_user' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'pass' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/'
        ];
    }

    public function index(){
        return view('home');
    }

    public function login(){
        if(session('id_user') != null){
            return view('home')->with('message','Selamat Datang');
        }else{
            return view('auth/login');
        }
    }

    public function aksilogin(Request $request){
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $user = UserModel::where('nm_user', $request->input('nm_user'))->first();
        if($user != null){
            if(Hash::check($request->input('pass'), $user->pass)){
                session(['id_user' => $user->id_user]);
                session(['nm_user' => $user->nm_user]);
                session(['level_user' => $user->level_user]);
                return redirect('home')->with('message','Selamat Datang');
            }else{
                return redirect('/')->with('message','Password Salah');
            }
        }else{
            return redirect('/')->with('message','Username Tidak Ditemukan');
        }
    }

    public function register()
    {
            return view('auth/register');

    }

    public function aksiregister(Request $request){
        // dd($request->all());
        $validator = Validator ::make($request->all(),$this->rules);
        if($validator->fails()){
            return back()->with('error','Silahkan Login Kembali');
        }else{
            $isilevel="User";
            $user = new UserModel();
            $user->nm_user = $request->input('nm_user');
            $user->pass = Hash::make($request->input('pass'));
            $user->save();
            return redirect("/")->with('message','Data Berhasil Disimpan');
        }
    }

    public function logout(Request $request){

        $request->session()->forget('id_user');
        $request->session()->forget('nm_user');
        $request->session()->flush();
        return redirect("/")->with('message','Sukses Logout.');
    }

}
