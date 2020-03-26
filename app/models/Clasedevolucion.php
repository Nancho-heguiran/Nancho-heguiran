<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Clasedevolucion extends Model
{
    protected $table = "clasedevoluciones";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
