@extends('master')

@section('contenido')

<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">PRESTAMOS</div>
	<div class="panel-body">
        @if($prestamos !== null)
        <div class="row">
            <div class="col-sm-12">

                <div style="max-width: 500px; margin: 0 auto">
                    <div id="custom-toolbar">
                        <div class="form-inline" role="form">
                            <a class="btn btn-primary" href="{{route('biblioteca.prestamos.create')}}" role="button"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Realizar</a>
                        </div>
                    </div>
                    <table id="table-prestamos" data-height="500" data-sort-name="fecha_entrega" data-sort-order="desc"
                                   class="table-condensed table-hover" data-toolbar="#custom-toolbar" data-search="true"
                                   data-pagination="true">
                        <thead>
                        <tr>
                            <th data-field="libro" data-align="center" data-sortable="true" class="cursor-pointer">
                                LIBRO
                            </th>
                            <th data-field="usuario" data-align="center" data-sortable="true" class="cursor-pointer">
                                USUARIO
                            </th>
                            <th data-field="documento" data-align="center" data-sortable="true" class="cursor-pointer">
                                DOCUMENTO
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
                        <th>USUARIO</th>
                        <td id="usuario"/>
                    </tr>
                    <tr>
                        <th>LIBRO</th>
                        <td id="libro"/>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a class="btn btn-warning " id="enlace"
                   role="button"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Realizar devolución</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(function () {
        $('#table-prestamos').bootstrapTable({
            data: <?php echo $prestamos?>
        })
            .on('click-row.bs.table', function (e, row, $element) {
                var modal = $('#modal');
                var data = row
                $('#enlace').attr('href', 'prestamos/' + data.id + '/edit');

                modal.find('#id').html(data.id)
                modal.find('#usuario').html(data.usuario)
                modal.find('#libro').html(data.libro)

                modal.modal('show');
            });
    });

</script>
@stop
