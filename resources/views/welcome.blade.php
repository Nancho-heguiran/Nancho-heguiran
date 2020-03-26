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
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/jqvmap/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/plugins/summernote/summernote-bs4.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/lte/sweetalert/sweetalert.min.css') }}">
        
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('layouts.menuizqinic')

            <div class="content-wrapper">
                <br><br><br><br><br>
                <center>
                    <section class="content col-sm-6" style="">
                        <div class="container-fluid" >
                            <div class="callout callout-info" style="width: 100%;box-shadow: 2px 2px 6px #333333;">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 style="font-family: footlight MT Light, gabriola,Lucida Calligraphy;color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);"><center>REGISTRADURIA NACIONAL <br> DEL ESTADO CIVIL</center></h4>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-4" ><br><center><img class="responsive-img " src="{{ asset('images/huella.png')}}" style="width: 120px" /><br><br></center></div>
                                    <div class="col-8" >
                                        <br>
                                        <center>
                                            {{-- &nbsp&nbsp<img style="width: 20%" src="{{ asset('images/cedula.png')}}" id="cedula" title="Cedula de Cidadania" />&nbsp&nbsp --}}
                                            &nbsp&nbsp<img style="width: 13%" src="{{ asset('images/login.png')}}" id="login" title="Login de Usuario" />&nbsp&nbsp
                                            {{-- &nbsp&nbsp<img style="width: 15%" src="{{ asset('images/correo.png')}}" id="correo" title="Correo Electronico" />&nbsp&nbsp --}}
                                        </center>
                                        <br>

                                        {{-- @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">*</button>
                                                <div class="alert-text">
                                                    @foreach ($errors->all() as $error)
                                                        <span>{{ $error }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif --}}

                                        <div id="login1" class="tab-pane" style="margin-top:-20px">
                                            <div class="login-inner">
                                                <div class="title"><br></div>
                                                <div class="login-form">
                                                    <form method="POST" action="{{ route('login_post') }}" autocomplete="off">
                                                        {{ csrf_field() }}
                                                    
                                                        <div class="form-group has-feedback">
                                                          <input type="text" class="form-control"  name="login" id="login2" placeholder="Login de Usuario" autofocus>
                                                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                        </div>
                                                        <div class="form-group has-feedback">
                                                          <input type="password" name="password" class="form-control" placeholder="Password">
                                                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                        </div>
                                                        <div class="row-center">
                                                          <div class="col-xs-4"  >
                                                              <button type="submit" class="btn btn-dark" >Validarse</button>
                                                          </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div id="correo1" class="tab-pane" style="margin-top:-20px; display:none">
                                            <div class="login-inner">
                                                <div class="title"><br></div>
                                                <div class="login-form">
                                                    <form method="POST" action="{{ route('login_post') }}" autocomplete="off">
                                                        {{ csrf_field() }}
                                                    
                                                        <div class="form-group has-feedback">
                                                          <input type="email" class="form-control" name="email"  id="email2" placeholder="Correo Electronico" autofocus>
                                                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                        </div>
                                                        <div class="form-group has-feedback">
                                                          <input type="password" name="password" class="form-control" placeholder="Password">
                                                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                        </div>
                                                        <div class="row-center">
                                                          <div class="col-xs-4"  >
                                                              <button type="submit" class="btn btn-dark" >Validarse</button>
                                                          </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- <div id="cedula1" class="tab-pane" style="margin-top:-20px; display:none">
                                            <div class="login-inner">
                                                <div class="title"><br></div>
                                                <div class="login-form">
                                                    <form method="POST" action="{{ route('login_post') }}" autocomplete="off">
                                                        {{ csrf_field() }}
                                                    
                                                        <div class="form-group has-feedback">
                                                          <input type="number" class="form-control" name="cedula" id="cedula2" placeholder="Cedula de Ciudadania" autofocus>
                                                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                        </div>
                                                        <div class="form-group has-feedback">
                                                          <input type="password" name="password" class="form-control" placeholder="Password">
                                                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                        </div>
                                                        <div class="row-center">
                                                          <div class="col-xs-4"  >
                                                              <button type="submit" class="btn btn-dark" >Validarse</button>
                                                          </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> --}}

                                    </div>
                                </div> 
                            </div>
                        </div>
                    </section>
                </center>
                
            </div>
            
            @include('layouts.piepagina')   
            
        </div>

        <script src="{{ asset('assets/lte/plugins/jquery/jquery.min.js') }}"></script>
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
        <script src="{{ asset('assets/lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('assets/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('assets/lte/dist/js/adminlte.js') }}"></script>
        <script src="{{ asset('assets/lte/dist/js/pages/dashboard.js') }}"></script>
        <script src="{{ asset('assets/lte/dist/js/demo.js') }}"></script>
        <script src="{{ asset('assets/lte/sweetalert/sweetalert.min.js') }}"></script>

        <script >
            $(document).ready(function(){
                $("#login").on("click", function(){
                    $("#login1").show();
                    $("#cedula1").hide();
                    $("#correo1").hide();
                    document.getElementById("login2").focus();
                });
                $("#cedula").on("click", function(){
                    $("#cedula1").show();
                    $("#login1").hide();
                    $("#correo1").hide();
                    document.getElementById("cedula2").focus();
                });
                $("#correo").on("click", function(){
                    $("#correo1").show();
                    $("#login1").hide();
                    $("#cedula1").hide();
                    document.getElementById("email2").focus();
                });
            });
        </script>
    </body>

</html>
