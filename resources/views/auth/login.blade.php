@extends('layouts.form')

@section('title', 'Iniciar Sesion')

@section('content')
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    @include('components.auth.login')
                    <div class="card-body">
                        @include('components.auth.errors')
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" placeholder="Correo" type="email" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" placeholder="Contraseña" type="password" name="password"
                                    required autocomplete="current-password">
                            </div>
                            <div class="form-check form-switch">
                                <input name="remember" class="form-check-input" id="remember" type="checkbox"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="rememberMe">Recordar Contraseña</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Iniciar Sesión</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">No tienes una cuenta? <a href="{{ route('register') }}"
                                    class="text-dark font-weight-bolder">Registrarse</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
