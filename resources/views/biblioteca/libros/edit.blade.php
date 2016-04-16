@extends('master')

@section('contenido')
<section>
    <div class="panel panel-border main-layout">
        <div class="panel-heading panel-customized">EDITAR LIBRO</div>
        <div class="panel-body">
            {!! Form::model($libro, ['method' => 'PATCH', 'action'=>['LibroController@update', $libro->id], 'class' =>
            'form-horizontal', 'id' => 'formBookUpdate']) !!}
            {!! Form::hidden('fecha_registro') !!}
            <div class="form-group">
                {!! Form::label('titulo', 'Titulo ', ['class' => 'col-sm-2 control-label']) !!}
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
                        <option value="">Seleccionar Idioma...</option>
                        @foreach($idiomas as $idioma)

                        @if( $libro->idioma == $idioma)
                        <option value="{{$idioma}}" selected="">{{$idioma}}</option>
                        @else
                        <option value="{{$idioma}}">{{$idioma}}</option>
                        @endif

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('categoria_id', 'Categoria ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9">
                    <select id="sltCategoria" name="categoria_id" class="form-control">
                        <option value="">Seleccionar categoria...</option>
                        @foreach($categorias as $categoria)
                        @if( $libro->categoria_id == $categoria->id)
                        <option value="{{$categoria->id}}"  selected="">{{$categoria->nombre}}</option>
                        @else
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <!-- Button trigger modal    -->
            </div>
            <div class="form-group">
                {!! Form::label('autor_id', 'Autor ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9">
                    <select name="autor_id" class="form-control">
                        <option value="">Seleccionar Autor...</option>
                        @foreach($autores as $autor)
                            @if( $libro->autor_id == $autor->id)
                            <option value="{{$autor->id}}"  selected="">{{$autor->nombre}} {{$autor->apellido}}</option>
                        @else
                        <option value="{{$autor->id}}">{{$autor->nombre}} {{$autor->apellido}}</option>

                        @endif
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="form-group">
                {!! Form::label('editorial_id', 'Editorial ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9">
                    <select name="editorial_id" class="form-control">
                        <option value="">Seleccionar Editorial...</option>
                        @foreach($editoriales as $editorial)
                            @if( $libro->editorial_id == $editorial->id)
                            <option value="{{$editorial->id}}"  selected="">{{$editorial->nombre}}</option>
                        @else
                        <option value="{{$editorial->id}}">{{$editorial->nombre}}</option>


                        @endif
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="form-group">
                {!! Form::label('ubicacion_id', 'Ubicación ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9">
                    <select name="ubicacion_id" class="form-control">
                        <option value="">Seleccionar Ubicacion...</option>
                        @foreach($ubicaciones as $ubicacion)
                            @if( $libro->ubicacion_id == $ubicacion->id)
                            <option value="{{$ubicacion->id}}"  selected="">{{$ubicacion->nombre}}</option>
                        @else

                        <option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>

                        @endif
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-5 col-sm-offset-2">
                    <fieldset>
                        <legend>Número de paginas</legend>
                        <select id="num_paginas" name="num_paginas" class="form-control">
                            <option value="">Seleccionar Numero de paginas...</option>
                            @for($i=1; $i<=3000; $i++)
                            @if( $libro->num_paginas == $i)
                            <option value="{{$i}}" selected="">{{$i}}</option>
                            @else
                            <option value="{{$i}}">{{$i}}</option>
                            @endif
                            @endfor
                        </select>
                    </fieldset>
                </div>
                <div class="col-sm-4">
                    <fieldset>
                        <legend>Número de ejemplares</legend>

                        <select name="ejemplares" class="form-control">
                            <option value="">Seleccionar Numero de ejemplares...</option>
                            @for($i=1; $i<=100; $i++)
                            @if( $libro->ejemplares == $i)
                            <option value="{{$i}}"  selected="">{{$i}}</option>
                            @else
                            <option value="{{$i}}">{{$i}}</option>
                            @endif
                            @endfor
                        </select>

                    </fieldset>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-5 col-sm-offset-2">
                    <fieldset>
                        <legend>Pais donde fue impreso</legend>
                        <select name="pais_impreso" class="form-control">

                            <option value="">Seleccionar pais...</option>
                            @foreach($paises as $pais)
                            @if( $libro->pais_impreso == $pais)
                            <option value="{{$pais}}"  selected="">{{$pais}}</option>
                            @else
                            <option value="{{$pais}}">{{$pais}}</option>
                            @endif
                            @endforeach
                        </select>
                    </fieldset>

                </div>

                <div class="col-sm-4">
                    <fieldset>
                        <legend>Año de edición</legend>
                        <select name="anho_edicion" class="form-control">
                            <option value="">Seleccionar año de edición...</option>
                            @for($i=1900; $i<=2050; $i++)
                            @if( $libro->anho_edicion == $i)
                            <option value="{{$i}}"  selected="">{{$i}}</option>
                            @else
                            <option value="{{$i}}">{{$i}}</option>
                            @endif
                            @endfor
                        </select>
                    </fieldset>

                </div>
            </div>
            <div class="form-group">
                {!! Form::label('estado', 'Estado ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9">
                    <select name="estado" class="form-control">
                        <option value="">Seleccione</option>

                        @if($libro->estado == 'ACTIVO')
                        <option value="ACTIVO" selected="">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                        @else
                        <option value="ACTIVO" >ACTIVO</option>
                        <option value="INACTIVO" selected="">INACTIVO</option>
                        @endif
                    </select>
                </div>
            </div>
            <hr style="background: #ccc; height: 3px;" />
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-2">
                    {!! Form::submit('MODIFICAR', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            @if(Session::has('datosExistente'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Ya hay un libro con esos datos.
            </div>
            @endif
            @if($errors->any())
            <ul class="alert alert-damage">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</section>
@stop
