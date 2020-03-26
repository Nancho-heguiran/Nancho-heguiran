<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Tipodeusuario extends Model
{
    protected $table = "tipousuarios";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
