<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnalisaModel;
use App\Models\ProdukModel;
use DB;
use Validator;
use Illuminate\Support\Str;

class AnalisaController extends Controller
{
    public function index()
    {
        $analisa = DB::table('transaksi_detail')
                ->leftjoin('produk','produk.id_produk','=' ,'transaksi_detail.id_produk')
                ->select('transaksi_detail.id_produk','nm_produk')
                ->groupBy('transaksi_detail.id_produk','nm_produk')
                ->get();
        $data = [];
        foreach($analisa as $key=>$item){
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
            $data[$item->id_produk]["detail"]["total"] = array_sum($data[$item->id_produk]["detail"]);
        }
        return view('pages.analisa.index', compact('analisa','data'));
    }

    public function create()
    {
        return view('pages.analisa.form');
    }

    public function store(Request $request, AnalisaModel $analisa)
    {
        $validator = Validator::make($request->all(), [
            'id_produk' => 'required',
            'tgl_prediksi' => 'required',
            'hasil_analisa' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('analisa.create')
                ->withErrors($validator)
                ->withInput();
        }

        $analisa->id_produk = $request->input('id_produk');
        $analisa->tgl_prediksi = $request->input('tgl_prediksi');
        $analisa->hasil_analisa = $request->input('hasil_analisa');
        $analisa->save();

        return redirect('analisa')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $analisa = AnalisaModel::find($id);
        return view('pages.analisa.form', compact('analisa'));
    }

    public function update(Request $request, AnalisaModel $analisa)
    {
        $validator = Validator::make($request->all(), [
            'id_produk' => 'required',
            'tgl_prediksi' => 'required',
            'hasil_analisa' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('analisa.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $analisa->id_produk = $request->input('id_produk');
        $analisa->tgl_prediksi = $request->input('tgl_prediksi');
        $analisa->hasil_analisa = $request->input('hasil_analisa');
        $analisa->save();

        return redirect('analisa')
            ->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $analisa = AnalisaModel::find($id);
        $analisa->delete();
        return redirect('analisa')
            ->with('success', 'Data berhasil dihapus');
    }

    public function step2(){
        $analisa = DB::table('transaksi_detail')
                ->leftjoin('produk','produk.id_produk','=' ,'transaksi_detail.id_produk')
                ->select('transaksi_detail.id_produk','nm_produk')
                ->groupBy('transaksi_detail.id_produk','nm_produk')
                ->get();
        $data = [];
        foreach($analisa as $key=>$item){
            $data[$item->id_produk]["nm_produk"] =$item->nm_produk;
            $data[$item->id_produk]["detail"] =[];
            $data[$item->id_produk]["total"] =[];
            $data[$item->id_produk]["probabilitas"] =[];
            for ($i=1; $i <=12 ; $i++) { 
                $hasil = DB::table('transaksi_detail')
                ->join('transaksi','transaksi.id_transaksi','=' ,'transaksi_detail.id_transaksi')
                ->select(DB::raw('SUM(jumlah) as jumlah'))
                ->whereMonth('transaksi.tanggal_transaksi',$i)
                ->where('transaksi_detail.id_produk',$item->id_produk)
                ->first()->jumlah ?? 0;
                $data[$item->id_produk]["detail"][$i] = $hasil;

                $total = DB::table('transaksi_detail')
                ->join('transaksi','transaksi.id_transaksi','=' ,'transaksi_detail.id_transaksi')
                ->select(DB::raw('SUM(jumlah) as total'))
                ->where('transaksi_detail.id_produk',$item->id_produk)
                ->first()->total ?? 0;
                $data[$item->id_produk]["total"] = $total;

                $data[$item->id_produk]["probabilitas"][$i] = $data[$item->id_produk]["detail"][$i]/$data[$item->id_produk]["total"];


            }
            
        }
        return view('pages.analisa.step2', compact('analisa','data'));
    }

    public function step3(){

        $analisa = DB::table('transaksi_detail')
                ->leftjoin('produk','produk.id_produk','=' ,'transaksi_detail.id_produk')
                ->select('transaksi_detail.id_produk','nm_produk')
                ->groupBy('transaksi_detail.id_produk','nm_produk')
                ->get();
        $data = [];
        foreach($analisa as $key=>$item){
            $data[$item->id_produk]["nm_produk"] =$item->nm_produk;
            $data[$item->id_produk]["detail"] =[];
            $data[$item->id_produk]["total"] =[];
            $data[$item->id_produk]["probabilitas"] =[];
            for ($i=1; $i <=12 ; $i++) { 
                $hasil = DB::table('transaksi_detail')
                ->join('transaksi','transaksi.id_transaksi','=' ,'transaksi_detail.id_transaksi')
                ->select(DB::raw('SUM(jumlah) as jumlah'))
                ->whereMonth('transaksi.tanggal_transaksi',$i)
                ->where('transaksi_detail.id_produk',$item->id_produk)
                ->first()->jumlah ?? 0;
                $data[$item->id_produk]["detail"][$i] = $hasil;

                $total = DB::table('transaksi_detail')
                ->join('transaksi','transaksi.id_transaksi','=' ,'transaksi_detail.id_transaksi')
                ->select(DB::raw('SUM(jumlah) as total'))
                ->where('transaksi_detail.id_produk',$item->id_produk)
                ->first()->total ?? 0;
                $data[$item->id_produk]["total"] = $total;

                $data[$item->id_produk]["probabilitas"][$i] = $data[$item->id_produk]["detail"][$i]/$data[$item->id_produk]["total"];


            }
            
        }
        return view('pages.analisa.step3', compact('analisa','data'));
    }

    public function step4(){

        $analisa = DB::table('transaksi_detail')
                ->leftjoin('produk','produk.id_produk','=' ,'transaksi_detail.id_produk')
                ->select('transaksi_detail.id_produk','nm_produk')
                ->groupBy('transaksi_detail.id_produk','nm_produk')
                ->get();
        $data = [];
        foreach($analisa as $key=>$item){
            $data[$item->id_produk]["nm_produk"] =$item->nm_produk;
            $data[$item->id_produk]["detail"] =[];
            $data[$item->id_produk]["total"] =[];
            $data[$item->id_produk]["probabilitas"] =[];
            for ($i=1; $i <=12 ; $i++) { 
                $hasil = DB::table('transaksi_detail')
                ->join('transaksi','transaksi.id_transaksi','=' ,'transaksi_detail.id_transaksi')
                ->select(DB::raw('SUM(jumlah) as jumlah'))
                ->whereMonth('transaksi.tanggal_transaksi',$i)
                ->where('transaksi_detail.id_produk',$item->id_produk)
                ->first()->jumlah ?? 0;
                $data[$item->id_produk]["detail"][$i] = $hasil;

                $total = DB::table('transaksi_detail')
                ->join('transaksi','transaksi.id_transaksi','=' ,'transaksi_detail.id_transaksi')
                ->select(DB::raw('SUM(jumlah) as total'))
                ->where('transaksi_detail.id_produk',$item->id_produk)
                ->first()->total ?? 0;
                $data[$item->id_produk]["total"] = $total;

                $data[$item->id_produk]["probabilitas"][$i] = $data[$item->id_produk]["detail"][$i]/$data[$item->id_produk]["total"];
                $data[$item->id_produk]["x"][$i] = $data[$item->id_produk]["probabilitas"][$i] * 100;

            }

            
        }
        return view('pages.analisa.step4', compact('analisa','data'));
    }

    public function randomnumber(){
        $produk = DB::table('transaksi_detail')
                ->leftjoin('produk','produk.id_produk','=' ,'transaksi_detail.id_produk')
                ->select('transaksi_detail.id_produk','nm_produk')
                ->groupBy('transaksi_detail.id_produk','nm_produk')
                ->get();

        return view('pages.analisa.random', compact('produk'));
    }

    public function hasil(){
        $analisa = DB::table('transaksi_detail')
                ->leftjoin('produk','produk.id_produk','=' ,'transaksi_detail.id_produk')
                ->select('transaksi_detail.id_produk','nm_produk')
                ->groupBy('transaksi_detail.id_produk','nm_produk')
                ->get();
        $data = [];

        foreach($analisa as $key=>$item){
            $data[$item->id_produk]["nm_produk"] =$item->nm_produk;
            $data[$item->id_produk]["id_produk"] =$item->id_produk;
            $data[$item->id_produk]["detail"] =[];
            $data[$item->id_produk]["total"] =[];
            $data[$item->id_produk]["probabilitas"] =[];
            for ($i=1; $i <=12 ; $i++) { 
                $hasil = DB::table('transaksi_detail')
                ->join('transaksi','transaksi.id_transaksi','=' ,'transaksi_detail.id_transaksi')
                ->select(DB::raw('SUM(jumlah) as jumlah'))
                ->whereMonth('transaksi.tanggal_transaksi',$i)
                ->where('transaksi_detail.id_produk',$item->id_produk)
                ->first()->jumlah ?? 0;
                $data[$item->id_produk]["detail"][$i] = $hasil;

                $total = DB::table('transaksi_detail')
                ->join('transaksi','transaksi.id_transaksi','=' ,'transaksi_detail.id_transaksi')
                ->select(DB::raw('SUM(jumlah) as total'))
                ->where('transaksi_detail.id_produk',$item->id_produk)
                ->first()->total ?? 0;
                $data[$item->id_produk]["total"] = $total;

                $data[$item->id_produk]["probabilitas"][$i] = $data[$item->id_produk]["detail"][$i]/$data[$item->id_produk]["total"];
                $data[$item->id_produk]["x"][$i] = number_format($data[$item->id_produk]["probabilitas"][$i] * 100);
            }   
        }
        // dd($data);
        return view('pages.analisa.hasil', compact('analisa','data'));
    }

    //create function rangevalue
    public function rangevalue($data,$start,$end){
        $range = [];
        for ($i=$start; $i <= $end ; $i++) { 
            $range[$i] = $data[$i];
        }
        return $range;
    }

    
}