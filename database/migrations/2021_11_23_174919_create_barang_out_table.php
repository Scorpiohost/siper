<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_out', function (Blueprint $table) {
            $table->string('tcodeout')
                ->primary();

            $table->string('bcode');
            $table->integer('qty');
            $table->date('tanggal');

            $table->foreign('bcode')
                ->references('bcode')
                ->on('barang')
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
        Schema::dropIfExists('barang_out');
    }
}
