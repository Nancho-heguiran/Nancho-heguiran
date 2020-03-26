<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = "oficinas";
    protected $fillable = ['departamento_id','municipio_id', 'claseoficina_id', 'name', 'namescr', 'codpmt', 'diastrasporte', 'direccion', 'telefono_fijo', 'codigopostal'];
    protected $guarded = ['id'];
}
