@extends('master')

@section('contenido')

<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">HISTORIAL DE PRESTAMOS</div>
    <div class="panel-body">
        @if($prestamos !== null)
        <div class="row">
            <div class="col-sm-12">

                <div style="max-width: 700px; margin: 0 auto">
                    <table id="table-prestamos" data-height="600" data-sort-name="fecha_entrega" data-sort-order="desc"
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
                            <th data-field="fecha_entrega" data-align="center" data-sortable="true" class="cursor-pointer">
                                FECHA DE ENTREGA
                            </th>
                            <th data-field="fecha_devolucion" data-align="center" data-sortable="true" class="cursor-pointer">
                                FECHA DE DEVOLUCÓN
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





@stop

@section('js')
<script>
    $(function () {
        $('#table-prestamos').bootstrapTable({
            data: <?php echo $prestamos?>
        })
    });

</script>
@stop
