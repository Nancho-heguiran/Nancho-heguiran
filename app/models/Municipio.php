<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = "municipios";
    protected $fillable = ['departamento_id', 'name'];
    protected $guarded = ['id'];

}
