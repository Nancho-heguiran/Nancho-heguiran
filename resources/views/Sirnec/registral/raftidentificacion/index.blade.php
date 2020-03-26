@extends('layouts.sirnec')
@section('guia') Raft 29/30 @endsection
@section('linkencabezado') @endsection

@section('styles') 
    <link rel="stylesheet" href="{{ asset('bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scriptsplugins') 
    <script src="{{ asset('bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-fileinput/js/locales/es.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-fileinput/themes/fas/theme.min.js') }}" type="text/javascript"></script>
@endsection


@section('titulo') 
    LISTADO DE RAFT 29/30 IDENTIFICACION
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearraft"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/crearraft.png')}}" title="Crear Raft" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Oficina</th>
                            <th>Fecha Inicio </th>
                            <th>Fecha Final</th>
                            <th>Fecha de Cargue </th>
                            <th>RAFT/29</th>
                            <th>RAFT/30</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td>{{ $row->name}}</td>
                                <td>{{ $row->fechainic }} </td>
                                <td>{{ $row->fechafin }}  </td>
                                <td>{{ $row->fechacreacion }} </td>
                                <td><center><a href="{{route ('raft29', ['id' => $row->id ]) }}"><img src="{{ asset('images/descargarpdf.png') }}" title="Descargar Raft/29" width="30" height="30" ></a>
                                   
                                    @if ($row->raft29 == '')
                                         <a product="{{ $row->id }}"   href="#" data-toggle="modal" data-target="#modalForm2"><img src="{{ asset('images/subirpdf.png') }}" title="Subir Archivo Escaneado de Raft/29" width="30" height="30" ></a></center>
                                        <div class="modal fade" id="modalForm2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Sistema de Cargue Raft - 29</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    {!! Form::model($row, ['route' => ['raft_actualizar29',$row->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!} 
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="file" name="file" id="raft29" class="form-control-file" style="background:#BFBDBC; border-radius: 10px ; padding: 10px 5px 10px 15px">
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-info" id="confirmar">Cargar Archivo</button>
                                                        </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ asset ('/storage/'.$row->raft29) }}"><img src="{{ asset('images/visualizarpdf.png') }}" title="Visualizar PDF Raft/29" width="30" height="30" ></a>
                                    @endif 
                                </td>
                                <td><center><a href="{{route ('raft30', ['id' => $row->id ]) }}"><img src="{{ asset('images/descargarpdf.png') }}" title="Descargar Raft/30" width="30" height="30" ></a>
                                   
                                    @if ($row->raft30 == '')
                                         <a product="{{ $row->id }}"   href="#" data-toggle="modal" data-target="#modalForm"><img src="{{ asset('images/subirpdf.png') }}" title="Subir Archivo Escaneado de Raft/30" width="30" height="30" ></a></center>
                                        <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Sistema de Cargue Raft - 30</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    {!! Form::model($row, ['route' => ['raft_actualizar30',$row->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!} 
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="file" name="file" id="raft30" class="form-control-file" style="background:#BFBDBC; border-radius: 10px ; padding: 10px 5px 10px 15px">
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-info" id="confirmar">Cargar Archivo</button>
                                                        </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ asset ('/storage/'.$row->raft30) }}"><img src="{{ asset('images/visualizarpdf.png') }}" title="Visualizar PDF Raft/30" width="30" height="30" ></a>
                                    @endif 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>   
    </div> 

    {{-- modal crear raft 30 --}}
    <div class="modal fade bd-example-modal-xl" name='crearraft' id="crearraft" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION RAFT 29/30 IDENTIFICACION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
         
                    {!! Form::open(['route' => 'raft_guardar', 'id'=>'raft30', 'name' => 'raft30', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                    <div class="modal-body">
                                            
                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-2">
                                 <center>
                                      <strong >Mes</strong>
                                      {!! Form::select ('mes_id', $meses, null, ['class'=>'form-control', 'id' => 'mes_id']) !!}
                                </center>     
                            </div>
                            <div class="col-5"></div>
                       </div>
                       <div class="row">
                         <div class="col-3"></div>
                           <div class="col-3">
                                 <center>
                                    <strong>Fecha Inicio</strong>
                                         {!! Form::date('fechainic', \Carbon\Carbon::now(), ['class'=>'form-control', 'autofocus' => 'autofocus']) !!}
                                   </center>
                           </div>
                           <div class="col-3">
                               <center>
                                   <strong>Fecha Final</strong>
                                     {!! Form::date('fechafin', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
                                     {!! Form::date('fechacreacion', \Carbon\Carbon::now(),['hidden' => 'hidden']) !!}
                                     {!! Form::number('ano', \Carbon\Carbon::now()->format('Y'),['hidden' => 'hidden']) !!}
                                     {!! Form::number('departamento_id', $user->departamento_id,['hidden' => 'hidden']) !!}
                                     {!! Form::number('municipio_id', $user->municipio_id,['hidden' => 'hidden']) !!}
                                     {!! Form::number('oficina_id', $user->oficina_id,['hidden' => 'hidden']) !!}
                               </center>    
                           </div>
                            <div class="col-3"></div>    
                        </div>
                        <div class="row">
                            <div class="col-12" style="padding: 10px; text-align: center;">
                                <button type="button" class="btn btn-info" id="btnrcn">Registro Civi de Nacimiento</button>
                                <button type="button" class="btn btn-info" id="btnrcm">Registro Civi de Matrimonio</button>
                                <button type="button" class="btn btn-info" id="btnrcd">Registro Civi de Defuncion</button>
                                <div id="error" style="margin-top: 5px;"></div>        
                            </div>
                        </div>     
                        <br>

                        {{-- input de Registro Civil de Nacimiento --}}
                        <div class="row" id="rcn" style="font-size:13px ; display:none; margin-top:-20px;">
                            <div class="col-12">
                                 <center><strong><h4 style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">REGISTRO CIVIL DE NACIMIENTO</h4></strong></center>
                            </div>   
                            <div class="col-6" >
                                <div class="row" >
                                    <div class="col-4">
                                        <center>
                                            <strong>Hombres</strong>
                                            {!! Form::number('rcn_masculino',null, ['class'=>'form-control', 'id' => 'rcn_masculino']) !!}               
                                        </center>
                                    </div>
                                    <div class="col-4">
                                        <center>
                                            <strong>Mujeres</strong>
                                            {!! Form::number('rcn_femenino',null, ['class'=>'form-control', 'id'=>'rcn_femenino']) !!}                
                                        </center> 
                                    </div>
                                    <div class="col-4" >
                                        <center >
                                            <strong >Total</strong>                                           
                                            {!! Form::number('totalnacimientos',null,['class'=>'form-control', 'id'=> 'totalnacimientos','readonly'=>'readonly' ]) !!}
                                        </center>                
                                    </div>         
                                </div>
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        <center>
                                            <strong>Mayores</strong>
                                            {!! Form::number('rcn_mayores',null, ['class'=>'form-control', 'id'=>'rcn_mayores']) !!}            
                                        </center>
                                    </div>
                                    <div class="col-4">
                                        <center>
                                            <strong>Menores</strong>
                                            {!! Form::number('rcn_menores',null, ['class'=>'form-control', 'id'=>'rcn_menores']) !!}            
                                        </center>
                                    </div>
                                    <div class="col-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <center>
                                            <strong>Indigenas</strong>
                                            {!! Form::number('rcn_indigenas',null, ['class'=>'form-control', 'id'=>'rcn_indigenas']) !!}               
                                        </center>
                                    </div>
                                    <div class="col-4">
                                        <center>
                                            <strong>Afro Col</strong>
                                            {!! Form::number('rcn_afro',null, ['class'=>'form-control', 'id'=>'rcn_afro']) !!}               
                                        </center>
                                    </div>
                                    <div class="col-4">
                                        <center>
                                            <strong>Decreto 290/99</strong>
                                            {!! Form::number('rcn_decreto290',null, ['class'=>'form-control', 'id'=>'rcn_decreto290']) !!}              
                                        </center>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-6">
                                        <center>
                                            <strong>Certificaciones Expedidas</strong>
                                            {!! Form::number('rcn_certificaciones',null, ['class'=>'form-control', 'id'=>'rcn_certificaciones' ]) !!}              
                                        </center>
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <strong>Seriales Utilizados</strong>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcn_rango_1_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcn_rango_1_inic']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcn_rango_1_fin',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcn_rango_1_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="rcn2"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1n" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcnrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>  
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcn_rango_2_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcn_rango_2_inic']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcn_rango_2_fin',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcn_rango_2_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="rcn3"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango2n" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcnrango3" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>  
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcn_rango_3_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcn_rango_3_inic']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcn_rango_3_fin',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcn_rango_3_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="rcn4"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango3n" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcnrango4" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>  
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcn_rango_4_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcn_rango_4_inic']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcn_rango_4_fin',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcn_rango_4_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px" >
                                        <div >
                                            <a href="#" id="rcn5"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango4n" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcnrango5" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>  
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcn_rango_5_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcn_rango_5_inic']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcn_rango_5_fin',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcn_rango_5_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px" >
                                        <div>
                                            <a href="#" id="rcn6"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango5n" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-4" style="margin-top: 10px">
                                        <strong >Cantidad de Seriales Dañados</strong>    
                                    </div>
                                    <div class="col-2">
                                        {!! Form::text('rcn_reg_malos',null, ['class'=>'form-control', 'id'=>'rcn_reg_malos']) !!}
                                    </div>
                                    <div class="col-2" >
                                        {!! Form::text('rcn_malos',null, ['class'=>'form-control', 'id'=>'rcn_malos', 'readonly'=>'readonly']) !!}
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px" >
                                    <div class="col-3" style="margin-top:10px"><center><strong >RELACION</strong></center></div>
                                    <div class="col-3" style="display:none" id="drcn1" > {!! Form::text('rcn1danado',null, ['class'=>'form-control', 'id'=>'rcn1danado', 'placeholder'=> 'Serial No. 1' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcn2" > {!! Form::text('rcn2danado',null, ['class'=>'form-control', 'id'=>'rcn2danado', 'placeholder'=> 'Serial No. 2' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcn3"> {!! Form::text('rcn3danado',null, ['class'=>'form-control', 'id'=>'rcn3danado', 'placeholder'=> 'Serial No. 3' ]) !!} </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-3" style="display:none" id="drcn4"> {!! Form::text('rcn4danado',null, ['class'=>'form-control', 'id'=>'rcn4danado', 'placeholder'=> 'Serial No. 4' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcn5"> {!! Form::text('rcn5danado',null, ['class'=>'form-control', 'id'=>'rcn5danado', 'placeholder'=> 'Serial No. 5' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcn6"> {!! Form::text('rcn6danado',null, ['class'=>'form-control', 'id'=>'rcn6danado', 'placeholder'=> 'Serial No. 6' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcn7"> {!! Form::text('rcn7danado',null, ['class'=>'form-control', 'id'=>'rcn7danado', 'placeholder'=> 'Serial No. 7' ]) !!} </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-3" style="display:none" id="drcn8"> {!! Form::text('rcn8danado',null, ['class'=>'form-control', 'id'=>'rcn8danado', 'placeholder'=> 'Serial No. 8' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcn9"> {!! Form::text('rcn9danado',null, ['class'=>'form-control', 'id'=>'rcn9danado', 'placeholder'=> 'Serial No. 9' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcn10"> {!! Form::text('rcn10danado',null, ['class'=>'form-control', 'id'=>'rcn10danado', 'placeholder'=> 'Serial No. 10' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcn11"> {!! Form::text('rcn11danado',null, ['class'=>'form-control', 'id'=>'rcn11danado', 'placeholder'=> 'Serial No. 11' ]) !!} </div>
                                </div>
                            </div>
                        </div>

                        {{-- input de Registro Civil de Matrimonio --}}
                        <div class="row" id="rcm" style="font-size:13px ; display:none ; margin-top:-20px;">
                            <div class="col-12">
                                 <center><strong><h4 style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">REGISTRO CIVIL DE MATRIMONIO</h4></strong></center>
                            </div>   
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <center>
                                            <strong>Total Inscritos</strong>
                                            {!! Form::number('rcm_inscritos',null,['class'=>'form-control ', 'id'=> 'rcm_inscritos']) !!}
                                        </center>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-6">
                                        <center>
                                            <strong>Certificaciones Expedidas</strong>
                                            {!! Form::number('rcm_certificaciones',null, ['class'=>'form-control ','id'=>'rcm_certificaciones']) !!}              
                                        </center>
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <strong>Seriales Utilizados</strong>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcm_rango_1_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcm_rango_1_inic']) !!}
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcm_rango_1_fin',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcm_rango_1_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px" >
                                        <div >
                                            <a href="#" id="rcm2"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1m" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcmrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong> 
                                    </div>
                                    <div class="col-4" >
                                        {!! Form::number('rcm_rango_2_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcm_rango_2_inic']) !!}
                                    </div>
                                    <div class="col-4" >
                                        {!! Form::number('rcm_rango_2_fin',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcm_rango_2_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="rcm3"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango2m" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcmrango3" style="margin-top: 3px;display:none;" >
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>  
                                    </div>
                                    <div class="col-4" >
                                        {!! Form::number('rcm_rango_3_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcm_rango_3_inic']) !!}
                                    </div>
                                    <div class="col-4" >
                                        {!! Form::number('rcm_rango_3_fin',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcm_rango_3_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div >
                                            <a href="#" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango3m" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-4" style="margin-top: 10px">
                                        <strong >Cantidad de Seriales Dañados</strong>    
                                    </div>
                                    <div class="col-2">
                                        {!! Form::text('rcm_reg_malos',null, ['class'=>'form-control', 'id'=>'rcm_reg_malos']) !!}
                                    </div>
                                    <div class="col-2" >
                                        {!! Form::number('rcm_malos',null, ['class'=>'form-control', 'id'=>'rcm_malos','readonly'=>'readonly']) !!}
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px" >
                                    <div class="col-3" style="margin-top:10px"><center><strong >RELACION</strong></center></div>
                                    <div class="col-3" style="display:none" id="drcm1"> {!! Form::text('rcm1danado',null, ['class'=>'form-control', 'id'=>'rcm1danado', 'placeholder'=> 'Serial No. 1' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcm2"> {!! Form::text('rcm2danado',null, ['class'=>'form-control', 'id'=>'rcm2danado', 'placeholder'=> 'Serial No. 2' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcm3"> {!! Form::text('rcm3danado',null, ['class'=>'form-control', 'id'=>'rcm3danado', 'placeholder'=> 'Serial No. 3' ]) !!} </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-3" style="display:none" id="drcm4"> {!! Form::text('rcm4danado',null, ['class'=>'form-control', 'id'=>'rcm4danado', 'placeholder'=> 'Serial No. 4' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcm5"> {!! Form::text('rcm5danado',null, ['class'=>'form-control', 'id'=>'rcm5danado', 'placeholder'=> 'Serial No. 5' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcm6"> {!! Form::text('rcm6danado',null, ['class'=>'form-control', 'id'=>'rcm6danado', 'placeholder'=> 'Serial No. 6' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcm7"> {!! Form::text('rcm7danado',null, ['class'=>'form-control', 'id'=>'rcm7danado', 'placeholder'=> 'Serial No. 7' ]) !!} </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-3" style="display:none" id="drcm8"> {!! Form::text('rcm8danado',null, ['class'=>'form-control', 'id'=>'rcm8danado', 'placeholder'=> 'Serial No.8' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcm9"> {!! Form::text('rcm9danado',null, ['class'=>'form-control', 'id'=>'rcm9danado', 'placeholder'=> 'Serial No. 9' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcm10"> {!! Form::text('rcm10danado',null, ['class'=>'form-control', 'id'=>'rcm10danado', 'placeholder'=> 'Serial No. 10' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcm11"> {!! Form::text('rcm11danado',null, ['class'=>'form-control', 'id'=>'rcm11danado', 'placeholder'=> 'Serial No. 11' ]) !!} </div>
                                </div>                                                
                            </div>
                        </div>


                        {{-- input de Registro Civil de Defuncion --}}
               
                        <div class="row" id="rcd" style="font-size:13px ; display:none; margin-top:-20px;">
                            <div class="col-12">
                                <center><strong><h4 style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">REGISTRO CIVIL DE DEFUNCION </h4></strong></center>
                            </div>                     
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4">
                                        <center>
                                            <strong>Hombres</strong>
                                            {!! Form::number('rcd_masculino',null, ['class'=>'form-control ', 'id' => 'rcd_masculino' ]) !!}               
                                        </center>
                                    </div>
                                    <div class="col-4">
                                        <center>
                                            <strong>Mujeres</strong>
                                            {!! Form::number('rcd_femenino',null, ['class'=>'form-control', 'id' => 'rcd_femenino' ]) !!}                
                                        </center> 
                                    </div>
                                    <div class="col-4">
                                        <center>
                                            <strong>Total</strong>                                           
                                            {!! Form::number('totaldefuncion',null,['class'=>'form-control', 'id' => 'totaldefuncion', 'readonly'=> 'readonly' ]) !!}
                                        </center>                
                                    </div>         
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <center>
                                                    <strong>Indigenas</strong>
                                                    {!! Form::number('rcd_indigenas',null, ['class'=>'form-control', 'id'=>'rcd_indigenas']) !!}               
                                                </center>
                                            </div>
                                            <div class="col-3">
                                                <center>
                                                    <strong>Afro Col</strong>
                                                    {!! Form::number('rcd_afro',null, ['class'=>'form-control','id'=>'rcd_afro']) !!}               
                                                </center>
                                            </div>
                                            <div class="col-3">
                                                <center>
                                                    <strong>Mayores</strong>
                                                    {!! Form::number('rcd_mayores',null, ['class'=>'form-control','id'=>'rcd_mayores']) !!}            
                                                </center>
                                            </div>
                                            <div class="col-3">
                                                <center>
                                                    <strong>Menores</strong>
                                                    {!! Form::number('rcd_menores',null, ['class'=>'form-control', 'id'=>'rcd_menores']) !!}            
                                                </center>
                                            </div>
                                        </div>
                                    </div>            
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-6">
                                                <center>
                                                    <strong>Certificaciones Expedidas</strong>
                                                    {!! Form::number('rcd_certificaciones',null, ['class'=>'form-control','id'=>'rcd_certificaciones']) !!}              
                                                </center>
                                            </div>
                                            <div class="col-3"></div>
                                        </div>
                                    </div>            
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <strong>Seriales Utilizados</strong>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcd_rango_1_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcd_rango_1_inic']) !!}
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcd_rango_1_fin',null, ['class'=>'form-control ', 'placeholder' => 'Final','id'=>'rcd_rango_1_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div >
                                            <a href="#" id="rcd2"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1d" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"  id="rcdrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong> 
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcd_rango_2_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcd_rango_2_inic']) !!}
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcd_rango_2_fin',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcd_rango_2_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="rcd3"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango2d" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcdrango3" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>  
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcd_rango_3_inic',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcd_rango_3_inic']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcd_rango_3_fin',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcd_rango_3_fin']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px" >
                                        <div >
                                            <a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango3d" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-4" style="margin-top: 10px">
                                        <strong >Cantidad de Seriales Dañados</strong>    
                                    </div>
                                    <div class="col-2">
                                        {!! Form::text('rcd_reg_malos',null, ['class'=>'form-control', 'id'=>'rcd_reg_malos' ]) !!}
                                    </div>
                                    <div class="col-2">
                                        {!! Form::number('rcd_malos',null, ['class'=>'form-control', 'id'=> 'rcd_malos' ,'readonly'=>'readonly']) !!}
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px" >
                                    <div class="col-3" style="margin-top:10px"><center><strong >RELACION</strong></center></div>
                                    <div class="col-3" style="display:none" id="drcd1"> {!! Form::text('rcd1danado',null, ['class'=>'form-control', 'id'=>'rcd1danado', 'placeholder'=> 'Serial No. 1' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcd2"> {!! Form::text('rcd2danado',null, ['class'=>'form-control', 'id'=>'rcd2danado', 'placeholder'=> 'Serial No. 2' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcd3"> {!! Form::text('rcd3danado',null, ['class'=>'form-control', 'id'=>'rcd3danado', 'placeholder'=> 'Serial No. 3' ]) !!} </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-3" style="display:none" id="drcd4"> {!! Form::text('rcd4danado',null, ['class'=>'form-control', 'id'=>'rcd4danado', 'placeholder'=> 'Serial No. 4' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcd5"> {!! Form::text('rcd5danado',null, ['class'=>'form-control', 'id'=>'rcd5danado', 'placeholder'=> 'Serial No. 5' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcd6"> {!! Form::text('rcd6danado',null, ['class'=>'form-control', 'id'=>'rcd6danado', 'placeholder'=> 'Serial No. 6' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcd7"> {!! Form::text('rcd7danado',null, ['class'=>'form-control', 'id'=>'rcd7danado', 'placeholder'=> 'Serial No. 7' ]) !!} </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-3" style="display:none" id="drcd8"> {!! Form::text('rcd8danado',null, ['class'=>'form-control', 'id'=>'rcd8danado', 'placeholder'=> 'Serial No. 8' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcd9"> {!! Form::text('rcd9danado',null, ['class'=>'form-control', 'id'=>'rcd9danado', 'placeholder'=> 'Serial No. 9' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcd10"> {!! Form::text('rcd10danado',null, ['class'=>'form-control', 'id'=>'rcd10danado', 'placeholder'=> 'Serial No. 10' ]) !!} </div>
                                    <div class="col-3" style="display:none" id="drcd11"> {!! Form::text('rcd11danado',null, ['class'=>'form-control', 'id'=>'rcd11danado', 'placeholder'=> 'Serial No. 11' ]) !!} </div>
                                </div>
                            </div>                  
                        </div>
                    </div>

                    {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}

                    <div class="row" >
                        <div class="col-12" style="padding: 10px; text-align: center" > 
                            <button type="button" class="btn btn-info" id="enviar">Guardar</button>
                            <button type="button" class="btn btn-info" id="limpiar">Limpiar</button>
                            <button type="button" href="{{ route('raft')}}" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>  
                    <br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    {{-- fin modal crear raft 30  --}}

    

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            $('#raft30').fileinput({
                language: 'es',
                allowedFileExtensions:['pdf'],
                maxFileSize: 1000,
                showUpload: false,
                showClose: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                theme: 'fas',
            });

            $('#raft29').fileinput({
                language: 'es',
                allowedFileExtensions:['pdf'],
                maxFileSize: 1000,
                showUpload: false,
                showClose: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                theme: 'fas',
            });

            $("#btnrcn").on("click", function(){
                $("#rcn").show();
                $("#rcm").hide();
                $("#rcd").hide();
                document.getElementById("rcn_masculino").focus();
            });
            $("#btnrcm").on("click", function(){
                $("#rcm").show();
                $("#rcn").hide();
                $("#rcd").hide();
                document.getElementById("total_rcm").focus();
            });
            $("#btnrcd").on("click", function(){
                $("#rcd").show();
                $("#rcn").hide();
                $("#rcm").hide();
                document.getElementById("rcd_masculino").focus();
            });

            $("#rcn2").on("click", function(){
                $("#rcnrango2").show();
            });
            $("#rcn3").on("click", function(){
                $("#rcnrango3").show();
            });
            $("#rcn4").on("click", function(){
                $("#rcnrango4").show();
            });
            $("#rcn5").on("click", function(){
                $("#rcnrango5").show();
            });

            $("#rcd2").on("click", function(){
                $("#rcdrango2").show();
            });
            $("#rcd3").on("click", function(){
                $("#rcdrango3").show();     
            });

            $("#rcm2").on("click", function(){
                $("#rcmrango2").show();
            });
            $("#rcm3").on("click", function(){
                $("#rcmrango3").show();
            });

            $("#rcn_reg_malos").focusout(function() { numeroserialesdañadosrcn(); });  
            $("#rcm_reg_malos").focusout(function() { numeroserialesdañadosrcm(); });  
            $("#rcd_reg_malos").focusout(function() { numeroserialesdañadosrcd(); });  

            $("#rcn_masculino").focusout(function() { rcn_valida_suma(); });
            $("#rcn_femenino").focusout(function() { rcn_valida_suma(); });
            $("#rcd_masculino").focusout(function() { rcd_valida_suma(); });
            $("#rcd_femenino").focusout(function() { rcd_valida_suma(); }); 

            $("#rcn_rango_1_fin").focusout(function() { rcn_rango_1_fin(); });
            $("#rcn_rango_2_fin").focusout(function() { rcn_rango_2_fin(); });
            $("#rcn_rango_3_fin").focusout(function() { rcn_rango_3_fin(); });
            $("#rcn_rango_4_fin").focusout(function() { rcn_rango_4_fin(); });
            $("#rcn_rango_5_fin").focusout(function() { rcn_rango_5_fin(); });
            $("#rcn_rango_1_fin").focusout(function() { rcn_rangos_sumas(); });
            $("#rcn_rango_2_fin").focusout(function() { rcn_rangos_sumas(); });
            $("#rcn_rango_3_fin").focusout(function() { rcn_rangos_sumas(); });
            $("#rcn_rango_4_fin").focusout(function() { rcn_rangos_sumas(); });
            $("#rcn_rango_5_fin").focusout(function() { rcn_rangos_sumas(); });

            $("#rcd_rango_1_fin").focusout(function() { rcd_rango_1_fin(); });
            $("#rcd_rango_2_fin").focusout(function() { rcd_rango_2_fin(); });
            $("#rcd_rango_3_fin").focusout(function() { rcd_rango_3_fin(); });
            $("#rcd_rango_1_fin").focusout(function() { rcd_rangos_sumas(); });
            $("#rcd_rango_2_fin").focusout(function() { rcd_rangos_sumas(); });
            $("#rcd_rango_3_fin").focusout(function() { rcd_rangos_sumas(); });

            $("#rcm_rango_1_fin").focusout(function() { rcm_rango_1_fin(); });
            $("#rcm_rango_2_fin").focusout(function() { rcm_rango_2_fin(); });
            $("#rcm_rango_3_fin").focusout(function() { rcm_rango_3_fin(); });
            $("#rcm_rango_1_fin").focusout(function() { rcm_rangos_sumas(); });
            $("#rcm_rango_2_fin").focusout(function() { rcm_rangos_sumas(); });
            $("#rcm_rango_3_fin").focusout(function() { rcm_rangos_sumas(); });

            $("#rcm").focusout(function() { revisasiesnulorcm(); });


            $("#limpiar").on("click", function(){ document.getElementById("raft30").reset(); });
            $("#enviar").on("click", function(){ 
                
                var $form = document.raft30;

                    //valida rcn
                    
                    var $rcn_masculino = document.getElementById('rcn_masculino').value;
                    if($rcn_masculino === ''){ var $rcn_masculino = 0;}else{ }
                    var $rcn_femenino = document.getElementById('rcn_femenino').value;
                    if($rcn_femenino === ''){ var $rcn_femenino = 0;}else{ }
                        var $totalrcn_masfem = parseInt($rcn_masculino)+parseInt($rcn_femenino);

                    var $rcn_mayores = document.getElementById('rcn_mayores').value;
                    if($rcn_mayores === ''){ var $rcn_mayores = 0;}else{ }
                    var $rcn_menores = document.getElementById('rcn_menores').value;
                    if($rcn_menores === ''){ var $rcn_menores = 0;}else{ }
                        
                        var $totalrcn_maymen = parseInt($rcn_mayores)+parseInt($rcn_menores);

                    if($totalrcn_maymen != $totalrcn_masfem) {
                        Swal.fire({ title: 'Upss Error en RCN !', text: 'La suma entre mayores y menores es '+$totalrcn_maymen+' y el total de inscritos para registro civil de Nacimiento son '+$totalrcn_masfem+' por favor revise', icon: 'error', confirmButtonText: 'Cerrar' })
                        return false;
                    }   

                    var $rcn_indigenas = document.getElementById('rcn_indigenas').value;
                    if($rcn_indigenas === ''){ var $rcn_indigenas = 0;}else{ }
                    var $rcn_afro = document.getElementById('rcn_afro').value;
                    if($rcn_afro === ''){ var $rcn_afro = 0;}else{ }
                    var $rcn_decreto290 = document.getElementById('rcn_decreto290').value;
                    if($rcn_decreto290 === ''){ var $rcn_decreto290 = 0;}else{ }

                        var $totaldiscriminacion = parseInt($rcn_indigenas)+parseInt($rcn_afro)+parseInt($rcn_decreto290);

                    if($totaldiscriminacion > $totalrcn_masfem) {
                        Swal.fire({ title: 'Upss Error en RCN !', text: 'La suma entre Indigenas, Afro y Decreto 290 es de '+$totaldiscriminacion+' y este no puede superar el Total de Inscritos el cual es '+$totalrcn_masfem+' por favor revise', icon: 'error', confirmButtonText: 'Cerrar' })
                        return false;
                    } 

                    var $rcn_certificaciones = document.getElementById('rcn_certificaciones').value;
                    if($rcn_certificaciones === ''){ 
                        Swal.fire({
                            title: 'Upss RCN',
                            text: "Esta Seguro de que no existieron Certiifcaciones de RCN durante el periodo  descrito!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Seguro!'
                            }).then((result) => {
                            if (result.value) {
                                var $rcn_certificaciones = 0;
                                document.getElementById("rcn_certificaciones").value=$rcn_certificaciones;
                            }
                        })
                        return false;
                    }else{
                    }

                    var $rcn_rango_1_inic = document.getElementById('rcn_rango_1_inic').value;
                    if($rcn_rango_1_inic === ''){ var $rcn_rango_1_inic = 0;}else{ }
                    var $rcn_rango_1_fin = document.getElementById('rcn_rango_1_fin').value;
                    if($rcn_rango_1_fin === ''){ var $rcn_rango_1_fin = 0;}else{ }
                    if($rcn_rango_1_inic == 0 && $rcn_rango_1_fin == 0 ){ var $rcn_total_rcn_rango_1 = 0; }else{ var $rcn_total_rcn_rango_1 =  parseInt($rcn_rango_1_fin)-parseInt($rcn_rango_1_inic)+1; } 

                    var $rcn_rango_2_inic = document.getElementById('rcn_rango_2_inic').value;
                    if($rcn_rango_2_inic === ''){ var $rcn_rango_2_inic = 0;}else{ }
                    var $rcn_rango_2_fin = document.getElementById('rcn_rango_2_fin').value;
                    if($rcn_rango_2_fin === ''){ var $rcn_rango_2_fin = 0;}else{ }
                    if($rcn_rango_2_inic == 0 && $rcn_rango_2_fin == 0 ){ var $rcn_total_rcn_rango_2 = 0; }else{ var $rcn_total_rcn_rango_2 =  parseInt($rcn_rango_2_fin)-parseInt($rcn_rango_2_inic)+1; } 

                    var $rcn_rango_3_inic = document.getElementById('rcn_rango_3_inic').value;
                    if($rcn_rango_3_inic === ''){ var $rcn_rango_3_inic = 0;}else{ }
                    var $rcn_rango_3_fin = document.getElementById('rcn_rango_3_fin').value;
                    if($rcn_rango_3_fin === ''){ var $rcn_rango_3_fin = 0;}else{ }
                    if($rcn_rango_3_inic == 0 && $rcn_rango_3_fin == 0 ){ var $rcn_total_rcn_rango_3 = 0; }else{ var $rcn_total_rcn_rango_3 =  parseInt($rcn_rango_3_fin)-parseInt($rcn_rango_3_inic)+1; } 

                    var $rcn_rango_4_inic = document.getElementById('rcn_rango_4_inic').value;
                    if($rcn_rango_4_inic === ''){ var $rcn_rango_4_inic = 0;}else{ }
                    var $rcn_rango_4_fin = document.getElementById('rcn_rango_4_fin').value;
                    if($rcn_rango_4_fin === ''){ var $rcn_rango_4_fin = 0;}else{ }
                    if($rcn_rango_4_inic == 0 && $rcn_rango_4_fin == 0 ){ var $rcn_total_rcn_rango_4 = 0; }else{ var $rcn_total_rcn_rango_4 =  parseInt($rcn_rango_4_fin)-parseInt($rcn_rango_4_inic)+1; } 

                    var $rcn_rango_5_inic = document.getElementById('rcn_rango_5_inic').value;
                    if($rcn_rango_5_inic === ''){ var $rcn_rango_5_inic = 0;}else{ }
                    var $rcn_rango_5_fin = document.getElementById('rcn_rango_5_fin').value;
                    if($rcn_rango_5_fin === ''){ var $rcn_rango_5_fin = 0;}else{ }
                    if($rcn_rango_5_inic == 0 && $rcn_rango_5_fin == 0 ){ var $rcn_total_rcn_rango_5 = 0; }else{ var $rcn_total_rcn_rango_5 =  parseInt($rcn_rango_5_fin)-parseInt($rcn_rango_5_inic)+1; } 

                    var $rcn_totalgeneralrangos =  parseInt($rcn_total_rcn_rango_1)+parseInt($rcn_total_rcn_rango_2)+parseInt($rcn_total_rcn_rango_3)+parseInt($rcn_total_rcn_rango_4)+parseInt($rcn_total_rcn_rango_5);
                    
                    var $totalnacimientos  = document.getElementById('totalnacimientos').value;
                    if($totalnacimientos === ''){ var $totalnacimientos = 0;}else{ }

                    var $rcn_reg_malos  = document.getElementById('rcn_reg_malos').value;
                    if($rcn_reg_malos === ''){ var $rcn_reg_malos = 0;}else{ }
                   

                    var $totaltotal_rcn  = parseInt($rcn_totalgeneralrangos)-parseInt($totalnacimientos)-parseInt($rcn_reg_malos);
                    if($totaltotal_rcn != 0){
                        Swal.fire({ title: 'Upss Error en RCN !', text: 'La relacion entre los Seriales Utilizados - Menos los Seriales Dañados y los Seriales Legalizados NO concuerdan por favor Revise', icon: 'error', confirmButtonText: 'Cerrar' })
                        return false;
                    }

                    var $rcn1danado = document.getElementById('rcn1danado').value;
                    var $rcn2danado = document.getElementById('rcn2danado').value;
                    var $rcn3danado = document.getElementById('rcn3danado').value;
                    var $rcn4danado = document.getElementById('rcn4danado').value;
                    var $rcn5danado = document.getElementById('rcn5danado').value;
                    var $rcn6danado = document.getElementById('rcn6danado').value;
                    var $rcn7danado = document.getElementById('rcn7danado').value;
                    var $rcn8danado = document.getElementById('rcn8danado').value;
                    var $rcn9danado = document.getElementById('rcn9danado').value;
                    var $rcn10danado = document.getElementById('rcn10danado').value;
                    var $rcn11danado = document.getElementById('rcn11danado').value;

                    if(parseInt($rcn_reg_malos) === 1){ if($rcn1danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) === 2){ if($rcn1danado === '' || $rcn2danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) === 3){ if($rcn1danado === '' || $rcn2danado === '' || $rcn3danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) === 4){ if($rcn1danado === '' || $rcn2danado === '' || $rcn3danado === '' || $rcn4danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) === 5){ if($rcn1danado === '' || $rcn2danado === '' || $rcn3danado === '' || $rcn4danado === '' || $rcn5danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) === 6){ if($rcn1danado === '' || $rcn2danado === '' || $rcn3danado === '' || $rcn4danado === '' || $rcn5danado === '' || $rcn6danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) === 7){ if($rcn1danado === '' || $rcn2danado === '' || $rcn3danado === '' || $rcn4danado === '' || $rcn5danado === '' || $rcn6danado === '' || $rcn7danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) === 8){ if($rcn1danado === '' || $rcn2danado === '' || $rcn3danado === '' || $rcn4danado === '' || $rcn5danado === '' || $rcn6danado === '' || $rcn7danado === '' || $rcn8danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) === 9){ if($rcn1danado === '' || $rcn2danado === '' || $rcn3danado === '' || $rcn4danado === '' || $rcn5danado === '' || $rcn6danado === '' || $rcn7danado === '' || $rcn8danado === '' || $rcn9danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) === 10){ if($rcn1danado === '' || $rcn2danado === '' || $rcn3danado === '' || $rcn4danado === '' || $rcn5danado === '' || $rcn6danado === '' || $rcn7danado === '' || $rcn8danado === '' || $rcn9danado === '' || $rcn10danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) === 11){ if($rcn1danado === '' || $rcn2danado === '' || $rcn3danado === '' || $rcn4danado === '' || $rcn5danado === '' || $rcn6danado === '' || $rcn7danado === '' || $rcn8danado === '' || $rcn9danado === '' || $rcn10danado === '' || $rcn11danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcn_reg_malos) > 11){ if($rcn1danado === '' || $rcn2danado === '' || $rcn3danado === '' || $rcn4danado === '' || $rcn5danado === '' || $rcn6danado === '' || $rcn7danado === '' || $rcn8danado === '' || $rcn9danado === '' || $rcn10danado === '' || $rcn11danado === ''){ Swal.fire({ title: 'Upss Error en RCN !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }
                    
                    //valida rcm
                    
                    var $rcm_certificaciones = document.getElementById('rcm_certificaciones').value;
                    if($rcm_certificaciones === ''){ 
                        Swal.fire({
                            title: 'Upss RCM',
                            text: "Esta Seguro de que no existieron Certiifcaciones de RCM durante el periodo  descrito!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Seguro!'
                            }).then((result) => {
                            if (result.value) {
                                var $rcm_certificaciones = 0;
                                document.getElementById("rcm_certificaciones").value=$rcm_certificaciones;
                            }
                        })
                        return false;
                    }else{
                    }

                    var $rcm_inscritos = document.getElementById('rcm_inscritos').value;
                    if($rcm_inscritos === ''){ var $rcm_inscritos = 0;}else{ }
                    
                    var $rcm_rango_1_inic = document.getElementById('rcm_rango_1_inic').value;
                    if($rcm_rango_1_inic === ''){ var $rcm_rango_1_inic = 0;}else{ }
                    var $rcm_rango_1_fin = document.getElementById('rcm_rango_1_fin').value;
                    if($rcm_rango_1_fin === ''){ var $rcm_rango_1_fin = 0;}else{ }
                    if($rcm_rango_1_inic == 0 && $rcm_rango_1_fin == 0 ){ var $rcm_total_rcm_rango_1 = 0; }else{ var $rcm_total_rcm_rango_1 =  parseInt($rcm_rango_1_fin)-parseInt($rcm_rango_1_inic)+1; } 

                    var $rcm_rango_2_inic = document.getElementById('rcm_rango_2_inic').value;
                    if($rcm_rango_2_inic === ''){ var $rcm_rango_2_inic = 0;}else{ }
                    var $rcm_rango_2_fin = document.getElementById('rcm_rango_2_fin').value;
                    if($rcm_rango_2_fin === ''){ var $rcm_rango_2_fin = 0;}else{ }
                    if($rcm_rango_2_inic == 0 && $rcm_rango_2_fin == 0 ){ var $rcm_total_rcm_rango_2 = 0; }else{ var $rcm_total_rcm_rango_2 =  parseInt($rcm_rango_2_fin)-parseInt($rcm_rango_2_inic)+1; } 

                    var $rcm_rango_3_inic = document.getElementById('rcm_rango_3_inic').value;
                    if($rcm_rango_3_inic === ''){ var $rcm_rango_3_inic = 0;}else{ }
                    var $rcm_rango_3_fin = document.getElementById('rcm_rango_3_fin').value;
                    if($rcm_rango_3_fin === ''){ var $rcm_rango_3_fin = 0;}else{ }
                    if($rcm_rango_3_inic == 0 && $rcm_rango_3_fin == 0 ){ var $rcm_total_rcm_rango_3 = 0; }else{ var $rcm_total_rcm_rango_3 =  parseInt($rcm_rango_3_fin)-parseInt($rcm_rango_3_inic)+1; } 

                    var $rcm_totalgeneralrangos =  parseInt($rcm_total_rcm_rango_1)+parseInt($rcm_total_rcm_rango_2)+parseInt($rcm_total_rcm_rango_3);

                    var $rcm_reg_malos  = document.getElementById('rcm_reg_malos').value;
                    if($rcm_reg_malos === ''){ var $rcm_reg_malos = 0;}else{ }
                   
                    var $totaltotal_rcm  = parseInt($rcm_totalgeneralrangos)-parseInt($rcm_inscritos)-parseInt($rcm_reg_malos);
                    if($totaltotal_rcm != 0){
                        Swal.fire({ title: 'Upss Error en RCM !', text: 'La relacion entre los Seriales Utilizados - Menos los Seriales Dañados y los Seriales Legalizados NO concuerdan por favor Revise', icon: 'error', confirmButtonText: 'Cerrar' })
                        return false;
                    }

                    var $rcm1danado = document.getElementById('rcm1danado').value;
                    var $rcm2danado = document.getElementById('rcm2danado').value;
                    var $rcm3danado = document.getElementById('rcm3danado').value;
                    var $rcm4danado = document.getElementById('rcm4danado').value;
                    var $rcm5danado = document.getElementById('rcm5danado').value;
                    var $rcm6danado = document.getElementById('rcm6danado').value;
                    var $rcm7danado = document.getElementById('rcm7danado').value;
                    var $rcm8danado = document.getElementById('rcm8danado').value;
                    var $rcm9danado = document.getElementById('rcm9danado').value;
                    var $rcm10danado = document.getElementById('rcm10danado').value;
                    var $rcm11danado = document.getElementById('rcm11danado').value;

                    if(parseInt($rcm_reg_malos) === 1){ if($rcm1danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) === 2){ if($rcm1danado === '' || $rcm2danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) === 3){ if($rcm1danado === '' || $rcm2danado === '' || $rcm3danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) === 4){ if($rcm1danado === '' || $rcm2danado === '' || $rcm3danado === '' || $rcm4danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) === 5){ if($rcm1danado === '' || $rcm2danado === '' || $rcm3danado === '' || $rcm4danado === '' || $rcm5danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) === 6){ if($rcm1danado === '' || $rcm2danado === '' || $rcm3danado === '' || $rcm4danado === '' || $rcm5danado === '' || $rcm6danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) === 7){ if($rcm1danado === '' || $rcm2danado === '' || $rcm3danado === '' || $rcm4danado === '' || $rcm5danado === '' || $rcm6danado === '' || $rcm7danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) === 8){ if($rcm1danado === '' || $rcm2danado === '' || $rcm3danado === '' || $rcm4danado === '' || $rcm5danado === '' || $rcm6danado === '' || $rcm7danado === '' || $rcm8danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) === 9){ if($rcm1danado === '' || $rcm2danado === '' || $rcm3danado === '' || $rcm4danado === '' || $rcm5danado === '' || $rcm6danado === '' || $rcm7danado === '' || $rcm8danado === '' || $rcm9danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) === 10){ if($rcm1danado === '' || $rcm2danado === '' || $rcm3danado === '' || $rcm4danado === '' || $rcm5danado === '' || $rcm6danado === '' || $rcm7danado === '' || $rcm8danado === '' || $rcm9danado === '' || $rcm10danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) === 11){ if($rcm1danado === '' || $rcm2danado === '' || $rcm3danado === '' || $rcm4danado === '' || $rcm5danado === '' || $rcm6danado === '' || $rcm7danado === '' || $rcm8danado === '' || $rcm9danado === '' || $rcm10danado === '' || $rcm11danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcm_reg_malos) > 11){ if($rcm1danado === '' || $rcm2danado === '' || $rcm3danado === '' || $rcm4danado === '' || $rcm5danado === '' || $rcm6danado === '' || $rcm7danado === '' || $rcm8danado === '' || $rcm9danado === '' || $rcm10danado === '' || $rcm11danado === ''){ Swal.fire({ title: 'Upss Error en RCM !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }

                    //valida rcd


                    var $rcd_masculino = document.getElementById('rcd_masculino').value;
                    if($rcd_masculino === ''){ var $rcd_masculino = 0;}else{ }
                    var $rcd_femenino = document.getElementById('rcd_femenino').value;
                    if($rcd_femenino === ''){ var $rcd_femenino = 0;}else{ }
                        var $totalrcd_masfem = parseInt($rcd_masculino)+parseInt($rcd_femenino);

                    var $rcd_mayores = document.getElementById('rcd_mayores').value;
                    if($rcd_mayores === ''){ var $rcd_mayores = 0;}else{ }
                    var $rcd_menores = document.getElementById('rcd_menores').value;
                    if($rcd_menores === ''){ var $rcd_menores = 0;}else{ }
                        var $totalrcd_maymen = parseInt($rcd_mayores)+parseInt($rcd_menores);

                    if($totalrcd_maymen != $totalrcd_masfem) {
                        Swal.fire({ title: 'Upss Error en RCD !', text: 'La suma entre mayores y menores es '+$totalrcd_maymen+' y el total de inscritos para registro civil de Defuncion son '+$totalrcd_masfem+' por favor revise', icon: 'error', confirmButtonText: 'Cerrar' })
                        return false;
                    }   

                    var $rcd_indigenas = document.getElementById('rcd_indigenas').value;
                    if($rcd_indigenas === ''){ var $rcd_indigenas = 0;}else{ }
                    var $rcd_afro = document.getElementById('rcd_afro').value;
                    if($rcd_afro === ''){ var $rcd_afro = 0;}else{ }
                        var $totaldiscriminacion = parseInt($rcd_indigenas)+parseInt($rcd_afro);


                    if($totaldiscriminacion > $totalrcd_masfem) {
                        Swal.fire({ title: 'Upss Error en RCD !', text: 'La suma entre Indigenas, Afro es de '+$totaldiscriminacion+' y este no puede superar el Total de Inscritos el cual es '+$totalrcd_masfem+' por favor revise', icon: 'error', confirmButtonText: 'Cerrar' })
                        return false;
                    } 

                    var $rcd_certificaciones = document.getElementById('rcd_certificaciones').value;
                    if($rcd_certificaciones === ''){ 
                        Swal.fire({
                            title: 'Upss RCD',
                            text: "Esta Seguro de que no existieron Certiifcaciones de RCD durante el periodo  descrito!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Seguro!'
                            }).then((result) => {
                            if (result.value) {
                                var $rcd_certificaciones = 0;
                                document.getElementById("rcd_certificaciones").value=$rcd_certificaciones;
                            }
                        })
                        return false;
                    }else{
                    }

                    var $totaldefuncion = document.getElementById('totaldefuncion').value;
                    if($totaldefuncion === ''){ var $totaldefuncion = 0;}else{ }
                    
                    var $rcd_rango_1_inic = document.getElementById('rcd_rango_1_inic').value;
                    if($rcd_rango_1_inic === ''){ var $rcd_rango_1_inic = 0;}else{ }
                    var $rcd_rango_1_fin = document.getElementById('rcd_rango_1_fin').value;
                    if($rcd_rango_1_fin === ''){ var $rcd_rango_1_fin = 0;}else{ }
                    if($rcd_rango_1_inic == 0 && $rcd_rango_1_fin == 0 ){ var $rcd_total_rcd_rango_1 = 0; }else{ var $rcd_total_rcd_rango_1 =  parseInt($rcd_rango_1_fin)-parseInt($rcd_rango_1_inic)+1; } 

                    var $rcd_rango_2_inic = document.getElementById('rcd_rango_2_inic').value;
                    if($rcd_rango_2_inic === ''){ var $rcd_rango_2_inic = 0;}else{ }
                    var $rcd_rango_2_fin = document.getElementById('rcd_rango_2_fin').value;
                    if($rcd_rango_2_fin === ''){ var $rcd_rango_2_fin = 0;}else{ }
                    if($rcd_rango_2_inic == 0 && $rcd_rango_2_fin == 0 ){ var $rcd_total_rcd_rango_2 = 0; }else{ var $rcd_total_rcd_rango_2 =  parseInt($rcd_rango_2_fin)-parseInt($rcd_rango_2_inic)+1; } 

                    var $rcd_rango_3_inic = document.getElementById('rcd_rango_3_inic').value;
                    if($rcd_rango_3_inic === ''){ var $rcd_rango_3_inic = 0;}else{ }
                    var $rcd_rango_3_fin = document.getElementById('rcd_rango_3_fin').value;
                    if($rcd_rango_3_fin === ''){ var $rcd_rango_3_fin = 0;}else{ }
                    if($rcd_rango_3_inic == 0 && $rcd_rango_3_fin == 0 ){ var $rcd_total_rcd_rango_3 = 0; }else{ var $rcd_total_rcd_rango_3 =  parseInt($rcd_rango_3_fin)-parseInt($rcd_rango_3_inic)+1; } 

                    var $rcd_totalgeneralrangos =  parseInt($rcd_total_rcd_rango_1)+parseInt($rcd_total_rcd_rango_2)+parseInt($rcd_total_rcd_rango_3);

                    var $rcd_reg_malos  = document.getElementById('rcd_reg_malos').value;
                    if($rcd_reg_malos === ''){ var $rcd_reg_malos = 0;}else{ }
                   
                    var $totaltotal_rcd  = parseInt($rcd_totalgeneralrangos)-parseInt($totaldefuncion)-parseInt($rcd_reg_malos);
                    if($totaltotal_rcd != 0){
                        Swal.fire({ title: 'Upss Error en RCD !', text: 'La relacion entre los Seriales Utilizados - Menos los Seriales Dañados y los Seriales Legalizados NO concuerdan por favor Revise', icon: 'error', confirmButtonText: 'Cerrar' })
                        return false;
                    }


                    var $rcd1danado = document.getElementById('rcd1danado').value;
                    var $rcd2danado = document.getElementById('rcd2danado').value;
                    var $rcd3danado = document.getElementById('rcd3danado').value;
                    var $rcd4danado = document.getElementById('rcd4danado').value;
                    var $rcd5danado = document.getElementById('rcd5danado').value;
                    var $rcd6danado = document.getElementById('rcd6danado').value;
                    var $rcd7danado = document.getElementById('rcd7danado').value;
                    var $rcd8danado = document.getElementById('rcd8danado').value;
                    var $rcd9danado = document.getElementById('rcd9danado').value;
                    var $rcd10danado = document.getElementById('rcd10danado').value;
                    var $rcd11danado = document.getElementById('rcd11danado').value;

                    if(parseInt($rcd_reg_malos) === 1){ if($rcd1danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) === 2){ if($rcd1danado === '' || $rcd2danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) === 3){ if($rcd1danado === '' || $rcd2danado === '' || $rcd3danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) === 4){ if($rcd1danado === '' || $rcd2danado === '' || $rcd3danado === '' || $rcd4danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) === 5){ if($rcd1danado === '' || $rcd2danado === '' || $rcd3danado === '' || $rcd4danado === '' || $rcd5danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) === 6){ if($rcd1danado === '' || $rcd2danado === '' || $rcd3danado === '' || $rcd4danado === '' || $rcd5danado === '' || $rcd6danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) === 7){ if($rcd1danado === '' || $rcd2danado === '' || $rcd3danado === '' || $rcd4danado === '' || $rcd5danado === '' || $rcd6danado === '' || $rcd7danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) === 8){ if($rcd1danado === '' || $rcd2danado === '' || $rcd3danado === '' || $rcd4danado === '' || $rcd5danado === '' || $rcd6danado === '' || $rcd7danado === '' || $rcd8danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) === 9){ if($rcd1danado === '' || $rcd2danado === '' || $rcd3danado === '' || $rcd4danado === '' || $rcd5danado === '' || $rcd6danado === '' || $rcd7danado === '' || $rcd8danado === '' || $rcd9danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) === 10){ if($rcd1danado === '' || $rcd2danado === '' || $rcd3danado === '' || $rcd4danado === '' || $rcd5danado === '' || $rcd6danado === '' || $rcd7danado === '' || $rcd8danado === '' || $rcd9danado === '' || $rcd10danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) === 11){ if($rcd1danado === '' || $rcd2danado === '' || $rcd3danado === '' || $rcd4danado === '' || $rcd5danado === '' || $rcd6danado === '' || $rcd7danado === '' || $rcd8danado === '' || $rcd9danado === '' || $rcd10danado === '' || $rcd11danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }else if (parseInt($rcd_reg_malos) > 11){ if($rcd1danado === '' || $rcd2danado === '' || $rcd3danado === '' || $rcd4danado === '' || $rcd5danado === '' || $rcd6danado === '' || $rcd7danado === '' || $rcd8danado === '' || $rcd9danado === '' || $rcd10danado === '' || $rcd11danado === ''){ Swal.fire({ title: 'Upss Error en RCD !', text: 'Por Favor Ingrese los Numeros de Seriales Dañados o Anulados', icon: 'error', confirmButtonText: 'Cerrar' }); return false; }
                    }


                    var $rcn_masculino = document.getElementById('rcn_masculino').value; if($rcn_masculino  === ''){ var $rcn_masculino = 0; document.getElementById("rcn_masculino").value=$rcn_masculino;}else{ }
                    var $rcn_femenino = document.getElementById('rcn_femenino').value; if($rcn_femenino  === ''){ var $rcn_femenino = 0; document.getElementById("rcn_femenino").value=$rcn_femenino;}else{ }
                    var $rcn_mayores = document.getElementById('rcn_mayores').value; if($rcn_mayores  === ''){ var $rcn_mayores = 0; document.getElementById("rcn_mayores").value=$rcn_mayores;}else{ }
                    var $rcn_menores = document.getElementById('rcn_menores').value; if($rcn_menores  === ''){ var $rcn_menores = 0; document.getElementById("rcn_menores").value=$rcn_menores;}else{ }
                    var $rcn_indigenas = document.getElementById('rcn_indigenas').value; if($rcn_indigenas  === ''){ var $rcn_indigenas = 0; document.getElementById("rcn_indigenas").value=$rcn_indigenas;}else{ }
                    var $rcn_afro = document.getElementById('rcn_afro').value; if($rcn_afro  === ''){ var $rcn_afro = 0; document.getElementById("rcn_afro").value=$rcn_afro;}else{ }
                    var $rcn_decreto290 = document.getElementById('rcn_decreto290').value; if($rcn_decreto290  === ''){ var $rcn_decreto290 = 0; document.getElementById("rcn_decreto290").value=$rcn_decreto290;}else{ }
                    var $rcn_certificaciones = document.getElementById('rcn_certificaciones').value; if($rcn_certificaciones  === ''){ var $rcn_certificaciones = 0; document.getElementById("rcn_certificaciones").value=$rcn_certificaciones;}else{ }
                    var $rcn_rango_1_inic = document.getElementById('rcn_rango_1_inic').value; if($rcn_rango_1_inic  === ''){ var $rcn_rango_1_inic = 0; document.getElementById("rcn_rango_1_inic").value=$rcn_rango_1_inic;}else{ }
                    var $rcn_rango_1_fin = document.getElementById('rcn_rango_1_fin').value; if($rcn_rango_1_fin  === ''){ var $rcn_rango_1_fin = 0; document.getElementById("rcn_rango_1_fin").value=$rcn_rango_1_fin;}else{ }
                    var $rcn_rango_2_inic = document.getElementById('rcn_rango_2_inic').value; if($rcn_rango_2_inic  === ''){ var $rcn_rango_2_inic = 0; document.getElementById("rcn_rango_2_inic").value=$rcn_rango_2_inic;}else{ }
                    var $rcn_rango_2_fin = document.getElementById('rcn_rango_2_fin').value; if($rcn_rango_2_fin  === ''){ var $rcn_rango_2_fin = 0; document.getElementById("rcn_rango_2_fin").value=$rcn_rango_2_fin;}else{ }
                    var $rcn_rango_3_inic = document.getElementById('rcn_rango_3_inic').value; if($rcn_rango_3_inic  === ''){ var $rcn_rango_3_inic = 0; document.getElementById("rcn_rango_3_inic").value=$rcn_rango_3_inic;}else{ }
                    var $rcn_rango_3_fin = document.getElementById('rcn_rango_3_fin').value; if($rcn_rango_3_fin  === ''){ var $rcn_rango_3_fin = 0; document.getElementById("rcn_rango_3_fin").value=$rcn_rango_3_fin;}else{ }
                    var $rcn_rango_4_inic = document.getElementById('rcn_rango_4_inic').value; if($rcn_rango_4_inic  === ''){ var $rcn_rango_4_inic = 0; document.getElementById("rcn_rango_4_inic").value=$rcn_rango_4_inic;}else{ }
                    var $rcn_rango_4_fin = document.getElementById('rcn_rango_4_fin').value; if($rcn_rango_4_fin  === ''){ var $rcn_rango_4_fin = 0; document.getElementById("rcn_rango_4_fin").value=$rcn_rango_4_fin;}else{ }
                    var $rcn_rango_5_inic = document.getElementById('rcn_rango_5_inic').value; if($rcn_rango_5_inic  === ''){ var $rcn_rango_5_inic = 0; document.getElementById("rcn_rango_5_inic").value=$rcn_rango_5_inic;}else{ }
                    var $rcn_rango_5_fin = document.getElementById('rcn_rango_5_fin').value; if($rcn_rango_5_fin  === ''){ var $rcn_rango_5_fin = 0; document.getElementById("rcn_rango_5_fin").value=$rcn_rango_5_fin;}else{ }
                    var $rcn_malos = document.getElementById('rcn_malos').value; if($rcn_malos  === ''){ var $rcn_malos = 0; document.getElementById("rcn_malos").value=$rcn_malos;}else{ }
                    var $rcn_reg_malos = document.getElementById('rcn_reg_malos').value; if($rcn_reg_malos  === ''){ var $rcn_reg_malos = 0; document.getElementById("rcn_reg_malos").value=$rcn_reg_malos;}else{ }
                    var $rcm_inscritos = document.getElementById('rcm_inscritos').value; if($rcm_inscritos  === ''){ var $rcm_inscritos = 0; document.getElementById("rcm_inscritos").value=$rcm_inscritos;}else{ }
                    var $rcm_certificaciones = document.getElementById('rcm_certificaciones').value; if($rcm_certificaciones  === ''){ var $rcm_certificaciones = 0; document.getElementById("rcm_certificaciones").value=$rcm_certificaciones;}else{ }
                    var $rcm_rango_1_inic = document.getElementById('rcm_rango_1_inic').value; if($rcm_rango_1_inic  === ''){ var $rcm_rango_1_inic = 0; document.getElementById("rcm_rango_1_inic").value=$rcm_rango_1_inic;}else{ }
                    var $rcm_rango_1_fin = document.getElementById('rcm_rango_1_fin').value; if($rcm_rango_1_fin  === ''){ var $rcm_rango_1_fin = 0; document.getElementById("rcm_rango_1_fin").value=$rcm_rango_1_fin;}else{ }
                    var $rcm_rango_2_inic = document.getElementById('rcm_rango_2_inic').value; if($rcm_rango_2_inic  === ''){ var $rcm_rango_2_inic = 0; document.getElementById("rcm_rango_2_inic").value=$rcm_rango_2_inic;}else{ }
                    var $rcm_rango_2_fin = document.getElementById('rcm_rango_2_fin').value; if($rcm_rango_2_fin  === ''){ var $rcm_rango_2_fin = 0; document.getElementById("rcm_rango_2_fin").value=$rcm_rango_2_fin;}else{ }
                    var $rcm_rango_3_inic = document.getElementById('rcm_rango_3_inic').value; if($rcm_rango_3_inic  === ''){ var $rcm_rango_3_inic = 0; document.getElementById("rcm_rango_3_inic").value=$rcm_rango_3_inic;}else{ }
                    var $rcm_rango_3_fin = document.getElementById('rcm_rango_3_fin').value; if($rcm_rango_3_fin  === ''){ var $rcm_rango_3_fin = 0; document.getElementById("rcm_rango_3_fin").value=$rcm_rango_3_fin;}else{ }
                    var $rcm_malos = document.getElementById('rcm_malos').value; if($rcm_malos  === ''){ var $rcm_malos = 0; document.getElementById("rcm_malos").value=$rcm_malos;}else{ }
                    var $rcm_reg_malos = document.getElementById('rcm_reg_malos').value; if($rcm_reg_malos  === ''){ var $rcm_reg_malos = 0; document.getElementById("rcm_reg_malos").value=$rcm_reg_malos;}else{ }
                    var $rcd_masculino = document.getElementById('rcd_masculino').value; if($rcd_masculino  === ''){ var $rcd_masculino = 0; document.getElementById("rcd_masculino").value=$rcd_masculino;}else{ }
                    var $rcd_femenino = document.getElementById('rcd_femenino').value; if($rcd_femenino  === ''){ var $rcd_femenino = 0; document.getElementById("rcd_femenino").value=$rcd_femenino;}else{ }
                    var $rcd_mayores = document.getElementById('rcd_mayores').value; if($rcd_mayores  === ''){ var $rcd_mayores = 0; document.getElementById("rcd_mayores").value=$rcd_mayores;}else{ }
                    var $rcd_menores = document.getElementById('rcd_menores').value; if($rcd_menores  === ''){ var $rcd_menores = 0; document.getElementById("rcd_menores").value=$rcd_menores;}else{ }
                    var $rcd_indigenas = document.getElementById('rcd_indigenas').value; if($rcd_indigenas  === ''){ var $rcd_indigenas = 0; document.getElementById("rcd_indigenas").value=$rcd_indigenas;}else{ }
                    var $rcd_afro = document.getElementById('rcd_afro').value; if($rcd_afro  === ''){ var $rcd_afro = 0; document.getElementById("rcd_afro").value=$rcd_afro;}else{ }
                    var $rcd_certificaciones = document.getElementById('rcd_certificaciones').value; if($rcd_certificaciones  === ''){ var $rcd_certificaciones = 0; document.getElementById("rcd_certificaciones").value=$rcd_certificaciones;}else{ }
                    var $rcd_rango_1_inic = document.getElementById('rcd_rango_1_inic').value; if($rcd_rango_1_inic  === ''){ var $rcd_rango_1_inic = 0; document.getElementById("rcd_rango_1_inic").value=$rcd_rango_1_inic;}else{ }
                    var $rcd_rango_1_fin = document.getElementById('rcd_rango_1_fin').value; if($rcd_rango_1_fin  === ''){ var $rcd_rango_1_fin = 0; document.getElementById("rcd_rango_1_fin").value=$rcd_rango_1_fin;}else{ }
                    var $rcd_rango_2_inic = document.getElementById('rcd_rango_2_inic').value; if($rcd_rango_2_inic  === ''){ var $rcd_rango_2_inic = 0; document.getElementById("rcd_rango_2_inic").value=$rcd_rango_2_inic;}else{ }
                    var $rcd_rango_2_fin = document.getElementById('rcd_rango_2_fin').value; if($rcd_rango_2_fin  === ''){ var $rcd_rango_2_fin = 0; document.getElementById("rcd_rango_2_fin").value=$rcd_rango_2_fin;}else{ }
                    var $rcd_rango_3_inic = document.getElementById('rcd_rango_3_inic').value; if($rcd_rango_3_inic  === ''){ var $rcd_rango_3_inic = 0; document.getElementById("rcd_rango_3_inic").value=$rcd_rango_3_inic;}else{ }
                    var $rcd_rango_3_fin = document.getElementById('rcd_rango_3_fin').value; if($rcd_rango_3_fin  === ''){ var $rcd_rango_3_fin = 0; document.getElementById("rcd_rango_3_fin").value=$rcd_rango_3_fin;}else{ }
                    var $rcd_malos = document.getElementById('rcd_malos').value; if($rcd_malos  === ''){ var $rcd_malos = 0; document.getElementById("rcd_malos").value=$rcd_malos;}else{ }
                    var $rcd_reg_malos = document.getElementById('rcd_reg_malos').value; if($rcd_reg_malos  === ''){ var $rcd_reg_malos = 0; document.getElementById("rcd_reg_malos").value=$rcd_reg_malos;}else{ }
                    var $rcn1danado = document.getElementById('rcn1danado').value; if($rcn1danado  === ''){ var $rcn1danado = 0; document.getElementById("rcn1danado").value=$rcn1danado;}else{ }
                    var $rcn2danado = document.getElementById('rcn2danado').value; if($rcn2danado  === ''){ var $rcn2danado = 0; document.getElementById("rcn2danado").value=$rcn2danado;}else{ }
                    var $rcn3danado = document.getElementById('rcn3danado').value; if($rcn3danado  === ''){ var $rcn3danado = 0; document.getElementById("rcn3danado").value=$rcn3danado;}else{ }
                    var $rcn4danado = document.getElementById('rcn4danado').value; if($rcn4danado  === ''){ var $rcn4danado = 0; document.getElementById("rcn4danado").value=$rcn4danado;}else{ }
                    var $rcn5danado = document.getElementById('rcn5danado').value; if($rcn5danado  === ''){ var $rcn5danado = 0; document.getElementById("rcn5danado").value=$rcn5danado;}else{ }
                    var $rcn6danado = document.getElementById('rcn6danado').value; if($rcn6danado  === ''){ var $rcn6danado = 0; document.getElementById("rcn6danado").value=$rcn6danado;}else{ }
                    var $rcn7danado = document.getElementById('rcn7danado').value; if($rcn7danado  === ''){ var $rcn7danado = 0; document.getElementById("rcn7danado").value=$rcn7danado;}else{ }
                    var $rcn8danado = document.getElementById('rcn8danado').value; if($rcn8danado  === ''){ var $rcn8danado = 0; document.getElementById("rcn8danado").value=$rcn8danado;}else{ }
                    var $rcn9danado = document.getElementById('rcn9danado').value; if($rcn9danado  === ''){ var $rcn9danado = 0; document.getElementById("rcn9danado").value=$rcn9danado;}else{ }
                    var $rcn10danado = document.getElementById('rcn10danado').value; if($rcn10danado  === ''){ var $rcn10danado = 0; document.getElementById("rcn10danado").value=$rcn10danado;}else{ }
                    var $rcn11danado = document.getElementById('rcn11danado').value; if($rcn11danado  === ''){ var $rcn11danado = 0; document.getElementById("rcn11danado").value=$rcn11danado;}else{ }
                    var $rcm1danado = document.getElementById('rcm1danado').value; if($rcm1danado  === ''){ var $rcm1danado = 0; document.getElementById("rcm1danado").value=$rcm1danado;}else{ }
                    var $rcm2danado = document.getElementById('rcm2danado').value; if($rcm2danado  === ''){ var $rcm2danado = 0; document.getElementById("rcm2danado").value=$rcm2danado;}else{ }
                    var $rcm3danado = document.getElementById('rcm3danado').value; if($rcm3danado  === ''){ var $rcm3danado = 0; document.getElementById("rcm3danado").value=$rcm3danado;}else{ }
                    var $rcm4danado = document.getElementById('rcm4danado').value; if($rcm4danado  === ''){ var $rcm4danado = 0; document.getElementById("rcm4danado").value=$rcm4danado;}else{ }
                    var $rcm5danado = document.getElementById('rcm5danado').value; if($rcm5danado  === ''){ var $rcm5danado = 0; document.getElementById("rcm5danado").value=$rcm5danado;}else{ }
                    var $rcm6danado = document.getElementById('rcm6danado').value; if($rcm6danado  === ''){ var $rcm6danado = 0; document.getElementById("rcm6danado").value=$rcm6danado;}else{ }
                    var $rcm7danado = document.getElementById('rcm7danado').value; if($rcm7danado  === ''){ var $rcm7danado = 0; document.getElementById("rcm7danado").value=$rcm7danado;}else{ }
                    var $rcm8danado = document.getElementById('rcm8danado').value; if($rcm8danado  === ''){ var $rcm8danado = 0; document.getElementById("rcm8danado").value=$rcm8danado;}else{ }
                    var $rcm9danado = document.getElementById('rcm9danado').value; if($rcm9danado  === ''){ var $rcm9danado = 0; document.getElementById("rcm9danado").value=$rcm9danado;}else{ }
                    var $rcm10danado = document.getElementById('rcm10danado').value; if($rcm10danado  === ''){ var $rcm10danado = 0; document.getElementById("rcm10danado").value=$rcm10danado;}else{ }
                    var $rcm11danado = document.getElementById('rcm11danado').value; if($rcm11danado  === ''){ var $rcm11danado = 0; document.getElementById("rcm11danado").value=$rcm11danado;}else{ }
                    var $rcd1danado = document.getElementById('rcd1danado').value; if($rcd1danado  === ''){ var $rcd1danado = 0; document.getElementById("rcd1danado").value=$rcd1danado;}else{ }
                    var $rcd2danado = document.getElementById('rcd2danado').value; if($rcd2danado  === ''){ var $rcd2danado = 0; document.getElementById("rcd2danado").value=$rcd2danado;}else{ }
                    var $rcd3danado = document.getElementById('rcd3danado').value; if($rcd3danado  === ''){ var $rcd3danado = 0; document.getElementById("rcd3danado").value=$rcd3danado;}else{ }
                    var $rcd4danado = document.getElementById('rcd4danado').value; if($rcd4danado  === ''){ var $rcd4danado = 0; document.getElementById("rcd4danado").value=$rcd4danado;}else{ }
                    var $rcd5danado = document.getElementById('rcd5danado').value; if($rcd5danado  === ''){ var $rcd5danado = 0; document.getElementById("rcd5danado").value=$rcd5danado;}else{ }
                    var $rcd6danado = document.getElementById('rcd6danado').value; if($rcd6danado  === ''){ var $rcd6danado = 0; document.getElementById("rcd6danado").value=$rcd6danado;}else{ }
                    var $rcd7danado = document.getElementById('rcd7danado').value; if($rcd7danado  === ''){ var $rcd7danado = 0; document.getElementById("rcd7danado").value=$rcd7danado;}else{ }
                    var $rcd8danado = document.getElementById('rcd8danado').value; if($rcd8danado  === ''){ var $rcd8danado = 0; document.getElementById("rcd8danado").value=$rcd8danado;}else{ }
                    var $rcd9danado = document.getElementById('rcd9danado').value; if($rcd9danado  === ''){ var $rcd9danado = 0; document.getElementById("rcd9danado").value=$rcd9danado;}else{ }
                    var $rcd10danado = document.getElementById('rcd10danado').value; if($rcd10danado  === ''){ var $rcd10danado = 0; document.getElementById("rcd10danado").value=$rcd10danado;}else{ }
                    var $rcd11danado = document.getElementById('rcd11danado').value; if($rcd11danado  === ''){ var $rcd11danado = 0; document.getElementById("rcd11danado").value=$rcd11danado;}else{ }

                $form.submit();
            
            });   

        });     

        // aqui empiesan las funciones 
        

            function  numeroserialesdañadosrcn() {
                var $numeroserialesdañadosrcn = parseInt(document.getElementById('rcn_malos').value);
                var $numeroserialesdañadosingrcn = parseInt(document.getElementById('rcn_reg_malos').value);
                if ($numeroserialesdañadosrcn != $numeroserialesdañadosingrcn){
                    document.getElementById('drcn1').style.display='none';document.getElementById('drcn2').style.display='none';document.getElementById('drcn3').style.display='none';document.getElementById('drcn4').style.display='none';document.getElementById('drcn5').style.display='none';document.getElementById('drcn6').style.display='none';document.getElementById('drcn7').style.display='none';document.getElementById('drcn8').style.display='none';document.getElementById('drcn9').style.display='none';document.getElementById('drcn10').style.display='none';document.getElementById('drcn11').style.display='none';
                    Swal.fire({ title: 'Upss Error RCN !', text: 'El Numero de Registros Dañados ingresados no es consistente con la informacion Suministrada por favor revise', icon: 'error', confirmButtonText: 'Cerrar' })
                }else{
                    document.getElementById('drcn1').style.display='none';document.getElementById('drcn2').style.display='none';document.getElementById('drcn3').style.display='none';document.getElementById('drcn4').style.display='none';document.getElementById('drcn5').style.display='none';document.getElementById('drcn6').style.display='none';document.getElementById('drcn7').style.display='none';document.getElementById('drcn8').style.display='none';document.getElementById('drcn9').style.display='none';document.getElementById('drcn10').style.display='none';document.getElementById('drcn11').style.display='none';
                    if($numeroserialesdañadosrcn == 0){
                    }else if($numeroserialesdañadosrcn == 1){
                        document.getElementById('drcn1').style.display='block';
                    }else if($numeroserialesdañadosrcn == 2){
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';
                    } else if($numeroserialesdañadosrcn == 3){
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';document.getElementById('drcn3').style.display='block';
                    }else if($numeroserialesdañadosrcn == 4){
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';document.getElementById('drcn3').style.display='block';document.getElementById('drcn4').style.display='block';
                    }else if($numeroserialesdañadosrcn == 5){
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';document.getElementById('drcn3').style.display='block';document.getElementById('drcn4').style.display='block';document.getElementById('drcn5').style.display='block';
                    }else if($numeroserialesdañadosrcn == 6){
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';document.getElementById('drcn3').style.display='block';document.getElementById('drcn4').style.display='block';document.getElementById('drcn5').style.display='block';document.getElementById('drcn6').style.display='block';
                    }else if($numeroserialesdañadosrcn == 7){
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';document.getElementById('drcn3').style.display='block';document.getElementById('drcn4').style.display='block';document.getElementById('drcn5').style.display='block';document.getElementById('drcn6').style.display='block';document.getElementById('drcn7').style.display='block';
                    }else if($numeroserialesdañadosrcn == 8){
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';document.getElementById('drcn3').style.display='block';document.getElementById('drcn4').style.display='block';document.getElementById('drcn5').style.display='block';document.getElementById('drcn6').style.display='block';document.getElementById('drcn7').style.display='block';document.getElementById('drcn8').style.display='block';
                    }else if($numeroserialesdañadosrcn == 9){
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';document.getElementById('drcn3').style.display='block';document.getElementById('drcn4').style.display='block';document.getElementById('drcn5').style.display='block';document.getElementById('drcn6').style.display='block';document.getElementById('drcn7').style.display='block';document.getElementById('drcn8').style.display='block';document.getElementById('drcn9').style.display='block';
                    }else if($numeroserialesdañadosrcn == 10){
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';document.getElementById('drcn3').style.display='block';document.getElementById('drcn4').style.display='block';document.getElementById('drcn5').style.display='block';document.getElementById('drcn6').style.display='block';document.getElementById('drcn7').style.display='block';document.getElementById('drcn8').style.display='block';document.getElementById('drcn9').style.display='block';document.getElementById('drcn10').style.display='block';
                    }else if($numeroserialesdañadosrcn == 11){
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';document.getElementById('drcn3').style.display='block';document.getElementById('drcn4').style.display='block';document.getElementById('drcn5').style.display='block';document.getElementById('drcn6').style.display='block';document.getElementById('drcn7').style.display='block';document.getElementById('drcn8').style.display='block';document.getElementById('drcn9').style.display='block';document.getElementById('drcn10').style.display='block';document.getElementById('drcn11').style.display='block';
                    }else{
                        document.getElementById('drcn1').style.display='block';document.getElementById('drcn2').style.display='block';document.getElementById('drcn3').style.display='block';document.getElementById('drcn4').style.display='block';document.getElementById('drcn5').style.display='block';document.getElementById('drcn6').style.display='block';document.getElementById('drcn7').style.display='block';document.getElementById('drcn8').style.display='block';document.getElementById('drcn9').style.display='block';document.getElementById('drcn10').style.display='block';document.getElementById('drcn11').style.display='block';
                    }
                }
            };

            function  numeroserialesdañadosrcm() {

                var $numeroserialesdañadosrcm = parseInt(document.getElementById('rcm_malos').value);
                var $numeroserialesdañadosingrcm = parseInt(document.getElementById('rcm_reg_malos').value);

                if ($numeroserialesdañadosrcm != $numeroserialesdañadosingrcm){
                    document.getElementById('drcm1').style.display='none';document.getElementById('drcm2').style.display='none';document.getElementById('drcm3').style.display='none';document.getElementById('drcm4').style.display='none';document.getElementById('drcm5').style.display='none';document.getElementById('drcm6').style.display='none';document.getElementById('drcm7').style.display='none';document.getElementById('drcm8').style.display='none';document.getElementById('drcm9').style.display='none';document.getElementById('drcm10').style.display='none';document.getElementById('drcm11').style.display='none';
                    Swal.fire({ title: 'Upss Error RCM !', text: 'El Numero de Registros Dañados ingresados no es consistente con la informacion Suministrada por favor revise', icon: 'error', confirmButtonText: 'Cerrar' })
                }else{
                    document.getElementById('drcm1').style.display='none';document.getElementById('drcm2').style.display='none';document.getElementById('drcm3').style.display='none';document.getElementById('drcm4').style.display='none';document.getElementById('drcm5').style.display='none';document.getElementById('drcm6').style.display='none';document.getElementById('drcm7').style.display='none';document.getElementById('drcm8').style.display='none';document.getElementById('drcm9').style.display='none';document.getElementById('drcm10').style.display='none';document.getElementById('drcm11').style.display='none';
                    if($numeroserialesdañadosrcm == 0){
                    }else if($numeroserialesdañadosrcm == 1){
                        document.getElementById('drcm1').style.display='block';
                    }else if($numeroserialesdañadosrcm == 2){
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';
                    } else if($numeroserialesdañadosrcm == 3){
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';document.getElementById('drcm3').style.display='block';
                    }else if($numeroserialesdañadosrcm == 4){
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';document.getElementById('drcm3').style.display='block';document.getElementById('drcm4').style.display='block';
                    }else if($numeroserialesdañadosrcm == 5){
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';document.getElementById('drcm3').style.display='block';document.getElementById('drcm4').style.display='block';document.getElementById('drcm5').style.display='block';
                    }else if($numeroserialesdañadosrcm == 6){
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';document.getElementById('drcm3').style.display='block';document.getElementById('drcm4').style.display='block';document.getElementById('drcm5').style.display='block';document.getElementById('drcm6').style.display='block';
                    }else if($numeroserialesdañadosrcm == 7){
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';document.getElementById('drcm3').style.display='block';document.getElementById('drcm4').style.display='block';document.getElementById('drcm5').style.display='block';document.getElementById('drcm6').style.display='block';document.getElementById('drcm7').style.display='block';
                    }else if($numeroserialesdañadosrcm == 8){
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';document.getElementById('drcm3').style.display='block';document.getElementById('drcm4').style.display='block';document.getElementById('drcm5').style.display='block';document.getElementById('drcm6').style.display='block';document.getElementById('drcm7').style.display='block';document.getElementById('drcm8').style.display='block';
                    }else if($numeroserialesdañadosrcm == 9){
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';document.getElementById('drcm3').style.display='block';document.getElementById('drcm4').style.display='block';document.getElementById('drcm5').style.display='block';document.getElementById('drcm6').style.display='block';document.getElementById('drcm7').style.display='block';document.getElementById('drcm8').style.display='block';document.getElementById('drcm9').style.display='block';
                    }else if($numeroserialesdañadosrcm == 10){
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';document.getElementById('drcm3').style.display='block';document.getElementById('drcm4').style.display='block';document.getElementById('drcm5').style.display='block';document.getElementById('drcm6').style.display='block';document.getElementById('drcm7').style.display='block';document.getElementById('drcm8').style.display='block';document.getElementById('drcm9').style.display='block';document.getElementById('drcm10').style.display='block';
                    }else if($numeroserialesdañadosrcm == 11){
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';document.getElementById('drcm3').style.display='block';document.getElementById('drcm4').style.display='block';document.getElementById('drcm5').style.display='block';document.getElementById('drcm6').style.display='block';document.getElementById('drcm7').style.display='block';document.getElementById('drcm8').style.display='block';document.getElementById('drcm9').style.display='block';document.getElementById('drcm10').style.display='block';document.getElementById('drcm11').style.display='block';
                    }else{
                        document.getElementById('drcm1').style.display='block';document.getElementById('drcm2').style.display='block';document.getElementById('drcm3').style.display='block';document.getElementById('drcm4').style.display='block';document.getElementById('drcm5').style.display='block';document.getElementById('drcm6').style.display='block';document.getElementById('drcm7').style.display='block';document.getElementById('drcm8').style.display='block';document.getElementById('drcm9').style.display='block';document.getElementById('drcm10').style.display='block';document.getElementById('drcm11').style.display='block';
                    }
                }
            };

            function  numeroserialesdañadosrcd() {
                var $numeroserialesdañadosrcd = parseInt(document.getElementById('rcd_malos').value);
                var $numeroserialesdañadosingrcd = parseInt(document.getElementById('rcd_reg_malos').value);
                if ($numeroserialesdañadosrcd != $numeroserialesdañadosingrcd){
                    document.getElementById('drcd1').style.display='none';document.getElementById('drcd2').style.display='none';document.getElementById('drcd3').style.display='none';document.getElementById('drcd4').style.display='none';document.getElementById('drcd5').style.display='none';document.getElementById('drcd6').style.display='none';document.getElementById('drcd7').style.display='none';document.getElementById('drcd8').style.display='none';document.getElementById('drcd9').style.display='none';document.getElementById('drcd10').style.display='none';document.getElementById('drcd11').style.display='none';
                    Swal.fire({ title: 'Upss Error RCD!', text: 'El Numero de Registros Dañados ingresados no es consistente con la informacion Suministrada por favor revise', icon: 'error', confirmButtonText: 'Cerrar' })
                }else{
                    document.getElementById('drcd1').style.display='none';document.getElementById('drcd2').style.display='none';document.getElementById('drcd3').style.display='none';document.getElementById('drcd4').style.display='none';document.getElementById('drcd5').style.display='none';document.getElementById('drcd6').style.display='none';document.getElementById('drcd7').style.display='none';document.getElementById('drcd8').style.display='none';document.getElementById('drcd9').style.display='none';document.getElementById('drcd10').style.display='none';document.getElementById('drcd11').style.display='none';
                    if($numeroserialesdañadosrcd == 0){
                    }else if($numeroserialesdañadosrcd == 1){
                        document.getElementById('drcd1').style.display='block';
                    }else if($numeroserialesdañadosrcd == 2){
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';
                    } else if($numeroserialesdañadosrcd == 3){
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';document.getElementById('drcd3').style.display='block';
                    }else if($numeroserialesdañadosrcd == 4){
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';document.getElementById('drcd3').style.display='block';document.getElementById('drcd4').style.display='block';
                    }else if($numeroserialesdañadosrcd == 5){
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';document.getElementById('drcd3').style.display='block';document.getElementById('drcd4').style.display='block';document.getElementById('drcd5').style.display='block';
                    }else if($numeroserialesdañadosrcd == 6){
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';document.getElementById('drcd3').style.display='block';document.getElementById('drcd4').style.display='block';document.getElementById('drcd5').style.display='block';document.getElementById('drcd6').style.display='block';
                    }else if($numeroserialesdañadosrcd == 7){
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';document.getElementById('drcd3').style.display='block';document.getElementById('drcd4').style.display='block';document.getElementById('drcd5').style.display='block';document.getElementById('drcd6').style.display='block';document.getElementById('drcd7').style.display='block';
                    }else if($numeroserialesdañadosrcd == 8){
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';document.getElementById('drcd3').style.display='block';document.getElementById('drcd4').style.display='block';document.getElementById('drcd5').style.display='block';document.getElementById('drcd6').style.display='block';document.getElementById('drcd7').style.display='block';document.getElementById('drcd8').style.display='block';
                    }else if($numeroserialesdañadosrcd == 9){
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';document.getElementById('drcd3').style.display='block';document.getElementById('drcd4').style.display='block';document.getElementById('drcd5').style.display='block';document.getElementById('drcd6').style.display='block';document.getElementById('drcd7').style.display='block';document.getElementById('drcd8').style.display='block';document.getElementById('drcd9').style.display='block';
                    }else if($numeroserialesdañadosrcd == 10){
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';document.getElementById('drcd3').style.display='block';document.getElementById('drcd4').style.display='block';document.getElementById('drcd5').style.display='block';document.getElementById('drcd6').style.display='block';document.getElementById('drcd7').style.display='block';document.getElementById('drcd8').style.display='block';document.getElementById('drcd9').style.display='block';document.getElementById('drcd10').style.display='block';
                    }else if($numeroserialesdañadosrcd == 11){
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';document.getElementById('drcd3').style.display='block';document.getElementById('drcd4').style.display='block';document.getElementById('drcd5').style.display='block';document.getElementById('drcd6').style.display='block';document.getElementById('drcd7').style.display='block';document.getElementById('drcd8').style.display='block';document.getElementById('drcd9').style.display='block';document.getElementById('drcd10').style.display='block';document.getElementById('drcd11').style.display='block';
                    }else{
                        document.getElementById('drcd1').style.display='block';document.getElementById('drcd2').style.display='block';document.getElementById('drcd3').style.display='block';document.getElementById('drcd4').style.display='block';document.getElementById('drcd5').style.display='block';document.getElementById('drcd6').style.display='block';document.getElementById('drcd7').style.display='block';document.getElementById('drcd8').style.display='block';document.getElementById('drcd9').style.display='block';document.getElementById('drcd10').style.display='block';document.getElementById('drcd11').style.display='block';
                    }
                }
            };

            function   rcm_rangos_sumas() {
                var $rcm_inscritos = document.getElementById('rcm_inscritos').value;
                if($rcm_inscritos == ''){ $rcm_inscritos = 0;}

                var $rcm_rango_1_inic = document.getElementById('rcm_rango_1_inic').value;
                var $rcm_rango_1_fin = document.getElementById('rcm_rango_1_fin').value;
                if($rcm_rango_1_inic == ''){ $rcm_rango_1_inic = 0;}
                if($rcm_rango_1_fin == ''){ var $totalrango1d = 0; }else{ var $totalrango1d=parseInt($rcm_rango_1_fin)-parseInt($rcm_rango_1_inic)+1; }

                var $rcm_rango_2_inic = document.getElementById('rcm_rango_2_inic').value;
                var $rcm_rango_2_fin = document.getElementById('rcm_rango_2_fin').value;
                if($rcm_rango_2_inic == ''){ $rcm_rango_2_inic = 0;}
                if($rcm_rango_2_fin == ''){ var $totalrango2d = 0; }else{ var $totalrango2d=parseInt($rcm_rango_2_fin)-parseInt($rcm_rango_2_inic)+1; }

                var $rcm_rango_3_inic = document.getElementById('rcm_rango_3_inic').value;
                var $rcm_rango_3_fin = document.getElementById('rcm_rango_3_fin').value;
                if($rcm_rango_3_inic == ''){ $rcm_rango_3_inic = 0;}
                if($rcm_rango_3_fin == ''){ var $totalrango3d = 0; }else{ var $totalrango3d=parseInt($rcm_rango_3_fin)-parseInt($rcm_rango_3_inic)+1; }

                var $rcm_toralrangos = parseInt($totalrango1d)+parseInt($totalrango2d)+parseInt($totalrango3d)-parseInt($rcm_inscritos);

                document.getElementById("rcm_malos").value=$rcm_toralrangos; 
            };   

            function   rcn_rangos_sumas() {
                var $totalnacimientos = document.getElementById('totalnacimientos').value;

                var $rcn_rango_1_inic = document.getElementById('rcn_rango_1_inic').value;
                var $rcn_rango_1_fin = document.getElementById('rcn_rango_1_fin').value;
                if($rcn_rango_1_inic == ''){ $rcn_rango_1_inic = 0;}
                if($rcn_rango_1_fin == ''){ var $totalrango1n = 0; }else{ var $totalrango1n=parseInt($rcn_rango_1_fin)-parseInt($rcn_rango_1_inic)+1; }

                var $rcn_rango_2_inic = document.getElementById('rcn_rango_2_inic').value;
                var $rcn_rango_2_fin = document.getElementById('rcn_rango_2_fin').value;
                if($rcn_rango_2_inic == ''){ $rcn_rango_2_inic = 0;}
                if($rcn_rango_2_fin == ''){ var $totalrango2n = 0; }else{ var $totalrango2n=parseInt($rcn_rango_2_fin)-parseInt($rcn_rango_2_inic)+1; }

                var $rcn_rango_3_inic = document.getElementById('rcn_rango_3_inic').value;
                var $rcn_rango_3_fin = document.getElementById('rcn_rango_3_fin').value;
                if($rcn_rango_3_inic == ''){ $rcn_rango_3_inic = 0;}
                if($rcn_rango_3_fin == ''){ var $totalrango3n = 0; }else{ var $totalrango3n=parseInt($rcn_rango_3_fin)-parseInt($rcn_rango_3_inic)+1; }

                var $rcn_rango_4_inic = document.getElementById('rcn_rango_4_inic').value;
                var $rcn_rango_4_fin = document.getElementById('rcn_rango_4_fin').value;
                if($rcn_rango_4_inic == ''){ $rcn_rango_4_inic = 0;}
                if($rcn_rango_4_fin == ''){ var $totalrango4n = 0; }else{ var $totalrango4n=parseInt($rcn_rango_4_fin)-parseInt($rcn_rango_4_inic)+1; }

                var $rcn_rango_5_inic = document.getElementById('rcn_rango_5_inic').value;
                var $rcn_rango_5_fin = document.getElementById('rcn_rango_5_fin').value;
                if($rcn_rango_5_inic == ''){ $rcn_rango_5_inic = 0;}
                if($rcn_rango_5_fin == ''){ var $totalrango5n = 0; }else{ var $totalrango5n=parseInt($rcn_rango_5_fin)-parseInt($rcn_rango_5_inic)+1; }

                var $rcn_toralrangos = parseInt($totalrango1n)+parseInt($totalrango2n)+parseInt($totalrango3n)+parseInt($totalrango4n)+parseInt($totalrango5n)-parseInt($totalnacimientos);
                document.getElementById("rcn_malos").value=$rcn_toralrangos;
            }; 

            function   rcd_rangos_sumas() {
                var $totaldefuncion = document.getElementById('totaldefuncion').value;

                var $rcd_rango_1_inic = document.getElementById('rcd_rango_1_inic').value;
                var $rcd_rango_1_fin = document.getElementById('rcd_rango_1_fin').value;
                if($rcd_rango_1_inic == ''){ $rcd_rango_1_inic = 0;}
                if($rcd_rango_1_fin == ''){ var $totalrango1d = 0; }else{ var $totalrango1d=parseInt($rcd_rango_1_fin)-parseInt($rcd_rango_1_inic)+1; }

                var $rcd_rango_2_inic = document.getElementById('rcd_rango_2_inic').value;
                var $rcd_rango_2_fin = document.getElementById('rcd_rango_2_fin').value;
                if($rcd_rango_2_inic == ''){ $rcd_rango_2_inic = 0;}
                if($rcd_rango_2_fin == ''){ var $totalrango2d = 0; }else{ var $totalrango2d=parseInt($rcd_rango_2_fin)-parseInt($rcd_rango_2_inic)+1; }

                var $rcd_rango_3_inic = document.getElementById('rcd_rango_3_inic').value;
                var $rcd_rango_3_fin = document.getElementById('rcd_rango_3_fin').value;
                if($rcd_rango_3_inic == ''){ $rcd_rango_3_inic = 0;}
                if($rcd_rango_3_fin == ''){ var $totalrango3d = 0; }else{ var $totalrango3d=parseInt($rcd_rango_3_fin)-parseInt($rcd_rango_3_inic)+1; }

                var $rcd_toralrangos = parseInt($totalrango1d)+parseInt($totalrango2d)+parseInt($totalrango3d)-parseInt($totaldefuncion);
                document.getElementById("rcd_malos").value=$rcd_toralrangos;
            };  

            function  rcn_rango_1_fin() {
                var $totalrango1n = 0;
                var $rcn_rango_1_inic = document.getElementById('rcn_rango_1_inic').value;
                var $rcn_rango_1_fin = document.getElementById('rcn_rango_1_fin').value;
                if($rcn_rango_1_inic == ''){$rcn_rango_1_inic = 0;}
                if($rcn_rango_1_fin == ''){$rcn_rango_1_inic = 0;}
                var $totalrango1n=parseInt($rcn_rango_1_fin)-parseInt($rcn_rango_1_inic)+1;
                if($totalrango1n < 0){ document.getElementById("totalrango1n").innerHTML = $totalrango1n; $("#totalrango1n").css({'color':'red'}); }else{ document.getElementById("totalrango1n").innerHTML = $totalrango1n; $("#totalrango1n").css({'color':'blue'});}
            };  

            function  rcn_rango_2_fin() {
                var $totalrango2n = 0;
                var $rcn_rango_2_inic = document.getElementById('rcn_rango_2_inic').value;
                var $rcn_rango_2_fin = document.getElementById('rcn_rango_2_fin').value;
                if($rcn_rango_2_inic == ''){$rcn_rango_2_inic = 0;}
                if($rcn_rango_2_fin == ''){$rcn_rango_2_inic = 0;}
                var $totalrango2n=parseInt($rcn_rango_2_fin)-parseInt($rcn_rango_2_inic)+1;
                if($totalrango2n < 0){ document.getElementById("totalrango2n").innerHTML = $totalrango2n; $("#totalrango2n").css({'color':'red'}); }else{ document.getElementById("totalrango2n").innerHTML = $totalrango2n; $("#totalrango2n").css({'color':'blue'});}
            };

            function  rcn_rango_3_fin() {
                var $totalrango3n = 0;
                var $rcn_rango_3_inic = document.getElementById('rcn_rango_3_inic').value;
                var $rcn_rango_3_fin = document.getElementById('rcn_rango_3_fin').value;
                if($rcn_rango_3_inic == ''){$rcn_rango_3_inic = 0;}
                if($rcn_rango_3_fin == ''){$rcn_rango_3_inic = 0;}
                var $totalrango3n=parseInt($rcn_rango_3_fin)-parseInt($rcn_rango_3_inic)+1;
                if($totalrango3n < 0){ document.getElementById("totalrango3n").innerHTML = $totalrango3n; $("#totalrango3n").css({'color':'red'}); }else{ document.getElementById("totalrango3n").innerHTML = $totalrango3n; $("#totalrango3n").css({'color':'blue'});}
            };

            function  rcn_rango_4_fin() {
                var $totalrango4n = 0;
                var $rcn_rango_4_inic = document.getElementById('rcn_rango_4_inic').value;
                var $rcn_rango_4_fin = document.getElementById('rcn_rango_4_fin').value;
                if($rcn_rango_4_inic == ''){$rcn_rango_4_inic = 0;}
                if($rcn_rango_4_fin == ''){$rcn_rango_4_inic = 0;}
                var $totalrango4n=parseInt($rcn_rango_4_fin)-parseInt($rcn_rango_4_inic)+1;
                if($totalrango4n < 0){ document.getElementById("totalrango4n").innerHTML = $totalrango4n; $("#totalrango4n").css({'color':'red'}); }else{ document.getElementById("totalrango4n").innerHTML = $totalrango4n; $("#totalrango4n").css({'color':'blue'});}
            };

            function  rcn_rango_5_fin() {
                var $totalrango5n = 0;
                var $rcn_rango_5_inic = document.getElementById('rcn_rango_5_inic').value;
                var $rcn_rango_5_fin = document.getElementById('rcn_rango_5_fin').value;
                if($rcn_rango_5_inic == ''){$rcn_rango_5_inic = 0;}
                if($rcn_rango_5_fin == ''){$rcn_rango_5_inic = 0;}
                var $totalrango5n=parseInt($rcn_rango_5_fin)-parseInt($rcn_rango_5_inic)+1;
                if($totalrango5n < 0){ document.getElementById("totalrango5n").innerHTML = $totalrango5n; $("#totalrango5n").css({'color':'red'}); }else{ document.getElementById("totalrango5n").innerHTML = $totalrango5n; $("#totalrango5n").css({'color':'blue'});}
            };

            function  rcd_rango_1_fin() {
                var $totalrango1d = 0;
                var $rcd_rango_1_inic = document.getElementById('rcd_rango_1_inic').value;
                var $rcd_rango_1_fin = document.getElementById('rcd_rango_1_fin').value;
                if($rcd_rango_1_inic == ''){$rcd_rango_1_inic = 0;}
                if($rcd_rango_1_fin == ''){$rcd_rango_1_inic = 0;}
                var $totalrango1d=parseInt($rcd_rango_1_fin)-parseInt($rcd_rango_1_inic)+1;
                if($totalrango1d < 0){ document.getElementById("totalrango1d").innerHTML = $totalrango1d; $("#totalrango1d").css({'color':'red'}); }else{ document.getElementById("totalrango1d").innerHTML = $totalrango1d; $("#totalrango1d").css({'color':'blue'});}
            };  

            function  rcd_rango_2_fin() {
                var $totalrango2d = 0;
                var $rcd_rango_2_inic = document.getElementById('rcd_rango_2_inic').value;
                var $rcd_rango_2_fin = document.getElementById('rcd_rango_2_fin').value;
                if($rcd_rango_2_inic == ''){$rcd_rango_2_inic = 0;}
                if($rcd_rango_2_fin == ''){$rcd_rango_2_inic = 0;}
                var $totalrango2d=parseInt($rcd_rango_2_fin)-parseInt($rcd_rango_2_inic)+1;
                if($totalrango2d < 0){ document.getElementById("totalrango2d").innerHTML = $totalrango2d; $("#totalrango2d").css({'color':'red'}); }else{ document.getElementById("totalrango2d").innerHTML = $totalrango2d; $("#totalrango2d").css({'color':'blue'});}
            };

            function  rcd_rango_3_fin() {
                var $totalrango3d = 0;
                var $rcd_rango_3_inic = document.getElementById('rcd_rango_3_inic').value;
                var $rcd_rango_3_fin = document.getElementById('rcd_rango_3_fin').value;
                if($rcd_rango_3_inic == ''){$rcd_rango_3_inic = 0;}
                if($rcd_rango_3_fin == ''){$rcd_rango_3_inic = 0;}
                var $totalrango3d=parseInt($rcd_rango_3_fin)-parseInt($rcd_rango_3_inic)+1;
                if($totalrango3d < 0){ document.getElementById("totalrango3d").innerHTML = $totalrango3d; $("#totalrango3d").css({'color':'red'}); }else{ document.getElementById("totalrango3d").innerHTML = $totalrango3d; $("#totalrango3d").css({'color':'blue'});}
            }; 

            function  rcm_rango_1_fin() {
                var $totalrango1m = 0;
                var $rcm_rango_1_inic = document.getElementById('rcm_rango_1_inic').value;
                var $rcm_rango_1_fin = document.getElementById('rcm_rango_1_fin').value;
                if($rcm_rango_1_inic == ''){$rcm_rango_1_inic = 0;}
                if($rcm_rango_1_fin == ''){$rcm_rango_1_inic = 0;}
                var $totalrango1m=parseInt($rcm_rango_1_fin)-parseInt($rcm_rango_1_inic)+1;
                if($totalrango1m < 0){ document.getElementById("totalrango1m").innerHTML = $totalrango1m; $("#totalrango1m").css({'color':'red'}); }else{ document.getElementById("totalrango1m").innerHTML = $totalrango1m; $("#totalrango1m").css({'color':'blue'});}
            };  

            function  rcm_rango_2_fin() {
                var $totalrango2m = 0;
                var $rcm_rango_2_inic = document.getElementById('rcm_rango_2_inic').value;
                var $rcm_rango_2_fin = document.getElementById('rcm_rango_2_fin').value;
                if($rcm_rango_2_inic == ''){$rcm_rango_2_inic = 0;}
                if($rcm_rango_2_fin == ''){$rcm_rango_2_inic = 0;}
                var $totalrango2m=parseInt($rcm_rango_2_fin)-parseInt($rcm_rango_2_inic)+1;
                if($totalrango2m < 0){ document.getElementById("totalrango2m").innerHTML = $totalrango2m; $("#totalrango2m").css({'color':'red'}); }else{ document.getElementById("totalrango2m").innerHTML = $totalrango2m; $("#totalrango2m").css({'color':'blue'});}
            };

            function  rcm_rango_3_fin() {
                var $totalrango3m = 0;
                var $rcm_rango_3_inic = document.getElementById('rcm_rango_3_inic').value;
                var $rcm_rango_3_fin = document.getElementById('rcm_rango_3_fin').value;
                if($rcm_rango_3_inic == ''){$rcm_rango_3_inic = 0;}
                if($rcm_rango_3_fin == ''){$rcm_rango_3_inic = 0;}
                var $totalrango3m=parseInt($rcm_rango_3_fin)-parseInt($rcm_rango_3_inic)+1;
                if($totalrango3m < 0){ document.getElementById("totalrango3m").innerHTML = $totalrango3m; $("#totalrango3m").css({'color':'red'}); }else{ document.getElementById("totalrango3m").innerHTML = $totalrango3m; $("#totalrango3m").css({'color':'blue'});}
            }; 

            function  rcn_valida_suma() {
                var $totalnacimientos = 0;
                document.getElementById("totalnacimientos").value=$totalnacimientos;
                var $rcn_masculino = document.getElementById('rcn_masculino').value;
                var $rcn_femenino = document.getElementById('rcn_femenino').value;

                if($rcn_masculino == ''){
                    if($rcn_femenino == ''){
                        var $rcn_masculino = 0;
                        var $rcn_femenino = 0;
                        var $totalnacimientos=parseInt($rcn_masculino)+parseInt($rcn_femenino);
                        document.getElementById("totalnacimientos").value=$totalnacimientos;
                    }else{
                        var $rcn_masculino = 0;
                        var $rcn_femenino = document.getElementById('rcn_femenino').value;
                        var $totalnacimientos=parseInt($rcn_masculino)+parseInt($rcn_femenino);
                        document.getElementById("totalnacimientos").value=$totalnacimientos;
                    }
                }else{
                    if($rcn_femenino == ''){
                        var $rcn_femenino = 0;
                        var $rcn_masculino = document.getElementById('rcn_masculino').value;
                        var $totalnacimientos=parseInt($rcn_masculino)+parseInt($rcn_femenino);
                        document.getElementById("totalnacimientos").value=$totalnacimientos;
                    }else{
                        var $rcn_masculino = document.getElementById('rcn_masculino').value;
                        var $rcn_femenino = document.getElementById('rcn_femenino').value;
                        var $totalnacimientos=parseInt($rcn_masculino)+parseInt($rcn_femenino);
                        document.getElementById("totalnacimientos").value=$totalnacimientos;
                    }
                }
                document.getElementById("totalrcn").value=$totalnacimientos;
            };     

            function  rcd_valida_suma() {
                var $totaldefuncion = 0;
                document.getElementById("totaldefuncion").value=$totaldefuncion;
                var $rcd_masculino = document.getElementById('rcd_masculino').value;
                var $rcd_femenino = document.getElementById('rcd_femenino').value;

                if($rcd_masculino == ''){
                    if($rcd_femenino == ''){
                        var $rcd_masculino = 0;
                        var $rcd_femenino = 0;
                        var $totaldefuncion=parseInt($rcd_masculino)+parseInt($rcd_femenino);
                        document.getElementById("totaldefuncion").value=$totaldefuncion;
                    }else{
                        var $rcd_masculino = 0;
                        var $rcd_femenino = document.getElementById('rcd_femenino').value;
                        var $totaldefuncion=parseInt($rcd_masculino)+parseInt($rcd_femenino);
                        document.getElementById("totaldefuncion").value=$totaldefuncion;
                    }
                }else{
                    if($rcd_femenino == ''){
                        var $rcd_femenino = 0;
                        var $rcd_masculino = document.getElementById('rcd_masculino').value;
                        var $totaldefuncion=parseInt($rcd_masculino)+parseInt($rcd_femenino);
                        document.getElementById("totaldefuncion").value=$totaldefuncion;
                    }else{
                        var $rcd_masculino = document.getElementById('rcd_masculino').value;
                        var $rcd_femenino = document.getElementById('rcd_femenino').value;
                        var $totaldefuncion=parseInt($rcd_masculino)+parseInt($rcd_femenino);
                        document.getElementById("totaldefuncion").value=$totaldefuncion;
                    }
                }
                document.getElementById("totalrcd").value=$totaldefuncion; 
            };

    </script>   
@endsection
