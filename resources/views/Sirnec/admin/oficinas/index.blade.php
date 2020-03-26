@extends('layouts.sirnec')
@section('guia') Oficinas @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    LISTADO DE OFICINAS 
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearoficina"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/oficina.png')}}" title="Crear Oficinas" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th>Clase de Oficina</th>
                            <th>Nombre de la Oficina</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->nombredepartamento }} </td>
                                <td> {{ $row->nombremunicipio  }} </td>
                                <td> {{ $row->nombreclaseoficina }} </td>
                                <td> {{ $row->name }} </td>   
                                <td>
                                    <a href="{{ route('oficinas_editar', ['id' => $row->id ]) }}" title="Editar la Oficina"><span style="color: #007BFF;"><i class="fas fa-pencil-alt" ></i></span></a> 
                                    &nbsp;&nbsp;&nbsp;
                                    {!! Form::model($row, ['method' => 'delete', 'route' => ['oficinas_eliminar', $row->id], 'class' =>'d-inline form-inline form-delete']) !!}
                                        {!! Form::hidden('id', $row->id) !!}
                                        <button  style="background-color:#FFFFFF;border: none;" title="Eliminar Oficina"><span style="color: red;"><i class="fas fa-trash-alt"></i></span></button>
                                    {!! Form::close() !!}
                                    
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>   
    </div> 

    {{-- modal creacion oficinas --}}
    <div class="modal fade bd-example-modal-lg" name='crearoficina' id="crearoficina" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE OFICINAS</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => 'oficinas_guardar', 'id'=>'for_oficina', 'name' => 'for_oficina', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">{!! Form::select ('departamento_id', $departamentos, null, ['class'=>'form-control', 'id' => 'departamento_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Departamento']) !!}  </div>
                        <div class="col-md-4">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Municipio']) !!}</div>
                        <div class="col-md-4">{!! Form::select ('claseoficina_id', $claseoficinas, null, ['class'=>'form-control', 'id' => 'claseoficinas_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Clase Oficina']) !!}  </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-5"> {!! Form::text('name', null, ['class' => 'form-control',  'placeholder' => 'Nombre de la Oficina', 'style' => 'margin-top:5px']) !!} </div>
                        <div class="col-md-5"> {!! Form::text('namescr', null, ['class' => 'form-control',  'placeholder' => 'Nombre de la Oficina en SCR', 'style' => 'margin-top:5px']) !!} </div>
                        <div class="col-md-2"> {!! Form::number('diastrasporte', null, ['class' => 'form-control',  'placeholder' => 'Dias', 'style' => 'margin-top:5px']) !!} </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-5"> {!! Form::text('direccion', null, ['class' => 'form-control',  'placeholder' => 'Direccion de la Oficina', 'style' => 'margin-top:5px']) !!} </div>
                        <div class="col-md-4"> {!! Form::text('telefono_fijo', null, ['class' => 'form-control',  'placeholder' => 'Telefono Fijo', 'style' => 'margin-top:5px']) !!} </div>
                        <div class="col-md-3"> {!! Form::text('codigopostal', null, ['class' => 'form-control',  'placeholder' => 'Codigo Postal', 'style' => 'margin-top:5px']) !!} </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-2"> {!! Form::text('codpmt', null, ['class' => 'form-control',  'placeholder' => 'Codigo PMT', 'style' => 'margin-top:5px']) !!} </div>
                    </div> 
                    

                    {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-info" id="confirmar">Guardar</button>
                    
                </div>
                {!! Form::close() !!}
                        
            </div>
        </div>
    </div>
    {{-- fin modal creacion oficinas  --}}

    

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            //valida el formulario antes de envio 
                $("#confirmar").on("click", function(){
               
                    if(for_oficina.departamento_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Departamento en donde se ubica la Oficina !', })
                        return false;
                    }
                    if(for_oficina.municipio_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Municipio en donde se ubica la Oficina !', })
                        return false;
                    }
                    if(for_oficina.claseoficina_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger la Clase de Oficina !', })
                        return false;
                    }
                    if(for_oficina.name.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo nombre de la Oficina es necesario y no puede ser vacio!', })
                        return false;
                    }
                    if(for_oficina.diastrasporte.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Se debe definir el # de dias requeridos para la entrega de material a la Delegacion !', })
                        return false;
                    }
                    if(for_oficina.direccion.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo de la direccion de la Oficina es Necesaria !', })
                        return false;
                    }
                    if(for_oficina.codigopostal.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El codigo Postal es necesario !', })
                        return false;
                    }
                    if(for_oficina.codpmt.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Codigo PMT es Necesario !', })
                        return false;
                    }
                    

                    for_oficina.submit();
                    
                });

            // ventana de confirmacion de eliminado de registros
                $('table[data-form="formulario"]').on('click', '.form-delete', function(e){
                    e.preventDefault();
                    var $form=$(this);
                    
                    Swal.fire({
                        title: 'Desea eliminar la Oficina ?',
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si!!',
                        cancelButtonText: 'No!!',
                        }).then((result) => {
                        if (result.value) {
                            $form.submit(),
                            Swal.fire(
                            'Eliminado!',
                            'La Oficina Ha sido Eliminado.',
                            'success'
                            )
                        }
                    })
                });
            
            //trae el municipio dependiendo del departamento escogido
                $('select[name="departamento_id"]').on('change', function(){
                    //console.log('escuchando')
                    var departamento_id = $(this).val();
                    if(departamento_id){
                        //console.log(departamento_id);
                        $.ajax({
                            url:        '/getMunucipios/'+departamento_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="municipio_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="municipio_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            } 
                        });
                    }
                    else{
                        $('select[name="municipio_id"]').empty();
                    }
                });
            

        });

    </script>   
@endsection
