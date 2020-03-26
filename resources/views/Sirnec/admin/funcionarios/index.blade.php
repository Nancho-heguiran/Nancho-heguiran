@extends('layouts.sirnec')
@section('guia') Funcionarios @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    LISTADO DE FUNCIONARIOS
    <a href="" data-toggle="modal" data-target="#crearfuncionario"><img class="img-responsiveid float-right" style="width: 3%; height: 3%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/agregar.png')}}" title="Crear Funcionarios" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Cedula </th>
                            <th>Nombre </th>
                            <th>Oficina</th>
                            <th>Movil </th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->cedula }} </td>
                                <td> {{ $row->name }} </td>                              
                                <td> {{ $row->nombreoficina }} </td>
                                <td> {{ $row->movil }} </td>
                                <td>
                                    <center>
                                        <a href="{{ route('funcionarios_editar', ['id' => $row->id ]) }}" title="Editar este registro"><i class="fa fa-pencil fa-lg"></i></a>
                                        &nbsp;&nbsp;&nbsp;
                                        {{-- {!! Form::model($row, ['method' => 'delete', 'route' => ['funcionarios_eliminar', $row->id], 'class' =>'d-inline form-inline form-delete']) !!}
                                        {!! Form::hidden('id', $row->id) !!}
                                            <button  style="background-color:#FFFFFF;border: none;" title="Eliminar este Funcionario"><i class="fa fa-trash-o fa-lg text-danger"></i></button>
                                        {!! Form::close() !!} --}}
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>   
    </div> 

    {{-- modal creacion funcionarios --}}
    <div class="modal fade bd-example-modal-lg" id="crearfuncionario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE FUNCIONARIOS</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => 'funcionarios_guardar', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">{!! Form::number('cedula', null, ['class' => 'form-control', 'required', 'autofocus', 'placeholder'=>"Cedula" , 'style' => 'margin-top:24px'],['id' => 'cedula']) !!} </div>
                            <div class="col-md-3">
                                {!! Form::label ('expedicion', 'Expedicion') !!}
                                {!! Form::date ('expedicion', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:-8px']) !!}    
                            </div>
                            <div class="col-md-3">
                                {!! Form::label ('nacimiento', 'Nacimiento') !!}
                                {!! Form::date ('nacimiento', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:-8px']) !!}    
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-4">{!! Form::select ('departamento_id', $departamentos, null, ['class'=>'form-control', 'id' => 'departamento_id', 'required', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Departamento']) !!}  </div>
                            <div class="col-md-4">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Municipio']) !!}</div>
                        </div>

                        <div class="row">
                            <div class="col-md-5"> {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del Funcionario', 'style' => 'margin-top:5px']) !!} </div>
                            <div class="col-md-2"> {!! Form::select ('genero_id', $generos, null, ['placeholder' => 'Genero','class'=>'form-control ', 'required', 'style' => 'margin-top:5px;']) !!}  </div>
                            <div class="col-md-3"> {!! Form::select ('estadocivil_id', $estadocivils, null, ['placeholder' => 'Estado Civil','class'=>'form-control', 'required', 'style' => 'margin-top:5px;']) !!}  </div>
                            <div class="col-md-2">{!! Form::select('rh', ['1' => 'O+', '2' => 'O-', '3' => 'A+', '4' => 'A-', '5' => 'B+', '6' => 'B-', '7' => 'AB+', '8' => 'AB-'], null, ['placeholder' => 'RH', 'class'=>'form-control', 'required', 'style' => 'margin-top:5px']) !!}</div>
                        </div> 
                        <div class="row">
                            <div class="col-md-5"> {!! Form::text('direccion', null, ['placeholder' => 'Direccion de Domicilio','class' => 'form-control ', 'required', 'style' => 'margin-top:5px']) !!}  </div>
                            <div class="col-md-3"> {!! Form::text('telefono_fijo', null, ['placeholder' => 'Telefono No.','class' => 'form-control ', 'style' => 'margin-top:5px']) !!} </div>
                            <div class="col-md-3"> {!! Form::text('movil', null, ['placeholder' => 'Celular No.','class' => 'form-control' , 'required', 'style' => 'margin-top:5px']) !!}  </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5"> {!! Form::email('emailpersonal', null, ['placeholder' => 'Email Personal','class' => 'form-control', 'required', 'style' => 'margin-top:5px']) !!} </div>
                            <div class="col-md-5"> {!! Form::email('emailcorporativo', null, ['placeholder' => 'Email Corporativo','class' => 'form-control ', 'style' => 'margin-top:5px']) !!}  </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"> {!! Form::select('clasmilitar', ['1' => 'Primera', '2' => 'Segunda', '3' => 'N/A'], null, ['placeholder' => 'Libreta Militar', 'class'=>'form-control ', 'required', 'style' => 'margin-top:5px']) !!} </div>
                            <div class="col-md-3"> {!! Form::number('libreta_militar', null, ['class' => 'form-control', 'required', 'placeholder'=>"No. Libreta" , 'style' => 'margin-top:5px'],['id' => 'cedula']) !!} </div>
                            <div class="col-md-3"> {!! Form::text('distrito', null, ['placeholder' => 'No. Distrito','class' => 'form-control', 'style' => 'margin-top:5px']) !!} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"> {!! Form::select ('niveleducativo_id', $niveleseducativos, null, [ 'class'=>'form-control', 'required', 'style' => 'margin-top:5px;']) !!}   </div>
                            {{-- <div class="col-md-8"> {!! Form::select ('titulosformacion_id', $combobox_titulosformacion , null, ['placeholder' => 'Titulo de Formacion','class' => 'form-control ', 'required', 'style' => 'margin-top:5px;']) !!} </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4"> {!! Form::select ('municipio_idd', $municipios, null, ['class'=>'form-control', 'required', 'style' => 'margin-top:5px;',  'placeholder' => 'Municipio'],['id' => 'municipio_idd']) !!} </div>
                            {{-- <div class="col-md-4"> {!! Form::select ('oficina_id', $combobox_oficina , null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:5px;']) !!} </div> --}}
                            <div class="col-md-2"></div>
                        </div>   
                        {!! Form::number('departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('estado_id', 1, ['hidden'] ) !!}   
                        {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                {!! Form::close() !!}
                        
            </div>
        </div>
    </div>
    {{-- fin modal creacion funcionarios  --}}    




@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){
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
