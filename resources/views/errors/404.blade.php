@extends('Layouts.App')

@section('title')
    {{ config('app.name') }} - Error 404
@endsection

@section('content')
<div class="container mt-5 text-bat">
    <section>
        <div class="d-flex align-items-center gap-2 mb-3">
            <img src="{{ asset('images/icons/404/home.svg') }}" alt="Icono home">
            <span>/</span>
            <p class="mb-0 text__color">Error 404</p>
        </div>
        <a href="/home" class="d-flex gap-1 align-center text-decoration-none text-black">
            <img src="{{ asset('images/icons/404/chevron-left-normal.svg') }}" alt="Icono flecha atrás">
            <p class="mb-0">Atrás</p>
        </a>
    </section>
    <section class="col-12 col-md-12 col-lg-8 mx-auto d-flex justify-content-center flex-column text-center">
        <div class="col-lg-8 mx-auto">
            <p class="text__color text__404--title title-text-bat">¡Ooooops!</p>
            <p class="text__404--p text-bat">Algo salió mal, no podemos encontrar <br>
                el recurso que buscas</p>
        </div>
        <img loading="lazy" src="{{ asset('images/icons/404/Ilustration.png') }}" alt="Imagen de error 404"
            class="img-fluid">
    </section>
</div>
@endsection