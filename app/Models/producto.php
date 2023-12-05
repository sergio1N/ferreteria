<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    use HasFactory;
    
    protected $table = 'producto';
    protected $fillable = ['idproducto', 'idmarca', 'idcategoria', 'idpersona', 'idestanteria', 'nombre', 'imagen', 'precio', 'unidadmedida', 'cantidadmedida', 'descripcion', 'stock', 'caracteristicas', 'especificaciones'];
    protected $primaryKey = 'idproducto';

    // Relación con las ventas (detallefactura)
// En el modelo Producto
public function detalleFacturas()
{
    return $this->hasMany(DetalleFactura::class, 'idproducto', 'idproducto'); 
}


    // Método para obtener la cantidad vendida hoy
    public function cantidadVendidaHoy()
    {
        return $this->detallefacturas()
            ->whereDate('created_at', now()->toDateString())
            ->sum('cantidad');
    }

    // Método para obtener el valor ganado hoy
    public function valorGanadoHoy()
    {
        return $this->detallefacturas()
            ->whereDate('created_at', now()->toDateString())
            ->sum(DB::raw('precio * cantidad'));
    }
}
 