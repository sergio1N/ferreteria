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
        Schema::create('factura', function (Blueprint $table) {
            $table->id('idfactura');
            $table->unsignedBigInteger('idpersona');
            $table->foreign('idpersona')->references('idpersona')->on('persona');
            $table->dateTime('fechahora');
            $table->decimal('abono')->nullable();
            $table->decimal('deuda')->nullable();
            $table->decimal('valortotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
