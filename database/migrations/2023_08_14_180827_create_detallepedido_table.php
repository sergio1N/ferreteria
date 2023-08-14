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
        Schema::create('detallepedido', function (Blueprint $table) {
            $table->id('iddetallepedido');
            $table->unsignedBigInteger('idpedido');
            $table->foreign('idpedido')->references('idpedido')->on('pedido');
            $table->unsignedBigInteger('idproducto');
            $table->foreign('idproducto')->references('idproducto')->on('producto');
            $table->text('descripcion');
            $table->decimal('precio');
            $table->float('cantidad');
            $table->decimal('valortotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallepedido');
    }
};
