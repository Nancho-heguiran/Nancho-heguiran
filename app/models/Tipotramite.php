<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Tipotramite extends Model
{
    protected $table = "tipotramites";
    protected $fillable = ['name', 'clasetramite_id'];
    protected $guarded = ['id'];
}
