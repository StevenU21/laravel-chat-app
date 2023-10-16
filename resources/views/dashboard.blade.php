@extends('layouts.panel')

@section('title', 'Dashboard')
@section('content')
    <div class="col-md-12 mb-4  ">
        <div class="card">
            <div class="card-header">{{ __('Ingresaste al Sistema') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('Siéntete como en Casa eres Bienvenido!') }}
            </div>
        </div>
    </div>
@endsection
