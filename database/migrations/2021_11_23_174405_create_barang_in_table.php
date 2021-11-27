<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_in', function (Blueprint $table) {
            $table->string('tcodein')
                ->primary();
            
            $table->string('bcode');
            $table->integer('qty');
            $table->date('tanggal');

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
        Schema::dropIfExists('barang_in');
    }
}
