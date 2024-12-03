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
        Schema::create('repeat_order_edis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_penawaran')->nullable();
            $table->string('sales')->nullable();
            $table->string('customer')->nullable();
            $table->string('produk')->nullable();
            $table->date('tanggal_akhir_penjualan')->nullable();
            $table->integer('qty_penjualan_akhir')->nullable();
            $table->integer('duz')->nullable();
            $table->integer('btl')->nullable();
            $table->integer('total_qty')->nullable();
            $table->string('checklist_do')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repeat_order_edis');
    }
};
