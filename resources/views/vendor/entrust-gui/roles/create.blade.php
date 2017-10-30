@extends(Config::get('entrust-gui.layout'))
@section('content')
<form action="{{ route('entrust-gui::roles.store') }}" method="post" role="form">
    @include('entrust-gui::roles.partials.form')
    <button type="submit" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;</span>{{ trans('entrust-gui::button.create') }}</button>
    <a class="btn btn-labeled btn-warning" href="{{ route('entrust-gui::roles.index') }}"><span class="btn-label"><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;</span>{{ trans('entrust-gui::button.cancel') }}</a>
</form>
@endsection
