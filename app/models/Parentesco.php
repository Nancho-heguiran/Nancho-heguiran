<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $table = "parentescos";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
