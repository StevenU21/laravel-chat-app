@extends('layouts.panel')
@section('title', 'Conversaciones')

@section('content')
    {{-- <div class="card shadow-lg mx-4">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('img/team-1.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Celimar Castillo
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Programación
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">

                </div>
            </div>
        </div>
    </div> --}}
    @livewire('chat.main')
@endsection
