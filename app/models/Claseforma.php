<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Claseforma extends Model
{
    protected $table = "claseformas";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
