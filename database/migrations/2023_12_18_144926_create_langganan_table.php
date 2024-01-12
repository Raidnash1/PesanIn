<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('langganans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); // Relasi ke tabel users
            $table->foreignId('paket_langganan_id'); // Relasi ke tabel subscription_packages
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->enum('status', ['1', '2', '3', '4']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('paket_langganan_id')->references('id')->on('paket_langganans');
        });
    }

    public function down()
    {
        Schema::dropIfExists('langganan');
    }
};
