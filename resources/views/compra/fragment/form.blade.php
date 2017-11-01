
<?php 
 use Illuminate\Support\Facades\DB;
 
?>


<div class="col-sm-12">
<div class="form-group row has-success">
{!! Form::label('codigo_id','Codigo.')!!}
{!!Form::number('codigo_id',null,['class'=>'form-control' , 'placeholder'=>'Ej: 23232'])!!}
</div>
</div>
<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
</div> 

