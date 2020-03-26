<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\facades\Excel;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;

use App\models\Municipio;
use App\models\Oficina;
use App\models\Claseoficina;
use App\models\Usuario;
use App\models\Barrio;
use App\Exports\UsuariosExport;
use App\Imports\ScrImport;
use App\models\Funcionario;



class LlamadosController extends Controller
{
    public function getMunucipios($id)
    {
        $municipios = Municipio::where('departamento_id', $id)->pluck('name', 'id');
        return json_encode($municipios);
    }

    public function getOficinas($id)
    {
        $oficinas = Oficina::where('municipio_id', $id)->pluck('name', 'id');
        return json_encode($oficinas);
    }

    public function getClaseoficinas($id)
    {
        $oficina = Oficina::find($id);
        return json_encode($oficina);
    }

    public function exportUsuariosPdf()
   {
      $user =  Usuario::find(auth()->user()->id);
      $usuarios = DB::table('usuarios')->get()->where('departamento_id', '=', $user->departamento_id);
      $pdf = PDF::loadView('sirnec.pdf.usuarios', compact('usuarios'));
      return $pdf->download('usuarios-list.pdf');
   }

   public function exportusuariosExcel()
   {
      return Excel::download(new UsuariosExport, 'usuarios-list.xlsx');
   }

   public function getUsuarios($id)
    {
        $usuario = Usuario::where('cedula', $id)->pluck('name');
        return json_encode($usuario);
    }

    public function getEmail($id)
    {
        $email = Usuario::where('email', $id)->pluck('email');
        return json_encode($email);
    }

    public function getLogin($id)
    {
        $login = Usuario::where('login', $id)->pluck('login');
        return json_encode($login);
    }
   
    public function getBarrios($id)
    {
        $barrio = Barrio::where('name', $id)->pluck('name');
        return json_encode($barrio);
    }
   
    public function importscr(Request $request)
    {
        //iniciamos guardando el archivo en alguna direccion de tu proyecto
        $archivo = $request->file('file');
        $date = Carbon::now()->format('d-m-Y');
        $r1 = Storage::disk('local')->put("/scr/".$date.' - '.$archivo->getClientOriginalName(),  \File::get($archivo) );
        //hasta aqui el guardado

        //ahora lo recuperamos para poder trabajar en el
        $ruta = storage_path('app') ."/scr/". $date.' - '.$archivo->getClientOriginalName();
        
        Excel::import(new ScrImport, $ruta);
        return redirect()->route('scr')->withSuccessMessage('Archivo Cargado Satisfactoriamente');
   
    }

    public function getFuncionariosofic($id)
    {
        $empleados = Funcionario::where('oficina_id', $id)->pluck('name', 'id');
        return json_encode($empleados);
    }

    

    

   
}



