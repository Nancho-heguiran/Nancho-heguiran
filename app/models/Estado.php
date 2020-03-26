<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "estados";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
