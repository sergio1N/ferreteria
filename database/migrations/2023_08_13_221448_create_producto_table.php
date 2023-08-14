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
        Schema::create('producto', function (Blueprint $table) {
            $table->id('idproducto');
            $table->unsignedBigInteger('idmarca');
            $table->foreign('idmarca')->references('idmarca')->on('marca');
            $table->unsignedBigInteger('idcategoria');
            $table->foreign('idcategoria')->references('idcategoria')->on('categoria');
            $table->unsignedBigInteger('idpersona');
            $table->foreign('idpersona')->references('idpersona')->on('persona');
            $table->unsignedBigInteger('idestanteria');
            $table->foreign('idestanteria')->references('idestanteria')->on('estanteria');
            $table->string('nombre',50);
            $table->decimal('precio');
            $table->string('unidadmedida')->nullable();
            $table->string('cantidadmedida')->nullable();
            $table->text('descripcion');
            $table->float('stock',4);
            $table->text('caracteristicas');
            $table->text('especificaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
