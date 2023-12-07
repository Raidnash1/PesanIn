<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up()
    {
        Schema::create('paket_langganans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->enum('type', ['free', 'monthly'])->default('free');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket_langganan');
    }
};
