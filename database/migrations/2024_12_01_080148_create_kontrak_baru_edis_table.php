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
        Schema::create('kontrak_baru_edis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_penawaran')->nullable();
            $table->string('sales')->nullable();
            $table->string('customer')->nullable();
            $table->string('produk')->nullable();
            $table->date('jenis_kontrak')->nullable();
            $table->integer('konsep')->nullable();
            $table->integer('detail_target')->nullable();
            $table->integer('bonus')->nullable();
            $table->string('checklist_do')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrak_baru_edis');
    }
};
