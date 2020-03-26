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
use App\models\Barrio;
use App\models\Log;

class BarriosController extends Controller
{
    
    public function index()
    {
        $user =  Usuario::find(auth()->user()->id);
        $data = DB::table('barrios')
        
            ->join('departamentos', 'barrios.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'barrios.municipio_id', '=', 'municipios.id')
            ->select('barrios.*', 'departamentos.name as nombredepartamento', 'municipios.name as nombremunicipio' )
            ->get()->where('departamento_id', '=', $user->departamento_id);
        
            $departamentos = Departamento::where('id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
            $municipios = Municipio::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
            //dd($data);
        
            // muestra el mensaje de sweetalert que viene del metodo que lo envia 
            if(session('success_message')){
                Alert::success('Success!', session('success_message'));
            }
        return view('sirnec.admin.barrios.index', compact('user', 'data', 'departamentos', 'municipios'));
        
    }

   
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'departamento_id' => 'required',
            'municipio_id' => 'required',
            'name' => 'required',
        ]);
        $barrio = new Barrio(); 
            $barrio->departamento_id = $request->input('departamento_id');
            $barrio->municipio_id = $request->input('municipio_id'); 
            $barrio->name = $request->input('name'); 
        $barrio->save();
        //codigo del log de auditoria    
        $log = new Log; 
            $log->usuario_id = $request->user_id; 
            $log->departamento_id = $request->user_departamento; 
            $log->oficina_id = $request->user_oficina; 
            $log->descripcion = 'Se ha creado el Barrio de Nombre :'.$request->get('name');  
        $log->save();
        return redirect()->route('barrios')->withSuccessMessage('Barrio Creado Satisfactoriamente');
    }

    
    public function edit($id)
    {
        $barrio  =  Barrio::find($id);
        $user =  Usuario::find(auth()->user()->id);
        $municipios = Municipio::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $departamentos = Departamento::where('id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        
        return view('sirnec.admin.barrios.edit', compact('barrio','user', 'departamentos', 'municipios'));
    }

    
    public function update(Request $request, $id)
    {
        //return response()->json($request);
        Barrio::findOrFail($request->id)->update($request->all());
        // /*codigo del log de auditoria*/    
        $log = new Log; 
            $log->usuario_id = $request->user_id; 
            $log->departamento_id = $request->user_departamento; 
            $log->oficina_id = $request->user_oficina; 
            $log->descripcion = 'Se ha Actualizado el Barrio de nombre : '.$request->get('name');  
        $log->save();
        return redirect()->route('barrios')->withSuccessMessage('Barrio Modificado con Exito');
    }

    
    public function eliminar($id)
    {
        $barrio = Barrio::find($id);
        /*codigo del log de auditoria*/   
        $user =  Usuario::find(auth()->user()->id);
        $log = new Log; $log->usuario_id = $user->id; $log->departamento_id = $user->departamento_id; $log->oficina_id = $user->oficina_id; 
             $log->descripcion = 'Ha Eliminado el Barrio de nombre '.$barrio->name.' y Id '.$barrio->id; 
        $log->save();
        $barrio->delete();
        return redirect()->route('barrios');
    }


   
}
