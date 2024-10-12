@extends('site.main')
@section('title', 'Blog | Serviços')

<x-navbar></x-navbar>

@section('content')

    <div class="text-2xl font-bold text-center py-10">
        <h1>Services</h1>
    </div>
    <div class="w-full max-w-6xl m-auto">
        <x-primary-button>
            <a href="{{ route('create-services') }}">Criar Serviço</a>
        </x-primary-button>

        <table class="min-w-full mt-10 divide-y divide-gray-200 bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parcelamento
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagem</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($services as $service)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $service->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $service->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">R$
                            {{ number_format($service->price, 2, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($service->installment_options)
                                @php
                                    $installments = json_decode($service->installment_options, true);
                                @endphp
                                {{ $installments['total_installments'] ?? 0 }} parcelas de R$
                                {{ number_format($installments['installment_value'] ?? 0, 2, ',', '.') }}
                            @else
                                Não disponível
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($service->image_path)
                                <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->name }}"
                                    class="h-16 w-16 rounded-full object-cover">
                            @else
                                Sem imagem
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
