
<div class="row">
<div class="col-sm-6">
<div class="form-group">
{!! Form:: label('valorfinal','Valor final')!!}
{!!Form::number('valorfinal',$sumVenta,['class'=>'form-control','min'=>'1','onkeypress'=>'return soloNumeros(event)','placeholder'=>'300000'])!!}
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
{!!Form:: label('ganancia','Ganancia')!!}
{!!Form::number('ganancia',$ganancia,['class'=>'form-control','onkeypress'=>'return soloNumeros(event)' ,'placeholder'=>'200000','id'=>'ganancia'])!!}
</div>
</div>
</div>

<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}

</div>
