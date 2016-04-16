<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="<?= csrf_token() ?>">
    <title>Biblioteca - Institución Educativa Foco Rojo</title>
    {{-- Bootstrap--}}
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('css/util.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('css/jquery-ui/jquery-ui.min.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('css/libs/bootstrap-table/bootstrap-table.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('css/simple-sidebar.css')}}">
    <link rel="stylesheet" href="{{url('css/font-awesome/css/font-awesome.css')}}" >
    @yield('css')
</head>
<body>
<nav class="navbar navbar-primary navbar-fixed-top header">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('biblioteca')}}" style="color: white">BIBLIOTECA</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
                @if (!Auth::guest())

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle text-color" data-toggle="dropdown" role="button"
                       aria-expanded="false" style="text-transform: uppercase;"> {{ Auth::user()->nombre}}
                        {{Auth::user()->apellido }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('biblioteca/auth/reset')}}"><i class="glyphicon glyphicon-pencil"></i>
                                Cambiar contraseña</a></li>
                        <li><a href="{{ url('logout') }}"><i class="glyphicon glyphicon-log-out"></i> Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div id="wrapper" >

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li>
                <a>
                    <i class="fa fa-cog"></i> Configuración
                </a>
            </li>
            <div style="padding-left: 30px">
                @if(Auth::user()->rol == 'administrador')
                <li>
                    <a href="{{url('biblioteca/users')}}">
                        <i class="glyphicon glyphicon-user"></i> Bibliotecarios</a
                </li>
                @endif
                <li>
                    <a href="{{url('biblioteca/usuarios')}}">
                        <i class="glyphicon glyphicon-user"></i> Usuarios</a>
                </li>
                <li><a href="{{url('biblioteca/libros')}}"><i
                            class=" glyphicon glyphicon-book"></i> Libros</a>
                </li>

                <div style="padding-left: 20px">
                    <li><a href="{{url('biblioteca/categorias')}}"><i
                                class="glyphicon glyphicon-tags"></i> Categorias</a></li>
                    <li><a href="{{url('biblioteca/ubicaciones')}}"><i
                                class=" glyphicon glyphicon-tasks"></i> Ubicaciones</a></li>
                    <li><a href="{{url('biblioteca/autores')}}"><i
                                class=" glyphicon glyphicon-user"></i> Autores</a></li>
                    <li><a href="{{url('biblioteca/editoriales')}}"><i
                                class=" glyphicon glyphicon-edit"></i> Editoriales</a></li>
                </div>

            </div>
            <li>
                <a>
                    <i class="glyphicon glyphicon-certificate"></i> Prestamos
                </a>
            </li>
            <div style="padding-left: 30px">
                <li>
                    <a href="{{url('biblioteca/prestamos')}}">
                        <i class="fa fa-plus-square-o"></i> Realizar
                    </a>
                </li>
                <li>
                    <a href="{{url('biblioteca/historical/prestamos')}}">
                        <i class="fa fa-list"></i> Historial
                    </a>
                </li>
            </div>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper"  >
        <div class="container-fluid">

            @yield('contenido')
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>


</body>
<script src="{!!url('bower_components/jquery/dist/jquery.min.js')!!}" type="text/javascript"></script>
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/autocompleteJqueryUI/autocomplete.js')}}" type="text/javascript"></script>
<script src="{{url('js/libs//bootstrap-table/bootstrap-table.js')}}" type="text/javascript"></script>
<script src="{{url('js/libs//jquery-validate/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/libs//bootstrap-table/bootstrap-table-español.js')}}" type="text/javascript"></script>
<script src="{{url('js/validation-form/validationForms.js')}}" type="text/javascript"></script>
@yield('js')
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</html>

