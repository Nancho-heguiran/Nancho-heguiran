<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Niveleducativo extends Model
{
    protected $table = "niveleseducativos";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
