@extends('site.main')
@section('title', 'Blog | TH')

<x-navbar></x-navbar>

@section('content')

    <div class="text-2xl font-bold text-center py-10">
        <h1>Criar Serviços</h1>
    </div>
    <div class="w-full max-w-2xl m-auto">
        <form class="grid gap-5 p-2" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="image">Imagem do Serviço</label>
            <input type="file" name="image" id="image">
            
            <label for="name">Nome do Serviço</label>
            <input type="text" name="name" id="name" required>


            <label for="description">Descrição</label>
            <textarea name="description" id="description"></textarea>

            <label for="price">Preço</label>
            <input type="number" name="price" id="price" step="0.01" required>


            <label for="installment_options">Opções de Parcelamento</label>
            <select name="installment_options[total_installments]" id="total_installments">
                @foreach ($installments as $installment)
                    <option value="{{ $installment }}">{{ $installment }}x</option>
                @endforeach
            </select>

            <input type="number" name="installment_options[interest_rate]" id="interest_rate"
                placeholder="Taxa de Juros (%)" step="0.01">

            <input type="text" name="installment_options[installment_value]" id="installment_value"
                placeholder="Valor por Parcela" readonly>

            <label for="custom_fields">Campos Dinâmicos</label>
            <input type="text" name="custom_fields[0][field_name]" placeholder="Nome do Campo">
            <input type="text" name="custom_fields[0][field_value]" placeholder="Valor do Campo">

            <button class="bg-gray-900 text-white p-2" type="submit">Salvar Serviço</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceInput = document.getElementById('price');
            const installmentSelect = document.getElementById('total_installments');
            const interestRateInput = document.getElementById('interest_rate');
            const installmentValueInput = document.getElementById('installment_value');

            function calculateInstallment() {
                const price = parseFloat(priceInput.value);
                const totalInstallments = parseInt(installmentSelect.value);
                const interestRate = parseFloat(interestRateInput.value);

                if (!isNaN(price) && !isNaN(totalInstallments) && !isNaN(interestRate)) {

                    const interestMultiplier = 1 + (interestRate / 100);
                    const totalAmountWithInterest = price * interestMultiplier;
                    const installmentValue = totalAmountWithInterest / totalInstallments;
                    installmentValueInput.value = installmentValue.toFixed(2);

                    for (let i = 0; i < installmentSelect.options.length; i++) {
                        const installmentNumber = parseInt(installmentSelect.options[i].value);
                        const installmentPrice = totalAmountWithInterest / installmentNumber;
                        const totalPayment = installmentPrice * installmentNumber;
                        installmentSelect.options[i].text =
                            `${installmentNumber}x - R$ ${installmentPrice.toFixed(2)} (Total: R$ ${totalPayment.toFixed(2)})`;
                    }
                } else {
                    installmentValueInput.value = '';
                }
            }

            priceInput.addEventListener('input', calculateInstallment);
            installmentSelect.addEventListener('change', calculateInstallment);
            interestRateInput.addEventListener('input', calculateInstallment);
        });
    </script>

@endsection
