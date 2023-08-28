<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class esta extends Model
{
    use HasFactory;
    protected $table= 'estanteria';
    protected $filleable=['nombre'];
}
