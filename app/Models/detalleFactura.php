<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleFactura extends Model
{
    use HasFactory;
    protected $table = 'detallefactura';
    protected $fillable = ['iddetallefactura','idfactura','idproducto','cantidad','precio','unidadmedida','cantidadmedida'];
    protected $primaryKey = 'iddetallefactura';
    public function producto()
    {
        return $this->belongsTo(Busquedapro::class, 'idproducto', 'idproducto');
    }
}

