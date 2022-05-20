<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Hash;
use App\Models\UserModel;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::all();
        return view('pages.user.index', compact('user'));
    }

    public function create()
    {
        return view('pages.user.form');
    }

    public function store(Request $request, UserModel $user)
    {
        $validator = Validator::make($request->all(), [
            'nm_user' => 'required',
            'level_user' => 'required',
            'pass' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('user.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user->nm_user = $request->input('nm_user');
        $user->level_user = $request->input('level_user');
        $user->pass = $request->Hash::make(input('pass'));
        $user->save();

        return redirect('user')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        return view('pages.user.form', compact('user'));
    }

    public function update(Request $request, UserModel $user)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nm_user' => 'required',
            'level_user' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('user.update', $user->id_user)
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->input('pass') != null) {
            $password = $request->input('pass');
            $pwd = Hash::make($password);
            $user->pass = $pwd;
        }
        $user->nm_user = $request->input('nm_user');
        $user->level_user = $request->input('level_user');
        $user->save();
        
        Session::flash('success', 'Data berhasil diedit');
        return redirect('user')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        return redirect('user')
            ->with('success', 'Data berhasil dihapus');
    }
}
