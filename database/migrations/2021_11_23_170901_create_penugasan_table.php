<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenugasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penugasan', function (Blueprint $table) {

            $table->string('kodeproduksi');
            $table->string('kodepabrik');
            $table->integer('estimasi');

            $table->primary([
                'kodeproduksi', 
                'kodepabrik'
            ]);

            $table->foreign('kodeproduksi')
                ->references('kodeproduksi')
                ->on('penjadwalan_produksi')
                ->onDelete('cascade');

            $table->foreign('kodepabrik')
                ->references('kodepabrik')
                ->on('pabrik')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penugasan');
    }
}
