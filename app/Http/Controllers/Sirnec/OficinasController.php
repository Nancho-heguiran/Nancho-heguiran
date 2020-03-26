<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Auth; 
use App\models\Departamento;
use App\models\Municipio;
use App\models\Usuario;
use App\models\Claseoficina;
use App\models\Oficina;
use App\models\Log;

class OficinasController extends Controller
{
    public function index()
    {
        $user =  Usuario::find(auth()->user()->id);
        $data = DB::table('oficinas')
            ->join('departamentos', 'oficinas.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'oficinas.municipio_id', '=', 'municipios.id')
            ->join('claseoficinas', 'oficinas.claseoficina_id', '=', 'claseoficinas.id')
            ->select('oficinas.*', 'departamentos.name as nombredepartamento', 'municipios.name as nombremunicipio', 'claseoficinas.name as nombreclaseoficina' )
            ->get()->where('departamento_id', '=', $user->departamento_id);
        
        $departamentos = Departamento::where('id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $municipios = Municipio::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $claseoficinas = Claseoficina::orderBy('name', 'asc')->pluck('name', 'id');

        // muestra el mensaje de sweetalert que viene del metodo que lo envia 
            if(session('success_message')){
                Alert::success('Success!', session('success_message'));
            }
        return view('sirnec.admin.oficinas.index', compact('user', 'data', 'departamentos', 'municipios', 'claseoficinas'));    
       
    }

   
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'departamento_id' => 'required',
            'municipio_id' => 'required',
            'claseoficina_id' => 'required',
            'name' => 'required',
            'codpmt' => 'required',
            'diastrasporte' => 'required',
            'direccion' => 'required',
            'codigopostal' => 'required',
        ]);

        $oficina = new Oficina(); 
            $oficina->departamento_id = $request->input('departamento_id');
            $oficina->municipio_id = $request->input('municipio_id'); 
            $oficina->claseoficina_id = $request->input('claseoficina_id'); 
            $oficina->name = $request->input('name'); 
            $oficina->namescr = $request->input('namescr'); 
            $oficina->codpmt = $request->input('codpmt'); 
            $oficina->diastrasporte = $request->input('diastrasporte'); 
            $oficina->direccion = $request->input('direccion'); 
            $oficina->telefono_fijo = $request->input('telefono_fijo'); 
            $oficina->codigopostal = $request->input('codigopostal'); 
        $oficina->save();

        // //codigo del log de auditoria    
        $log = new Log; 
            $log->usuario_id = $request->user_id; 
            $log->departamento_id = $request->user_departamento; 
            $log->oficina_id = $request->user_oficina; 
            $log->descripcion = 'Se ha creado la Oficina de Nombre :'.$request->get('name');  
        $log->save();
        return redirect()->route('oficinas')->withSuccessMessage('Oficina Creada Satisfactoriamente');
    }

    
    public function edit($id)
    {
        $oficina  =  Oficina::find($id);
        $user =  Usuario::find(auth()->user()->id);
        $municipios = Municipio::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $departamentos = Departamento::where('id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $claseoficinas = Claseoficina::orderBy('name', 'asc')->pluck('name', 'id');
        
        return view('sirnec.admin.oficinas.edit', compact('oficina','user', 'departamentos', 'municipios', 'claseoficinas'));
    }

    
    public function update(Request $request, $id)
    {
        // //return response()->json($request);
        Oficina::findOrFail($request->id)->update($request->all());
        // // /*codigo del log de auditoria*/    
        $log = new Log; 
            $log->usuario_id = $request->user_id; 
            $log->departamento_id = $request->user_departamento; 
            $log->oficina_id = $request->user_oficina; 
            $log->descripcion = 'Se ha Actualizado la Oficina : '.$request->get('name');  
        $log->save();
        return redirect()->route('oficinas')->withSuccessMessage('Oficina Modificada con Exito');
    }

    
    public function eliminar($id)
    {
        $oficina = Oficina::find($id);
        /*codigo del log de auditoria*/   
        $user =  Usuario::find(auth()->user()->id);
        $log = new Log; $log->usuario_id = $user->id; $log->departamento_id = $user->departamento_id; $log->oficina_id = $user->oficina_id; 
             $log->descripcion = 'Ha Eliminado la Oficina de nombre '.$oficina->name.' y Id '.$oficina->id; 
        $log->save();
        $oficina->delete();
        return redirect()->route('oficinas');
    }


}
