@extends('default')

@section('css')
<style>
    .main_layout {
        max-width: 800px;
        height: 600px;
        margin: 20px auto;
        padding: 50px;
    }
</style>
@stop
@section('contenido')
<div class="content-outer">

    <div id="page-content" class="row page">

        <div id="primary" class="eight columns">

            <section>

                <div class="row">
                    <p style="text-align: center">
                        Aquí podrás conseguir todos los documentos que están disponibles para descargar.
                    </p>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{url('Documents/MANUAL_DE_CONVIVENCIA_INEDFOR.pdf')}}" target="_blank">
                            <img src="{{url('images/channels-529_mime_pdf.png')}}" title="" alt="" width="50px"
                                 height="70px">
                        </a>

                        <p style="color: #000">
                            MANUAL DE CONVIVENCIA
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{url('Documents/FILOSOFIA_DEL_FOCO_ROJO.pdf')}}" target="_blank">
                            <img src="{{url('images/channels-529_mime_pdf.png')}}" title="" alt="" width="50px"
                                 height="70px">
                        </a>

                        <p style="color: #000">
                            FILOSOFIA INSTITUCIONAL
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{url('Documents/PEI_FOCO_ROJO.pdf')}}" target="_blank">
                            <img src="{{url('images/channels-529_mime_pdf.png')}}" title="" alt="" width="50px"
                                 height="70px">
                        </a>

                        <p style="color: #000">
                            PEI (PROYECTO EDUCATIVO INSTITUCIONAL)
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


@stop