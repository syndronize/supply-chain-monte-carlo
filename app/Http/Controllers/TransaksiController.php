<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;
use App\Models\TempModel;
use PDF;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')
            ->get();
        return view('pages.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $produk = ProdukModel::all();
        $temp = DB::table('temp')
        ->leftJoin('produk','produk.id_produk','=','temp.id_produk')
        ->select('temp.*','produk.*')
        ->orderBy('temp.id_temp')
        ->get();
        $temp1 = DB::table('temp')
        ->select(DB::raw('SUM(total) AS total'))
        ->get();
        return view('pages.transaksi.form',[
            'url' => 'transaksi.store',
            'temp1' => $temp1,
            'produk' => $produk,
            'temp' => $temp,
        ]);
    }

    // public function store(Request $request, TransaksiModel $transaksi)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'tanggal_transaksi' => 'required',
    //         'total' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect('transaksi.create')
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     $transaksi->tanggal_transaksi = $request->input('tanggal_transaksi');
    //     $transaksi->total = $request->input('total');
    //     $transaksi->save();

    //     return redirect('transaksi')
    //         ->with('success', 'Data berhasil ditambahkan');
    // }

    public function store(){
        $id_transaksi = DB::table('transaksi')
                        ->max('id_transaksi');
        $id_transaksi = $id_transaksi + 1;
        $total = DB::table('temp')
                ->select(DB::raw('SUM(total) AS total'))
                ->get();
        $total = $total[0]->total;
        $tanggal_transaksi = date('Y-m-d');
        DB::table('transaksi')
        ->insert([
            'id_transaksi' => $id_transaksi,
            'tanggal_transaksi' => $tanggal_transaksi,
            'total' => $total,
        ]);
        $temp = DB::table('temp')
        ->get();
        foreach ($temp as $temp) {
            DB::table('transaksi_detail')
            ->insert([
                'id_transaksi' => $id_transaksi,
                'id_produk' => $temp->id_produk,
                'jumlah' => $temp->jumlah,
                'harga' => $temp->harga,
            ]);
        }
        DB::table('temp')
        ->delete();
        return redirect('transaksi')
        ->with('success', 'Data berhasil ditambahkan');
    }

    public function storetemp(Request $request){
        $tempx = DB::table('temp')->where('id_produk',$request->id_produk)->first();
        if($tempx != null){
            $temp = DB::table('temp')
            ->where('id_produk',$request->id_produk)
            ->update([
                'jumlah' => $tempx->jumlah + $request->jumlah,
                'total' => ($tempx->jumlah + $request->jumlah) * $tempx->harga,
            ]);
        }else{
            $temp = DB::table('temp')
            ->insert([
                'id_produk' => $request->id_produk,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'total' => $request->jumlah * $request->harga,
            ]);
        }
        

        return redirect()
            ->route('transaksi.create')
            ->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $transaksi = TransaksiModel::find($id);
        return view('pages.transaksi.form',[
            'transaksi' => $transaksi,
            'url' => 'transaksi.update'
        ]);
    }

    public function update(Request $request, TransaksiModel $transaksi)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_transaksi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('transaksi.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $transaksi->tanggal_transaksi = $request->input('tanggal_transaksi');
        $transaksi->save();

        return redirect('transaksi')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $transaksi = TransaksiModel::find($id);
        $transaksi->delete();
        return redirect('transaksi')
            ->with('success', 'Data Transaksi berhasil dihapus');
    }

    public function deletetemp($temp){
        $temp = DB::table('temp')
        ->where('id_temp', $temp)
        ->delete();
    
        return redirect()
            ->route('transaksi.create')
            ->with('success', 'Data Temp berhasil dihapus');
    }

    public function detail()
    {
        $id = $_POST['id_produk'];
        $produk = ProdukModel::find($id);
        return response()->json([
            'success' => 'true',
            'message' => 'Data berhasil diambil',
            'data' => $produk
        ], 200);
    }


    public function cetak(){
        $cetak = DB::table('transaksi')
                ->get();
        return view('pages/transaksi/cetak',compact('cetak'));
    }

    public function cari(Request $request){
        $cari = DB::table('transaksi_detail')
                ->leftjoin('produk','produk.id_produk','=' ,'transaksi_detail.id_produk')
                ->select('transaksi_detail.id_produk','nm_produk')
                ->groupBy('transaksi_detail.id_produk','nm_produk')
                ->get();
        $data = [];
        foreach($cari as $key=>$item){
            $data[$item->id_produk]["nm_produk"] =$item->nm_produk;
            $data[$item->id_produk]["detail"] =[];
            for ($i=1; $i <=12 ; $i++) { 
                $hasil = DB::table('transaksi_detail')
                ->join('transaksi','transaksi.id_transaksi','=' ,'transaksi_detail.id_transaksi')
                ->select(DB::raw('SUM(jumlah) as jumlah'))
                ->whereMonth('transaksi.tanggal_transaksi',$i)
                ->where('transaksi_detail.id_produk',$item->id_produk)
                ->first()->jumlah ?? 0;
                $data[$item->id_produk]["detail"][$i] = $hasil;
            }
        }
        return view('pages/transaksi/cari',compact('cari','data'));
    }
}
