<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\ProdukModel;
use App\Models\TempModel;

class TempController extends Controller
{
    public function index()
    {
        $temp = DB::table('temp')
        ->leftJoin('produk','produk.id_produk','=','temp.id_produk')
        ->select('temp.*','produk.*')
        ->orderBy('temp.id_temp')
        ->get();
        // $produk = DB::table('produk')->get();
        return view('pages.temp.form', compact('temp'));
    }

    public function create()
    {
        $produk = ProdukModel::all();
        
        return view('pages.transaksi.form',[
            'produk' => $produk,
            'temp' => $temp,
            'url' => 'temp.store'
        ]);
    }

    public function store(Request $request, TempModel $temp)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'id_produk' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('temp.create')
                ->withErrors($validator)
                ->withInput();
        }

        $temp->id_produk = $request->input('id_produk');
        $temp->jumlah = $request->input('jumlah');
        $temp->harga = $request->input('harga');
        $temp->save();

        return redirect('temp.create')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $temp = TempModel::find($id);
        // var_dump($temp);
        $temp->delete();
        return view('transaksi.form')
            ->with('success', 'Data berhasil dihapus');
    }
    
}
