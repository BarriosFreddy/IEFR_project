@extends('master')

@section('contenido')

<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">REALIZAR PRESTAMO</div>
    <div class="panel-body">
        {!! Form::open(['url' => 'biblioteca/prestamos', 'class' => 'form-horizontal', 'id' => 'formPrestamos']) !!}
        {!! Form::hidden('user_id', Auth::user()->id) !!}
        {!! Form::hidden('estado', $estado) !!}
        {!! Form::hidden('fecha_entrega', $fechaEntrega) !!}
        <div class="form-group">
            {!! Form::label('usuario_id', 'Usuario ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                <input name="usuario_id" type="hidden" id="usuario_id">
                <input type="text" id="search_usuarios" class="form-control cursor-pointer" readonly=""/>
            </div>

            {!! Form::label('libro_id', 'Libro ', ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-4">
                <input type="hidden" name="libro_id" id="libro_id">
                <input type="text" id="search_libros" class="form-control cursor-pointer" readonly=""/>
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('fecha_devolucion_max', 'Fecha de devolución maxima ', ['class' => 'col-sm-2
            control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('fecha_devolucion_max', $fechaDevolucion, ['class' => 'form-control', 'readonly' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('comentario', 'Comentario ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::textarea('comentario', null, ['class' => 'form-control', 'maxlength' => '254', 'rows' => '7']) !!}
            </div>
        </div>
        <hr style="background: #ccc; height: 3px;"/>

        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-2">
                {!! Form::submit('REALIZAR', ['class' => 'btn btn-primary form-control ']) !!}
            </div>
        </div>
        {!! Form::close() !!}

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            Hay campos vacios que son obligatorios o en su defecto mal diligenciados
        </div>
        @endif
    </div>
</div>
<!--Modal busqueda de usuarios-->
<div class="modal fade" id="modal_usuarios" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Busqueda de usuario</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2">Filtrar por</div>
                    <div class="col-sm-4">
                        <select class="form-control" id="campo_usuarios">
                            <option value="documento">Documento</option>
                            <option value="nombre">Nombres</option>
                            <option value="apellido">Apellidos</option>

                        </select>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar..." id="termino_usuarios">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="btn_search_usuarios"><i
                                    class="glyphicon glyphicon-search"></i>
                            </button>
                          </span>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="progress" id="progress_bar_usuarios">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span class="sr-only">0% Complete (success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <table id="table_search_usuarios" data-height="300" data-sort-name="nombres"
                               data-sort-order="desc" data-page-size="5" data-page-list="[5,10]"
                               class="table-condensed table-hover" data-pagination="true">
                            <thead>
                            <tr>
                                <th data-field="documento" data-align="center" class="cursor-pointer">
                                    Documento
                                </th>
                                <th data-field="nombre" data-align="center" class="cursor-pointer">
                                    Nombres
                                </th>
                                <th data-field="apellido" data-align="center" class="cursor-pointer">
                                    Apellidos
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal busqueda del libro-->

<div class="modal fade" id="modal_libros" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Busqueda de libro</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2">Filtrar por</div>
                    <div class="col-sm-4">
                        <select class="form-control" id="campo_libros">
                            <option value="titulo">Titulo</option>
                            <option value="isbn">ISBN</option>

                        </select>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar..." id="termino_libros">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="btn_search_libros"><i
                                    class="glyphicon glyphicon-search"></i>
                            </button>
                          </span>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="progress" id="progress_bar_libros">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span class="sr-only">0% Complete (success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <table id="table_search_libros" data-height="300" data-sort-name="nombre"
                               data-sort-order="desc" data-page-size="5" data-page-list="[5,10]"
                               class="table-condensed table-hover" data-pagination="true">
                            <thead>
                            <tr>
                                <th data-field="titulo" data-align="center" class="cursor-pointer">
                                    TITULO
                                </th>
                                <th data-field="isbn" data-align="center" class="cursor-pointer">
                                    ISBN
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')}
        });

        var searchComponent = function (entidad, url) {
            this.entidad = entidad;
            this.url = url

            var elements = {
                entidad : this.entidad,
                modal: $('#modal_' + this.entidad),
                campo_busqueda: $('#search_' + this.entidad),
                termino: $('#termino_' + this.entidad),
                campo: $('#campo_' + this.entidad),
                btn_search: $('#btn_search_' + this.entidad),
                tabla: $('#table_search_' + this.entidad),
                url: this.url,
                progress_bar: $('#progress_bar_' + this.entidad),
                name_input: $('#' + this.entidad.substring(0, this.entidad.length - 1) + '_id')
            };
            elements.progress_bar.hide();
            elements.tabla.hide();

            elements.campo_busqueda.focus(function () {
                elements.modal.modal('show');
            });


            elements.btn_search.click(function () {
                var field = elements.campo.val();
                var input = elements.termino.val();
                if (input) {
                    $.ajax({
                        method: "GET",
                        url: elements.url,
                        data: {campo: field, termino: input},
                        async: true,
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.addEventListener("progress", function (evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = (evt.loaded / evt.total) * 100;
                                        elements.progress_bar.find('.progress-bar').css({ "width": percentComplete + "%" });
                                        if (percentComplete === 100) {
                                            elements.progress_bar.hide();
                                        }
                                    }
                                },
                                false);
                            return xhr;
                        },
                        success: function (result) {
                            elements.tabla.bootstrapTable('destroy');
                            elements.tabla.hide();

                            elements.tabla.bootstrapTable({
                                data: result
                            })
                                .on('click-row.bs.table', function (e, row, $element) {
                                    var data = row;
                                    elements.name_input.val(data.id);
                                    if (elements.entidad === 'usuarios') {
                                        elements.campo_busqueda.val(data.nombre + " " + data.apellido);
                                    } else if (elements.entidad === 'libros') {
                                        elements.campo_busqueda.val(data.titulo);
                                    }
                                    elements.modal.modal('hide');

                                });
                            elements.tabla.show();

                        },
                        error: function () {
                            elements.tabla.modal('hide');
                            alert("Ha ocurrido un error. Intentelo otra vez!");
                        },
                        beforeSend: function (xhr) {
                            elements.progress_bar.show();
                        }
                    });

                    elements.modal.on('hidden.bs.modal', function (e) {
                        elements.tabla.bootstrapTable('destroy');
                        elements.tabla.hide();
                        elements.termino.val("");
                    });
                }
            });
        };


        searchComponent('usuarios', '{{url("biblioteca/consultar/usuarios")}}');
        searchComponent('libros', '{{url("biblioteca/consultar/libros")}}');

    });

</script>
@stop