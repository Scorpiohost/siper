<?php

namespace App\Http\Controllers\manajer;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ManajerController extends Controller
{
    public function users()
    {
        $users = DB::table('users')
            ->get();

        return view('manager.users.users', ['data' => $users]);
    }

    public function keuangan()
    {
        $keuangan = DB::table('keuangan')
            ->get();

        return view('manager.keuangan.keuangan', ['data' => $keuangan]);
    }

    public function produksi()
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

        return view('manager.produksi.produksi', ['data' => $data]);
    }

    public function destroy($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();

        Alert::toast('Data Dihapus', 'success');
        return redirect(url('/manajer/user'));
    }
}
