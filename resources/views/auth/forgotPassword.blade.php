<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>

    <!--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" media="screen"/>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{url('css/libs/bootstrap-table/bootstrap-table.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('css/util.css')}}" media="screen"/>

    <link rel="stylesheet" href="{{url('css/jquery-ui/jquery-ui.min.css')}}" media="screen"/>
    <link href="{{url('css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
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
                <div class="panel-heading panel-customized">RESTABLECER CONTRASEÑA</div>
                <div class="panel-body">
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        No hay ningún usuario con esos datos.
                    </div>
                    @endif
                    @if(Session::has('error_general'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        Algo anda mal intenta de nuevo.
                    </div>
                    @endif

                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        La contraseña fue modificada exitosamente.
                    </div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        Hay campos vacios que son obligatorios y/o datos mal diligenciados.
                    </div>
                    @endif
                    {!!Form::open(['url'=>'password/forgot', 'method'=>'POST', 'class'=>'form-horizontal', 'id' =>
                    'passwordForm'])!!}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Correo Electrónico</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Identificación</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="documento">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Contraseña nueva</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirmar contraseña</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                RESTABLECER
                            </button>
                        </div>
                        <DIV class="col-md-2">
                            <a class="btn btn-default" href="{{url('auth/login')}}">Volver</a>
                        </DIV>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{!!url('bower_components/jquery/dist/jquery.min.js')!!}"></script>
<script src="{{url('js/libs//jquery-validate/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{!!url('bower_components/bootstrap/js/alert.js')!!}"></script>
<script src="{{url('js/libs//bootstrap-table/bootstrap-table.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#passwordForm').validate({
            rules: {
                email: "required",
                documento: "required",
                current_password: "required",
                new_password: "required",
                password_confirmation: {
                    required: true,
                    equalTo: "#new_password"
                }
            },
            messages: {
                email: "El correo electrónico es obligatorio",
                documento: "La identificación es obligatoria",
                current_password: "La contraseña actual es obligatoria",
                new_password: "La contraseña nueva es obligatoria",
                password_confirmation: {
                    equalTo: "Las contraseñas no coinciden",
                    required: "La confirmación de la contraseña es obligatoria"
                }
            }
        })

        window.setTimeout(function () {
            $(".alert-dismissible").alert('close');
        }, 3000);
    });

</script>
</body>
</html>


