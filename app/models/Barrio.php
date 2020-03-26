<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    protected $table = "barrios";
    protected $fillable = ['departamento_id', 'municipio_id', 'name' ];
    protected $guarded = ['id'];
}
