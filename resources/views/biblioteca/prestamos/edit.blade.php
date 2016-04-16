@extends('master')

@section('contenido')
<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">REALIZAR DEVOLUCIÓN</div>
    <div class="panel-body">
	{!! Form::model($prestamo, ['method' => 'PATCH', 'action'=>['PrestamoController@update', $prestamo->id], 'class' => 'form-horizontal']) !!}
	{!! Form::hidden('estado') !!}
	{!! Form::hidden('fecha_entrega') !!}
    {!! Form::hidden('user_id') !!}
        {!! Form::hidden('usuario_id') !!}
        {!! Form::hidden('libro_id') !!}

	<div class="form-group">
		{!! Form::label('usuario_id', 'Usuario ', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-9">

				@foreach($usuarios as $usuario)
					@if($usuario->id == $prestamo->usuario_id)
                <input type="text" class="form-control" value="{{$usuario->nombre}} {{$usuario->apellido}}" readonly="readonly"/>

					@endif
				@endforeach
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('libro_id', 'Libro ', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-9">
				@foreach($libros as $libro)
					@if($libro->id == $prestamo->libro_id)
                <input type="text" class="form-control" value="{{$libro->titulo}}" readonly="readonly"/>
					@endif
				@endforeach
		</div>
	</div>


	<div class="form-group">
		{!! Form::label('fecha_devolucion_max', 'Fecha de devolución esperada', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::text('fecha_devolucion_max', null, ['class' => 'form-control', 'readonly' ]) !!}
		</div>

		{!! Form::label('fecha_devolucion', 'Fecha de devolución ', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::text('fecha_devolucion', $fecha, ['class' => 'form-control', 'readonly']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('comentario', 'Comentario', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::textarea('comentario', null, ['class' => 'form-control']) !!}
		</div>
	</div>
        <hr style="background: #ccc; height: 3px;" />

        <div class="form-group">
        <div class="col-sm-3 col-sm-offset-2">
            {!! Form::submit('REALIZAR', ['class' => 'btn btn-primary form-control']) !!}
        </div>
	</div>
	{!! Form::close() !!}

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
