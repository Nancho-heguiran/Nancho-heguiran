@extends('layouts.sirnec')
@section('guia') Tutulos @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    LISTADO DE TITULOS OBTENIDOS
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#creartitulo"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/titulos.png')}}" title="Crear Titulo Universitario" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:90%" >
                    <thead>
                        <tr>
                            <th>Nivel Educativo</th>
                            <th>Nombre del Titulo Obtenido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->nombreniveleducativo  }} </td>
                                <td> {{ $row->name }} </td>   
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>   
    </div> 

    {{-- modal creacion oficinas --}}
    <div class="modal fade bd-example-modal-lg" name='creartitulo' id="creartitulo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE TITULOS UNIVERSITARIOS Y/O TECNICOS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => 'titulosdeformacion_guardar', 'id'=>'for_titulosdeformacion', 'name' => 'for_titulosdeformacion', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">{!! Form::select ('niveleducativo_id', $niveleducativo, null, ['class'=>'form-control', 'id' => 'niveleducativo_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Nivel Educativo']) !!}  </div>
                        <div class="col-md-8"> {!! Form::text('name', null, ['class' => 'form-control',  'placeholder' => 'Nombre del Titulo Obtenido', 'style' => 'margin-top:5px']) !!} </div>
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
               
                    if(for_titulosdeformacion.niveleducativo_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Nivel Educativo del Titulo a Ingresar !', })
                        return false;
                    }
                    if(for_titulosdeformacion.name.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo nombre del Titulo es necesario!', })
                        return false;
                    }
                    for_titulosdeformacion.submit();
                    
                });

        });

    </script>   
@endsection
