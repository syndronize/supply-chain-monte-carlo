<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\ProdukModel;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::all();
        return view('pages.produk.index', compact('produk'));
    }

    public function create()
    {
        return view('pages.produk.form');
    }

    public function store(Request $request, ProdukModel $produk)
    {
        $validator = Validator::make($request->all(), [
            'nm_produk' => 'required',
            'jenis' => 'required:numeric',
            'harga' => 'required:numeric',
            'stok' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('produk.create')
                ->withErrors($validator)
                ->withInput();
        }

        $produk->nm_produk = $request->input('nm_produk');
        $produk->jenis = $request->input('jenis');
        $produk->harga = $request->input('harga');
        $produk->stok = $request->input('stok');
        $produk->save();

        return redirect('produk')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(ProdukModel $produk)
    {
        return view('pages/produk/form', compact('produk'));
    }

    public function update(Request $request, ProdukModel $produk)
    {
        $validator = Validator::make($request->all(),[
            'nm_produk'=>'required',
            'jenis'=>'required',
            'harga'=>'required',
            'stok'=>'required',
        ]);

        if($validator->fails()){
            return redirect()
            ->route('produk.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            $produk->nm_produk = $request->input('nm_produk');
            $produk->jenis = $request->input('jenis');
            $produk->harga = $request->input('harga');
            $produk->stok = $request->input('stok');
            $produk->save();

            return redirect()
            ->route('produk')
            ->with('message','Data Berhasil Diedit');
        }

    }

    public function destroy($id)
    {
        $produk = ProdukModel::find($id);
        $produk->delete();
        return redirect('produk')
            ->with('success', 'Data berhasil dihapus');
    }
}
