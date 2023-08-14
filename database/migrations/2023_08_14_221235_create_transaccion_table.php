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
        Schema::create('transaccion', function (Blueprint $table) {
            $table->id('idtransaccion');
            $table->unsignedBigInteger('idfactura');
            $table->foreign('idfactura')->references('idfactura')->on('factura');
            $table->unsignedBigInteger('idmetodopago');
            $table->foreign('idmetodopago')->references('idmetodopago')->on('metodopago');
            $table->string('numerocuenta',20);
            $table->decimal('valor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccion');
    }
};
