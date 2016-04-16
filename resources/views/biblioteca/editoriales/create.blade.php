@extends('master')

@section('contenido')
<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">REGISTRAR EDITORIAL</div>
    <div class="panel-body">
        {!! Form::open(['url' => 'biblioteca/editoriales', 'class' => 'form-horizontal', 'id' => 'formEditorialesCreate']) !!}
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
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
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Ya hay una editorial con esos datos, verifique.
        </div>
        @endif
    </div>
</div>

@stop
