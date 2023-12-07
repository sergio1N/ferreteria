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
        Schema::create('carrito', function (Blueprint $table) {
            $table->id('idcarrito');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('idproducto');
            $table->integer('cantidad');
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('idproducto')->references('idproducto')->on('producto');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
