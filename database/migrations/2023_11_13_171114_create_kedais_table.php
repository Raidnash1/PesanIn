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
        Schema::create('kedais', function (Blueprint $table) {
            $table->id('id_kedai');
            $table->string('nama_kedai');
            $table->string('nama_pemilik');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('alamat');
            $table->string('dashboard_heading');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kedais');
    }
};
