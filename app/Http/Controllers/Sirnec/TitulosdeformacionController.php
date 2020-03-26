<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use DB;
use Auth;

use App\models\Usuario;
use App\models\Titulodeformacion;
use App\models\Niveleducativo;
use App\models\Log;

class TitulosdeformacionController extends Controller
{
     public function index()
    {
        //dd($data);
        //return response()->json($data);
        $user =  Usuario::find(auth()->user()->id);
        $data = DB::table('titulosdeformacion')
        ->join('niveleseducativos', 'titulosdeformacion.niveleducativo_id', '=', 'niveleseducativos.id')
        ->select('titulosdeformacion.*', 'niveleseducativos.name as nombreniveleducativo')
        ->get();
        $niveleducativo = Niveleducativo::orderBy('name', 'asc')->pluck('name', 'id');

        // muestra el mensaje de sweetalert que viene del metodo que lo envia 
        if(session('success_message')){
            Alert::success('Success!', session('success_message'));
        }
        return view('sirnec.admin.titulosformacion.index', compact('user', 'data', 'niveleducativo'));
     }

   
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'niveleducativo_id' => 'required',
            'name' => 'required',
        ]);

        $titulo = Titulodeformacion::create([
            'niveleducativo_id' => $request->get('niveleducativo_id'),
            'name' => $request->get('name'),
        ]);
        //codigo del log de auditoria    
        $log = new Log; 
            $log->usuario_id = $request->user_id; 
            $log->departamento_id = $request->user_departamento; 
            $log->oficina_id = $request->user_oficina; 
            $log->descripcion = 'Se ha creado el Tutulo Universitario '.$request->get('name');  
        $log->save();
        return redirect()->route('titulosdeformacion')->withSuccessMessage('Titulo Creado Satisfactoriamente');
    }

    
}
