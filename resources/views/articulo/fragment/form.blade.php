	<div class="row">
		<div class="col-sm-4">
			<div class="form-group ">
			{!! Form::label('codigo','Ingrese el codigo(*).')!!}
			{!!Form::number('codigo',null,['class'=>'form-control','title'=>'Ingresa el codigo del articulo','placeholder'=>'Ej: 12345657' ,'min'=>'1', 'onkeypress'=>'return isNumberKey(event)','required'=>'required'])!!}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group  ">
			{!! Form::label('fechafabricacion','Fecha de fabricación(*).')!!}
			{!!Form::date('fechafabricacion',null,['class'=>'form-control', 'title'=>'Elige un fecha de fabricación', 'placeholder'=>'Ej: 23/1/2017','required'=>'required'])!!}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group  ">
			{!! Form::label('fechavencimiento','Fecha de vencimiento(*).')!!}
			{!!Form::date('fechavencimiento',null,['class'=>'form-control', 'title'=>'Elige un fecha de vencimiento', 'placeholder'=>'Ej: 23/10/2017','required'=>'required'])!!}
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="col-sm-4">
			<div class="form-group ">
			{!! Form::label('nombre','Nombre(*).')!!}
			{!!Form::text('nombre',null,['class'=>'form-control','title'=>'Ingresa el nombre del articulo','placeholder'=>'Ej: Acetaminofen','required'=>'required', 'onkeypress'=>'return soloLetras(event)' ,'onKeyUp'=>'this.value = this.value.toUpperCase()','id'=>'nombreArticulo','title'=>'Ingresa el nombre del articulo'])!!}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group ">
			{!! Form::label('preciounitario','Precio unitario(*).')!!}
			{!!Form::number('preciounitario',null,['class'=>'form-control','title'=>'Precio unitario de articulo.','min'=>'1' ,'placeholder'=>'Ej: 1000','required'=>'required', 'onkeypress'=>'return isNumberKey(event)'])!!}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group ">
			{!!Form::label('precioventa','Precio de venta(*).')!!}
			{!!Form::number('precioventa', null,['class'=>'form-control','title'=>'Precio de venta del articulo.','min'=>'1','placeholder'=>'Ej: 1200', 'align'=>'center','required'=>'required','onkeypress'=>'return isNumberKey(event)'])!!}
			</div>
		</div>
	</div>

	<div class="row">	
		<div class="col-sm-4">
			<div class="form-group ">
			{!! Form::label('iva','Iva(*).')!!}
			{!!Form::number('iva',null,['class'=>'form-control','step'=>'0.01','min'=>'1','onkeypress'=>'return isNumberKey(event)', 'required'=>'required','placeholder'=>'Ej: 19', 'title'=>'Si va ingresar decimales que sea con . Ej :14.6'])!!}
			</div>
		</div>

		<div class="col-sm-4">
			<div class="form-group ">
			{!!Form::label('stockmin','Stock minimo(*).')!!}
			{!!Form::number('stockmin',null,['class'=>'form-control','title'=>'Stock minimo de la cantidad del articulo','placeholder'=>'Ej: 20 ','min'=>'1' , 'align'=>'center','required'=>'required','onkeypress'=>'return isNumberKey(event)'])!!}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
			{!! Form::label('proveedor','Proveedor(*).')!!}
			<br/>
			{!!Form::select('proveedor',$proveedores, null,['class'=>'form-control','title'=>'Elige tu proveedor.', 'required'=>'required','name'=>'proveedor','placeholder'=>'Elije un proveedor','id'=>'id_proveedores','style'=>'width:100%'])!!}
			</div>
		</div>
	</div> 

	<div class="card-footer bg-transparent ">
			{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime',  'class'=>'btn btn-success btn-lg btn-block' ))!!}
	</div>

