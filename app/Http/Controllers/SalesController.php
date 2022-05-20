<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\SalesModel;
use App\Models\ProdukModel;
use PDF;

class SalesController extends Controller
{
    public function index()
    {
        $sales = DB::table('sales')
        ->leftJoin('produk', 'produk.id_produk', '=', 'sales.id_produk')
        ->orderBy('sales.id_invoice')
        ->select('sales.*', 'produk.*')
        ->get();
        return view('pages.sales.index', compact('sales'));
    }

    public function create()
    {
        $produk = ProdukModel::all();
        return view('pages/sales/form',[
            'produk' => $produk,
            'url' => 'sales.store'
        ]);
    }

    public function store(Request $request, SalesModel $sales)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nm_sales' => 'required',
            'no_hp' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'tgl_order' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('sales.create')
                ->withErrors($validator)
                ->withInput();
        }

        $sales->nm_sales = $request->input('nm_sales');
        $sales->no_hp = $request->input('no_hp');
        $sales->id_produk = $request->input('id_produk');
        $sales->jumlah = $request->input('jumlah');
        $sales->total = $request->input('total');
        $sales->tgl_order = $request->input('tgl_order');
        $sales->save();

        return redirect('sales')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sales = SalesModel::find($id);
        $produk = ProdukModel::all();
        return view('pages.sales.form', compact('sales','produk'));
    }

    public function update(Request $request, SalesModel $sales)
    {
        $validator = Validator::make($request->all(), [
            'nm_sales' => 'required',
            'no_hp' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'tgl_order' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('sales.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $sales->nm_sales = $request->input('nm_sales');
        $sales->no_hp = $request->input('no_hp');
        $sales->id_produk = $request->input('id_produk');
        $sales->jumlah = $request->input('jumlah');
        $sales->total = $request->input('total');
        $sales->tgl_order = $request->input('tgl_order');
        $sales->save();

        return redirect('sales')
            ->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $sales = SalesModel::find($id);
        $sales->delete();
        return redirect('sales')
            ->with('success', 'Data berhasil dihapus');
    }

    public function cetak(){
        $cetak = DB::table('sales')
        ->leftJoin('produk', 'produk.id_produk', '=', 'sales.id_produk')
        ->orderBy('sales.id_invoice')
        ->select('sales.*', 'produk.*')
        ->get();

        return view('pages.sales.cetak', compact('cetak'));
    }
}
