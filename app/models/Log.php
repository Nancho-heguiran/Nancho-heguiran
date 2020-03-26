<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "logs";
    protected $fillable = ['id', 'usuario_id', 'departamento_id', 'oficina_id', 'descripcion'];
}
