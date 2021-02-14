<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Bienvenido</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>

    <header class="header" id="header">
        <div class="contenedor-logo" id="contenedor-logo">
            <a href="" class="logo" id="logo"><i class="fas fa-code"></i><span>JM Programming</span></a>
        </div>
        <div class="botones-header" id="botones-header">
            @if (Route::has('login'))
            <div class="">
                @auth
                <a href="{{ url('/home') }}">Home<span class="sr-only">(current)</span></a>
                @else
                <a href="{{ route('login') }}">Login<span class="sr-only">(current)</span></a>
                <a href="{{ url('/register') }}">Registro<span class="sr-only">(current)</span></a>

                @endauth
            </div>
            @endif


        </div>
    </header>

    <!-- 
      <div class="modal">
          <div class="modal-container">
              <div class="modal-left">
                  <h1 class="modal-title">Bienvenidos!</h1>
                  <p class="modal-desc">Por favor digitalizar el email y la contraseña para insegrar al sistema.</p>

                    <form method="POST" action="{{ route('login') }}">
                       @csrf
                    
                            <label for="email" class="input-label">{{ __('E-Mail Address') }}</label>

                            <div class="input-block">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                        
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                         <div class="input-block">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        
                        </div>
                          <div class="modal-buttons">
                            <a href="" class="">¿Olvidaste tu contraseña?</a>
                            <button class="input-button btn-block">Login</button>
                          </div>
                    </form> 
                    <p class="sign-up">¿No tienes una cuenta?<a href="#" id="btn-registro-login"> Regístrate ahora</a></p>
              </div>
                    <div class="modal-right">
                        <img src="{{ asset('assets/img/auth.jpeg') }}" alt="">
                    </div>
                    <button class="icon-button close-button">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                            <path d="M 25 3 C 12.86158 3 3 12.86158 3 25 C 3 37.13842 12.86158 47 25 47 C 37.13842 47 47 37.13842 47 25 C 47 12.86158 37.13842 3 25 3 z M 25 5 C 36.05754 5 45 13.94246 45 25 C 45 36.05754 36.05754 45 25 45 C 13.94246 45 5 36.05754 5 25 C 5 13.94246 13.94246 5 25 5 z M 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.980469 15.990234 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 z"></path>
                         </svg>
                    </button>
          </div>
      </div>
      <div class="modal" id="modal-registro">
          <div class="modal-container">
              <div class="modal-left">
                <h1 class="modal-title">Bienvenidos!</h1>
                <p class="modal-desc">Digitalizar los datos requeridos para crear el usuario.</p>
                <form method="POST" action="{{ route('register') }}">
                       @csrf
                 <div class="input-block">
                  <label for="name" class="input-label">Nombre</label>
                  <input type="text" name="name" id="name" placeholder="Name">
                </div>
                <div class="input-block">
                  <label for="email" class="input-label">Email</label>
                  <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="input-block">
                  <label for="password" class="input-label">Password</label>
                  <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="modal-buttons">
                  <button class="input-button btn-block">Registro</button>
                </div>
                  </form> 
              </div>
              <div class="modal-right">
                <img src="{{ asset('assets/img/auth.jpeg') }}" alt="">
              </div>
              <button class="icon-button close-button" id="model-close">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                    <path d="M 25 3 C 12.86158 3 3 12.86158 3 25 C 3 37.13842 12.86158 47 25 47 C 37.13842 47 47 37.13842 47 25 C 47 12.86158 37.13842 3 25 3 z M 25 5 C 36.05754 5 45 13.94246 45 25 C 45 36.05754 36.05754 45 25 45 C 13.94246 45 5 36.05754 5 25 C 5 13.94246 13.94246 5 25 5 z M 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.980469 15.990234 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 z"></path>
              </svg>
                </button>
          </div>
      </div>-->
    <main >
    
    </main>
  <script src="{{asset('js/welcome.js')}}"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  </body>
</html>
