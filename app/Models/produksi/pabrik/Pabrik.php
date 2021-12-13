<?php

namespace App\Models\produksi\pabrik;

use App\Models\produksi\penjadwalan\Penjadwalan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pabrik extends Model
{
    use HasFactory;
    protected $table    = 'pabrik';
    protected $fillable = ['kodepabrik', 'pabrik', 'lokasi'];
    public $timestamps  = false;

    public function penjadwalan()
    {
        return $this->belongsToMany(Penjadwalan::class, 'penugasan', 'kodeproduksi', 'kodepabrik')
                    ->withPivot('estimasi');
    }
}
