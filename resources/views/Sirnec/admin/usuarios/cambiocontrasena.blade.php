@extends('layouts.sirnec')
@section('guia') Cambio de Password @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    CAMBIANDO PASSWORD 
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home.png')}}" title="Retroceder" /></a>
    
@endsection

@section('contenido')
   
    {!! Form::model($usuario, ['route' => ['usuarios_actualizar_password', $usuario->id], 'method' => 'PUT', 'id'=>'for_usuario']) !!}
        
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3">{!! Form::number('cedula', null, ['class' => 'form-control',  'placeholder'=>"Cedula" , 'style' => 'margin-top:5px'] ,['id' => 'cedula']) !!} </div>
                <div class="col-md-6"> {!! Form::text('name', null, ['class' => 'form-control',  'placeholder' => 'Nombre del Usuario', 'style' => 'margin-top:5px']) !!} </div>
            </div> 
            <div class="row">
            </div> 
            <div class="row">
                <div class="col-md-2"> {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Login', 'style' => 'margin-top:5px']) !!} </div>
                <div class="col-md-4 input-group" style="margin-top:5px">
                    {!! Form::password('password', ['class' => 'form-control awesome', 'id' => 'password', 'placeholder' => 'Contraseña']) !!} 
                    <div class="input-group-append"> 
                        <button class="btn btn-primary form-control awesome" type="button" id="show"> 
                            <span class="fa fa-eye-slash icon"></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-4 input-group" style="margin-top:5px">
                    {!! Form::password('password1', ['class' => 'form-control awesome', 'id' => 'password1', 'placeholder' => 'Valida Contraseña']) !!} 
                    <div class="input-group-append"> 
                        <button class="btn btn-primary form-control awesome" type="button" id="show1"> 
                            <span class="fa fa-eye-slash icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

       
        {!! Form::number('id', $usuario->id, ['hidden'] ) !!}
        {!! Form::email('email', $usuario->email, ['hidden'] ) !!}
        {!! Form::text('direccion',$usuario->direccion, ['hidden'] ) !!}
        {!! Form::tel('movil', $usuario->movil, ['hidden'] ) !!}
        {!! Form::number('estado_id', $usuario->estado_id, ['hidden'] ) !!}
        {!! Form::number ('departamento_id', $usuario->departamento_id, ['hidden'] ) !!}
        {!! Form::number ('municipio_id',$usuario->municipio_id, ['hidden'] ) !!}
        {!! Form::number ('tipousuario_id', $usuario->tipousuario_id, ['hidden'] ) !!}
        {!! Form::number ('claseoficina_id',$usuario->claseoficina_id, ['hidden'] ) !!}
        {!! Form::number ('oficina_id', $usuario->oficina_id, ['hidden'] ) !!}


        <div class="modal-footer">
            <a href="{{ route('usuarios')}}"><input type="button" class="btn btn-secondary" value="Cancelar"></a>
            <button type="submit" class="btn btn-info" id="confirmar">Guardar</button>
        </div>
    {!! Form::close() !!}
                        

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            //valida el formulario antes de envio 
                $("#confirmar").on("click", function(){

                    if(for_usuario.password.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo de Contraseña no puede ser en vacio!', })
                        return false;
                    } else{
                        if(for_usuario.password.value !=  for_usuario.password1.value ){
                            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Los Campos de Contraseña y Validar Contraseña no son iguales!', })
                            for_usuario.password.value = '';
                            for_usuario.password1.value = '';
                            return false;
                        }
                    }
                    
                });


            // muestra la contraseña password 
                $('#show').on('mousedown',function(){
                    $('#password').removeAttr('type');
                });

            // oculta la contraseña password 1
                $('#show').on('mouseup',function(){
                    $('#password').attr('type', 'password');
                });

            // muestra la contraseña password 2
                $('#show1').on('mousedown',function(){
                    $('#password1').removeAttr('type');
                });

            // oculta la contraseña password 1
                $('#show1').on('mouseup',function(){
                    $('#password1').attr('type', 'password');
                });

        });

    </script>   
@endsection

