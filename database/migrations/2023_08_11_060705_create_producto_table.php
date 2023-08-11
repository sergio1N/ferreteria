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
            $table->integer('idmarca');
            $table->integer('idcategoria');
            $table->integer('idpersona');
            $table->integer('idestanteria');
            $table->string('nombre');
            $table->text('descripcion');
            $table->integer('stock');
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
