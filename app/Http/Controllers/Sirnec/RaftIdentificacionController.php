<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\models\Mes;
use App\models\Usuario;
use App\models\Estadisticaregistro;
use App\models\Log;
use DB;
use PDF; 
use Auth; 

class RaftIdentificacionController extends Controller
{
    public function index()
    { 
        $user =  Usuario::find(auth()->user()->id);
        $data = DB::table('estadisticaregistros')
            ->join('oficinas', 'estadisticaregistros.oficina_id', '=', 'oficinas.id')
            ->select('oficinas.name', 'estadisticaregistros.*')
            ->where('oficina_id', $user->oficina_id)
            ->get();
        $meses = Mes::orderBy('id', 'asc')->pluck('name', 'id');

        // muestra el mensaje de sweetalert que viene del metodo que lo envia 
        if(session('success_message')){
            Alert::success('Success!', session('success_message'));
        }
        return view('sirnec.registral.raftidentificacion.index', compact('data', 'user', 'meses'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $raft = new Estadisticaregistro(); 
            
            $raft->fechainic = $request->input('fechainic');
            $raft->fechafin = $request->input('fechafin');
            $raft->fechacreacion = $request->input('fechacreacion');
            $raft->mes_id = $request->input('mes_id');
            $raft->ano = $request->input('ano');
            $raft->departamento_id = $request->input('departamento_id');
            $raft->municipio_id = $request->input('municipio_id');
            $raft->oficina_id = $request->input('oficina_id');
            $raft->rcn_masculino = $request->input('rcn_masculino');
            $raft->rcn_femenino = $request->input('rcn_femenino');
            $raft->rcn_mayores = $request->input('rcn_mayores');
            $raft->rcn_menores = $request->input('rcn_menores');
            $raft->rcn_indigenas = $request->input('rcn_indigenas');
            $raft->rcn_afro = $request->input('rcn_afro');
            $raft->rcn_decreto290 = $request->input('rcn_decreto290');
            $raft->rcn_certificaciones = $request->input('rcn_certificaciones');
            $raft->rcn_rango_1_inic = $request->input('rcn_rango_1_inic');
            $raft->rcn_rango_1_fin = $request->input('rcn_rango_1_fin');
            $raft->rcn_rango_2_inic = $request->input('rcn_rango_2_inic');
            $raft->rcn_rango_2_fin = $request->input('rcn_rango_2_fin');
            $raft->rcn_rango_3_inic = $request->input('rcn_rango_3_inic');
            $raft->rcn_rango_3_fin = $request->input('rcn_rango_3_fin');
            $raft->rcn_rango_4_inic = $request->input('rcn_rango_4_inic');
            $raft->rcn_rango_4_fin = $request->input('rcn_rango_4_fin');
            $raft->rcn_rango_5_inic = $request->input('rcn_rango_5_inic');
            $raft->rcn_rango_5_fin = $request->input('rcn_rango_5_fin');
            $raft->rcn_malos = $request->input('rcn_malos');
            $raft->rcn_reg_malos = $request->input('rcn_reg_malos');
            $raft->rcm_inscritos = $request->input('rcm_inscritos');
            $raft->rcm_certificaciones = $request->input('rcm_certificaciones');
            $raft->rcm_rango_1_inic = $request->input('rcm_rango_1_inic');
            $raft->rcm_rango_1_fin = $request->input('rcm_rango_1_fin');
            $raft->rcm_rango_2_inic = $request->input('rcm_rango_2_inic');
            $raft->rcm_rango_2_fin = $request->input('rcm_rango_2_fin');
            $raft->rcm_rango_3_inic = $request->input('rcm_rango_3_inic');
            $raft->rcm_rango_3_fin = $request->input('rcm_rango_3_fin');
            $raft->rcm_malos = $request->input('rcm_malos');
            $raft->rcm_reg_malos = $request->input('rcm_reg_malos');
            $raft->rcd_masculino = $request->input('rcd_masculino');
            $raft->rcd_femenino = $request->input('rcd_femenino');
            $raft->rcd_mayores = $request->input('rcd_mayores');
            $raft->rcd_menores = $request->input('rcd_menores');
            $raft->rcd_indigenas = $request->input('rcd_indigenas');
            $raft->rcd_afro = $request->input('rcd_afro');
            $raft->rcd_certificaciones = $request->input('rcd_certificaciones');
            $raft->rcd_rango_1_inic = $request->input('rcd_rango_1_inic');
            $raft->rcd_rango_1_fin = $request->input('rcd_rango_1_fin');
            $raft->rcd_rango_2_inic = $request->input('rcd_rango_2_inic');
            $raft->rcd_rango_2_fin = $request->input('rcd_rango_2_fin');
            $raft->rcd_rango_3_inic = $request->input('rcd_rango_3_inic');
            $raft->rcd_rango_3_fin = $request->input('rcd_rango_3_fin');
            $raft->rcd_malos = $request->input('rcd_malos');
            $raft->rcd_reg_malos = $request->input('rcd_reg_malos');
            $raft->rcn1danado = $request->input('rcn1danado');
            $raft->rcn2danado = $request->input('rcn2danado');
            $raft->rcn3danado = $request->input('rcn3danado');
            $raft->rcn4danado = $request->input('rcn4danado');
            $raft->rcn5danado = $request->input('rcn5danado');
            $raft->rcn6danado = $request->input('rcn6danado');
            $raft->rcn7danado = $request->input('rcn7danado');
            $raft->rcn8danado = $request->input('rcn8danado');
            $raft->rcn9danado = $request->input('rcn9danado');
            $raft->rcn10danado = $request->input('rcn10danado');
            $raft->rcn11danado = $request->input('rcn11danado');
            $raft->rcm1danado = $request->input('rcm1danado');
            $raft->rcm2danado = $request->input('rcm2danado');
            $raft->rcm3danado = $request->input('rcm3danado');
            $raft->rcm4danado = $request->input('rcm4danado');
            $raft->rcm5danado = $request->input('rcm5danado');
            $raft->rcm6danado = $request->input('rcm6danado');
            $raft->rcm7danado = $request->input('rcm7danado');
            $raft->rcm8danado = $request->input('rcm8danado');
            $raft->rcm9danado = $request->input('rcm9danado');
            $raft->rcm10danado = $request->input('rcm10danado');
            $raft->rcm11danado = $request->input('rcm11danado');
            $raft->rcd1danado = $request->input('rcd1danado');
            $raft->rcd2danado = $request->input('rcd2danado');
            $raft->rcd3danado = $request->input('rcd3danado');
            $raft->rcd4danado = $request->input('rcd4danado');
            $raft->rcd5danado = $request->input('rcd5danado');
            $raft->rcd6danado = $request->input('rcd6danado');
            $raft->rcd7danado = $request->input('rcd7danado');
            $raft->rcd8danado = $request->input('rcd8danado');
            $raft->rcd9danado = $request->input('rcd9danado');
            $raft->rcd10danado = $request->input('rcd10danado');
            $raft->rcd11danado = $request->input('rcd11danado');
            
        $raft->save();
        
        //codigo del log de auditoria    
        $log = new Log; 
            $log->usuario_id = $request->user_id; 
            $log->departamento_id = $request->user_departamento; 
            $log->oficina_id = $request->user_oficina; 
            $log->descripcion = 'Se ha creado el Raft 30 correspondiente al periodo entre '.$request->get('fechainic').' al '.$request->get('fechafin');  
        $log->save();

        return redirect()->route('raft')->withSuccessMessage('Raft 29/30 Creado correctamente');
    }


    public function raft30($id)
    {
        //dd($id);
        $reporte = DB::table('estadisticaregistros') 
            ->join('mes', 'estadisticaregistros.mes_id', '=', 'mes.id')
            ->join('departamentos', 'estadisticaregistros.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'estadisticaregistros.municipio_id', '=', 'municipios.id')
            ->join('oficinas', 'estadisticaregistros.oficina_id', '=', 'oficinas.id')
            ->join('claseoficinas', 'oficinas.claseoficina_id', '=', 'claseoficinas.id')
            ->select('mes.name as mesnombre', 'estadisticaregistros.*', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.name as name', 'claseoficinas.name as clasoficinanombre', 'claseoficinas.id as clasoficina_id' )
            ->where('estadisticaregistros.id', $id)
            ->get();

        //dd($reporte);
        $pdf = PDF::loadView('sirnec.pdf.raft30', compact('reporte'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('RAFT-30.pdf');
    }

    public function raft29($id)
    {   
        //dd($id);
        $reporte = DB::table('estadisticaregistros')
            ->join('mes', 'estadisticaregistros.mes_id', '=', 'mes.id')
            ->join('departamentos', 'estadisticaregistros.departamento_id', '=', 'departamentos.id')
            ->join('municipios', 'estadisticaregistros.municipio_id', '=', 'municipios.id')
            ->join('oficinas', 'estadisticaregistros.oficina_id', '=', 'oficinas.id')
            ->join('claseoficinas', 'oficinas.claseoficina_id', '=', 'claseoficinas.id')
            ->select('mes.name as mesnombre', 'estadisticaregistros.*', 'departamentos.name as departamentonombre', 'municipios.name as municipionombre', 'oficinas.name as name', 'claseoficinas.name as clasoficinanombre', 'claseoficinas.id as clasoficina_id' )
            ->where('estadisticaregistros.id', $id)
            ->get();

        //dd($reporte);
        $pdf = PDF::loadView('sirnec.pdf.raft29', compact('reporte'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('RAFT-29.pdf');
    }

    public function update30(Request $request, $id)
    {   
        //dd($request->all());
        //pregunta si viene archivo de la vista 
        if($request->hasFile('file')){
            
            $file = $request->file('file');
            $pathfile = Storage::disk('public')->put('sirnec/raft30', $file);

           //actualiza el campo en la bd con el nombre del archivo
            $raft = Estadisticaregistro::find($id);
                $raft->raft30 = $pathfile;
            $raft->save();
            
            // /*codigo del log de auditoria*/    
            $log = new Log; $log->usuario_id = $request->user_id; $log->departamento_id = $request->user_departamento; $log->oficina_id = $request->user_oficina; 
                $log->descripcion = 'Ha Cargado el Raft 30 con nombre '.$pathfile;  
            $log->save();
            
            return redirect()->route('raft')->withSuccessMessage('Se Ha Cargado el Archivo Satisfactoriamente');
        }

    }

    public function update29(Request $request, $id)
    {   
        //dd($request->all());
        //pregunta si viene archivo de la vista 
        if($request->hasFile('file')){
            
            $file = $request->file('file');
            $pathfile = Storage::disk('public')->put('sirnec/raft29', $file);

           //actualiza el campo en la bd con el nombre del archivo
            $raft = Estadisticaregistro::find($id);
                $raft->raft29 = $pathfile;
            $raft->save();
            
            // /*codigo del log de auditoria*/    
            $log = new Log; $log->usuario_id = $request->user_id; $log->departamento_id = $request->user_departamento; $log->oficina_id = $request->user_oficina; 
                $log->descripcion = 'Ha Cargado el Raft 29 con nombre '.$pathfile;  
            $log->save();
            
            return redirect()->route('raft')->withSuccessMessage('Se Ha Cargado el Archivo Satisfactoriamente');
        }

    }

   

}
