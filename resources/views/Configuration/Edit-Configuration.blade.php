@extends('Layouts.App')

@section('title')
    @switch($type)
        @case(1)
            {{ config('app.name') }} - Editar País
        @break

        @case(2)
            {{ config('app.name') }} - Editar Ciudad
        @break

        @case(3)
            {{ config('app.name') }} - Editar Rol
        @break

        @case(4)
            {{ config('app.name') }} - Editar Usuario
        @break

        @case(5)
            {{ config('app.name') }} - Editar Mesa
        @break

        @case(6)
            {{ config('app.name') }} - Editar Inventario
        @break

        @case(7)
            {{ config('app.name') }} - Editar Pago
        @break

        @case(8)
            {{ config('app.name') }} - Editar Cobro
        @break

        @case(9)
            {{ config('app.name') }} - Editar Caja
        @break

        @case(10)
            {{ config('app.name') }} - Editar Promoción
        @break

        @case(11)
            {{ config('app.name') }} - Editar Preparación
        @break

        @case(12)
            {{ config('app.name') }} - Editar Música
        @break

        @case(13)
            {{ config('app.name') }} - Editar Productos
        @break
        
        @case(14)
            {{ config('app.name') }} - Editar Categorias
        @break
        
        @case(15)
            {{ config('app.name') }} - Editar Tipo De Pago
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
                        <h5 class="mb-0">Editar País</h5>
                    @break

                    @case(2)
                        <h5 class="mb-0">Editar Ciudad</h5>
                    @break

                    @case(3)
                        <h5 class="mb-0">Editar Rol</h5>
                    @break

                    @case(4)
                        <h5 class="mb-0">Editar Usuario</h5>
                    @break

                    @case(5)
                        <h5 class="mb-0">Editar Mesa</h5>
                    @break

                    @case(6)
                        <h5 class="mb-0">Editar Inventario</h5>
                    @break

                    @case(7)
                        <h5 class="mb-0">Editar Pagos</h5>
                    @break

                    @case(8)
                        <h5 class="mb-0">Editar Cobros</h5>
                    @break

                    @case(9)
                        <h5 class="mb-0">Editar Caja</h5>
                    @break

                    @case(10)
                        <h5 class="mb-0">Editar Promoción</h5>
                    @break

                    @case(11)
                        <h5 class="mb-0">Editar Preparación</h5>
                    @break

                    @case(12)
                        <h5 class="mb-0">Editar Música</h5>
                    @break
                    
                    @case(13)
                        <h5 class="mb-0">Editar Producto</h5>
                    @break
                    
                    @case(14)
                        <h5 class="mb-0">Editar Categoria</h5>
                    @break

                    @case(15)
                        <h5 class="mb-0">Editar Tipos De Pago</h5>
                    @break

                    @case(16)
                        <h5 class="mb-0">Editar Proveedores</h5>
                    @break

                    @default
                @endswitch
            </div>

            <div class="card-body">
                <x-edit-form-component :type="$type" :id="$id" :cities="$cities" :countries="$countries" :roles="$roles" :products="$products" :suppliers="$suppliers" :users="$users" :information="$information" :categories="$categories" :tables="$tables" :paymentTypes="$paymentTypes" />
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

    </div>
@endsection
