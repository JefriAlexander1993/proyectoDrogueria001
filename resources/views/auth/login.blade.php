@extends('layouts.app2')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>JM</b>PROGRAMMING</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Ingresa los datos para iniciar sesión.</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                    <div class="input-group-append">
                    
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
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                    <div class="input-group-append">
                    
                        @error('password')
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-7">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-5">

                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="col-sm-8">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('
                                        Olvidaste tu contraseña?') }}
                        </a>
                        @endif

                    </div>
                </div>



            </form>
        </div>
    </div>
</div>

@endsection

