@if(Session::has('info'))
<div class="col-md-12">
    <div class="card  card-info">
        <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body text-center">
            {{Session::get('info')}}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


@endif

@if(Session::has('error'))
<div class="col-md-12">
    <div class="card  card-danger">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body text-center">
           {{Session::get('error')}}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endif

@if ($errors->any())
<div class="col-md-12">
    <div class="card  card-danger">
        <div class="card-header">
            <h3 class="card-title">Algo salio mal revisar</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body text center">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        
            @endforeach
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


@endif

