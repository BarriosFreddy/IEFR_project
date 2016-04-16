@extends('master')

@section('contenido')
<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">AUTORES</div>
    <div class="panel-body">

        @if($autores !== null)
        <div class="row">
            <div class="col-sm-12">

                <div style="max-width: 500px; margin: 0 auto">
                    <div id="custom-toolbar">
                        <div class="form-inline" role="form">
                            <a class="btn btn-primary" href="{{route('biblioteca.autores.create')}}" role="button"><i
                                    class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Registrar</a>
                        </div>
                    </div>
                    <table id="table-autores" data-height="500" data-sort-name="nombre" data-sort-order="desc"
                           data-search="true" class="table-condensed table-hover" data-toolbar="#custom-toolbar"
                           data-pagination="true">
                        <thead>
                        <tr>
                            <th data-field="nombre" data-align="center" data-sortable="true" class="cursor-pointer">
                                NOMBRES
                            </th>
                            <th data-field="apellido" data-align="center" data-sortable="true" class="cursor-pointer">
                                APELLIDOS
                            </th>
                            <th data-field="pais" data-align="center" data-sortable="true" class="cursor-pointer">
                                PAÍS
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
                <h4 class="modal-title" id="modalLabel">Información del libro</h4>
            </div>
            <div class="modal-body">
                <table class="table table-condensed table-striped" style="margin: 0 auto;">
                    <tbody>
                    <tr>
                        <th>Nombre</th>
                        <td id="nombre"/>
                    </tr>
                    <tr>
                        <th>Apellido</th>
                        <td id="apellido"/>
                    </tr>
                    <tr>
                        <th>País</th>
                        <td id="pais"/>
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
        // init table use data
        $('#table-autores').bootstrapTable({
            data: <?php echo $autores?>
        })
          .on('click-row.bs.table', function (e, row, $element) {
         var modal =  $('#modal');
         var data = row
                $('#enlace').attr('href', 'autores/'+data.id+'/edit' ) ;
         modal.find('#nombre').html(data.nombre)
                modal.find('#estado').html(data.estado)
         modal.find('#apellido').html(data.apellido)
         modal.find('#pais').html(data.pais)
         modal.modal('show');
         });
    });

</script>
@stop