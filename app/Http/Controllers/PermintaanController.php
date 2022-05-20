<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\ProdukModel;
use App\Models\PermintaanModel;

class PermintaanController extends Controller
{
    public function index()
    {
        $permintaan = DB::table('permintaan')
            ->leftJoin('produk', 'produk.id_produk', '=', 'permintaan.id_produk')
            ->select('permintaan.*', 'produk.*')
            ->get();
        return view('pages.permintaan.index', compact('permintaan'));
    }

    public function create()
    {
        $produk = ProdukModel::all();
        return view('pages.permintaan.form',[
            'produk' => $produk,
            'url' => 'permintaan.store'
        ]);
    }

    public function store(Request $request, PermintaanModel $permintaan)
    {
        $validator = Validator::make($request->all(), [
            'id_produk' => 'required',
            'total_permintaan' => 'required',
            'tanggal_permintaan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('permintaan.create')
                ->withErrors($validator)
                ->withInput();
        }

        $permintaan->id_produk = $request->input('id_produk');
        $permintaan->total_permintaan = $request->input('total_permintaan');
        $permintaan->tanggal_permintaan = $request->input('tanggal_permintaan');
        $permintaan->save();

        return redirect('permintaan')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(PermintaanModel $permintaan)
    {
        $produk = ProdukModel::all();
        return view('pages.permintaan.form',[
            'permintaan' => $permintaan,
            'produk' => $produk,
            'url' => 'permintaan.update'
        ]);
    }

    public function update(Request $request, PermintaanModel $permintaan)
    {
        $validator = Validator::make($request->all(),[
            'id_produk'=>'required',
            'total_permintaan'=>'required',
            'tanggal_permintaan'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect('permintaan.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $permintaan->id_produk = $request->input('id_produk');
        $permintaan->total_permintaan = $request->input('total_permintaan');
        $permintaan->tanggal_permintaan = $request->input('tanggal_permintaan');
        $permintaan->save();

        return redirect('permintaan')
            ->with('success', 'Data berhasil diubah');
    }

    public function destroy(PermintaanModel $permintaan)
    {
        $permintaan->delete();
        return redirect('permintaan')
            ->with('success', 'Data berhasil dihapus');
    }
}
