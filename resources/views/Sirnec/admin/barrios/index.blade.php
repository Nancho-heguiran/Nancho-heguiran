@extends('layouts.sirnec')
@section('guia') Barrios @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    LISTADO DE BARRIOS 
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearbarrio"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/barrio.png')}}" title="Crear Barrios" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:80%" >
                    <thead>
                        <tr>
                            <th>Nombre del Barrio</th>
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->name }} </td>                              
                                <td> {{ $row->nombredepartamento }} </td>
                                <td> {{ $row->nombremunicipio  }} </td>
                                <td>
                                    <a href="{{ route('barrios_editar', ['id' => $row->id ]) }}" title="Editar el Barrio"><span style="color: #007BFF;"><i class="fas fa-pencil-alt" ></i></span></a> 
                                    &nbsp;&nbsp;&nbsp;
                                    {!! Form::model($row, ['method' => 'delete', 'route' => ['barrios_eliminar', $row->id], 'class' =>'d-inline form-inline form-delete']) !!}
                                        {!! Form::hidden('id', $row->id) !!}
                                        <button  style="background-color:#FFFFFF;border: none;" title="Eliminar este Barrio"><span style="color: red;"><i class="fas fa-trash-alt"></i></span></button>
                                    {!! Form::close() !!}
                                    
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>   
    </div> 

    {{-- modal creacion usuarios --}}
    <div class="modal fade bd-example-modal-lg" name='crearbarrio' id="crearbarrio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE BARRIOS</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => 'barrios_guardar', 'id'=>'for_barrio', 'name' => 'for_barrio', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">{!! Form::select ('departamento_id', $departamentos, null, ['class'=>'form-control', 'id' => 'departamento_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Departamento']) !!}  </div>
                        <div class="col-md-4">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Municipio']) !!}</div>
                        <div class="col-md-2"></div>
                    </div>    
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6"> {!! Form::text('name', null, ['class' => 'form-control',  'placeholder' => 'Nombre del Usuario', 'style' => 'margin-top:5px']) !!} </div>
                        <div class="col-md-3"></div>
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
    {{-- fin modal creacion usuarios  --}}

    

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            //valida el formulario antes de envio 
                $("#confirmar").on("click", function(){
               
                    if(for_barrio.departamento_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Departamento en donde se ubica el Barrio!', })
                        return false;
                    }
                    if(for_barrio.municipio_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Municipio en donde se ubica el Barrio !', })
                        return false;
                    }
                    if(for_barrio.name.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo Nombre del Barrio es Necesario y no puede ser vacio!', })
                        return false;
                    }
                    for_barrio.submit();
                    
                });

            // ventana de confirmacion de eliminado de registros
                $('table[data-form="formulario"]').on('click', '.form-delete', function(e){
                    e.preventDefault();
                    var $form=$(this);
                    
                    Swal.fire({
                        title: 'Desea eliminar el Barrio?',
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
                            'El Barrio Ha sido Eliminado.',
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
            
            //trae al nombre del barrio si el barrio ya esta en la BD
                $('input[name="name"]').on('change', function(){
                    var name = $(this).val();
                    //Swal.fire({ icon: 'error', title:  'Oops...', text: 'prueba!'+cedula, })
                    if(name){
                        //console.log(departamento_id);
                        $.ajax({
                            url:        '/getBarrios/'+name,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                if(data != ''){
                                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ya existe un Barrio con ese Nombre : ' + data, })
                                    for_barrio.name.value = '';
                                    return false;
                                }else {
                                    
                                }
                            } 
                        });
                    }
                    else{
                    }
                });

            
            

        });

    </script>   
@endsection
