@extends('Layouts.App')


@section('title')
    {{ config('app.name') }} - Configuración
@endsection


@section('content')
    @switch($type)
        @case(1)
            @php
                $opcion = 'Paises';
            @endphp
        @break

        @case(2)
            @php
                $opcion = 'Ciudades';
            @endphp
        @break

        @case(3)
            @php
                $opcion = 'Roles';
            @endphp
        @break

        @case(4)
            @php
                $opcion = 'Usuarios';
            @endphp
        @break

        @case(5)
            @php
                $opcion = 'Mesas';
            @endphp
        @break

        @case(6)
            @php
                $opcion = 'Inventario';
            @endphp
        @break

        @case(7)
            @php
                $opcion = 'Pagos';
            @endphp
        @break

        @case(8)
            @php
                $opcion = 'Cobros';
            @endphp
        @break

        @case(9)
            @php
                $opcion = 'Cajas';
            @endphp
        @break

        @case(10)
            @php
                $opcion = 'Promociones';
            @endphp
        @break

        @case(11)
            @php
                $opcion = 'Preparaciones';
            @endphp
        @break

        @case(12)
            @php
                $opcion = 'Música';
            @endphp
        @break
        
        @case(13)
            @php
                $opcion = 'Producto';
            @endphp
        @break

        @case(14)
            @php
                $opcion = 'Categorias';
            @endphp
        @break

        @default
    @endswitch

    <p class="h1 my-5 text-center">Configuración {{ $opcion }}</p>

    <div class="container">
        <x-configuration-table :type="$type" :information="$information" :block="$block" :currenCash="$currenCash" />
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('js/configuration/configuration.js') }}"></script>
@endpush
