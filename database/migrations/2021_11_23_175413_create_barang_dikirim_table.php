<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangDikirimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_dikirim', function (Blueprint $table) {
            $table->string('koderesi')
                ->primary();

            $table->string('tcodeout');
            $table->integer('id_pelanggan')
                ->unsigned();

            $table->integer('id_kurir')
                ->unsigned();

            $table->date('tanggal_dikirim');

            $table->foreign('tcodeout')
                ->references('tcodeout')
                ->on('barang_out')
                ->onDelete('cascade');

            $table->foreign('id_pelanggan')
                ->references('id')
                ->on('pelanggan')
                ->onDelete('cascade');

            $table->foreign('id_kurir')
                ->references('id')
                ->on('kurir')
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
        Schema::dropIfExists('barang_dikirim');
    }
}
