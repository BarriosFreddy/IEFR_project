<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>

    <!--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('css/util.css')}}" media="screen"/>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{url('css/libs/bootstrap-table/bootstrap-table.css')}}" media="screen"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default"></nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-border main-layout">
                <div class="panel-heading panel-customized">BIBLIOTECA</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Hay campos vacios y/o datos mal ingresados.
                    </div>
                    @endif
                    {!!Form::open(['route'=>'login.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}
                    <!--    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">-->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Correo Electrónico: </label>

                        <div class="col-md-6">
                            <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-user"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Correo electrónico"
                                       aria-describedby="basic-addon1" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Contraseña: </label>

                        <div class="col-md-6">
                            <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Contraseña"
                                       aria-describedby="basic-addon1" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Perfil de usuario</label>

                        <div class="col-md-6">
                            <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-list-alt"></i></span>
                                <select name="rol" class="form-control">
                                    <option value="bibliotecario">Bibliotecario</option>
                                    <option value="administrador">Administrador</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" id="submit"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Iniciar
                                sesión
                            </button>

                            <a class="btn btn-link" href="{{ url('/password/forgot') }}">¿Olvidaste tu
                                contraseña?</a>
                        </div>
                    </div>

                    @if(Session::has('datosIncorrectos'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       Las credenciales ingresadas son incorrectas.
                    </div>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <br>
        <br>
        <div class="col-sm-4 col-sm-offset-4" style="text-align: center;">
            <img src="{!!url('images/logoFocoRojo.png')!!}" width="200" height="200"></img>
        </div>

    </div>
</div>
<!-- Scripts -->
<script src="{!!url('bower_components/jquery/dist/jquery.min.js')!!}"></script>
<script src="{!!url('bower_components/bootstrap/js/alert.js')!!}"></script>
<script src="{{url('js/libs//bootstrap-table/bootstrap-table.js')}}" type="text/javascript"></script>
@yield('js')

</body>
</html>
