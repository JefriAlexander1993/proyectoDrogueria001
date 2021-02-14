<div class="row">
    <div class="col-sm-6">
        <div class="form-group ">
            {!! Form::label('name_user','Nombre(*).')!!}
            {!!Form::text('name_user',null,['class'=>'form-control','title'=>'Nombre del usuario','required'=>'required'])!!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group ">
            {!! Form::label('email','Email(*).')!!}
            {!!Form::email('email',null,['class'=>'form-control','title'=>'Correo electronico.','id'=>'email','required'=>'required'])!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password','Contraseña(*).')!!}
            <input class="form-control" id="password" minlength="6" name="password" type="password" title="Ingrese la contraseña si desea cambiarla" placeholder="******">
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>
                    {{ $errors->first('password') }}
                </strong>
            </span>
            @endif

        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('password-confirm','Confirmar contraseña(*).')!!}
            <input class="form-control" id="password-confirm" minlength="6" name="password_confirmation" title="Confirme la contraseña" type="password" placeholder="******">

        </div>
    </div>
</div>
<div class="card-footer bg-transparent ">
    {!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'class'=>'btn btn-success btn-lg btn-block', 'id'=>'btn_create_sale' ))!!}
</div>
