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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->string('nama_produk')->nullable();
            $table->string('kategori_produk')->nullable();
            $table->unsignedBigInteger('harga_produk')->nullable();
            $table->unsignedInteger('jumlah_pesanan')->nullable();
            $table->unsignedBigInteger('total_harga')->nullable();
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid');
            $table->string('midtrans_id')->nullable();
            $table->text('midtrans_token')->nullable();
            $table->string('midtrans_date')->nullable();
            $table->string('midtrans_status')->nullable();
            $table->string('nama_user')->nullable();
            $table->string('email_user')->nullable();
            
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
