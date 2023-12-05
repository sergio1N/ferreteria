<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InformeInventario extends Mailable
{
    use Queueable, SerializesModels;

    public $productos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($productos)
    {
        $this->productos = $productos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contenido = "Contenido del informe:<br>";
    
        foreach ($this->productos as $producto) {
            $contenido .= "Producto: {$producto->nombre}, Stock: {$producto->stock}, Vendido Hoy: {$producto->vendido_hoy}, Valor Ganado Hoy: {$producto->valor_ganado}<br>";
        }
    
        return $this->view('mail.informe')->with(['contenido' => $contenido]);
    }
    
    
}
