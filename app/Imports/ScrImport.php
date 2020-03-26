<?php

namespace App\Imports;

use App\models\Scr;
use Carbon\Carbon;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class ScrImport implements ToModel, WithBatchInserts, WithChunkReading
{
    public function model(array $row)
        {
                $tramite = DB::table('tipotramites')
                ->join('clasetramites', 'tipotramites.clasetramite_id', '=', 'clasetramites.id')
                ->select('tipotramites.*', 'clasetramites.name as nombreclasetramite' )
                ->get()->where('nombreclasetramite', '=', $row[7])->where('name', '=', $row[8]." ".$row[9]);
                
                $tramiteresult = $tramite->first()->id;
                //dd($tramiteresult);

                $clasetramite = DB::table('clasetramites')->select('clasetramites.*')->get()->where('name', '=', $row[7]);
                $clasetramiteresult = $clasetramite->first()->id;
                //dd($clasetramiteresult);

                $departamento = DB::table('departamentos')->where('name', $row[27])->select('id')->get();
                $departamentoresult = $departamento->first()->id;
                //dd($departamentoresult); 
               
                $oficina = DB::table('oficinas')->where('namescr', $row[25]." ".$row[26])->select('id')->get();
                $oficinaresult = $oficina->first()->id;
                //dd($oficinaresult);

                // determina el Sexo
                if($row[31] == 'M'){
                    $row[31] = 1;
                }elseif ($row[31] == 'F'){
                    $row[31] = 2;
                }elseif ($row[31] == ''){
                    $row[31] = 2;
                }
                
                // determina la clase de forma utilizada
                if($row[30] > 1){ 
                    $row[9] = 3;
                }else{
                    if($row[9] == 'COPIA O CERTIFICADO'){
                        $row[9] = 4;
                    }else{
                        if($row[11] >= 1000000000){
                            $row[9] = 1;
                        }else{
                            $row[9] = 2;
                        }
                    }
                }

            return new Scr([

                'fechapreparacion'  => Carbon::parse($row[1]),
                'nuip'              => $row[2],
                'serial_np'         => $row[11],
                'name'              => $row[3].' '.$row[4].' '.$row[5].' '.$row[6],
                'tipotramite_id'    => $tramiteresult,
                'clasetramite_id'   => $clasetramiteresult,
                'departamento_id'   => $departamentoresult,
                'oficina_id'        => $oficinaresult,  
                'adhesivo'          => $row[12],
                'valor_aplicado'    => $row[20],
                'claseformas_id'    => $row[9],
                'comentarios'       => $row[21],
                'genero_id'         => $row[31],
               
            ]);
        }
    
    public function batchSize(): int
        {
            return 1000;
        }

    public function chunkSize(): int
        {
            return 1000;
        }
       
}