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
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id('idproveedor');
            $table->unsignedBigInteger('iddepartamento');
            $table->foreign('iddepartamento')->references('iddepartamento')->on('departamento');
            $table->unsignedBigInteger('idciudad');
            $table->foreign('idciudad')->references('idciudad')->on('ciudad');
            $table->string('nombre', 40);
            $table->string('telefono', 17);
            $table->string('direccion');
            $table->string('nit', 50);
            $table->string('correo');
            $table->boolean('visible')->default(true); // Nuevo campo 'visible'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedor');
    }
};

