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
        Schema::create('persona', function (Blueprint $table) {
            $table->id('idpersona');
            $table->string('nombre',70);
            $table->string('apellido',70);
            $table->string('direccion');
            $table->string('telefono',17);
            $table->date('fechanacimiento')->nullable();
            $table->string('correo');
            $table->string('documento',12);
            $table->string('tipo',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
