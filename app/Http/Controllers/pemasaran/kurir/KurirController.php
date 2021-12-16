<?php

namespace App\Http\Controllers\pemasaran\kurir;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\pemasaran\kurir\Kurir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurir = Kurir::all();
        return view('pemasaran.kurir.kurir', ['kurir' => $kurir]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasaran.kurir.form');
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
            'Kurir' => 'required'
        ]);

        $kurir        = new Kurir;
        $kurir->kurir = $request->Kurir;
        $kurir->save();

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect('penjualan/kurir');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kurir = Kurir::find($id);
        return view('pemasaran.kurir.e-form', ['kurir' => $kurir]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id'    => 'required',
            'Kurir' => 'required'
        ]);

        $kurir        = Kurir::find($id);
        $kurir->kurir = $request->Kurir;
        $kurir->save();

        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect('penjualan/kurir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kurir = Kurir::find($id);
        $kurir->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect('penjualan/kurir');
    }
}
