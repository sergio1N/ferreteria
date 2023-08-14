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
        Schema::create('detallefactura', function (Blueprint $table) {
            $table->id('iddetallefactura');
            $table->unsignedBigInteger('idfactura');
            $table->foreign('idfactura')->references('idfactura')->on('factura');
            $table->unsignedBigInteger('idproducto');
            $table->foreign('idproducto')->references('idproducto')->on('producto');
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->string('unidadmedida')->nullable();
            $table->string('cantidadmedida')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallefactura');
    }
};
