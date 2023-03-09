<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang');
            $table->date('tanggal_jual');
            $table->String('pembeli', 100);
            $table->String('nama_barang', 100);
            $table->unsignedBigInteger('qty');
            $table->unsignedBigInteger('harga_awal');
            $table->unsignedBigInteger('harga_jual');
            $table->unsignedBigInteger('laba');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
