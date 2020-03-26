<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $table = "mes";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
