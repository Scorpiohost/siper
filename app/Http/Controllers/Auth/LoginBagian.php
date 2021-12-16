<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBagian extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $bagian = Auth::user()->bagian;
    
            switch($bagian) {
                case 'manajer' :
                    return redirect('/manajer/keuangan');
                    break;
                case 'keuangan' :
                    return redirect('/keuangan');
                    break;
                case 'gudang' :
                    return redirect('gudang/barang-out');
                    break;
                case 'penjualan' :
                    return redirect('penjualan/barang-dikirim');
                    break;
                case 'produksi' :
                    return redirect('produksi/penjadwalan');
                    break;
                default:
                    return redirect('/');
                    break;
            }

        } else {
            return redirect('login');
        }
    }
}
