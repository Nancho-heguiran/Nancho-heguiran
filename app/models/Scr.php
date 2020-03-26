<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Scr extends Model
{
    protected $table = "scrs";
    protected $fillable = ['fechapreparacion', 'nuip', 'serial_np', 'name', 'clasetramite_id', 'tipotramite_id', 'departamento_id', 'oficina_id', 'adhesivo', 'valor_aplicado', 'claseformas_id', 'comentarios', 'genero_id' ];
    protected $guarded = ['id'];
}
