@extends('Layouts.App')

@section('title')
    {{ $title }} {{ $user->name }} {{ $user->last_name }}
@endsection

@push('style-app')
    {{-- <link rel="stylesheet" href="{{ asset('css/configurations/configurations.css') }}"> --}}
@endpush

@section('content')

@if(session('status'))
    <div class="alert alert-{{ session('status') }}">
        {{ session('message') }}
    </div>
@endif

<div class="position-absolute top-50 start-50 translate-middle w-100 px-3">
    <div class="card mx-auto" style="max-width: 30rem;">
        <div class="card-body">
            <h1 class=" card-title text-center">{{ $user->name }} {{ $user->last_name }}</h1>
            <div class="text-center my-3">
                <img src="{{ asset('images/default-avatar.svg') }}" alt="{{ $user->name }} {{ $user->last_name }}" class="rounded-circle" width="150" height="150">
            </div>
            <div class="text-center pt-2">
                <ul class="list-unstyled">
                    <li><a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Cambiar Password</a></li>
                    <li><a class="text-decoration-none" href="#">Editar Información Personal</a></li>
                    <li><a class="text-decoration-none" href="#">Personalizar Perfil</a></li>
                    <li><a class="text-decoration-none" href="#">Soporte</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<x-modals.general-modal-profile title="Cambiar Password" :userId="$user->id" />
@endsection

@push('scripts')
    <script src="{{ asset('js/home/home.js') }}"></script>
@endpush
