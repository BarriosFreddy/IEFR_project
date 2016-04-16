<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Biblioteca - Catalogo</title>
    {{-- Bootstrap--}}
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('css/libs/bootstrap-table/bootstrap-table.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{url('css/util.css')}}" media="screen"/>

    <style>
        .main-layout {
            max-width: 1000px;
            margin: 70px auto;
        }

        .color-indigo {
            background: #1a237e;
            color: white;
        }

        .panel {
            border: 1px solid #1a237e;
        }
        .cursor-pointer{
            cursor: pointer;
        }
    </style>


</head>
<body>
<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">
        <strong>CATALOGO EN LINEA - BIBLIOTECA - INSTITUCIÓN EDUCATIVA FOCO ROJO</strong>
    </div>
    <div class="panel-body">

        {!! Form::open(['url' => 'busqueda/catalogo', 'class' => 'form-horizontal']) !!}
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="input-group">
                    {!! Form::text('valor', null, ['class' => 'form-control input-lg', 'placeholder' => '¿Que buscas?','required']) !!}
              <span class="input-group-btn">
                <button class="btn btn-primary btn-lg" type="submit"><i
                        class="glyphicon glyphicon-search"></i>&nbsp;&nbsp;Buscar
                </button>
              </span>
                </div>
            </div>
        </div>
        {!!Form::close()!!}

        @if($dataLibros !== null)
            <div class="row">
                <div class="col-sm-12">

                    <div style="max-width: 500px; margin: 0 auto">
                        <table id="table-catalogo" data-height="500" data-sort-name="titulo" data-sort-order="desc"
                               class="table-condensed table-hover"
                               data-pagination="true">
                            <thead>
                            <tr>
                                <th data-field="titulo" data-align="center" data-sortable="true" class="cursor-pointer">TITULO</th>
                                <th data-field="idioma" data-align="center" data-sortable="true" class="cursor-pointer">AUTOR</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4" style="text-align: center;">
                <img src="{!!url('images/logoFocoRojo.png')!!}" width="200" height="200"/>
            </div>
        </div>
    </div>


</div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Información del libro</h4>
            </div>
            <div class="modal-body">
                <table class="table table-condensed table-striped" style="margin: 0 auto;">
                    <tbody>
                    <tr>
                        <th>Titulo</th>
                        <td id="titulo"/>
                    </tr>
                    <tr>
                        <th>Ubicación</th>
                        <td id="ubicacion" style="font-weight: bold"/>
                    </tr>
                    <tr>
                        <th>Categoria</th>
                        <td id="categoria"/>
                    </tr>
                    <tr>
                        <th>Autor</th>
                        <td id="autor"/>
                    </tr>
                    <tr>
                        <th>Editorial</th>
                        <td id="editorial"/>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td id="isbn"/>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{!!url('bower_components/jquery/dist/jquery.min.js')!!}" type="text/javascript"></script>
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/libs//bootstrap-table/bootstrap-table.js')}}" type="text/javascript"></script>
<script src="{{url('js/libs//bootstrap-table/bootstrap-table-español.js')}}" type="text/javascript"></script>
<script src="{{url('js/dataModal.js')}}" type="text/javascript"></script>

<script>
    $(function () {

        $('#table-catalogo').bootstrapTable({
            data: <?php echo $dataLibros?>
        }).on('click-row.bs.table', function (e, row, $element) {
            var modal =  $('#modal');
            var data = row

            modal.find('#titulo').html(data.titulo)
            modal.find('#ubicacion').html(data.ubicacion)
            modal.find('#categoria').html(data.categoria)
            modal.find('#autor').html(data.autor)
            modal.find('#editorial').html(data.editorial)
            modal.find('#isbn').html(data.isbn)
            modal.modal('show');
        });
    });

</script>
</html>
