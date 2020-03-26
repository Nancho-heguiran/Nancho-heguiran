@extends('layouts.sirnec')
@section('guia') Oficinas @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    CARGUE DE ARCHIVOS PLANOS 
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    
@endsection

@section('contenido')
<br>
<div class="row">
    <div class="col-md-12">
        <a href="" data-toggle="modal" data-target="#carguescr"><img class="img-responsiveid " style="width: 10%;  " src="{{ asset('images/carguescr.png')}}" title="Cargue Archivo SCR" /></a>
    </div>
</div>


{{-- modal cargue de scr --}}
<div class="modal fade bd-example-modal-lg" name='carguescr' id="carguescr" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98); ">CARGUE DE SCR</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => 'importscr', 'method'=>'POST', 'autocomplete'=> 'off', 'enctype'=>"multipart/form-data" ]) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="file" name="file" class="form-control-file" style="background:#BFBDBC; border-radius: 10px ; padding: 10px 5px 10px 15px">
                        </div>
                    </div> 

                    {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}   
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info" id="confirmar">Cargar Archivo</button>
                    
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{{-- fin modal modal cargue de scr  --}}


@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

        });

    </script>   
@endsection

