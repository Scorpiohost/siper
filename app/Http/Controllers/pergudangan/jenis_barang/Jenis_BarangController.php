<?php

namespace App\Http\Controllers\pergudangan\jenis_barang;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\pergudangan\jenis_barang\Jenis_BarangModel;
use Illuminate\Http\Request;

class Jenis_BarangController extends Controller
{
    public function index()
    {
        $jenis_barang = new Jenis_BarangModel();
        $data         = $jenis_barang::all();
        return view('pergudangan.jenis_barang.jenis_barang', ['data' => $data]);
    }

    public function create()
    {
        return view('pergudangan.jenis_barang.form');
    }

    public function store(Request $request)
    {
        $jenis_barang = new Jenis_BarangModel();
        
        $request->validate([
            'Jenis' => 'required'
        ]);

        $jenis_barang->jenis = $request->Jenis;
        $jenis_barang->save();
        
        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect('gudang/jenis-barang');
    }

    public function edit($id)
    {
        $jenis_barang = Jenis_BarangModel::find($id);

        return view('pergudangan.jenis_barang.e-form', ['jenis_barang' => $jenis_barang]);
    }

    public function update(Request $request, $id)
    {
        $jenis_barang = Jenis_BarangModel::find($id);

        $request->validate([
            'id'    => 'required',
            'Jenis' => 'required'
        ]);
        
        $jenis_barang->jenis = $request->Jenis;
        $jenis_barang->save();

        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect('gudang/jenis-barang');
    }

    public function destroy($id)
    {
        $jenis_barang = Jenis_BarangModel::find($id);
        $jenis_barang->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect('gudang/jenis-barang');
    }
}
