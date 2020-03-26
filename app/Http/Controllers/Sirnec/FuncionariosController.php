<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Departamento;
use App\models\Municipio;
use App\models\Usuario;
use App\models\Oficina;
use App\models\Genero;
use App\models\Estadocivil;
use App\models\Niveleducativo;
use App\models\Titulodeformacion;

use DB;

class FuncionariosController extends Controller
{
    
    public function index()
    {
        $user =  Usuario::find(auth()->user()->id);
        $data = DB::table('funcionarios')
        ->join('departamentos', 'funcionarios.departamento_id', '=', 'departamentos.id')
        ->join('municipios', 'funcionarios.municipio_id', '=', 'municipios.id')
        ->join('oficinas', 'funcionarios.oficina_id', '=', 'oficinas.id')
        ->select('funcionarios.*', 'departamentos.name as nombredepartamento', 'municipios.name as nombremunicipio','oficinas.name as nombreoficina' )
        ->get()->where('departamento', '=', $user->departamento_id);

        $municipios = Municipio::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $departamentos = Departamento::orderBy('name', 'asc')->pluck('name', 'id');
        $oficina = Oficina::orderBy('id', 'asc')->pluck('name', 'id');
        $generos = Genero::orderBy('id', 'asc')->pluck('name', 'id');
        $estadocivils = Estadocivil::orderBy('id', 'asc')->pluck('name', 'id');
        $niveleseducativos = Niveleducativo::orderBy('id', 'asc')->pluck('name', 'id'); 
        $titulo = Titulodeformacion::orderBy('id', 'asc')->pluck('name', 'id');

        return view('sirnec.admin.funcionarios.index', compact('user', 'data', 'departamentos', 'municipios','niveleseducativos', 'oficina', 'generos', 'estadocivils', 'titulo'));
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
