<?php

namespace App\models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table = "usuarios";
    protected $fillable = ['cedula', 'name', 'login', 'email', 'password', 'direccion', 'movil', 'estado_id', 'departamento_id', 'municipio_id', 'comuna_id', 'barrio_id', 'tipousuario_id', 'claseoficina_id', 'oficina_id', 'claseoficina_id' ]; 
    protected $guarded = ['id'];
}
