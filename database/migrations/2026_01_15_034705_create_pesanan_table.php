<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_address');

            $table->integer('total_harga');
            $table->enum('status', ['tertunda', 'diproses', 'selesai'])
                ->default('tertunda');

            $table->timestamps();

            // RELASI
            $table->foreign('id_user')
                ->references('id_user')->on('users')
                ->onDelete('cascade');

            $table->foreign('id_address')
                ->references('id')->on('addresses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
