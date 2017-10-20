
<div class="row">
@if (isset($errors) && count($errors->all()) > 0)

  <div class="col-sm-12">
		<div class="alert alert-danger alert-dissmissable text-center" role="alert" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5><strong>Error!</strong>Alguno(s) de los campos a llenar esta vacio.
		 </h5>
		    
		</div>
	</div>

@endif
</div>

<!-- @if ($message = Session::get('success'))
<div class="row">
  <div class="col-sm-12">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>Ha actualizado con éxito.</h4>

		</div>
		{{ Session::forget('success') }}
	</div>
</div>
@endif
<div class="row">
@if ($message = Session::get('error'))
  <div class="col-sm-12">
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{ trans('entrust-gui::flash.error') }}</strong> {{ $message }}
		</div>
		{{ Session::forget('error') }}
	</div>
@endif
</div>
@if ($message = Session::get('warning'))
<div class="row">
  <div class="col-sm-12">
		<div class="alert alert-warning alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{ trans('entrust-gui::flash.warning') }}</strong> {{ $message }}
		</div>
		{{ Session::forget('warning') }}
	</div>
</div>
@endif -->

@if(Session::has('info'))
<div class="col-sm-12">
<div class="alert alert-info alert-dissmissable text-center" role="alert">
<button type="button" class="close" data-dismiss="alert">
&times;
</button>
<h5>{{Session::get('info')}}</h5>
@endif 
</div></div>
@if(Session::has('danger'))
<div class="col-sm-12">
<div class="alert alert-danger alert-dissmissable text-center">
<button type="button" class="close" data-dismiss="alert">
&times;
</button>
<h3></h3>{{Session::get('danger')}}</h3>
@endif 
</div></div>
