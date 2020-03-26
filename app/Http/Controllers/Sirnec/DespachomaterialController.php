<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Auth;


use App\models\Usuario;
use App\models\Departamento;
use App\models\Municipio;
use App\models\Funcionario;
use App\models\Oficina;
use App\models\Despacho;
use App\models\Log;


class DespachomaterialController extends Controller
{
    public function index()
    {
        $user =  Usuario::find(auth()->user()->id);
        $departamentos = Departamento::where('id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $municipios = Municipio::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $oficina = Oficina::where([['departamento_id', '=', $user->departamento_id],['claseoficina_id', '!=', '6'],])->orderBy('name', 'asc')->pluck('name', 'id');
        $funcionarios = Funcionario::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');  
        $data = DB::table('despachos')
            ->join('oficinas', 'despachos.oficina_id', '=', 'oficinas.id')
            ->join('funcionarios', 'despachos.funcionario_id', '=', 'funcionarios.id')
            ->select('despachos.*', 'oficinas.name as nombreoficina', 'funcionarios.name as nombrefuncionario' )
            ->get()->where('departamento_id', '=', $user->departamento_id);    
        
        // muestra el mensaje de sweetalert que viene del metodo que lo envia 
        if(session('success_message')){
            Alert::success('Success!', session('success_message'));
        }
        return view('sirnec.almacen.despachos.index', compact('user', 'data','departamentos', 'municipios', 'oficina',  'funcionarios'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //dd($request->all());
        //return 'aqui esta llegando todo';
        // $this->validate($request, [
        //     'departamento_id' => 'required',
        //     'municipio_id' => 'required',
        //     'name' => 'required',
        // ]);

        $despacho = new Despacho(); 
            
            $despacho->departamento_id = $request->input('user_departamento'); 
            $despacho->usuario_id = $request->input('user_id'); 
            $despacho->feccreacion = $request->input('feccreacion'); 
            $despacho->oficina_id = $request->input('oficina_id'); 
            $despacho->funcionario_id = $request->input('funcionario_id'); 
            $despacho->numoficio = $request->input('numoficio');
            $despacho->claseoficina_id = $request->input('claseoficina_id'); 
            $despacho->rcni1 = $request->input('rcni1'); 
            $despacho->rcnf1 = $request->input('rcnf1'); 
            $despacho->rcni2 = $request->input('rcni2'); 
            $despacho->rcnf2 = $request->input('rcnf2'); 
            $despacho->rcmi1 = $request->input('rcmi1'); 
            $despacho->rcmf1 = $request->input('rcmf1'); 
            $despacho->rcmi2 = $request->input('rcmi2'); 
            $despacho->rcmf2 = $request->input('rcmf2'); 
            $despacho->rcdi1 = $request->input('rcdi1'); 
            $despacho->rcdf1 = $request->input('rcdf1'); 
            $despacho->rcdi2 = $request->input('rcdi2'); 
            $despacho->rcdf2 = $request->input('rcdf2'); 
            $despacho->decasi1 = $request->input('decasi1'); 
            $despacho->decasf1 = $request->input('decasf1');
            $despacho->decasi2 = $request->input('decasi2'); 
            $despacho->decasf2 = $request->input('decasf2'); 
        $despacho->save();
       
        //codigo del log de auditoria    
        $log = new Log; 
            $log->usuario_id = $request->user_id; 
            $log->departamento_id = $request->user_departamento; 
            $log->oficina_id = $request->user_oficina; 
            $log->descripcion = 'Se ha creado despacho de material para el municipio de :'.$request->get('oficina_id');  
        $log->save();
        
        return redirect()->route('despmaterial')->withSuccessMessage('Despacho de Material Creado Satisfactoriamente');
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
