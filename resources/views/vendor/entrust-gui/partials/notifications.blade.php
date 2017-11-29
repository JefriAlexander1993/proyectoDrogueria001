
<div class="row">
@if (isset($errors) && count($errors->all()) > 0)

  <div class="col-sm-12">
		<div class="alert alert-danger alert-dissmissable text-center" role="alert" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			
			<h5><i class="fa fa-exclamation-circle" aria-hidden="true"></i><strong>Error!</strong>Alguno(s) de los campos a llenar esta vacio.
		 </h5>
		    
		</div>
	</div>

@endif
</div>



@if(Session::has('info'))
<!-- <div class="col-sm-12"> -->
<div class="alert alert-info alert-dissmissable text-center" role="alert">

<button type="button" class="close" data-dismiss="alert">
&times;
</button>
<h5><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;{{Session::get('info')}}</h5>
@endif 
</div></div>
@if(Session::has('danger'))
<div class="col-sm-12">
<div class="alert alert-danger alert-dissmissable text-center">
<button type="button" class="close" data-dismiss="alert">
&times;
</button>
</h3><i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{Session::get('danger')}}</h3>
@endif 
</div></div>
