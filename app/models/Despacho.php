<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    protected $table = "despachos";
    protected $fillable = ['departamento_id', 'usuario_id', 'feccreacion', 'oficina_id', 'funcionario_id', 'claseoficina_id', 'numoficio', 'rcni1', 'rcnf1', 'rcni2', 'rcnf2', 'rcdi1', 'rcdf1', 'rcdi2', 'rcdf2', 'rcmi1', 'rcmf1', 'rcmi2', 'rcmf2','decasi1','decasf1','decasi2','decasf2' ];
    protected $guarded = ['id'];
}
