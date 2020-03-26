@extends('layouts.sirnec')
@section('guia') Despachos @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    LISTADO DE DESPACHOS EFECTUADOS 
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#creardespacho"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/despacho.png')}}" title="Crear Despachos de Material" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Oficina de Despacho</th>
                            <th>Destinatario</th>
                            <th>Fecha</th>
                            <th>Oficio No.</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->nombreoficina }} </td>                              
                                <td> {{ $row->nombrefuncionario }} </td>
                                <td> {{ $row->feccreacion  }} </td>
                                <td> {{ $row->numoficio }} </td>
                                <td>
                                    {{-- <a href="{{ route('barrios_editar', ['id' => $row->id ]) }}" title="Editar el Barrio"><span style="color: #007BFF;"><i class="fas fa-pencil-alt" ></i></span></a> 
                                    &nbsp;&nbsp;&nbsp;
                                    {!! Form::model($row, ['method' => 'delete', 'route' => ['barrios_eliminar', $row->id], 'class' =>'d-inline form-inline form-delete']) !!}
                                        {!! Form::hidden('id', $row->id) !!}
                                        <button  style="background-color:#FFFFFF;border: none;" title="Eliminar este Barrio"><span style="color: red;"><i class="fas fa-trash-alt"></i></span></button>
                                    {!! Form::close() !!} --}}
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>   
    </div> 

    {{-- modal crear despacho --}}
    <div class="modal fade bd-example-modal-xl" name='creardespacho' id="creardespacho" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE DESPACHOS DE MATERIAL</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
         
                    {!! Form::open(['route' => 'despmaterial_guardar', 'id'=>'despacho', 'name' => 'despacho', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                    <div class="modal-body">
                        <br>
                        {!! Form::date('feccreacion', \Carbon\Carbon::now(), ['hidden' => 'hidden']) !!}

                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-2">
                                <center>
                                    <h6 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">OFICIO No.</h6>
                                    {!! Form::text('numoficio', null, ['class' => 'form-control']) !!} 
                                </center>     
                            </div>
                            <div class="col-5"></div>
                        </div>
                      

                        <div class="row">
                            <div class="col-md-3">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Municipio']) !!}</div>
                            <div class="col-md-4">{!! Form::select ('oficina_id', $oficina, null, ['class'=>'form-control', 'id' => 'oficina_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione la Oficina']) !!}</div>
                            <div class="col-md-5">{!! Form::select ('funcionario_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'funcionario_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Funcionarios en la Oficina']) !!}</div>
                            <div class="col-md-2"></div>
                            <div class="col-md-6"> {!! Form::number('claseoficina_id', null, ['hidden', 'id' => 'claseoficina_id']) !!} </div>
                        </div>

                        <br>

                        <div class="row" style="font-size:13px ; margin-top:-20px;">
                            <div class="col-4">
                                <br>
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <h6 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">REGISTRO CIVIL DE NACIMIENTO</h6>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcni1',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcni1']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcnf1',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcnf1']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="botonrcn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1n" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcnrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcni2',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcni2']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcnf2',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcnf2']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <a href="#" id="rcn2"></a><div id="totalrango2n" style="font-size: 12px"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <br>
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <h6 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">REGISTRO CIVIL DE MATRIMONIO</h6>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcmi1',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcmi1']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcmf1',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcmf1']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="botonrcm"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1m" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcmrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcmi2',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcmi2']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcmf2',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcmf2']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <a href="#" id="rcm2"></a><div id="totalrango2m" style="font-size: 12px"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <br>
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <h6 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">REGISTRO CIVIL DE DEFUNCION</h6>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcdi1',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcdi1']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcdf1',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcdf1']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="botonrcd"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1d" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcdrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcdi2',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcdi2']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcdf2',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcdf2']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <a href="#" id="rcd2"></a><div id="totalrango2d" style="font-size: 12px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row" style="font-size:13px ; margin-top:-20px;">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <br>
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <h6 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">DECADACTILARES</h6>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('decasi1',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'decasi1']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('decasf1',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'decasf1']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="botondecas"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1decas" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="decasrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('decasi2',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'decasi2']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('decasf2',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'decasf2']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <a href="#" id="rcn2"></a><div id="totalrango2decas" style="font-size: 12px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </div>

                    {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}

                    <div class="row" >
                        <div class="col-12" style="padding: 10px; text-align: center" > 
                            <button type="button" class="btn btn-info" id="enviar">Guardar</button>
                            <button type="button" class="btn btn-info" id="limpiar">Limpiar</button>
                            <button type="button" href="{{ route('despmaterial')}}" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>  
                    <br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    {{-- fin modal crear despachos  --}}


    

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            $("#botonrcn").on("click", function(){
                $("#rcnrango2").show();
            });
            $("#botonrcm").on("click", function(){
                $("#rcmrango2").show();
            });
            $("#botonrcd").on("click", function(){
                $("#rcdrango2").show();
            });
            $("#botondecas").on("click", function(){
                $("#decasrango2").show();
            });


            //trae la oficina dependiendo del municipio escogido
            $('select[name="municipio_id"]').on('change', function(){
                    //console.log('escuchando')
                    var municipio_id = $(this).val();
                    if(municipio_id){
                        //console.log(municipio_id);
                        $.ajax({
                            url:        '/getOficinas/'+municipio_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="oficina_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="oficina_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            } 
                        });
                    }
                    else{
                        $('select[name="oficina_id"]').empty();
                    }
                });

            //trae la clase de oficina dependiendo de la oficina escogida
                $('select[name="oficina_id"]').on('change', function(){
                    //console.log('escuchando')
                    var oficina_id = $(this).val();
                    if(oficina_id){
                        //console.log(oficina_id);
                        $.ajax({
                            url:        '/getClaseoficinas/'+oficina_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data.claseoficina_id);
                                $("#claseoficina_id").val(data.claseoficina_id);
                            } 
                        });
                    }
                    else{
                        $("#claseoficina_id").empty();
                    }
                });


                //trae los funcionariosde la oficina dependiendo de la oficina escogida
                $('select[name="oficina_id"]').on('change', function(){
                    //console.log('escuchando')
                    var oficina_id = $(this).val();
                    if(oficina_id){
                        //console.log(oficina_id);
                        $.ajax({
                            url:        '/getFuncionariosofic/'+oficina_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                console.log(data);
                                $('select[name="funcionario_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="funcionario_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            } 
                        });
                    }
                    else{
                        $('select[name="funcionario_id"]').empty();
                    }
                });

            







            //valida el formulario antes de envio 
            $("#enviar").on("click", function(){
                alert('esta confirmando');
                // if(for_barrio.departamento_id.value == ''){
                //     Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Departamento en donde se ubica el Barrio!', })
                //     return false;
                // }
                // if(for_barrio.municipio_id.value == ''){
                //     Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Municipio en donde se ubica el Barrio !', })
                //     return false;
                // }
                // if(for_barrio.name.value == ''){
                //     Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo Nombre del Barrio es Necesario y no puede ser vacio!', })
                //     return false;
                // }
            despacho.submit();
            });
        });

        



        // function   rcm_rangos_sumas() {
        //         var $rcm_inscritos = document.getElementById('rcm_inscritos').value;
        //         if($rcm_inscritos == ''){ $rcm_inscritos = 0;}

        //         var $rcm_rango_1_inic = document.getElementById('rcm_rango_1_inic').value;
        //         var $rcm_rango_1_fin = document.getElementById('rcm_rango_1_fin').value;
        //         if($rcm_rango_1_inic == ''){ $rcm_rango_1_inic = 0;}
        //         if($rcm_rango_1_fin == ''){ var $totalrango1d = 0; }else{ var $totalrango1d=parseInt($rcm_rango_1_fin)-parseInt($rcm_rango_1_inic)+1; }

        //         var $rcm_rango_2_inic = document.getElementById('rcm_rango_2_inic').value;
        //         var $rcm_rango_2_fin = document.getElementById('rcm_rango_2_fin').value;
        //         if($rcm_rango_2_inic == ''){ $rcm_rango_2_inic = 0;}
        //         if($rcm_rango_2_fin == ''){ var $totalrango2d = 0; }else{ var $totalrango2d=parseInt($rcm_rango_2_fin)-parseInt($rcm_rango_2_inic)+1; }

        //         var $rcm_rango_3_inic = document.getElementById('rcm_rango_3_inic').value;
        //         var $rcm_rango_3_fin = document.getElementById('rcm_rango_3_fin').value;
        //         if($rcm_rango_3_inic == ''){ $rcm_rango_3_inic = 0;}
        //         if($rcm_rango_3_fin == ''){ var $totalrango3d = 0; }else{ var $totalrango3d=parseInt($rcm_rango_3_fin)-parseInt($rcm_rango_3_inic)+1; }

        //         var $rcm_toralrangos = parseInt($totalrango1d)+parseInt($totalrango2d)+parseInt($totalrango3d)-parseInt($rcm_inscritos);

        //         document.getElementById("rcm_malos").value=$rcm_toralrangos; 
        // };

    </script>   
@endsection
