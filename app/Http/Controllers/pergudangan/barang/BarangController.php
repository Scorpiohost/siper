<?php

namespace App\Http\Controllers\pergudangan\barang;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\pergudangan\barang\Barang;
use App\Models\pergudangan\jenis_barang\Jenis_BarangModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = DB::table('barang')
                    ->join('jenis_barang', 'barang.id_jenis', '=', 'jenis_barang.id')
                    ->select('barang.*', 'jenis_barang.jenis');
        $data   = $barang->get();
        
        return view('pergudangan.barang.barang', ['data' => $data]);
    }

    public function create()
    {
        $barang       = Barang::all();
        $jenis_barang = Jenis_BarangModel::all();

        if ($barang->isEmpty()) {
            $kode = 'BRG001';
            return view('pergudangan.barang.form', [
                'kode'  => $kode,
                'jenis' => $jenis_barang
            ]);
        }

        foreach ($barang as $result) {
            $kode = $result->bcode;
        }

        $no   = (int) substr($kode, 3, 3);
        $no++;
        $char = 'BRG';
        $kode = $char . sprintf("%03s", $no);

        return view('pergudangan.barang.form', [
            'kode'  => $kode,
            'jenis' => $jenis_barang
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Bcode' => 'required|unique:barang',
            'Nama'  => 'required',
            'Jenis' => 'required',
            'Stok'  => 'required'
        ]);

        Barang::create([
            'bcode'     => $request->Bcode,
            'nama'      => $request->Nama,
            'id_jenis'  => $request->Jenis,
            'stok'      => $request->Stok
        ]);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect(url('/barang'));
    }

    public function edit($bcode) 
    {
        $barang         = Barang::where('bcode', $bcode);
        $jenis_barang   = Jenis_BarangModel::all();
        $kode           = $barang->first();

        return view('pergudangan.barang.e-form', [
            'kode'  => $kode,
            'jenis' => $jenis_barang
        ]);
    }

    public function update(Request $request, $bcode)
    {
        $request->validate([
            'Bcode' => 'required',
            'Nama'  => 'required',
            'Jenis' => 'required',
            'Stok'  => 'required'
        ]);

        Barang::where('bcode', $bcode)
            ->update([
                'nama'      => $request->Nama,
                'id_jenis'  => $request->Jenis,
                'stok'      => $request->Stok
            ]);

        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect('/barang');
    }

    public function destroy($bcode)
    {
        Barang::where('bcode', $bcode)
            ->delete();
        
        Alert::toast('Data Dihapus', 'success');
        return redirect('/barang');
    }
}
