<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamentos";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
