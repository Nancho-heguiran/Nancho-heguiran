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
        .pie2{
            font-size: 12px;
            font-weight: bold;
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
        .i{
            text-align:right;
        }
        .p{
            font-size: 10px;
        }
        .paddin{
            padding: 11px:;
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

    <table style="margin-top:-20px">
        <tbody>
            <tr>
                <td class="b" colspan="2" rowspan="2"><img class="img" src="../public/images/logo1.png"></td>
                <td class="c b paddin pie">PROCESO</td>
                <td class="c b paddin pie" colspan="8">REGISTRO Y ACTUALIZACION DEL SISTEMA</td>
                <td class="c b paddin pie">CODIGO</td>
                <td class="c b paddin pie" colspan="2">RAFT30</td>
            </tr>
            <tr>
                <td class="c b paddin pie">FORMATO</td>
                <td class="c b paddin pie" colspan="8">REPORTE MENSUAL DE PRODUCCION</td>
                <td class="c b paddin pie">VERSION</td>
                <td class="c b paddin pie" colspan="2">0</td>
            </tr>
            <tr style="margin-top:-20px">
                <td colspan="12"></td>
                <td class="c p blanco" colspan="2"> 7</td>
            </tr> 
            <tr >
                <td colspan="12"></td>
                <td class="c p" colspan="2"> Aprobado: 18/09/2017</td>
            </tr>
            <tr>
                <td colspan="12"></td>
                <td class="c s b pie" colspan="2">PAGINA</td>
            </tr>
            <tr>
                <td colspan="12"></td>
                <td class="b blanco" colspan="2">espacio</td>
            </tr>
            <tr>
                <td class="c s b paddin" colspan="14">DIRECCION NACIONAL DE REGISTRO CIVIL</td>
            </tr>
            <tr>
                <td class="blanco">espacio</td>
            </tr>
            <tr>
                <td class="i" colspan="3">AÑO</td>
                <td class="c b pie">{{ Carbon\Carbon::parse($report->fechainic)->formatLocalized('%Y') }}</td>
                <td class="c s b">MES</td>
                <td class="c b pie" colspan="3">{{ $report->mesnombre }}</td>
                <td ></td>
                <td ></td>
                <td class="c" colspan="2">@if( $report->clasoficina_id  == 6) NOTARIA @else REGISTRADURIA @endif</td>
                <td class="c b">@if ( $report->clasoficina_id  == 1) X @else X @endif</td>
            </tr>
            <tr>
                <td class="blanco">espacio</td>
            </tr>
            <tr>
                <td class="i" colspan="3">DEPARTAMENTO&nbsp;&nbsp;</td>
                <td class="c b pie" colspan="5">{{ $report->departamentonombre }}</td>
                <td class="i ">OFICINA</td>
                <td ></td>
                <td class="c" colspan="2">INSP. DE POLICIA</td>
                <td class="b blanco ">E</td>
            </tr>
            <tr>
                <td class="blanco">espacio</td>
            </tr>
            <tr>
                <td class="i" colspan="3">MUNICIPIO&nbsp;&nbsp;</td>
                <td class="c b " colspan="5">@if ( $report->clasoficina_id  == 1) {{ $report->municipionombre }} - Notaria {{ $report->name }} @else {{ $report->municipionombre }} -  {{ $report->name }} @endif</td>
                <td ></td>
                <td ></td>
                <td class="c" colspan="2">CORREGIMIENTO</td>
                <td class="b blanco">E</td>
            </tr>
           <tr>
                <td class="blanco">espacio</td>
            </tr>
            <tr>
                <td class="c s b fz" colspan="6">NACIMIENTOS</td>
                <td ></td>
                <td class="c s b fz" colspan="2">MATRIMONIOS</td>
                <td ></td>
                <td class="c s b fz" colspan="4">DEFUNCIONES</td>
            </tr>
            <tr>
                <td class="c s b" colspan="6">HOMBRES    +    MUJERES    =    TOTAL</td>
                <td ></td>
                <td class="b">TOTAL INSCRITOS</td>
                <td class="c b"> @if ($report->rcm_inscritos == "") 0 @else {{ $report->rcm_inscritos }} @endif </td>
                <td ></td>
                <td class="c s b" colspan="4">HOMBRES    +    MUJERES    =    TOTAL</td>
            </tr>
            <tr>
                <td class="c b" colspan="2">@if ($report->rcn_masculino == "") 0 @else {{ $report->rcn_masculino }} @endif </td>
                <td class="c b" colspan="2">@if ($report->rcn_femenino == "") 0 @else {{ $report->rcn_femenino }} @endif</td>
                <td class="c b" colspan="2">{{ $report->rcn_masculino + $report->rcn_femenino }} </td>
                <td ></td>
                <td class="b">CERTIFICACIONES</td>
                <td class="c b">@if ($report->rcm_certificaciones == "") 0 @else {{ $report->rcm_certificaciones }} @endif</td>
                <td ></td>
                <td class="c b">@if ($report->rcd_masculino == "") 0 @else {{ $report->rcd_masculino }} @endif</td>
                <td class="c b">@if ($report->rcd_femenino == "") 0 @else {{ $report->rcd_femenino }} @endif</td>
                <td class="c b" colspan="2">{{ $report->rcd_masculino + $report->rcd_femenino }}</td>
            </tr>
            <tr>
                <td class="blanco">espacio</td>
            </tr>
            <tr>
                <td ></td>
                <td class="c s b" colspan="2">MAYORES</td>
                <td class="c s b" colspan="2">MENORES</td>
                <td ></td>
                <td ></td>
                <td class="c s b" colspan="2">SERIALES UTILIZADOS</td>
                <td ></td>
                <td class="c s b" >INDIGENAS</td>
                <td class="c s b" >AFRO. COL.</td>
                <td class="c s b" >MAY</td>
                <td class="c s b" >MEN</td>
            </tr>
            <tr>
                <td ></td>
                <td class="c b" colspan="2">@if ($report->rcn_mayores == "") 0 @else {{ $report->rcn_mayores }} @endif</td>
                <td class="c b" colspan="2">@if ($report->rcn_menores == "") 0 @else {{ $report->rcn_menores }} @endif</td>
                <td ></td>
                <td ></td>
                <td class="b">S. Inicial</td>
                <td class="c b">@if ($report->rcm_rango_1_inic == "") 0 @else {{ $report->rcm_rango_1_inic ."-". $report->rcm_rango_2_inic ."-". $report->rcm_rango_3_inic }} @endif</td>
                <td ></td>
                <td class="c b" >@if ($report->rcd_indigenas == "") 0 @else {{ $report->rcd_indigenas }} @endif</td>
                <td class="c b" >@if ($report->rcd_afro == "") 0 @else {{ $report->rcd_afro }} @endif</td>
                <td class="c b" >@if ($report->rcd_mayores == "") 0 @else {{ $report->rcd_mayores }} @endif</td>
                <td class="c b" >@if ($report->rcd_menores == "") 0 @else {{ $report->rcd_menores }} @endif</td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td ></td>
                <td class="b">S. Final</td>
                <td class="c b">@if ($report->rcm_rango_1_fin == "") 0 @else {{ $report->rcm_rango_1_fin ."-". $report->rcm_rango_2_fin ."-". $report->rcm_rango_3_fin }} @endif</td>
                <td ></td>
                <td colspan="4"></td>
            </tr>
            <tr>
                <td class="c s b" colspan="2">INDIGENAS</td>
                <td class="c s b" colspan="2">AFRO COL.</td>
                <td class="c s b" colspan="2">Decreto 290/99</td>
                <td ></td>
                <td class="b">S. Dañados :&nbsp;&nbsp;&nbsp; (@if ($report->rcm_malos == "") 0 @else {{ $report->rcm_malos }} @endif)</td>
                <td class="c b">@if ($report->rcm_reg_malos == "") @else {{ $report->rcm_reg_malos }} @endif</td>
                <td ></td>
                <td class="c s b" colspan="3">CERTIFICACIONES</td>
                <td class="c b">@if ($report->rcd_certificaciones == "") 0 @else {{ $report->rcd_certificaciones }} @endif</td>
            </tr>
            <tr>
                <td class="c b" colspan="2">@if ($report->rcn_indigenas == "") 0 @else {{ $report->rcn_indigenas }} @endif</td>
                <td class="c b" colspan="2">@if ($report->rcn_afro == "") 0 @else {{ $report->rcn_afro }} @endif</td>
                <td class="c b" colspan="2">@if ($report->rcn_decreto290 == "") 0 @else {{ $report->rcn_decreto290 }} @endif</td>
            </tr>
            <tr>
                <td colspan="7"></td>
                <td class="b j" colspan="2" rowspan="6">Nota: Diligencia este Formato con Informacion correspondiente unicamente al mes reportado. <br> Diligencia un formato por cada mes. Transcriba los datos del formulario 1A. <br>Remitalo durante los primeros cinco (5) dias habiles del mes a la Delegacion Departamental.</td>
                <td></td>    
                <td class="c s b" colspan="4">SERIALES UTILIZADOS</td>

            </tr>
            <tr>
                <td class="c s b" colspan="4">CERTIFICACIONES</td>
                <td class="c b" colspan="2">@if ($report->rcn_certificaciones == "") 0 @else {{ $report->rcn_certificaciones }} @endif</td>
                <td ></td>
                <td ></td>
                <td class="b">S. Inicial</td>
                <td class="c b" colspan="3">@if ($report->rcd_rango_1_inic == "") 0 @else {{ $report->rcd_rango_1_inic ."-". $report->rcd_rango_2_inic ."-". $report->rcd_rango_3_inic }} @endif</td>
            </tr>
            <tr>
                <td colspan="10"></td>
                <td class="b">S. Final</td>
                <td class="c b" colspan="3">@if ($report->rcd_rango_1_fin == "") 0 @else {{ $report->rcd_rango_1_fin ."-". $report->rcd_rango_2_fin ."-". $report->rcd_rango_3_fin }} @endif</td>
            </tr>
             <tr>
                <td class="c s b" colspan="6">SERIALES UTILIZADOS</td>
                <td colspan="4"></td>
                <td class="b">S. Dañados (@if ($report->rcd_malos == "") 0 @else {{ $report->rcd_malos }} @endif) </td>
                <td class="c b " colspan="3">@if ($report->rcd_reg_malos == "") @else {{ $report->rcd_reg_malos }} @endif</td>
            </tr>
            <tr>
                <td class="b s" colspan="2"></td>
                <td class="c b s" colspan="2">PMT</td>
                <td class="c b s" colspan="2">REMANENTES</td>
            </tr>
            <tr>
                <td class="b" colspan="2">S. Inicial</td>
                <td class="b c" colspan="2">@if ($report->rcn_rango_1_inic == "") 0 @else {{ $report->rcn_rango_1_inic ."-". $report->rcn_rango_2_inic ."-". $report->rcn_rango_3_inic ."-". $report->rcn_rango_4_inic  ."-". $report->rcn_rango_5_inic}} @endif</td>
                <td class="b" colspan="2"></td>
            </tr>
            <tr>
                <td class="b" colspan="2">S. Final</td>
                <td class="b c" colspan="2">@if ($report->rcn_rango_1_fin == "") 0 @else {{ $report->rcn_rango_1_fin ."-". $report->rcn_rango_2_fin ."-". $report->rcn_rango_3_fin ."-". $report->rcn_rango_4_fin  ."-". $report->rcn_rango_5_fin}} @endif</td>
                <td class="b" colspan="2"></td>
            </tr>
             <tr>
                <td class="b" colspan="2">S. Dañados: (@if ($report->rcn_malos == "") 0 @else {{ $report->rcn_malos }} @endif)</td>
                <td class="c b" colspan="2">@if ($report->rcn_reg_malos == "") @else {{ $report->rcn_reg_malos }} @endif</td>
                <td class="b" colspan="2"></td>
            </tr>
            <tr>
                <td class="c pieb blanco a" colspan="8">1</td>
                <td class="c pieb blanco a" colspan="6">1</td>
            </tr>
            <tr>
                <td class="c pieb blanco" colspan="8">1</td>
                <td class="c pieb blanco" colspan="6">1</td>
            </tr>
            <tr>
                <td class="c pieb blanco paddin" colspan="8">1</td>
                <td class="c pieb blanco paddin" colspan="6">1</td>
            </tr>
            <tr>
                <td class="c pie pieb" colspan="8" >{{ Auth::user()->name }}</td>
                <td class="c pie pieb blanco" colspan="6">1</td>
            </tr>
            <tr>
                <td class="c pie2 pieb" colspan="8">@if ($report->clasoficina_id  == 1) Notaria {{ $report->name }} @else REGISTRADOR MUNICIPAL DEL ESTADO CIVIL @endif</td>
                <td class="c pie2 pieb" colspan="6">Firma</td>
            </tr>
            <tr>
                <td class="blanco arriba" colspan="8">1</td>
                <td class="blanco arriba" colspan="6">1</td>
            </tr>
            <tr>
                <td width="27" class="blanco">1</td>
                <td width="44" class="blanco">2</td>
                <td width="60" class="blanco">3</td>
                <td width="47" class="blanco">4</td>
                <td width="30" class="blanco">5</td>
                <td width="30" class="blanco">6</td>
                <td width="30" class="blanco">7</td>
                <td width="100" class="blanco">8</td>
                <td width="80" class="blanco">9</td>
                <td width="30" class="blanco">10</td>
                <td width="63" class="blanco">11</td>
                <td width="69" class="blanco">12</td>
                <td width="35" class="blanco">13</td>
                <td width="35" class="blanco">14</td>
            </tr>
        </tbody>
    </table>
 
</body>
</html>