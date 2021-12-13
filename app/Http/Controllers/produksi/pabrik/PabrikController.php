<?php

namespace App\Http\Controllers\produksi\pabrik;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\produksi\pabrik\Pabrik;
use Illuminate\Http\Request;

class PabrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pabrik = Pabrik::all();
        return view('produksi.pabrik.pabrik', ['pabrik' => $pabrik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pabrik = Pabrik::all();

        if ($pabrik->isEmpty()) {
            $kode = 'PA001';
            return view('produksi.pabrik.form', ['kode'  => $kode]);
        }

        foreach ($pabrik as $result) {
            $kode = $result->kodepabrik;
        }

        $no   = (int) substr($kode, 3, 3);
        $no++;
        $char = 'PA';
        $kode = $char . sprintf("%03s", $no);

        return view('produksi.pabrik.form', ['kode'   => $kode]);
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
            'Kodepabrik' => 'required|unique:pabrik',
            'Pabrik'     => 'required',
            'Lokasi'     => 'required'
        ]);

        Pabrik::create([
            'kodepabrik' => $request->Kodepabrik,
            'pabrik'     => $request->Pabrik,
            'lokasi'     => $request->Lokasi
        ]);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect(url('/pabrik'));
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
    public function edit($kodepabrik)
    {
        $pabrik = Pabrik::where('kodepabrik', $kodepabrik)
                            ->first();

        return view('produksi.pabrik.e-form', ['data'  => $pabrik]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kodepabrik)
    {
        $request->validate([
            'Kodepabrik' => 'required',
            'Pabrik'     => 'required',
            'Lokasi'     => 'required'
        ]);

        Pabrik::where('kodepabrik', $kodepabrik)
                ->update([
                    'pabrik' => $request->Pabrik,
                    'lokasi' => $request->Lokasi
                ]);

        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect('/pabrik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kodepabrik)
    {
        Pabrik::where('kodepabrik', $kodepabrik)
                    ->delete();
        
        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect('/pabrik');
    }
}
