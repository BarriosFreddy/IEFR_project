@extends('default')

@section('css')
<style>
    .titulo {
        text-align: center;
        font-size: 34px;
        font-weight: bold;
        color: white;
        text-shadow: -7px 5px 5px #000;
    }
    .sectionTitulo {
        background: #1a237e;
    }
    @media screen and (max-width: 767px) {
        .titulo {
            font-size: 24px;
        }
    }
</style>
@stop

@section('contenido')
<!-- Intro Section
================================================== -->

<section id="intro">
    <div class="row sectionTitulo">
        <div class="col-sm-8 col-sm-offset-2">
            <h1 class="titulo">INSTITUCIÓN EDUCATIVA FOCO ROJO</h1>
        </div>
    </div>
    <div id="carousel-example-generic" class="carousel slide wow bounceInUp" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/photos_cover/IMG_13.JPG" alt="">

                <div class="carousel-caption">
                
                </div>
            </div>
            <div class="item">
                <img src="images/photos_cover/IMG_12.JPG" alt="">

                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


</section> <!-- Intro Section End-->
<section id="works">

    <div class="row">

        <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-halves">

            <div class="columns portfolio-item wow bounceInLeft">
                <div class="item-wrap">
                    <a href="#">
                        <img alt="" src="images/portfolio/image5.jpg">

                        <div class="overlay"></div>
                        <div class="link-icon"><i class="fa fa-link"></i></div>
                    </a>
                </div>
            </div>

            <div class="columns portfolio-item wow bounceInUp">
                <div class="item-wrap">
                    <a href="#">
                        <img alt="" src="images/portfolio/image2.jpg">

                        <div class="overlay"></div>
                        <div class="link-icon"><i class="fa fa-link"></i></div>
                    </a>
                </div>
            </div>

            <div class="columns portfolio-item wow bounceInUp">
                <div class="item-wrap">
                    <a href="#">
                        <img alt="" src="images/portfolio/image3.jpg">

                        <div class="overlay"></div>
                        <div class="link-icon"><i class="fa fa-link"></i></div>
                    </a>
                </div>
            </div>

            <div class="columns portfolio-item wow bounceInRight">
                <div class="item-wrap">
                    <a href="#">
                        <img alt="" src="images/portfolio/image4.jpg">

                        <div class="overlay"></div>
                        <div class="link-icon"><i class="fa fa-link"></i></div>
                    </a>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
            <div id="datetimepicker"></div>
        </div>
    </div>
</section>
@stop

@section('js')
<script>
    $(function () {
        $('#datetimepicker').datetimepicker({
            inline: true,
            sideBySide: false
        });
        $("a[title='Select Time']").hide();
    });
</script>
@stop
