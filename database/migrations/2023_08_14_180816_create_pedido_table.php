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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id('idpedido');
            $table->unsignedBigInteger('idproveedor');
            $table->foreign('idproveedor')->references('idproveedor')->on('proveedor');
            $table->string('fotofactura');
            $table->datetime('fechahora')->default(DB::raw('CURRENT_TIMESTAMP')); // Agrega esta línea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
