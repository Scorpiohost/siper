<?php

namespace App\Models\keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    //use HasFactory;
    protected $table        = 'keuangan';
    protected $fillable     = ['tcode', 'transaksi', 'pengeluaran'];
    public $timestamps      = false;
}
