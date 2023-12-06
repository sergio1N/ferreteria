<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;
    protected $table='categoria';
    protected $fillable  =['idcategoria','nombre'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'idcategoria'); // 'idcategoria' es la clave foránea en 'producto'
    }
}
