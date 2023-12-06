<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    use HasFactory;
    protected $table = 'pedido';
    protected $fillable = ['idpedido','idproveedor','fotofactura'];
    protected $primaryKey = 'idpedido';


public function proveedor()
{
    return $this->belongsTo(Proveedor::class, 'idproveedor');
}
public function detalles()
{
    return $this->hasMany(DetallePedido::class, 'idpedido');
}

}
