<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedor';
    protected $fillable = ['idproveedor','iddepartamento','idciudad','nombre','telefono','direccion','nit','correo'];
    protected $primaryKey = 'idproveedor';
}
