@extends('Layouts.App')

@section('title')
    {{ config('app.name') }} - Home
@endsection


@section('content')
    <div class="container my-5">
        <div class="row">
            @forelse ($tables as $table)
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="card h-100 text-center">
                        <div class="card-body" style="cursor: pointer;">
                            <h5 class="card-title">{{ $table->table }} {{ $table->number }}</h5>
                            <p class="card-text"><strong>Estado:</strong>
                                @if ($table->state == "Disponible")
                                    <a class="text-primary wihout-underline" onclick="showTableDetails({{ $table->id }}, '{{ $table->state }}');">{{ $table->state }}</a>
                                @elseif($table->state == 'Reservada')
                                    <a class="text-warning wihout-underline" onclick="showTableDetails({{ $table->id }}, '{{ $table->state }}');">{{ $table->state }}</a>
                                @else
                                    <a class="text-danger wihout-underline" onclick="showTableDetails({{ $table->id }}, '{{ $table->state }}');">{{ $table->state }}</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <p class="card-text">Todavia no hay mesas creadas para visualizar.</p>
                        </div>
                    </div>
                </div>
            @endforelse ()
        </div>

        <x-modals.general-payment-modal :id="1" />
    </div>

@endsection
