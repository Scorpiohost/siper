<?php

namespace App\Models\produksi\penjadwalan;

use App\Models\produksi\pabrik\Pabrik;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    use HasFactory;
    protected $table    = 'penjadwalan_produksi';
    protected $fillable = ['kodeproduksi', 'bcode', 'tanggal_mulai', 'tanggal_selesai'];
    public $timestamps  = false;

    public function pabrik()
    {
        return $this->hasMany(Pabrik::class, 'penugasan', 'kodeproduksi', 'kodepabrik')
                    ->withPivot('estimasi');
    }
}
