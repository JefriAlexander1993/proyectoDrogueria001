@if (isset($errors) && count($errors->all()) > 0)
<div class="row">
  <div class="col-sm-12 ">
		<div class="alert alert-danger alert-dissmissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>Error: Se ha producido el siguiente error: Alguno de los campos a llenar esta vacio.
		 </h4>
		    
		</div>
	</div>
</div>
@endif


@if ($message = Session::get('success'))
<div class="row">
  <div class="col-sm-10">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>Ha actualizado con éxito.</h4>

		</div>
		{{ Session::forget('success') }}
	</div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="row">
  <div class="col-sm-10">
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{ trans('entrust-gui::flash.error') }}</strong> {{ $message }}
		</div>
		{{ Session::forget('error') }}
	</div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="row">
  <div class="col-sm-10">
		<div class="alert alert-warning alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{ trans('entrust-gui::flash.warning') }}</strong> {{ $message }}
		</div>
		{{ Session::forget('warning') }}
	</div>
</div>
@endif

@if ($message = Session::get('info'))
<div class="row">
  <div class="col-sm-10">
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4>Deje el campo de contraseña en blanco si desea mantenerlo igual.</h4>
		</div>
		{{ Session::forget('info') }}
	</div>
</div>
@endif



