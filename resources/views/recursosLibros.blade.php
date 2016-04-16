@extends('master')


@section('contenido')

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#autores" aria-controls="home" role="tab"
                                              data-toggle="tab">Autores</a></li>
    <li role="presentation"><a href="#categorias" aria-controls="profile" role="tab" data-toggle="tab">Categorias</a>
    </li>
    <li role="presentation"><a href="#ubicaciones" aria-controls="messages" role="tab" data-toggle="tab">Ubicaciones</a>
    </li>
    <li role="presentation"><a href="#editoriales" aria-controls="settings" role="tab" data-toggle="tab">Editoriales</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active fade in" id="autores">...</div>
    <div role="tabpanel" class="tab-pane fade" id="categorias">

        @if($categorias !== null)
        <div class="row">
            <div class="col-sm-12">

                <div style="max-width: 500px; margin: 0 auto">

                    <table id="table-categorias" data-height="500" data-sort-name="nombre" data-sort-order="desc"
                           data-search="true" class="table-condensed table-hover" data-pagination="true">
                        <thead>
                        <tr>
                            <th data-field="nombre" data-align="center" data-sortable="true" class="cursor-pointer">
                                NOMBRE
                            </th>
                            <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents"
                                data-align="center">Acciones
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        @endif

        <div class="modal fade" id="mdlEditCategorias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ACTUALIZAR CATEGORIA</h4>
                    </div>
                    <div class="modal-body">
                        <!-- -->
                        <form class='form-horizontal'>
                            <div class="form-group">
                                {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombreCategoria'
                                    ]) !!}
                                </div>
                            </div>

                        </form>

                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="actualizarCategoria">ACTUALIZAR</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div role="tabpanel" class="tab-pane fade" id="ubicaciones">...</div>
    <div role="tabpanel" class="tab-pane fade" id="editoriales">...</div>
</div>


@stop

@section('js')
<script>
    $(function () {
        $('#table-categorias').bootstrapTable({
            data: <?php echo $categorias?>
        })
        /*    .on('click-row.bs.table', function (e, row, $element) {
         var modal =  $('#modal');
         var data = row
         $('#enlace').attr('href', 'categorias/'+data.id+'/edit' ) ;
         modal.find('#nombre').html(data.nombre)
         modal.find('#id').html(data.id)
         modal.modal('show');
         });*/
    });
    function operateFormatter(value, row, index) {
        return [
            '<a class="edit btn btn-sm btn-warning" data-toggle="modal" data-target="#mdlEditCategorias" title="Like">',
            '<i class="glyphicon glyphicon-pencil"></i>',
            '</a>',
            '<a class="remove  btn btn-sm btn-danger" data-toggle="modal" data-target="#mdlRemoveCategorias" style="margin-left: 10px;" title="Edit">',
            '<i class="glyphicon glyphicon-trash"></i>',
            '</a>'
        ].join('');
    }
    /**/
    var idRow = "";
    window.operateEvents = {
        'click .remove': function (e, value, row, index) {
            console.log(value, row, index);
        },
        'click .edit': function (e, value, row, index) {
            alert(JSON.stringify(row));
            $('#nombreCategoria').val(row.nombre)

            console.log(value, row, index);
        }
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });


    $('#actualizarCategoria').click(function () {
        $.ajax({
            url: "{{url('biblioteca/categorias/update')}}",
            method: 'post',
            data: {"nombre": $('#nombreCategoria').val()},
            success: function (result) {

                alert(result);
                /*           $('#table-categorias').bootstrapTable({
                 data: categorias
                 })*/
            },
            error: function () {
                alert('Error');
            }
        });

        $('#modalCategorias').modal('toggle');
    });


</script>

@stop