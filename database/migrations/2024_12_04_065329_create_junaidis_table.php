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
        Schema::create('junaidis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_penawaran')->nullable();
            $table->date('tanggal_do')->nullable();
            $table->string('sales')->nullable();
            $table->string('customer')->nullable();
            $table->string('produk')->nullable();
            $table->string('qty')->nullable();
            $table->string('msk')->nullable();
            $table->string('checklist_do')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('junaidis');
    }
};
