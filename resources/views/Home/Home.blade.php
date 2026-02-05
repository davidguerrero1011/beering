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
                                    <a class="text-primary wihout-underline" data-table="{{ $table->id }}" onclick="showTableDetails({{ $table->id }}, '{{ $table->state }}', {{ Auth::user()->id }});">{{ $table->state }}</a>
                                @elseif($table->state == 'Reservada')
                                    <a class="text-warning wihout-underline" data-table="{{ $table->id }}" onclick="showTableDetails({{ $table->id }}, '{{ $table->state }}', {{ Auth::user()->id }});">{{ $table->state }}</a>
                                @else
                                    <a class="text-danger wihout-underline" data-table="{{ $table->id }}" onclick="showTableDetails({{ $table->id }}, '{{ $table->state }}', {{ Auth::user()->id }});">{{ $table->state }}</a>
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

        @php
            $user = Auth::user()->id;
        @endphp

        <x-modals.general-payment-modal :user="$user" />
        <x-modals.list-products-modal />
        <x-modals.table-states-modal />
    </div>

@endsection
