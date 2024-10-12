@extends('site.main')
@section('title', 'Blog | TH')

<x-navbar></x-navbar>

@section('content')

<div class="text-2xl font-bold text-center py-10">
    <h1>Criar Serviços</h1>
</div>
<div class="w-full max-w-6xl m-auto">
    <form class="grid gap-5 p-2" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nome do Serviço</label>
        <input type="text" name="name" id="name" required>
    
        <label for="description">Descrição</label>
        <textarea name="description" id="description"></textarea>
    
        <label for="price">Preço</label>
        <input type="number" name="price" id="price" step="0.01" required>
    
        <label for="image">Imagem do Serviço</label>
        <input type="file" name="image" id="image">
    
        <label for="installment_options">Opções de Parcelamento</label>
        <input type="text" name="installment_options[total_installments]" placeholder="Número de Parcelas">
        <input type="text" name="installment_options[installment_value]" placeholder="Valor por Parcela">
        <input type="text" name="installment_options[interest_rate]" placeholder="Taxa de Juros (%)">
    
        <label for="custom_fields">Campos Dinâmicos</label>
        <input type="text" name="custom_fields[0][field_name]" placeholder="Nome do Campo">
        <input type="text" name="custom_fields[0][field_value]" placeholder="Valor do Campo">
    
        <button class="bg-gray-900 text-white p-2" type="submit">Salvar Serviço</button>
    </form>
</div>