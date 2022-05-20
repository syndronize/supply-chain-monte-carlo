<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use App\Models\DetailModel;

class DetailController extends Controller
{
    public function index()
    {
        $detail = DB::table('detail')
            ->leftJoin('transaksi', 'transaksi.id_transaksi', '=', 'detail.id_transaksi')
            ->leftJoin('produk', 'produk.id_produk', '=', 'detail.id_produk')
            ->select('detail.*', 'transaksi.*', 'produk.*')
            ->get();
        return view('pages.detail.index', compact('detail'));
    }

    public function create()
    {
        $transaksi = TransaksiModel::all();
        $produk = ProdukModel::all();
        return view('pages.detail.form',[
            'transaksi' => $transaksi,
            'produk' => $produk,
            'url' => 'detail.store'
        ]);
    }

    public function store(Request $request, DetailModel $detail)
    {
        $validator = Validator::make($request->all(), [
            'id_transaksi' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('detail.create')
                ->withErrors($validator)
                ->withInput();
        }

        $detail->id_transaksi = $request->input('id_transaksi');
        $detail->id_produk = $request->input('id_produk');
        $detail->jumlah = $request->input('jumlah');
        $detail->harga = $request->input('harga');
        $detail->save();

        return redirect('detail')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(DetailModel $detail)
    {
        $transaksi = TransaksiModel::all();
        $produk = ProdukModel::all();
        return view('pages.detail.form',[
            'transaksi' => $transaksi,
            'produk' => $produk,
            'url' => 'detail.update',
        ]);
    }

    public function update(Request $request, DetailModel $detail)
    {
        $validator = Validator::make($request->all(), [
            'id_transaksi' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('detail.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $detail->id_transaksi = $request->input('id_transaksi');
        $detail->id_produk = $request->input('id_produk');
        $detail->jumlah = $request->input('jumlah');
        $detail->harga = $request->input('harga');
        $detail->save();

        return redirect('detail')
            ->with('success', 'Data berhasil diubah');
    }

    public function destroy(DetailModel $detail)
    {
        $detail->delete();
        return redirect('detail')
            ->with('success', 'Data berhasil dihapus');
    }
}
