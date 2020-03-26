<?php

namespace App\Http\Controllers\Sirnec;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Usuario;
use App\models\Departamento;
use App\models\Municipio;
use App\models\Tipodeusuario;
use App\models\Claseoficina;
use App\models\Oficina;
use App\models\Log;
use App\models\Estado;
use DB;
use Auth;


class UsuariosController extends Controller
{
    public function index()
    {
        //dd($data);
        //return response()->json($data);
        $user =  Usuario::find(auth()->user()->id);
        $data = DB::table('usuarios')
        ->join('departamentos', 'usuarios.departamento_id', '=', 'departamentos.id')
        ->join('municipios', 'usuarios.municipio_id', '=', 'municipios.id')
        ->join('tipousuarios', 'usuarios.tipousuario_id', '=', 'tipousuarios.id')
        ->join('claseoficinas', 'usuarios.claseoficina_id', '=', 'claseoficinas.id')
        ->join('oficinas', 'usuarios.oficina_id', '=', 'oficinas.id')
        ->select('usuarios.*', 'departamentos.name as nombredepartamento', 'municipios.name as nombremunicipio','tipousuarios.name as tipodeusuario','claseoficinas.name as claseoficina','oficinas.name as nombreoficina' )
        ->get()->where('departamento_id', '=', $user->departamento_id);
        $municipios = Municipio::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $departamentos = Departamento::where('id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $tipodeusario = Tipodeusuario::orderBy('name', 'asc')->pluck('name', 'id');
        $claseoficina = Claseoficina::orderBy('name', 'asc')->pluck('name', 'id');
        $oficina = Oficina::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        
        // muestra el mensaje de sweetalert que viene del metodo que lo envia 
        if(session('success_message')){
            Alert::success('Success!', session('success_message'));
        }
        return view('sirnec.admin.usuarios.index', compact('user', 'data', 'departamentos', 'municipios','tipodeusario', 'claseoficina', 'oficina'));
    }

   
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'cedula' => 'required|unique:usuarios',
            'name' => 'required',
            'login' => 'required|unique:usuarios',
            'email' =>  'required|unique:usuarios',
            'password' => 'required',
            'direccion' => 'required',
            'movil' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
            'tipousuario_id' => 'required',
            'oficina_id' => 'required',
            'claseoficina_id' => 'required',
            'estado_id' => 'required',
        ]);
        $usuario = Usuario::create([
            'cedula' => $request->get('cedula'),
            'name' => $request->get('name'),
            'login' => $request->get('login'),
            'email' => $request->get('email'),
            'password' =>  bcrypt($request->get('password')),
            'direccion' => $request->get('direccion'),
            'movil' => $request->get('movil'),
            'estado_id' => $request->get('estado_id'),
            'departamento_id' => $request->get('departamento_id'),
            'municipio_id' => $request->get('municipio_id'),
            'tipousuario_id' => $request->get('tipousuario_id'),
            'claseoficina_id' => $request->get('claseoficina_id'),
            'oficina_id' => $request->get('oficina_id'),
        ]);
        //codigo del log de auditoria    
        $log = new Log; 
            $log->usuario_id = $request->user_id; 
            $log->departamento_id = $request->user_departamento; 
            $log->oficina_id = $request->user_oficina; 
            $log->descripcion = 'Se ha creado el Usuario con cedula No.'.$request->get('cedula').' y Nombre '.$request->get('name');  
        $log->save();
        return redirect()->route('usuarios')->withSuccessMessage('Usuario Creado correctamente');
    }

    
    public function edit($id)
    {
        $usuario  =  Usuario::find($id);
        $user =  Usuario::find(auth()->user()->id);
        $municipios = Municipio::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $departamentos = Departamento::where('id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        $tipodeusario = Tipodeusuario::orderBy('name', 'asc')->pluck('name', 'id');
        $claseoficina = Claseoficina::orderBy('name', 'asc')->pluck('name', 'id');
        $estado = Estado::orderBy('name', 'asc')->pluck('name', 'id');
        $oficina = Oficina::where('departamento_id', $user->departamento_id)->orderBy('name', 'asc')->pluck('name', 'id');
        
        return view('sirnec.admin.usuarios.edit', compact('user', 'departamentos', 'municipios','tipodeusario', 'claseoficina', 'oficina', 'usuario', 'estado'));
    }

    
    public function update(Request $request, $id)
    {
        //return response()->json($request);
        Usuario::findOrFail($request->id)->update($request->all());
        /*codigo del log de auditoria*/    
        $log = new Log; 
            $log->usuario_id = $request->user_id; 
            $log->departamento_id = $request->user_departamento; 
            $log->oficina_id = $request->user_oficina; 
            $log->descripcion = 'Se ha Actualizado el Usuario con cedula No.'.$request->get('cedula').' y Nombre '.$request->get('name');  
        $log->save();
        return redirect()->route('usuarios')->withSuccessMessage('Usuario Modificado con Exito');
    }

    
    public function eliminar($id)
    {
        $usuario = Usuario::find($id);
        /*codigo del log de auditoria*/   
        $user =  Usuario::find(auth()->user()->id);
        $log = new Log; $log->usuario_id = $user->id; $log->departamento_id = $user->departamento_id; $log->oficina_id = $user->oficina_id; 
             $log->descripcion = 'Ha Eliminado el Usuario de nombre '.$usuario->name.' y Id '.$usuario->id; 
        $log->save();
        $usuario->delete();
        return redirect()->route('usuarios');
    }


    public function cambiocontrasena()
    {
        $usuario  =  Usuario::find(auth()->user()->id);
        return view('sirnec.admin.usuarios.cambiocontrasena', compact('usuario'));
    }


    public function cambio(Request $request)
    {
       //dd($request->all());
       // return response()->json($request);
       $usuario = Usuario::find($request->id);
            $usuario->cedula = $request->cedula;
            $usuario->name = $request->name;
            $usuario->login = $request->login;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);
            $usuario->direccion = $request->direccion;
            $usuario->movil = $request->movil;
            $usuario->estado_id = $request->estado_id;
            $usuario->departamento_id = $request->departamento_id;
            $usuario->municipio_id = $request->municipio_id;
            $usuario->tipousuario_id = $request->tipousuario_id;
            $usuario->claseoficina_id = $request->claseoficina_id;
            $usuario->oficina_id = $request->oficina_id;
        $usuario->save();
        /*codigo del log de auditoria*/    
        $log = new Log; 
            $log->usuario_id = $request->id; 
            $log->departamento_id = $request->departamento_id; 
            $log->oficina_id = $request->oficina_id; 
            $log->descripcion = 'El Usuario '.$usuario->name.' actualizo su password con ID : '.$usuario->id; 
        //dd($log);
        $log->save();
        Auth::logout();
        return redirect()->route('login')->withSuccessMessage('La Contraseña se ha Modificado con Exito y se ha reiniciado el Aplicativo ');

    }

}
