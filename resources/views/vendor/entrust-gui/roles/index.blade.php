@extends(Config::get('entrust-gui.layout'))
@section('content')
<div class="models--actions">
    <a class="btn btn-labeled btn-success" href="{{ route('entrust-gui::roles.create') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
</div>
<br>
<table class="table table-hover" style="margin-top:8px">
    <tr>
        <th>Nombre</th>
        <th>Acción</th>
    </tr>
    @foreach($models as $model)
        <tr>
            <td>{{ $model->name }}</th>
            <td class="col-xs-3">
                <form action="{{ route('entrust-gui::roles.destroy', $model->id) }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::roles.edit', $model->id) }}"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <button type="submit" class="btn btn-labeled btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<div class="text-center">
    {!! $models->render() !!}
</div>
@endsection
