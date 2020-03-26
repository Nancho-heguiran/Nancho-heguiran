@extends('layouts.sirnec')
@section('guia') Editar Barrio @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    EDITANDO EL BARRIO
    <a href="{{ route('barrios')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/anterior.png')}}" title="Retroceder" /></a>
    
@endsection

@section('contenido')
   
    {!! Form::model($barrio, ['route' => ['barrios_actualizar', $barrio->id], 'method' => 'PUT']) !!}
        
        <div class="modal-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">{!! Form::select ('departamento_id', $departamentos, null, ['class'=>'form-control', 'id' => 'departamento_id', 'style' => 'margin-top:5px;', 'placeholder' => 'Departamento']) !!}  </div>
                <div class="col-md-4">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Municipio']) !!}</div>
                <div class="col-md-2"></div>
            </div>    
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6"> {!! Form::text('name', null, ['class' => 'form-control',  'placeholder' => 'Nombre del Usuario', 'style' => 'margin-top:5px']) !!} </div>
                <div class="col-md-3"></div>
            </div> 

            {!! Form::number('departamento_id', $barrio->departamento_id, ['hidden'] ) !!}{!! Form::number('municipio_id', $barrio->municipio_id, ['hidden'] ) !!}
            {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}   
        </div>
        <div class="modal-footer">
            <a href="{{ route('barrios')}}"><input type="button" class="btn btn-secondary" value="Cancelar"></a>
            <button type="submit" class="btn btn-info" id="confirmar">Guardar</button>
        </div>
    {!! Form::close() !!}
                        

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            $("#departamento_id").prop('disabled', true);
            $("#municipio_id").prop('disabled', true);

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
                               for_barrio.submit();
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

