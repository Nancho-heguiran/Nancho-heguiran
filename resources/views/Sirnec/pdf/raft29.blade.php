<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    
        body{
            font-size: 11px;
        }
        table{
            
            border-spacing : -1px;
        }
        p{
            text-align:justify;
        }
        .fz{
            font-size: 13px;   
        }
        .b{
            border:solid;
            border-color: #000000;
            border-width: 1px 1px 1px 1px
        }
        .c{
            text-align: center;
        }
        .s{
            background-color: #DAD6D5;
        }
        .blanco{
            color: #FFFFFF;
        }
        .pie{
            font-size: 12px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .t{
            text-transform: uppercase;
        }
        .pieb{
            border:solid;
            border-color: #000000;
            border-width: 0px 1px 0px 1px
        }
        .a{
            border:solid;
            border-color: #000000;
            border-width: 0px 0px 1px 0px
        }
        .arriba{
            border:solid;
            border-color: #000000;
            border-width: 1px 0px 0px 0px
        }
        .abajoarriba{
            border:solid;
            border-color: #000000;
            border-width: 1px 0px 1px 0px
        }.derecho{
            border:solid;
            border-color: #000000;
            border-width: 0px 1px 0px 0px
        }
        .izquierdo{
            border:solid;
            border-color: #000000;
            border-width: 0px 0px 0px 1px
        }
        .borizqsuper{
            border:solid;
            border-color: #000000;
            border-width: 1px 0px 0px 1px
        }
        .borderesuper{
            border:solid;
            border-color: #000000;
            border-width: 1px 1px 0px 0px
        }
        .borizqinf{
            border:solid;
            border-color: #000000;
            border-width: 0px 0px 1px 1px
        }
        .borderinf{
            border:solid;
            border-color: #000000;
            border-width: 0px 1px 1px 0px
        }
        .i{
            text-align:right;
        }
        .p{
            font-size: 8px;
        }
        .p1{
            font-size: 9px;
        }
        .paddin{
            padding: 13px:;
        }
        .img{
            width: 145px;
            height: 70px;
        }
        .j{
            text-align:justify;
        }

    </style>

</head>
<body>
    @foreach ($reporte as $report)
    @endforeach

    <table >
        <tbody>
            <tr>
                <td width="19" class="blanco">1</td>
                <td width="74" class="blanco">2</td>
                <td width="70" class="blanco">3</td>
                <td width="65" class="blanco">4</td>
                <td width="68" class="blanco">5</td>
                <td width="68" class="blanco">6</td>
                <td width="55" class="blanco">7</td>
                <td width="8"  class="blanco">8</td>
                <td width="27" class="blanco">9</td>
                <td width="8"  class="blanco">10</td>
                <td width="27" class="blanco">11</td>
                <td width="19" class="blanco">12</td>
            </tr>
            <tr>
                <td class="b" colspan="2" rowspan="2"><img class="img" src="../public/images/logo1.png"></td>
                <td class="c b">PROCESO</td>
                <td class="c b" colspan="3">REGISTRO Y ACTUALIZACION DEL SYSTEMA</td>
                <td class="c b" colspan="3">CODIGO</td>
                <td class="c b" colspan="3">RAFT29</td>
            </tr>
             <tr>
                <td class="c b">FORMATO</td>
                <td class="c b" colspan="3">CONTROL ENVIO DE PRIMERAS<br>COPIAS DE REGISTRO CIVIL</td>
                <td class="c b" colspan="3">VERSION</td>
                <td class="c b" colspan="3">0</td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td class="c p" colspan="3">Aprobado: 18/09/2017</td>
            </tr>
            <tr>
                <td class="blanco">espacio</td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td class="c">AÑO</td>
                <td ></td>
                <td class="c">MES</td>
                <td ></td>
                <td class="c">DIA</td>
            </tr>
            <tr>
                <td ></td>
                <td class="p1">MES / AÑO  <br> REPORTADO</td>
                <td class="c b">{{ $report->mesnombre }}</td>
                <td class="c b">{{ Carbon\Carbon::parse($report->fechainic)->formatLocalized('%Y') }}</td>
                <td class="c" colspan="2">FECHA DE ENVIO:</td>
                <td class="c b">{{ Carbon\Carbon::parse($report->fechacreacion)->formatLocalized('%Y') }}</td>
                <td ></td>
                <td class="c b">{{ Carbon\Carbon::parse($report->fechacreacion)->formatLocalized('%m') }}</td>
                <td ></td>
                <td class="c b">{{ Carbon\Carbon::parse($report->fechacreacion)->formatLocalized('%d') }}</td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td class="c">REG</td>
                <td ></td>
                <td class="c" colspan="3">NOT</td>
            </tr>
            <tr>
                <td ></td>
                <td >DEPARTAMENTO:</td>
                <td class="c b t" colspan="2">{{ $report->departamentonombre }}</td>
                <td class="c" colspan="2">TIPO DE OFICINA</td>
                <td class="c b">@if ( $report->clasoficina_id  != 6) X @else @endif</td>
            <td ></td>
                <td class="c b" colspan="3">@if ( $report->clasoficina_id  == 6) X @else @endif</td>
            </tr>
            <tr>
                <td class="blanco">espacio</td>
            </tr>
            <tr>
                <td ></td>
                <td >MUNICIPIO:</td>
                <td class="c b t" colspan="2">{{ $report->municipionombre }}</td>
                <td class="c" colspan="2">NOMBRE DE OFICINA</td>
                <td class="c b" colspan="5">@if ( $report->clasoficina_id  == 1) {{ $report->name }} @else {{ $report->name }} @endif</td>
            </tr>
            <tr>
                <td class="blanco">espacio</td>
            </tr>
            <tr>
                <td class="c b s" colspan="3" rowspan="2">RANGO DE SERIALES UTILIZADOS</td>
                <td class="c b s" colspan="3">CANTIDAD DE COPIAS</td>
                <td class="c b s" colspan="6">ANULADOS / DAÑADOS</td>
            </tr>
            <tr>
                <td class="c b s">NACIMIENTO</td>
                <td class="c b s">MATRIMONIO</td>
                <td class="c b s">DEFUNCION</td>
                <td class="c b s" colspan="3">SERIAL</td>
                <td class="c b s" colspan="3">CANT</td>
            </tr>
            <tr>
                <td class="c b" colspan="3">
                    @if ( $report->rcn_rango_1_inic == "")
                        No se Expidieron Registros Civiles de Nacimiento
                    @else
                        @if( $report->rcn_rango_1_inic != "")  {{ $report->rcn_rango_1_inic }} - {{ $report->rcn_rango_1_fin }} <br> @endif
                        @if( $report->rcn_rango_2_inic != "")  {{ $report->rcn_rango_2_inic }} - {{ $report->rcn_rango_2_fin }} <br> @endif
                        @if( $report->rcn_rango_3_inic != "")  {{ $report->rcn_rango_3_inic }} - {{ $report->rcn_rango_3_fin }} <br> @endif
                        @if( $report->rcn_rango_4_inic != "")  {{ $report->rcn_rango_4_inic }} - {{ $report->rcn_rango_4_fin }} <br> @endif
                        @if( $report->rcn_rango_5_inic != "")  {{ $report->rcn_rango_5_inic }} - {{ $report->rcn_rango_5_fin }} <br> @endif
                    @endif
                </td>
                <td class="c b">
                    @if ( $report->rcn_rango_1_inic == "")
                        0
                    @else
                        @if( $report->rcn_rango_1_inic != "")   {{ $report->rcn_rango_1_fin - $report->rcn_rango_1_inic + 1}}  <br> @endif
                        @if( $report->rcn_rango_2_inic != "")   {{ $report->rcn_rango_2_fin - $report->rcn_rango_2_inic + 1}}  <br> @endif
                        @if( $report->rcn_rango_3_inic != "")   {{ $report->rcn_rango_3_fin - $report->rcn_rango_3_inic + 1}}  <br> @endif
                        @if( $report->rcn_rango_4_inic != "")   {{ $report->rcn_rango_4_fin - $report->rcn_rango_4_inic + 1}}  <br> @endif
                        @if( $report->rcn_rango_5_inic != "")   {{ $report->rcn_rango_5_fin - $report->rcn_rango_5_inic + 1}}  <br> @endif
                        
                    @endif     
                </td>
                <td class="c b"></td>
                <td class="c b"></td>
                <td class="c b" colspan="3"> 
                    @if($report->rcn1danado != "0") {{ $report->rcn1danado }} @endif
                    @if($report->rcn2danado != "0") {{ '-' }} {{ $report->rcn2danado }} <br> @endif
                    @if($report->rcn3danado != "0") {{ $report->rcn3danado }} @endif
                    @if($report->rcn4danado != "0") {{ '-' }} {{ $report->rcn4danado }} <br> @endif
                    @if($report->rcn5danado != "0") {{ $report->rcn5danado }} @endif
                    @if($report->rcn6danado != "0") {{ '-' }} {{ $report->rcn6danado }} <br> @endif
                    @if($report->rcn7danado != "0") {{ $report->rcn7danado }} @endif
                    @if($report->rcn8danado != "0") {{ '-' }} {{ $report->rcn8danado }} <br> @endif
                    @if($report->rcn9danado != "0") {{ $report->rcn9danado }} @endif
                    @if($report->rcn10danado != "0") {{ '-' }} {{ $report->rcn10danado }} <br> @endif
                    @if($report->rcn11danado != "0") {{ $report->rcn11danado }} @endif
                </td>    
                    <td class="c b" colspan="3"> @if ( $report->rcn_malos == "") 0 @else {{ $report->rcn_malos }} @endif</td> 
            </tr>
            <tr>
                <td class="c b" colspan="3">
                    @if ( $report->rcm_rango_1_inic == "")
                        No se Expidieron Registros Civiles de Matrimonio
                    @else
                        @if( $report->rcm_rango_1_inic != "")  {{ $report->rcm_rango_1_inic }} - {{ $report->rcm_rango_1_fin }} <br> @endif
                        @if( $report->rcm_rango_2_inic != "")  {{ $report->rcm_rango_2_inic }} - {{ $report->rcm_rango_2_fin }} <br> @endif
                        @if( $report->rcm_rango_3_inic != "")  {{ $report->rcm_rango_3_inic }} - {{ $report->rcm_rango_3_fin }} <br> @endif
                    @endif     
                </td>
                <td class="c b"></td>
                <td class="c b">
                    @if ( $report->rcm_rango_1_inic == "")
                        0
                    @else
                        @if( $report->rcm_rango_1_inic != "")   {{ $report->rcm_rango_1_fin - $report->rcm_rango_1_inic + 1}}  <br> @endif
                        @if( $report->rcm_rango_2_inic != "")   {{ $report->rcm_rango_2_fin - $report->rcm_rango_2_inic + 1}}  <br> @endif
                        @if( $report->rcm_rango_3_inic != "")   {{ $report->rcm_rango_3_fin - $report->rcm_rango_3_inic + 1}}  <br> @endif
                    @endif     
                </td>
                <td class="c b"></td>
                <td class="c b" colspan="3"> 
                    @if($report->rcm1danado != "0") {{ $report->rcm1danado }} @endif
                    @if($report->rcm2danado != "0") {{ '-' }} {{ $report->rcm2danado }} <br> @endif
                    @if($report->rcm3danado != "0") {{ $report->rcm3danado }} @endif
                    @if($report->rcm4danado != "0") {{ '-' }} {{ $report->rcm4danado }} <br> @endif
                    @if($report->rcm5danado != "0") {{ $report->rcm5danado }} @endif
                    @if($report->rcm6danado != "0") {{ '-' }} {{ $report->rcm6danado }} <br> @endif
                    @if($report->rcm7danado != "0") {{ $report->rcm7danado }} @endif
                    @if($report->rcm8danado != "0") {{ '-' }} {{ $report->rcm8danado }} <br> @endif
                    @if($report->rcm9danado != "0") {{ $report->rcm9danado }} @endif
                    @if($report->rcm10danado != "0") {{ '-' }} {{ $report->rcm10danado }} <br> @endif
                    @if($report->rcm11danado != "0") {{ $report->rcm11danado }} @endif
                </td>
                <td class="c b" colspan="3"> @if ( $report->rcm_malos == "") 0 @else {{ $report->rcm_malos }} @endif</td>
            </tr>
            <tr>
                <td class="c b" colspan="3">
                    @if ( $report->rcd_rango_1_inic == "")
                        No se Expidieron Registros Civiles de Defuncion
                    @else
                        @if( $report->rcd_rango_1_inic != "")  {{ $report->rcd_rango_1_inic }} - {{ $report->rcd_rango_1_fin }} <br> @endif
                        @if( $report->rcd_rango_2_inic != "")  {{ $report->rcd_rango_2_inic }} - {{ $report->rcd_rango_2_fin }} <br> @endif
                        @if( $report->rcd_rango_3_inic != "")  {{ $report->rcd_rango_3_inic }} - {{ $report->rcd_rango_3_fin }} <br> @endif
                    @endif     
                </td>
                <td class="c b"></td>
                <td class="c b"></td>
                <td class="c b">
                    @if ( $report->rcd_rango_1_inic == "")
                        0
                    @else
                        @if( $report->rcd_rango_1_inic != "")   {{ $report->rcd_rango_1_fin - $report->rcd_rango_1_inic + 1}}  <br> @endif
                        @if( $report->rcd_rango_2_inic != "")   {{ $report->rcd_rango_2_fin - $report->rcd_rango_2_inic + 1}}  <br> @endif
                        @if( $report->rcd_rango_3_inic != "")   {{ $report->rcd_rango_3_fin - $report->rcd_rango_3_inic + 1}}  <br> @endif
                    @endif     
                </td>
                <td class="c b" colspan="3">
                    @if($report->rcd1danado != "0") {{ $report->rcd1danado }} @endif
                    @if($report->rcd2danado != "0") {{ '-' }} {{ $report->rcd2danado }} <br> @endif
                    @if($report->rcd3danado != "0") {{ $report->rcd3danado }} @endif
                    @if($report->rcd4danado != "0") {{ '-' }} {{ $report->rcd4danado }} <br> @endif
                    @if($report->rcd5danado != "0") {{ $report->rcd5danado }} @endif
                    @if($report->rcd6danado != "0") {{ '-' }} {{ $report->rcd6danado }} <br> @endif
                    @if($report->rcd7danado != "0") {{ $report->rcd7danado }} @endif
                    @if($report->rcd8danado != "0") {{ '-' }} {{ $report->rcd8danado }} <br> @endif
                    @if($report->rcd9danado != "0") {{ $report->rcd9danado }} @endif
                    @if($report->rcd10danado != "0") {{ '-' }} {{ $report->rcd10danado }} <br> @endif
                    @if($report->rcd11danado != "0") {{ $report->rcd11danado }} @endif
                </td>
                <td class="c b" colspan="3"> @if ( $report->rcd_malos == "") 0 @else {{ $report->rcd_malos }} @endif </td>
            </tr>
            <tr>
                <td class="c s b" colspan="3">TOTAL REPORTADO</td>
                <td class="c s b">
                    <?php
                        $rcntotalrango1 = 0;
                        $rcntotalrango2 = 0;
                        $rcntotalrango3 = 0;
                        $rcntotalrango4 = 0;
                        $rcntotalrango5 = 0;
                        if( $report->rcn_rango_1_inic == "")
                            $rcntotalrango1 = 0; 
                        else
                            $rcntotalrango1 = $report->rcn_rango_1_fin - $report->rcn_rango_1_inic + 1;
                        if( $report->rcn_rango_2_inic == "")
                            $rcntotalrango2 = 0; 
                        else
                            $rcntotalrango2 = $report->rcn_rango_2_fin - $report->rcn_rango_2_inic + 1;
                        if( $report->rcn_rango_3_inic == "")
                            $rcntotalrango3 = 0; 
                        else
                            $rcntotalrango3 = $report->rcn_rango_3_fin - $report->rcn_rango_3_inic + 1;
                        if( $report->rcn_rango_4_inic == "")
                            $rcntotalrango4 = 0; 
                        else
                            $rcntotalrango4 = $report->rcn_rango_4_fin - $report->rcn_rango_4_inic + 1;
                        if( $report->rcn_rango_5_inic == "")
                            $rcntotalrango5 = 0; 
                        else
                            $rcntotalrango5 = $report->rcn_rango_5_fin - $report->rcn_rango_5_inic + 1;    
                    ?>
                    {{ $rcntotalrango1 + $rcntotalrango2 + $rcntotalrango3 + $rcntotalrango4 + $rcntotalrango5}}
                </td>
                <td class="c s b">
                    <?php
                        $rcmtotalrango1 = 0;
                        $rcmtotalrango2 = 0;
                        $rcmtotalrango3 = 0;
                        if( $report->rcm_rango_1_inic == "")
                            $rcmtotalrango1 = 0; 
                        else
                            $rcmtotalrango1 = $report->rcm_rango_1_fin - $report->rcm_rango_1_inic + 1;
                        if( $report->rcm_rango_2_inic == "")
                            $rcmtotalrango2 = 0; 
                        else
                            $rcmtotalrango2 = $report->rcm_rango_2_fin - $report->rcm_rango_2_inic + 1;
                        if( $report->rcm_rango_3_inic == "")
                            $rcmtotalrango3 = 0; 
                        else
                            $rcmtotalrango3 = $report->rcm_rango_3_fin - $report->rcm_rango_3_inic + 1;
                    ?>
                    {{ $rcmtotalrango1 + $rcmtotalrango2 + $rcmtotalrango3 }}
                </td>
                <td class="c s b">
                    <?php
                        $rcdtotalrango1 = 0;
                        $rcdtotalrango2 = 0;
                        $rcdtotalrango3 = 0;
                        if( $report->rcd_rango_1_inic == "")
                            $rcdtotalrango1 = 0; 
                        else
                            $rcdtotalrango1 = $report->rcd_rango_1_fin - $report->rcd_rango_1_inic + 1;
                        if( $report->rcd_rango_2_inic == "")
                            $rcdtotalrango2 = 0; 
                        else
                            $rcdtotalrango2 = $report->rcd_rango_2_fin - $report->rcd_rango_2_inic + 1;
                        if( $report->rcd_rango_3_inic == "")
                            $rcdtotalrango3 = 0; 
                        else
                            $rcdtotalrango3 = $report->rcd_rango_3_fin - $report->rcd_rango_3_inic + 1;
                    ?>
                    {{ $rcdtotalrango1 + $rcdtotalrango2 + $rcdtotalrango3 }}
                </td>
                <td class="c s b" colspan="3">TOTAL DAÑADOS</td>
                <td class="c s b" colspan="3">{{ $report->rcn_malos + $report->rcm_malos + $report->rcd_malos }}</td>        
            </tr>
            <tr>
                <td class="blanco">espacio</td>
            </tr>
            <tr>
                <td class="borizqsuper"></td>
                <td class="abajoarriba" colspan="10">OBSERVACIONES :</td>
                <td class="borderesuper"></td>
            </tr>
            <tr>
                <td class="izquierdo"></td>
                <td class="a blanco" colspan="10">1</td>
                <td class="derecho"></td>
            </tr>
            <tr>
                <td class="izquierdo"></td>
                <td class="a blanco" colspan="10">1</td>
                <td class="derecho"></td>
            </tr>
             <tr>
                <td class="izquierdo"></td>
                <td class="a blanco" colspan="10">1</td>
                <td class="derecho"></td>
            </tr>
            <tr>
                <td class="izquierdo"></td>
                <td class="a blanco" colspan="10">1</td>
                <td class="derecho"></td>
            </tr>
            <tr>
                <td class="borizqinf"></td>
                <td class="a blanco" colspan="10">1</td>
                <td class="borderinf"></td>
            </tr>

            <tr>
                <td class="c pieb blanco a" colspan="5">1</td>
                <td class="c pieb blanco a" colspan="7">1</td>
            </tr>
            <tr>
                <td class="c pieb blanco" colspan="5">1</td>
                <td class="c pieb blanco" colspan="7">1</td>
            </tr>
            <tr>



                <td class=" pieb " colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AUTORIZA ENVIO:</td>
                <td class=" pieb " colspan="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RECIBE Y VERIFICA:</td>
            </tr>
            <tr>
                <td class="c pieb blanco" colspan="5">1</td>
                <td class="c pieb blanco" colspan="7">1</td>
            </tr>
            <tr>
                <td class="c pieb blanco paddin" colspan="5">1</td>
                <td class="c pieb blanco paddin" colspan="7">1</td>
            </tr>
            <tr>
                <td class="c pie pieb" colspan="5" >{{ Auth::user()->name }}</td>
                <td class="pieb " colspan="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma Funcionario Delegacion</td>
            </tr>
            <tr>
                <td class="c pie2 pieb" colspan="5">@if ($report->clasoficina_id  == 1) Notaria {{ $report->name }} @else REGISTRADOR MUNICIPAL DEL ESTADO CIVIL @endif</td>
                <td class="pie2 pieb" colspan="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de Recibo:</td>
            </tr>
             <tr>
                <td class="c pieb blanco paddin" colspan="5">1</td>
                <td class="c pieb blanco paddin" colspan="7">1</td>
            </tr>
            <tr>
                <td class="blanco arriba" colspan="5">1</td>
                <td class="blanco arriba" colspan="7">1</td>
            </tr>
            <tr>
                <td class="blanco">1</td>
                <td class="blanco">2</td>
                <td class="blanco">3</td>
                <td class="blanco">4</td>
                <td class="blanco">5</td>
                <td class="blanco">6</td>
                <td class="blanco">7</td>
                <td class="blanco">8</td>
                <td class="blanco">9</td>
                <td class="blanco">10</td>
                <td class="blanco">11</td>
                <td class="blanco">12</td>
                <td class="blanco">13</td>
                <td class="blanco">14</td>
            </tr>    
            
           
        </tbody>
    </table>
    
</body>
</html>