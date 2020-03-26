<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Claseformato extends Model
{
    protected $table = "claseformatos";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
