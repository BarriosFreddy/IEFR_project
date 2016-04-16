@extends('master')

@section('contenido')
<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">ACTUALIZAR AUTOR</div>
    <div class="panel-body">
	{!! Form::model($autor, ['method' => 'PATCH', 'action'=>['AutorController@update', $autor->id],
        'class' => 'form-horizontal', 'id' => 'formAutorUpdate']) !!}

        <div class="form-group">
            {!! Form::label('nombre', 'Nombres ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('nombre', null, ['class' => 'form-control' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('apellido', 'Apellidos ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('apellido', null, ['class' => 'form-control' ]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('pais', 'País ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">


                <select name="pais" class="form-control">

                    <option value="">Seleccionar pais...</option>
                    @foreach($paises as $pais)
                    @if($pais == $autor->pais)
                    <option selected="{{$pais}}" value="{{$pais}}">{{$pais}}</option>
                    @else
                    <option value="{{$pais}}">{{$pais}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('estado', 'Estado: ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                <select name="estado" class="form-control">
                    <option value="">Seleccione</option>

                    @if($autor->estado == 'ACTIVO')
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
            Ya hay una categoria con esos datos, verifique.
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

    @stop
