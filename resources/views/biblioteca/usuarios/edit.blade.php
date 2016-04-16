@extends('master')

@section('contenido')
<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">ACTULIZAR USUARIO</div>
    <div class="panel-body">
        {!! Form::model($usuario, ['method' => 'PATCH', 'action'=>['UsuarioController@update', $usuario->id], 'class' =>
        'form-horizontal', 'id' => 'formUsuariosUpdate']) !!}
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
            {!! Form::label('direccion', 'Dirección ', ['class' => 'col-sm-2 control-label']) !!}
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
            {!! Form::label('perfil', 'Perfil ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                <select name="perfil" class="form-control">
                    <option value="">Seleccione</option>
                    @if($usuario->perfil == 'Estudiante')
                        <option value="Estudiante" selected="Estudiante">Estudiante</option>
                        <option value="Docente">Docente</option>
                    @else
                        <option value="Estudiante">Estudiante</option>
                        <option value="Docente" selected="Docente">Docente</option>
                    @endif

                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('estado', 'Estado ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9">
                <select name="estado" class="form-control">
                    <option value="">Seleccione</option>

                    @if($usuario->estado == 'ACTIVO')
                    <option value="ACTIVO" selected="">ACTIVO</option>
                    <option value="INACTIVO">INACTIVO</option>
                    @else
                    <option value="ACTIVO" >ACTIVO</option>
                    <option value="INACTIVO" selected="">INACTIVO</option>
                    @endif
                </select>
            </div>
        </div>
        <hr style="background: #ccc; height: 3px">
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-2">
                {!! Form::submit('ACTUALIZAR', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        @if(Session::has('datosExistente'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Ya hay un usuario con esos datos, verifiquelos
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
