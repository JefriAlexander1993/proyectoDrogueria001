@extends(Config::get('entrust-gui.layout'))
@section('content')
<div class="models--actions">
    
    <a class="btn btn-labeled btn-success" href="{{ route('entrust-gui::users.create') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
  
  
  </div>

<table class="table table-hover" style="margin-top:8px">
  <tr>
    <th>Email</th>
    <th>Acción</th>
  </tr>
  @foreach($users as $user)
    <tr>
      <td>{{ $user->email }}</th>
      <td class="col-xs-3">
        <form action="{{ route('entrust-gui::users.destroy', $user->id) }}" method="post">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::users.edit', $user->id) }}"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <button type="submit" class="btn btn-labeled btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </form>
      </td>
    </tr>
  @endforeach
</table>
<div class="text-center">
  {!! $users->render() !!}
</div>
@endsection
