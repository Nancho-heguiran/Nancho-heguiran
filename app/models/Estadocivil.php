<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Estadocivil extends Model
{
    protected $table = "estadosciviles";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
