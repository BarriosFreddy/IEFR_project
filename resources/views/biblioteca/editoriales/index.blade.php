@extends('master')
@section('contenido')

<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">EDITORIALES</div>
    <div class="panel-body">

        @if($editoriales !== null)
        <div class="row">
            <div class="col-sm-12">

                <div style="max-width: 500px; margin: 0 auto">
                    <div id="custom-toolbar">
                        <div class="form-inline" role="form">
                            <a class="btn btn-primary" href="{{route('biblioteca.editoriales.create')}}" role="button"><i
                                    class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Registrar</a>
                        </div>
                    </div>
                    <table id="table-editoriales" data-height="500" data-sort-name="nombre" data-sort-order="desc"
                           data-search="true" class="table-condensed table-hover" data-toolbar="#custom-toolbar"
                           data-pagination="true">
                        <thead>
                        <tr>
                            <th data-field="nombre" data-align="center" data-sortable="true" class="cursor-pointer">
                               NOMBRE
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
                        <th>NOMBRE</th>
                        <td id="nombre"/>
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
        $('#table-editoriales').bootstrapTable({
            data: <?php echo $editoriales?>
        })
            .on('click-row.bs.table', function (e, row, $element) {
                var modal =  $('#modal');
                var data = row
                $('#enlace').attr('href', 'editoriales/'+data.id+'/edit' ) ;
                modal.find('#nombre').html(data.nombre)
                modal.find('#estado').html(data.estado)

                modal.find('#id').html(data.id)
                modal.modal('show');
            });
    });

</script>
@stop