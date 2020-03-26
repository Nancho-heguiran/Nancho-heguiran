@extends('layouts.sirnec')
@section('guia') Usuarios @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    LISTADO DE USUARIOS DEL SISTEMA
    
    <a href="{{ route('usuarios.pdf') }}"><img class="img-responsiveid float-right"  style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/descargarpdf.png')}}"  title="Descargar en PDF" /></a>
    <a href="{{ route('usuarios.excel') }}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/descargarexcel.png')}}"  title="Descargar en Excel" /></a>
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearusuario"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/agregar2.png')}}" title="Crear Usuarios" /></a>
    
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
                                <td> {{ $row->movil  }} </td>
                                <td>
                                    <a href="{{ route('usuarios_editar', ['id' => $row->id ]) }}" title="Editar el Usuario"><span style="color: #007BFF;"><i class="fas fa-pencil-alt" ></i></span></a> 
                                    &nbsp;&nbsp;&nbsp;
                                    {!! Form::model($row, ['method' => 'delete', 'route' => ['usuarios_eliminar', $row->id], 'class' =>'d-inline form-inline form-delete']) !!}
                                        {!! Form::hidden('id', $row->id) !!}
                                        <button  style="background-color:#FFFFFF;border: none;" title="Eliminar este registro"><span style="color: red;"><i class="fas fa-trash-alt"></i></span></button>
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
    <div class="modal fade bd-example-modal-lg" name='crearusuario' id="crearusuario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE USUARIOS</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => 'usuarios_guardar', 'id'=>'for_usuario', 'name' => 'for_usuario', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">{!! Form::number('cedula', null, ['class' => 'form-control',  'placeholder'=>"Cedula" , 'style' => 'margin-top:5px'] ,['id' => 'cedula']) !!} </div>
                            <div class="col-md-6"> {!! Form::text('name', null, ['class' => 'form-control',  'placeholder' => 'Nombre del Usuario', 'style' => 'margin-top:5px']) !!} </div>
                            <div class="col-md-3">{!! Form::select ('tipousuario_id', $tipodeusario, null, ['class'=>'form-control', 'id' => 'tipousario_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Tipo de Usuario']) !!}  </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-5"> {!! Form::text('direccion', null, ['class' => 'form-control',  'placeholder' => 'Direccion del Usuario', 'style' => 'margin-top:5px']) !!} </div>     
                            <div class="col-md-3"> {!! Form::tel('movil', null, ['class' => 'form-control', 'id' => 'movil', 'placeholder' => 'Movil', 'style' => 'margin-top:5px']) !!} </div>     
                            <div class="col-md-4"> {!! Form::email('email', null, ['class' => 'form-control',  'placeholder' => ' Correo Electronico', 'style' => 'margin-top:5px']) !!} </div>
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
                        <div class="row">
                            <div class="col-md-3">{!! Form::select ('departamento_id', $departamentos, null, ['class'=>'form-control', 'id' => 'departamento_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Departamento']) !!}  </div>
                            <div class="col-md-4">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Municipio']) !!}</div>
                            <div class="col-md-4">{!! Form::select ('oficina_id', $oficina, null, ['class'=>'form-control', 'id' => 'oficina_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione la Oficina']) !!}</div>
                            <div class="col-md-6"> {!! Form::number('claseoficina_id', null, ['hidden', 'id' => 'claseoficina_id']) !!} </div>
                        </div>

                        {!! Form::number('estado_id', 1, ['hidden'] ) !!}   
                        {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info" id="confirmar">Guardar</button>
                    
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

            // ventana de confirmacion de eliminado de registros
                $('table[data-form="formulario"]').on('click', '.form-delete', function(e){
                    e.preventDefault();
                    var $form=$(this);
                    
                    Swal.fire({
                        title: 'Desea eliminar el usuario?',
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
                            'El Usuario Ha sido Eliminado.',
                            'success'
                            )
                        }
                    })
                });
            
            //mascaras de input
                jQuery(function($){
                    $("#movil").mask("(999) 999-9999");
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

            //trae al usuario si la cedula ingresada ya esta la BD
                $('input[name="cedula"]').on('change', function(){
                    var cedula = $(this).val();
                    //Swal.fire({ icon: 'error', title:  'Oops...', text: 'prueba!'+cedula, })
                    if(cedula){
                        //console.log(departamento_id);
                        $.ajax({
                            url:        '/getUsuarios/'+cedula,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                if(data != ''){
                                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ya existe el Usuario de Nombre : ' + data, })
                                    for_usuario.cedula.value = '';
                                    return false;     
                                }else {
                                }
                            } 
                        });
                    }
                    else{
                    }
                });

            
            //trae al usuario si la login ingresado ya esta la BD
                $('input[name="login"]').on('change', function(){
                    var login = $(this).val();
                    //Swal.fire({ icon: 'error', title:  'Oops...', text: 'prueba!'+cedula, })
                    if(login){
                        //console.log(departamento_id);
                        $.ajax({
                            url:        '/getLogin/'+login,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                if(data != ''){
                                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ya existe un Usuario con ese Login', })
                                    for_usuario.login.value = '';
                                    return false;
                                }else {
                                }
                            } 
                        });
                    }
                    else{
                    }
                });

            //trae al usuario si la email ingresado ya esta la BD
                $('input[name="email"]').on('change', function(){
                    var email = $(this).val();
                    //Swal.fire({ icon: 'error', title:  'Oops...', text: 'prueba!'+cedula, })
                    if(email){
                        //console.log(departamento_id);
                        $.ajax({
                            url:        '/getEmail/'+email,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                if(data != ''){
                                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ya existe un Usuario con ese Email', })
                                    for_usuario.email.value = '';
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
