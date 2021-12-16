<?php

namespace App\Http\Controllers\pergudangan\barang_in;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\pergudangan\barang\Barang;
use App\Models\pergudangan\barang_in\Barang_in;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Barang_inController extends Controller
{
    public function index()
    {
        $barang_in = DB::table('barang_in')
                        ->join('barang', 'barang_in.bcode', '=', 'barang.bcode')
                        ->select('barang_in.*', 'barang.nama');
                        
        $data      = $barang_in->get();
        return view('pergudangan.barang_in.barang_in', ['data' => $data]);
    }

    public function create()
    {
        $barang_in = Barang_in::all();
        $barang    = Barang::all();

        if ($barang_in->isEmpty()) {
            $kode = 'BIN001';
            return view('pergudangan.barang_in.form', [
                'kode'   => $kode,
                'barang' => $barang
            ]);
        }

        foreach ($barang_in as $result) {
            $kode = $result->tcodein;
        }

        $no   = (int) substr($kode, 3, 3);
        $no++;
        $char = 'BIN';
        $kode = $char . sprintf("%03s", $no);

        return view('pergudangan.barang_in.form', [
            'kode'   => $kode,
            'barang' => $barang
        ]);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'Tcodein' => 'required|unique:barang_in',
            'Bcode'   => 'required',
            'Qty'     => 'required|integer',
            'Tanggal' => 'required|date'
        ]);
        
        Barang_in::create([
            'tcodein' => $request->Tcodein,
            'bcode'   => $request->Bcode,
            'qty'     => $request->Qty,
            'tanggal' => $request->Tanggal
        ]); 

        $barang    = Barang::where('bcode', $request->Bcode)
                        ->select('stok')
                        ->first();
        
        $barang_in = Barang_in::where('tcodein', $request->Tcodein)
                        ->select('qty')
                        ->first();

        $result = $barang->stok + $barang_in->qty;

        Barang::where('bcode', $request->Bcode)
                ->update(['stok' => $result]);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect('gudang/barang-in');
    }
}
