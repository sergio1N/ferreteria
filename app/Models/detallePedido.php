<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallePedido extends Model
{
    use HasFactory;
    protected $table = 'detallepedido';
    protected $fillable = ['iddetallepedido','idpedido','idproducto','descripcion','precio','cantidad','valortotal'];
    protected $primaryKey = 'iddetallepedido';

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idpedido', 'idpedido');
    }
}
