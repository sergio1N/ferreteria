<?php

namespace App\Console\Commands;

use App\Models\Producto;
use App\Mail\InformeInventario;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EnviarInformeInventario extends Command
{
    protected $signature = 'enviar:informe';
    protected $description = 'Envía el informe de productos en inventario cada 24 horas';

    public function handle()
    {
        // Obtener productos con información adicional
        $productos = Producto::with('detallefacturas:idproducto,cantidad,precio,created_at')
            ->select(
                'idproducto',
                'nombre',
                'stock'
            )->get();

        // Calcular datos adicionales en PHP
        $productos->each(function ($producto) {
            $producto->vendido_hoy = $producto->detallefacturas
                ->where('created_at', '>=', now()->startOfDay())
                ->where('created_at', '<', now()->endOfDay())
                ->sum('cantidad');

            $producto->valor_ganado = $producto->detallefacturas
                ->where('created_at', '>=', now()->startOfDay())
                ->where('created_at', '<', now()->endOfDay())
                ->sum('precio * cantidad');
        });

        // Envía el informe por correo
        Mail::to('adiminferreteria@gmail.com')->send(new InformeInventario($productos));

        $this->info('Informe enviado con éxito.');
    }
}
