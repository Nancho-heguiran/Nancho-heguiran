<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Claseoficina extends Model
{
    protected $table = "claseoficinas";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
