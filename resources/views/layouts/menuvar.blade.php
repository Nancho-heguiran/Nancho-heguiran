<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Almacen</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contacto</a>
        </li>
    </ul>

    {{-- manejador de colores de los paneles de la plantilla  --}}
    {{-- <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link " data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-th-large"></i></a>
        </li>
    </ul> --}}
    
    <div>
        <a href="{{ route('logout')}}"><img class="img-responsiveid float-right" src="{{ asset('images/salir.png')}}" style="width: 3.5%; height: 3.5%; margin-right: 8px; " title="Salir" />  </a>
        <a href="{{ route('cambiocontrasena')}}"><img class="img-responsiveid float-right" src="{{ asset('images/password.png')}}" style="width: 3.5%; height: 3.5%; margin-right: 8px;" title="Cambiar Password" />  </a>
    </div>

   

    

</nav>