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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_menu');
            $table->foreignId('id_pelanggan');
            $table->integer('quantity');
            $table->float('total_harga');
            $table->enum('status', ['pending', 'dibayar']);
            $table->timestamps();
            $table->foreign('id_menu')->references('id')->on('menus');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
