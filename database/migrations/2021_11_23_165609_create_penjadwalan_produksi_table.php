<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjadwalanProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjadwalan_produksi', function (Blueprint $table) {
            $table->string('kodeproduksi')
                ->primary();
            
            $table->string('bcode');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            $table->foreign('bcode')
                ->references('bcode')
                ->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjadwalan_produksi');
    }
}
