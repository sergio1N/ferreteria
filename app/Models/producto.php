<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    protected $fillable = ['idproducto','idmarca','idcategoria','idpersona','idestanteria','nombre','imagen','precio','unidadmedida','cantidadmedida','descripcion','stock','caracteristicas','especificaciones'];
    protected $primaryKey = 'idproducto';
}

