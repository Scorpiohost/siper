<?php

namespace App\Http\Controllers\pemasaran\barang_dikirim;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\pemasaran\barang_dikirim\Barang_dikirim;
use App\Models\pemasaran\kurir\Kurir;
use App\Models\pemasaran\pelanggan\Pelanggan;
use App\Models\pergudangan\barang_out\Barang_out;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Barang_dikirimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_dikirim = DB::table('barang_dikirim')
                            ->join('barang_out', 'barang_dikirim.tcodeout', '=', 'barang_out.tcodeout')
                            ->join('pelanggan', 'barang_dikirim.id_pelanggan', '=', 'pelanggan.id')
                            ->join('kurir', 'barang_dikirim.id_kurir', '=', 'kurir.id')
                            ->select(
                                'barang_dikirim.koderesi', 
                                'barang_out.tcodeout',
                                'pelanggan.nama', 
                                'kurir.kurir',
                                'barang_dikirim.tanggal_dikirim'
                            );
        $data           = $barang_dikirim->get();

        return view('pemasaran.barang_dikirim.barang_dikirim', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang_keluar = Barang_out::all();
        $pelanggan     = Pelanggan::all();
        $kurir         = Kurir::all();

        return view('pemasaran.barang_dikirim.form', [
            'barang_keluar' => $barang_keluar,
            'pelanggan'     => $pelanggan,
            'kurir'         => $kurir
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
            'Koderesi'  => 'required|unique:barang_dikirim',
            'Tcodeout'  => 'required',
            'Pelanggan' => 'required',
            'Kurir'     => 'required',
            'Dikirim'   => 'required'
        ]);

        Barang_dikirim::create([
            'koderesi'        => $request->Koderesi,
            'tcodeout'        => $request->Tcodeout,
            'id_pelanggan'    => $request->Pelanggan,
            'id_kurir'        => $request->Kurir,
            'tanggal_dikirim' => $request->Dikirim
        ]);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect('penjualan/barang-dikirim');
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
    public function edit($koderesi)
    {
        $barang_dikirim = Barang_dikirim::where('koderesi', $koderesi);
        $data           = $barang_dikirim->first();
        $barang_keluar  = Barang_dikirim::all();
        $pelanggan      = Pelanggan::all();
        $kurir          = Kurir::all();

        return view('pemasaran.barang_dikirim.e-form', [
            'data'           => $data,
            'barang_dikirim' => $barang_keluar,
            'pelanggan'      => $pelanggan,
            'kurir'          => $kurir
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $koderesi)
    {
        $request->validate([
            'Koderesi'  => 'required',
            'Tcodeout'  => 'required',
            'Pelanggan' => 'required',
            'Kurir'     => 'required',
            'Dikirim'   => 'required'
        ]);

        Barang_dikirim::where('koderesi', $koderesi)
                        ->update([
                            'tcodeout'        => $request->Tcodeout,
                            'id_pelanggan'    => $request->Pelanggan,
                            'id_kurir'        => $request->Kurir,
                            'tanggal_dikirim' => $request->Dikirim 
                        ]); 
        
        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect('penjualan/barang-dikirim');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
