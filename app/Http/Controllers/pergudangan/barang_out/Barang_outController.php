<?php

namespace App\Http\Controllers\pergudangan\barang_out;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\pergudangan\barang\Barang;
use App\Models\pergudangan\barang_out\Barang_out;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Barang_outController extends Controller
{
    public function index()
    {
        $barang_out = DB::table('barang_out')
            ->join('barang', 'barang_out.bcode', '=', 'barang.bcode')
            ->select('barang_out.*', 'barang.nama');

        $data      = $barang_out->get();
        return view('pergudangan.barang_out.barang_out', ['data' => $data]);
    }

    public function create()
    {
        $barang_out = Barang_out::all();
        $barang     = Barang::all();

        if ($barang_out->isEmpty()) {
            $kode = 'BO001';
            return view('pergudangan.barang_out.form', [
                'kode'   => $kode,
                'barang' => $barang
            ]);
        }

        foreach ($barang_out as $result) {
            $kode = $result->tcodeout;
        }

        $no   = (int) substr($kode, 3, 3);
        $no++;
        $char = 'BO';
        $kode = $char . sprintf("%03s", $no);

        return view('pergudangan.barang_out.form', [
            'kode'   => $kode,
            'barang' => $barang
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tcodeout' => 'required|unique:barang_out',
            'Bcode'    => 'required',
            'Qty'      => 'required|integer',
            'Tanggal'  => 'required|date'
        ]);

        Barang_out::create([
            'tcodeout' => $request->Tcodeout,
            'bcode'    => $request->Bcode,
            'qty'      => $request->Qty,
            'tanggal'  => $request->Tanggal
        ]);

        $barang = Barang::where('bcode', $request->Bcode)
            ->select('stok')
            ->first();

        $barang_out = Barang_out::where('tcodeout', $request->Tcodeout)
            ->select('qty')
            ->first();

        $result = $barang->stok - $barang_out->qty;

        Barang::where('bcode', $request->Bcode)
            ->update(['stok' => $result]);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect('/barang-out');

    }
}
