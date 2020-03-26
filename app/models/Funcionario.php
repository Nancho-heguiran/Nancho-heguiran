<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionarios";
    protected $fillable = ['cedula', 'expedicion', 'departamento_id', 'municipio_id', 'oficina_id', 'name', 'nacimiento', 'genero_id', 'estadocivil_id', 'clasmilitar', 'libreta_militar', 'distrito', 'rh', 'direccion', 'telefono_fijo', 'movil', 'emailpersonal', 'emailcorporativo', 'niveleducativo_id', 'titulosformacion_id', 'estado_id', 'departamento', 'municipio_idd' ];
    protected $guarded = ['id'];
}
