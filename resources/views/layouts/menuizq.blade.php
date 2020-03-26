<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <center>
        <a href="#" class="brand-link"><img src="{{ asset('images/logo-dark.png')}}" alt="SIRNEC" class="responsive-img" style="width: 6em;"></a>
    </center>
    
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image"><img src="{{ asset('images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"></div>
            <div class="info"><a href="#" class="d-block" style="font-size: 80%">{{ Auth::user()->name }}</a></div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>primer menu <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Widgets<span class="right badge badge-danger">New</span></p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>