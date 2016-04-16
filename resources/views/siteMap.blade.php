@extends('default')

@section('css')
<style>
    .main_layout {
    /*    max-width: 800px;
        height: 500px;
        margin: 20px auto;
        padding: 50px;*/
    }

    .main_layout ul {
        display: block;
    }

    .main_layout ul li {
        margin: 20px;
    }

    .main_layout li a {
        color: #000000;
        text-decoration: none;
        font-weight: bold;
    }
</style>
@stop
@section('contenido')
<div class="content-outer">

    <div id="page-content" class="row page">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="text-align: center; font-weight: bold;">
                <h3>MAPA DEL SITIO</h3>
            </div>
        </div>
        <div id="primary" class="eight columns">

            <section>
                <div class="main_layout">

                    <ul>
                        <li><a href="{{url('index')}}"><i class="fa fa-check"></i>&nbsp;Home</a></li>
                        <li><a href=""><i class="fa fa-check"></i>&nbsp;Institución</a>
                            <ul>
                                <li><a href="{{url('about')}}"><i class="fa fa-check"></i>&nbsp;Filosofía institucional</a></li>
                                <li><a href="{{url('downloads')}}"><i class="fa fa-check"></i>&nbsp;Documentos</a></li>
                                <li><a href="{{url('gallery')}}"><i class="fa fa-check"></i>&nbsp;Galería</a></li>
                            </ul>
                        </li>
                        <li><a href=""><i class="fa fa-check"></i>&nbsp;Bilbioteca</a>
                            <ul>
                                <li><a href="{{url('busqueda/catalogo')}}" target="_blank"><i class="fa fa-check"></i>&nbsp;Catálogo en línea</a></li>
                                <li><a href="{{url('auth/login')}}"><i class="fa fa-check"></i>&nbsp;Acceder</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('siteMap')}}"><i class="fa fa-check"></i>&nbsp;Mapa del sitio</a></li>
                        <li><a href="{{url('contact')}}"><i class="fa fa-check"></i>&nbsp;Contacto</a></li>
                    </ul>
                </div>

            </section>
        </div>
    </div>
</div>

@stop