<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('images/etiqueta.png')}}">
        <title>@yield('guia', 'SIRNEC') | Portal Institucional</title>
        @yield('linkencabezado')
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/jqvmap/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/summernote/summernote-bs4.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/lte/sweetalert/dist/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/propio.css') }}">
        
        @yield('styles')
       
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            @include('layouts.menuvar')
            @include('layouts.menuizq')

            <div class="content-wrapper">
                <section class="content" style="margin-top:10px">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="callout callout-info" style="width: 100%;box-shadow: 2px 2px 6px #333333;">
                                    <h4 class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">@yield('titulo')</h4>
                                    <div style="margin-top: -10px">
                                        @yield('contenido')
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            @include('layouts.piepagina')
        </div>

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script> $.widget.bridge('uibutton', $.ui.button) </script>
        <script src="{{ asset('assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/sparklines/sparkline.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('DataTables/datatables.min.js')}}"></script>
        <script src="{{ asset('assets/lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('assets/lte/dist/js/adminlte.js') }}"></script>
        <script src="{{ asset('assets/lte/dist/js/pages/dashboard.js') }}"></script>
        <script src="{{ asset('assets/lte/dist/js/demo.js') }}"></script>
        <script src="{{ asset('assets/lte/sweetalert/dist/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('maskedinput/src/jquery.maskedinput.js') }}"></script>
        
        @yield('scriptsplugins')
      
        
        

        <script> 
            $(document).ready(function() {
                
                $('#tabla').DataTable({
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ Registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando Registros del _START_ al _END_ de un Total de _TOTAL_ Registros",
                        "sInfoEmpty":      "Mostrando Registros del 0 al 0 de un Total de 0 Registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });

                

            });
           
        </script>
        @include('sweetalert::alert')
        @yield('scriptnecesario')
    </body>

</html>
