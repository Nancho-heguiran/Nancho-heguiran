<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Titulodeformacion extends Model
{
    protected $table = "titulosdeformacion";
    protected $fillable = ['niveleducativo_id','name' ]; 
    protected $guarded = ['id'];
}
