@extends('layouts.form')

@section('title', 'Registrate')

@section('content')
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    @include('components.auth.login')
                    <div class="card-body">
                        @include('components.auth.errors')
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            {{-- <div class="mb-3">
                                <label for="profile_img" class="form-label">Imagen de Perfil:</label>
                                <input type="file" name="file" class="form-control" id="profileImg">
                            </div> --}}

                            <div class="mb-3">
                                <input class="form-control" placeholder="Nombre" type="text" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" placeholder="Correo" type="email" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" placeholder="Contraseña" type="password" name="password"
                                    required autocomplete="new-password">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" placeholder="Confirmar Contraseña" type="password"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Registrarse</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">Ya tienes una cuenta? <a href="{{ route('login') }}"
                                    class="text-dark font-weight-bolder">Iniciar Sesión</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
