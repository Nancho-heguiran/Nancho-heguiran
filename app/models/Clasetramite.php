<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Clasetramite extends Model
{
    protected $table = "clasetramites";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
