@extends('master')

@section('contenido')
<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">LIBROS</div>
    <div class="panel-body">
        @if($libros !== null)
        <div class="row">
            <div class="col-sm-12">

                <div style="max-width: 500px; margin: 0 auto">
                    <div id="custom-toolbar">
                        <div class="form-inline" role="form">
                            <a class="btn btn-primary" href="{{route('biblioteca.libros.create')}}" role="button"><i
                                    class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Registrar</a>
                        </div>
                    </div>
                    <table id="table-libros" data-height="500" data-sort-name="titulo" data-sort-order="desc"
                           class="table-condensed table-hover" data-toolbar="#custom-toolbar" data-search="true"
                           data-pagination="true">
                        <thead>
                        <tr>
                            <th data-field="titulo" data-align="center" data-sortable="true" class="cursor-pointer">
                               TITULO
                            </th>
                            <th data-field="idioma" data-align="center" data-sortable="true" class="cursor-pointer">
                                AUTOR
                            </th>
                            <th data-field="estado" data-align="center" data-sortable="true" class="cursor-pointer">
                                ESTADO
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Información</h4>
            </div>
            <div class="modal-body">
                <table class="table table-condensed table-striped" style="margin: 0 auto;">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td id="id"/>
                    </tr>
                    <tr>
                        <th>TITULO</th>
                        <td id="titulo"/>
                    </tr>
                    <tr>
                        <th>CATEGORIA</th>
                        <td id="categoria"/>
                    </tr>
                    <tr>
                        <th>AUTOR</th>
                        <td id="autor"/>
                    </tr>
                    <tr>
                        <th>EDITORIAL</th>
                        <td id="editorial"/>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td id="isbn"/>
                    </tr>
                    <tr>
                        <th>UBICACIÓN</th>
                        <td id="ubicacion"/>
                    </tr>
                    <tr>
                        <th>IDIOMA</th>
                        <td id="idioma"/>
                    </tr>
                    <tr>
                        <th>NUMERO DE PAGINAS</th>
                        <td id="num_paginas"/>
                    </tr>

                    <tr>
                        <th>PAIS DE IMPRESIÓN</th>
                        <td id="pais_impresion"/>
                    </tr>
                    <tr>
                        <th>AÑO DE EDICIÓN</th>
                        <td id="anho_edicion"/>
                    </tr>
                    <tr>
                        <th>FECHA DE REGISTRO</th>
                        <td id="fecha_registro"/>
                    </tr>
                    <tr>
                        <th>EJEMPLARES</th>
                        <td id="ejemplares"/>
                    </tr>
                    <tr>
                        <th>ESTADO</th>
                        <td id="estado"/>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a class="btn btn-warning " id="enlace"
                   role="button"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Editar</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(function () {
        $('#table-libros').bootstrapTable({
            data: <?php echo $libros?>
        })
            .on('click-row.bs.table', function (e, row, $element) {
                var modal = $('#modal');
                var data = row
                $('#enlace').attr('href', 'libros/' + data.id + '/edit');

                modal.find('#id').html(data.id)
                modal.find('#titulo').html(data.titulo)
                modal.find('#isbn').html(data.isbn)
                modal.find('#idioma').html(data.idioma)
                modal.find('#fecha_registro').html(data.fecha)
                modal.find('#anho_edicion').html(data.anho)
                modal.find('#pais_impresion').html(data.pais)
                modal.find('#num_paginas').html(data.paginas)
                modal.find('#ejemplares').html(data.ejemplares)
                modal.find('#estado').html(data.estado)



                modal.find('#categoria').html(data.categoria)
                modal.find('#autor').html(data.autor)
                modal.find('#editorial').html(data.editorial)
                modal.find('#ubicacion').html(data.ubicacion)
                modal.modal('show');
            });
    });

</script>
@stop

