<?php

namespace App\Exports;

use App\models\Usuario;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;


class UsuariosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user =  Usuario::find(auth()->user()->id);
        return $data = DB::table('usuarios')->get()->where('departamento_id', '=', $user->departamento_id);
    }
}
