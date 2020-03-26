@extends('layouts.sirnec')
@section('guia') Editar Usuario @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    EDITANDO EL USUARIO
    <a href="{{ route('usuarios')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/anterior.png')}}" title="Retroceder" /></a>
    
@endsection

@section('contenido')
   
    {!! Form::model($usuario, ['route' => ['usuarios_actualizar', $usuario->id], 'method' => 'PUT']) !!}
        
        <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">{!! Form::number('cedula', null, ['class' => 'form-control',  'id' => 'cedula', 'placeholder'=>"Cedula" , 'style' => 'margin-top:5px'] ) !!} </div>
                    <div class="col-md-6"> {!! Form::text('name', null, ['class' => 'form-control',  'placeholder' => 'Nombre del Usuario', 'style' => 'margin-top:5px']) !!} </div>
                    <div class="col-md-3">{!! Form::select ('tipousuario_id', $tipodeusario, null, ['class'=>'form-control', 'id' => 'tipousario_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Tipo de Usuario']) !!}  </div>
                </div> 
                <div class="row">
                    <div class="col-md-5"> {!! Form::text('direccion', null, ['class' => 'form-control',  'placeholder' => 'Direccion del Usuario', 'style' => 'margin-top:5px']) !!} </div>     
                    <div class="col-md-3"> {!! Form::tel('movil', null, ['class' => 'form-control', 'id' => 'movil', 'placeholder' => 'Movil', 'style' => 'margin-top:5px']) !!} </div>     
                    <div class="col-md-4"> {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => ' Correo Electronico', 'style' => 'margin-top:5px']) !!} </div>
                </div> 
                <div class="row">
                    <div class="col-md-2"> {!! Form::text('login', null, ['class' => 'form-control', 'id' => 'login', 'placeholder' => 'Login', 'style' => 'margin-top:5px']) !!} </div>
                    <div class="col-md-2">{!! Form::select ('departamento_id', $departamentos, null, ['class'=>'form-control', 'id' => 'departamento_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Departamento']) !!}  </div>
                    <div class="col-md-4">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Municipio']) !!}</div>
                    <div class="col-md-4">{!! Form::select ('oficina_id', $oficina, null, ['class'=>'form-control', 'id' => 'oficina_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione la Oficina']) !!}</div>
                    <div class="col-md-6"> {!! Form::number('claseoficina_id', null, ['hidden', 'id' => 'claseoficina_id']) !!} </div>
                </div>
                <div class="row">
                    <div class="col-md-2">{!! Form::select ('estado_id', $estado, null, ['class'=>'form-control', 'id' => 'estado_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Estado']) !!}  </div>
                </div>

                {!! Form::number('cedula', $usuario->cedula, ['hidden'] ) !!}{!! Form::email('email', $usuario->email, ['hidden'] ) !!}{!! Form::text('login', $usuario->login, ['hidden'] ) !!}
                {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}   
        </div>
        <div class="modal-footer">
            <a href="{{ route('usuarios')}}"><input type="button" class="btn btn-secondary" value="Cancelar"></a>
            <button type="submit" class="btn btn-info" id="confirmar">Guardar</button>
        </div>
    {!! Form::close() !!}
                        

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            $("#cedula").prop('disabled', true);
            $("#login").prop('disabled', true);
            $("#email").prop('disabled', true);

            //valida el formulario antes de envio 
                $("#confirmar").on("click", function(){

                    if(for_usuario.cedula.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo de Cedula de Ciudadania no puede ser en vacio!', })
                        return false;
                    }
                    if(for_usuario.name.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo de Nombre no puede ser en vacio!', })
                        return false;
                    }
                    if(for_usuario.tipousuario_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Tipo de Usuario !', })
                        return false;
                    }
                    if(for_usuario.direccion.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo de Direccion no puede ser en vacio!', })
                        return false;
                    }
                    if(for_usuario.movil.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo del Numero de Celular es Necesario y no puede ser vacio!', })
                        return false;
                    }
                    if(for_usuario.email.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo del Correo Electronico es Necesario y no puede ser vacio!', })
                        return false;
                    }
                    if(for_usuario.login.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El campo de login es Necesario y no puede ser vacio!', })
                        return false;
                    }
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
                    if(for_usuario.departamento_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Departamento en donde trabajara el Usuario!', })
                        return false;
                    }
                    if(for_usuario.municipio_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Municipio en donde trabajara el Usuario!', })
                        return false;
                    }
                    if(for_usuario.claseoficina_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger la Oficina donde el Funcionario efectuara sus labores !', })
                        return false;
                    }
                });

            //mascaras de input
                jQuery(function($){
                    $("#movil").mask("(999) 999-9999");
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

            

        });

    </script>   
@endsection

