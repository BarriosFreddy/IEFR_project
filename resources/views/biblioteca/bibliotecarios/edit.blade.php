@extends('master')
@section('contenido')
<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">ACTUALIZAR BIBLIOTECARIO</div>
    <div class="panel-body">
        {!! Form::model($user, ['method' => 'PATCH', 'action'=>['UserController@update', $user->id], 'class' =>
        'form-horizontal', 'id' => 'formUsersUpdate']) !!}
        {!! Form::hidden('password', null, ['class' => 'form-control']) !!}


        <div class="form-group">
            {!! Form::label('documento', 'Documento ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('documento', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('nombre', 'Nombres ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('apellido', 'Apellidos ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('direccion', 'Direccion ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Correo electrónico ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('rol', 'Rol ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                <select name="rol" class="form-control">
                    <option value="">Seleccione</option>

                    @if($user->rol == 'administrador')
                    <option value="administrador" selected="">Administardor</option>
                    <option value="bibliotecario">Bibliotecario</option>
                    @else
                    <option value="administrador">Administardor</option>
                    <option value="bibliotecario" selected="">Bibliotecario</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('estado', 'Estado ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                <select name="estado" class="form-control">
                    <option value="">Seleccione</option>

                    @if($user->estado == 'ACTIVO')
                    <option value="ACTIVO" selected="">ACTIVO</option>
                    <option value="INACTIVO">INACTIVO</option>
                    @else
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="INACTIVO" selected="">INACTIVO</option>
                    @endif
                </select>
            </div>
        </div>
        <hr style="background: #ccc; height: 3px;"/>

        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-2">
                {!! Form::submit('ACTUALIZAR', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        @if(Session::has('datosExistente'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            Ya hay un usuario con esos datos, verifiquelos
        </div>
        @endif
    </div>
</div>
@stop
