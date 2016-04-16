@extends('master')

@section('contenido')
<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">REGISTRAR LIBRO</div>
    <div class="panel-body">
        {!! Form::open(['url' => 'biblioteca/libros', 'class' => 'form-horizontal', 'id' => 'formBookCreate']) !!}
        {!! Form::hidden('fecha_registro', date('Y-m-d')) !!}
        <div class="form-group">
            {!! Form::label('titulo', 'Título ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('isbn', 'ISBN ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('isbn', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('idioma', 'Idioma ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                <select id="idioma" name="idioma" class="form-control" onselect="Español">
                    <option value="">Seleccionar...</option>
                    @foreach($idiomas as $idioma)
                    <option value="{{$idioma}}">{{$idioma}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('categoria_id', 'Categoria ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                <select id="selectCategorias" name="categoria_id" class="form-control">
                    <option value="">Seleccionar...</option>
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('autor_id', 'Autor ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                <select name="autor_id" id="selectAutores" class="form-control">
                    <option value="">Seleccionar...</option>
                    @foreach($autores as $autor)
                    <option value="{{$autor->id}}">{{$autor->nombre}} {{$autor->apellido}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('editorial_id', 'Editorial ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                <select name="editorial_id" id="selectEditoriales" class="form-control">
                    <option value="">Seleccionar...</option>
                    @foreach($editoriales as $editorial)
                    <option value="{{$editorial->id}}">{{$editorial->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('ubicacion_id', 'Ubicación ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                <select name="ubicacion_id" id="selectUbicaciones" class="form-control">
                    <option value="">Seleccionar...</option>
                    @foreach($ubicaciones as $ubicacion)
                    <option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5 col-sm-offset-2">
                <fieldset>
                    <legend>Número de paginas</legend>
                    <input type="number" min="1" max="5000" class="form-control" name="num_paginas" id="num_paginas"/>
                </fieldset>
            </div>
            <div class="col-sm-4">
                <fieldset>
                    <legend>Número de ejemplares</legend>
                    <input type="number" min="1" max="100" name="ejemplares" id="ejemplares" class="form-control"/>
                </fieldset>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-5 col-sm-offset-2">
                <fieldset>
                    <legend>Pais donde fue impreso</legend>
                    <select name="pais_impreso" class="form-control">
                        <option value="">Seleccionar...</option>
                        @foreach($paises as $pais)
                        <option value="{{$pais}}">{{$pais}}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="col-sm-4">
                <fieldset>
                    <legend>Año de edición</legend>
                    <input type="number" min="1900" max="{{date('Y')}}" name="anho_edicion" class="form-control">
                </fieldset>
            </div>
        </div>
        <hr style="background: #ccc; height: 3px;" />
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-2">
                {!! Form::submit('REGISTRAR', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        @if(Session::has('datosExistente'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            Ya hay un libro con esos datos.
        </div>
        @endif

    </div>
</div>


@stop
