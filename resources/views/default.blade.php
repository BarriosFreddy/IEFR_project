<!DOCTYPE html>
<html lang="es">
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="es"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="es"> <!--<![endif]-->
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Institucion Educativa Foco Rojo</title>
    <meta name="description" content="Pagina web oficial de la Intitución Educativa Foco Rojo. Ingresa ya!">
    <meta name="author" content="Freddy Manuel Barrios Del rio">
    <meta name="keywords" content="colegio, institucion, educativa, foco, rojo, institucion educativa foco rojo, ceres cuatro vientos"/>
    {{-- Bootstrap--}}
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap-theme.min.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('css/default.css')}}">
    <link rel="stylesheet" href="{{url('css/layout.css')}}">
    <link rel="stylesheet" href="{{url('plugins/wow/css/animate.css')}}">
    <link rel="stylesheet" href="{{url('css/media-queries.css')}}">
    <link rel="stylesheet" href="{{url('css/jquery-ui/jquery-ui.min.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>

    @yield('css')


</head>
<body>
<header>

    <div class="row">

        <div class="twelve columns">

            <div class="logo">
                <a href="{{url('/index')}}"><img src="images/logoFocoRojo.png" alt="Institucion Educativa Foco Rojo" title="Institucion Educativa Foco Rojo"/></a>
            </div>

            <nav id="nav-wrap">

                <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
                <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

                <ul id="nav" class="nav">

                    <li><a href="{{url('/index')}}">Inicio</a></li>
                    <li><span><a href="">Institución</a></span>
                        <ul>
                            <li><a href="{{url('about')}}">Filosofía institucional</a></li>
                            <li><a href="{{url('downloads')}}">Documentos</a></li>
                            <li><a href="{{url('gallery')}}">Galería</a></li>
                        </ul>
                    </li>
                    <li><span><a href="">Biblioteca</a></span>
                        <ul>
                            <li><a href="{{url('busqueda/catalogo')}}" target="_blank">Catálogo en línea</a></li>
                            <li><a href="{{url('/biblioteca')}}" target="_blank">Acceder</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('siteMap')}}">Mapa del sitio</a></li>
                    <li><a href="{{url('contact')}}">Contacto</a></li>

                </ul> <!-- end #nav -->

            </nav> <!-- end #nav-wrap -->
            <div class="escudo">
                <a href="{{url('/')}}"><img src="images/Escudo_de_Colombia.png" alt="Escudo Nacional de Colombia" title="Escudo Nacional de Colombia"/></a>
            </div>
        </div>

    </div>
</header> <!-- Header End -->


@yield('contenido')

<footer>

    <div class="row">

        <div class="twelve columns">

            <ul class="footer-nav">
                <li><a href="{{url('/index')}}">Inicio</a></li>
                <li><a href="{{url('/about')}}">Institución</a></li>
                <li><a href="{{url('/biblioteca')}}">Biblioteca</a></li>
                <li><a href="{{url('siteMap')}}">Mapa del sitio</a></li>
                <li><a href="{{url('contact')}}">Contacto</a></li>
            </ul>

            <ul class="copyright">
                <li>Copyright &copy; 2016</li>
                <li>Desarrollado por <a href="https://co.linkedin.com/in/freddy-manuel-barrios-del-rio-49ba0957">Freddy Barrios</a></li>
            </ul>

        </div>

        <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

    </div>

</footer> <!-- Footer End-->
</body>
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('bower_components/bootstrap/js/collapse.js')}}"></script>
<script src="{{url('bower_components/bootstrap/js/transition.js')}}"></script>


<script src="{{url('js/modernizr.js')}}"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

<script src="js/jquery.flexslider.js"></script>
<script src="js/doubletaptogo.js"></script>
<script src="js/init.js"></script>
<script src="{{url('js/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{url('plugins/wow/js/wow.min.js')}}"></script>
<script type="text/javascript">
    new WOW().init();
</script>
<script type="text/javascript" src="{{url('plugins/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('plugins/moment/es.js')}}"></script>
<script type="text/javascript" src="{{url('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

@yield('js')
</html>

