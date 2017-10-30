@extends(Config::get('entrust-gui.layout'))
@section('content')
<form action="{{ route('entrust-gui::permissions.update', $model->id) }}" method="post" role="form">
<input type="hidden" name="_method" value="put">
  @include('entrust-gui::permissions.partials.form')
  <button type="submit" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>{{ trans('entrust-gui::button.save') }}</button>
  <a class="btn btn-labeled btn-warning" href="{{ route('entrust-gui::permissions.index') }}"><span class="btn-label"><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;</span>{{ trans('entrust-gui::button.cancel') }}</a>
</form>
@endsection
