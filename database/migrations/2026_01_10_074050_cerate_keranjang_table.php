<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('id_keranjang');

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_buku');

            $table->integer('jumlah_buku');
            $table->integer('durasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('harga_total');

            $table->enum('status', ['cart', 'checkout'])->default('cart');

            $table->timestamps();

            // RELASI
            $table->foreign('id_user')
                ->references('id_user')->on('users')
                ->onDelete('cascade');

            $table->foreign('id_buku')
                ->references('id_buku')->on('buku')
                ->onDelete('cascade');

            // UNIQUE CART
            $table->unique([
                'id_user',
                'id_buku',
                'tanggal_mulai',
                'tanggal_selesai'
            ], 'uniq_cart');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
