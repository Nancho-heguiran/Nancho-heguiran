<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = "generos";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
