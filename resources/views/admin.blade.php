<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<title>@yield('titulo')</title>
	@yield('css')
	{{-- Bootstrap--}}
	<link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" media="screen"/>
	<link rel="stylesheet" href="{{url('bower_components/bootstrap-material-design/dist/css/material.min.css')}}" media="screen"/>
	<link rel="stylesheet" href="{{url('bower_components/bootstrap-material-design/dist/css/ripples.min.css')}}" media="screen"/>
	<link rel="stylesheet" href="{{url('bower_components/bootstrap-material-design/dist/css/material-wfont.min.css')}}" media="screen"/>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" >
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Biblioteca</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li role="presentation"><a href="{{url('biblioteca/admin/bibliotecarios')}}">Bibliotecarios</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="">Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
@yield('contenido')

</body>
<script src="{!!url('bower_components/jquery/dist/jquery.min.js')!!}" ></script>
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('bower_components/bootstrap-material-design/dist/js/ripples.min.js')}}"></script>
<script src="{{url('bower_components/bootstrap-material-design/dist/js/material.min.js')}}"></script>
<script type="text/javascript">
	$('document').ready(function(){
		$('.dropdown-toggle').dropdown();
		$.material.init();
	});
</script>
@yield('js')
</html>

