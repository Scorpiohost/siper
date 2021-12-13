<?php

namespace App\Http\Controllers\keuangan;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\keuangan\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $keuangan   = new Keuangan;
        $data       = $keuangan::all();
        return view('keuangan.dashboard', ['data' => $data]);
    }

    public function create()
    {
        $keuangan = Keuangan::all();

        if ($keuangan->isEmpty()) {
            $kode = 'T001';
            return view('keuangan.form', ['kode' => $kode]);
        }

        foreach ($keuangan as $result) {
            $kode = $result->tcode;
        }

        $no   = (int) substr($kode, 3, 3);
        $no++;
        $char = 'T';
        $kode = $char . sprintf("%03s", $no);

        return view('keuangan.form', ['kode' => $kode]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tcode'         => 'required|unique:keuangan',
            'Transaksi'     => 'required',
            'Pengeluaran'   => 'required'
        ]);

        Keuangan::create([
            'tcode'         => $request->Tcode,
            'transaksi'     => $request->Transaksi,
            'pengeluaran'   => $request->Pengeluaran
        ]);

        Alert::toast('Data Berhasil Disimpan', 'success');

        return redirect(url('/keuangan'));
    }

    public function edit($tcode)
    {
        $keuangan = Keuangan::where('tcode', $tcode);
        $kode     = $keuangan->first();
        return view('keuangan.e-form', ['kode' => $kode]);
    }

    public function update(Request $request, $tcode)
    {
        $request->validate([
            'Tcode'         => 'required',
            'Transaksi'     => 'required',
            'Pengeluaran'   => 'required'
        ]);

        Keuangan::where('tcode', $tcode)
            ->update([
                'transaksi'     => $request->Transaksi,
                'pengeluaran'   => $request->Pengeluaran
            ]);

        Alert::toast('Data Berhasil Diperbarui', 'success');

        return redirect(url('/keuangan'));
    }

    public function destroy($tcode)
    {

        Keuangan::where('tcode', $tcode)
            ->delete();

        Alert::toast('Data Dihapus', 'success');

        return redirect(url('/keuangan'));
    }
}
