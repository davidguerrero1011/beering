@extends('Layouts.App')

@section('title')
    @switch($type)
        @case(1)
            {{ config('app.name') }} - Crear País
        @break

        @case(2)
            {{ config('app.name') }} - Crear Ciudad
        @break

        @case(3)
            {{ config('app.name') }} - Crear Rol
        @break

        @case(4)
            {{ config('app.name') }} - Crear Usuario
        @break

        @case(5)
            {{ config('app.name') }} - Crear Mesa
        @break

        @case(6)
            {{ config('app.name') }} - Crear Inventario
        @break

        @case(7)
            {{ config('app.name') }} - Crear Pago
        @break

        @case(8)
            {{ config('app.name') }} - Crear Cobro
        @break

        @case(9)
            {{ config('app.name') }} - Crear Caja
        @break

        @case(10)
            {{ config('app.name') }} - Crear Promoción
        @break

        @case(11)
            {{ config('app.name') }} - Crear Preparación
        @break

        @case(12)
            {{ config('app.name') }} - Crear Música
        @break

        @default
    @endswitch
@endsection

@push('style-app')
    <link rel="stylesheet" href="{{ asset('css/configurations/configurations.css') }}">
@endpush

@section('content')
    <div class="container py-4 mt-5">
        <div class="card shadow rounded-4">
            <div class="card-header bg-dark text-white rounded-top-4">
                @switch($type)
                    @case(1)
                        <h5 class="mb-0">Crear País</h5>
                    @break

                    @case(2)
                        <h5 class="mb-0">Crear Ciudad</h5>
                    @break

                    @case(3)
                        <h5 class="mb-0">Crear Rol</h5>
                    @break

                    @case(4)
                        <h5 class="mb-0">Crear Usuario</h5>
                    @break

                    @case(5)
                        <h5 class="mb-0">Crear Mesa</h5>
                    @break

                    @case(6)
                        <h5 class="mb-0">Crear Inventario</h5>
                    @break

                    @case(7)
                        <h5 class="mb-0">Crear Pago</h5>
                    @break

                    @case(8)
                        <h5 class="mb-0">Crear Cobro</h5>
                    @break

                    @case(9)
                        <h5 class="mb-0">Crear Pago</h5>
                    @break

                    @case(10)
                        <h5 class="mb-0">Crear Promoción</h5>
                    @break

                    @case(11)
                        <h5 class="mb-0">Crear Preparación</h5>
                    @break

                    @case(12)
                        <h5 class="mb-0">Crear Música</h5>
                    @break
                    
                    @case(13)
                        <h5 class="mb-0">Crear Productos</h5>
                    @break

                    @case(14)
                        <h5 class="mb-0">Crear Categorias</h5>
                    @break

                    @case(15)
                        <h5 class="mb-0">Crear Tipos de Pago</h5>
                    @break

                    @case(16)
                        <h5 class="mb-0">Crear Proveedor</h5>
                    @break

                    @default
                @endswitch
            </div>

            <div class="card-body">
                <x-general-form :type="$type" :cities="$cities" :countries="$countries" :roles="$roles" :products="$products" :suppliers="$suppliers" :users="$users" :tables="$tables" :categories="$categories" :paymentTypes="$paymentTypes"/>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

    </div>
@endsection
