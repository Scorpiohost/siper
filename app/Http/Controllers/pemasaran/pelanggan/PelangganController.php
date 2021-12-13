<?php

namespace App\Http\Controllers\pemasaran\pelanggan;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\pemasaran\pelanggan\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        
        return view('pemasaran.pelanggan.pelanggan', ['pelanggan' => $pelanggan]);
    }

    public function create()
    {
        return view('pemasaran.pelanggan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama'      => 'required',
            'Alamat'    => 'required',
            'Telepon'   => 'required'
        ]);

        Pelanggan::create([
            'nama'      => $request->Nama,
            'alamat'    => $request->Alamat,
            'tlp'       => $request->Telepon
        ]);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect('/pelanggan');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::find($id);

        return view('pemasaran.pelanggan.e-form', ['pelanggan' => $pelanggan]);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);

        $request->validate([
            'Nama'      => 'required',
            'Alamat'    => 'required',
            'Telepon'   => 'required'
        ]);

        $pelanggan->nama    = $request->Nama;
        $pelanggan->alamat  = $request->Alamat;
        $pelanggan->tlp     = $request->Telepon;
        $pelanggan->save();

        Alert::toast('Data Berhasil Diubah', 'success');
        return redirect('/pelanggan');
    }

    Public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect('/pelanggan');
    }
}
