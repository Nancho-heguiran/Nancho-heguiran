@extends('layouts.sirnec')
@section('guia') nombre pestaña @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    LISTADO DEL MODELO
    <a href="" data-toggle="modal" data-target="#creacionfuncionarios"><img class="img-responsiveid float-right" style="width: 3%; height: 3%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/agregar.png')}}" title="Crear Funcionarios" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>cedula</th>
                            <th>Nombre </th>
                            <th>Oficina</th>
                            <th>Movil </th>
                            <th>Acciones</th>
                            <th>Id</th>
                            <th>Cedula </th>
                            <th>Nombre </th>
                            <th>Id</th>
                            <th>Cedula </th>
                            <th>Nombre </th>
                            <th>Oficina55</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>   
    </div>    
@endsection

@section('scriptnecesario')
    <script type="text/javascript">
        
    </script>
@endsection
