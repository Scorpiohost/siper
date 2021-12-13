<?php

namespace App\Http\Controllers\produksi\penjadwalan;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\produksi\penjadwalan\Penjadwalan;
use App\Models\pergudangan\barang\Barang;
use App\Models\produksi\pabrik\Pabrik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PenjadwalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produksi = DB::table('penugasan')
            ->join(
                'penjadwalan_produksi',
                'penugasan.kodeproduksi',
                '=',
                'penjadwalan_produksi.kodeproduksi'
            )
            ->join(
                'pabrik',
                'penugasan.kodepabrik',
                '=',
                'pabrik.kodepabrik'
            )
            ->select(
                'penjadwalan_produksi.*',
                'pabrik.pabrik',
                'penugasan.estimasi'
            );
        $data     = $produksi->get();

        return view('produksi.penjadwalan.penjadwalan', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penjadwalan = Penjadwalan::all();
        $barang      = Barang::all();
        $pabrik      = Pabrik::all();

        if ($penjadwalan->isEmpty()) {
            $kode = 'JAD001';
            return view('produksi.penjadwalan.form', [
                'kode'   => $kode,
                'barang' => $barang,
                'pabrik' => $pabrik
            ]);
        }

        foreach ($penjadwalan as $result) {
            $kode = $result->kodeproduksi;
        }

        $no   = (int) substr($kode, 3, 3);
        $no++;
        $char = 'JAD';
        $kode = $char . sprintf("%03s", $no);

        return view('produksi.penjadwalan.form', [
            'kode'   => $kode,
            'barang' => $barang,
            'pabrik' => $pabrik
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Kodeproduksi' => 'required|unique:penjadwalan_produksi',
            'Barang'       => 'required',
            'Pabrik'       => 'required',
            'Mulai'        => 'required',
            'Selesai'      => 'required'
        ]);

        Penjadwalan::create([
            'kodeproduksi'    => $request->Kodeproduksi,
            'bcode'           => $request->Barang,
            'tanggal_mulai'   => $request->Mulai,
            'tanggal_selesai' => $request->Selesai
        ]);

        $mulai   = Penjadwalan::where('kodeproduksi', $request->Kodeproduksi)
            ->select('tanggal_mulai')
            ->first();
        $selesai = Penjadwalan::where('kodeproduksi', $request->Kodeproduksi)
            ->select('tanggal_selesai')
            ->first();

        $dari       = Carbon::parse($mulai->tanggal_mulai);
        $sampai     = Carbon::parse($selesai->tanggal_selesai);
        $estimasi   = $dari->diffInDays($sampai);

        DB::table('penugasan')->insert([
            'kodeproduksi' => $request->Kodeproduksi,
            'kodepabrik'   => $request->Pabrik,
            'estimasi'     => $estimasi
        ]);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect(url('/penjadwalan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kodeproduksi)
    {
        $penjadwalan = Penjadwalan::where('kodeproduksi', $kodeproduksi)
            ->first();
        $penugasan   = DB::table('penugasan')
            ->select('kodepabrik')
            ->first();
        $barang      = Barang::all();
        $pabrik      = Pabrik::all();

        return view('produksi.penjadwalan.e-form', [
            'kode'        => $penjadwalan,
            'kodepabrik'  => $penugasan,
            'barang'      => $barang,
            'pabrik'      => $pabrik
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kodeproduksi)
    {
        $request->validate([
            'Kodeproduksi' => 'required',
            'Barang'       => 'required',
            'Pabrik'       => 'required',
            'Mulai'        => 'required',
            'Selesai'      => 'required'
        ]);
        
        DB::table('penjadwalan_produksi')
            ->where('kodeproduksi', $kodeproduksi)
            ->update([
                'bcode'             => $request->Barang,
                'tanggal_mulai'     => $request->Mulai,
                'tanggal_selesai'   => $request->Selesai
            ]);

        $mulai   = Penjadwalan::where('kodeproduksi', $request->Kodeproduksi)
            ->select('tanggal_mulai')
            ->first();
        $selesai = Penjadwalan::where('kodeproduksi', $request->Kodeproduksi)
            ->select('tanggal_selesai')
            ->first();

        $dari       = Carbon::parse($mulai->tanggal_mulai);
        $sampai     = Carbon::parse($selesai->tanggal_selesai);
        $estimasi   = $dari->diffInDays($sampai);

        DB::table('penugasan')
            ->where('kodeproduksi', '=', $kodeproduksi)
            ->update([
                'kodepabrik' => $request->Pabrik,
                'estimasi'   => $estimasi
            ]);
        
        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect(url('/penjadwalan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kodeproduksi)
    {
        DB::table('penugasan')
            ->where('kodeproduksi', '=', $kodeproduksi)
            ->delete();

        DB::table('penjadwalan_produksi')
            ->where('kodeproduksi', '=', $kodeproduksi)
            ->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect('/penjadwalan');

        //return dump($kodepabrik->kodepabrik);
    }
}
