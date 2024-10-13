@extends('site.main')

@section('title', 'Detalhes do Serviço')
<x-navbar></x-navbar>

@section('content')


    <div class="w-full max-w-2xl m-auto">
        <img src="{{ asset('storage/' . $service->image_patch) }}" alt="Imagem do Serviço" class="mb-4">

        <h1 class="uppercase text-2xl"><strong>{{ $service->name }}</strong></h1>
        <p><strong>Descrição:</strong> {{ $service->description }}</p>
        <p><strong>Preço:</strong> R$ {{ number_format($service->price, 2, ',', '.') }}</p>

        @if ($service->installment_options)
            @php
                $installmentOptions = json_decode($service->installment_options, true);
            @endphp

            <p><strong>Parcelamento:</strong> {{ $installmentOptions['total_installments'] }}x</p>
            <p><strong>Valor da Parcela:</strong> R$ {{ $installmentOptions['installment_value'] ?? 'N/A' }}</p>
            <p><strong>Taxa de Juros:</strong> {{ $installmentOptions['interest_rate'] ?? '0' }}%</p>
        @endif

        @if ($service->custom_fields)
            @php
                $customFields = json_decode($service->custom_fields, true);
            @endphp

            <h3>Campos Personalizados:</h3>
            <ul>
                @foreach ($customFields as $field)
                    <li>{{ $field['field_name'] }}: {{ $field['field_value'] }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
