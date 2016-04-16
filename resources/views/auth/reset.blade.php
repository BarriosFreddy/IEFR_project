@extends('master')

@section('contenido')

<div class="panel panel-border main-layout">
    <div class="panel-heading panel-customized">CAMBIAR CONTRASEÑA</div>
    <div class="panel-body">
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            La contraseña actual no es la correcta.
        </div>
        @endif
        @if(Session::has('error_general'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Algo anda mal intenta de nuevo.
        </div>
        @endif

        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            La contraseña fue modificada exitosamente.
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Hay campos vacios que son obligatorios y/o datos mal diligenciados.
        </div>
        @endif
        {!!Form::open(['route'=>'biblioteca.password.store', 'method'=>'POST', 'class'=>'form-horizontal', 'id' => 'passwordForm'])!!}

        <input type="hidden" name="id_user" value="{{ Auth::user()->id}}"/>
            <div class="form-group">
                 <label class="col-md-4 control-label">Contraseña actual</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" name="current_password" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Contraseña nueva</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" id="new_password" name="new_password">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Confirmar contraseña</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Guardar cambios
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@stop

@section('js')
<script type="text/javascript">
    $(function(){
       $('#passwordForm').validate({
           rules: {
               current_password: "required",
               new_password: "required",
               password_confirmation: {
                   required: true,
                   equalTo: "#new_password"
               }
           },
           messages: {
               current_password: "La contraseña actual es obligatoria",
               new_password: "La nueva contraseña es obligatoria",
               password_confirmation: {
                 equalTo: "Las contraseñas no coinciden",
                   required: "La confirmación de la contraseña es obligatoria"
               }
           }
       })
    });

</script>
@stop