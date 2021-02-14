@extends('layouts.app2')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>JM</b>PROGRAMMING</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                ¿Olvidaste tu contraseña? Aquí puede recuperar fácilmente una nueva contraseña.</p>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="input-group mb-3">

                        <input id="email" type="email" placeholder="Ingresa tu correo electronico" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        </div>        
                        @enderror

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Enviar enlace de restablecimiento de contraseña') }}
                            </button>
                        </div>
                    </div>
                    <p class="mt-3 mb-1">
                        <a href="{{route('login') }}">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

