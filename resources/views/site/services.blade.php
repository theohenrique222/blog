@extends('site.main')
@section('title', 'Blog | Serviços')

<x-navbar></x-navbar>

@section('content')

    <div class="text-2xl font-bold text-center py-10">
        <h1>Services</h1>
    </div>
    <div class="w-full max-w-6xl m-auto text-center">
        <x-primary-button>
            <a href="{{ route('create-services') }}">Criar Serviço</a>
        </x-primary-button>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
            @foreach ($services as $service)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <!-- Imagem do serviço -->
                    @if ($service->image_patch)
                        <img src="{{ asset('storage/' . $service->image_patch) }}" alt="{{ $service->name }}"
                            class="h-48 w-full object-cover">
                    @else
                        <div class="h-48 w-full bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Sem imagem</span>
                        </div>
                    @endif

                    <!-- Conteúdo do card -->
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $service->name }}</h2>
                        <p class="text-gray-600 mt-2">{{ $service->description }}</p>
                        <p class="text-lg font-semibold text-gray-800 mt-4">
                            R$ {{ number_format($service->price, 2, ',', '.') }}
                        </p>

                        <!-- Parcelamento -->
                        <div class="mt-2 text-gray-600">
                            @if ($service->installment_options)
                                @php
                                    $installments = json_decode($service->installment_options, true);
                                @endphp
                                <p>{{ $installments['total_installments'] ?? 0 }}x de R$
                                    {{ number_format($installments['installment_value'] ?? 0, 2, ',', '.') }}
                                </p>
                            @else
                                <p>Parcelamento não disponível</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection