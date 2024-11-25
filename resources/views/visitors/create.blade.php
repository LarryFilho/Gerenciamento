@extends('comuns.layout')

@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Registrar Novo Visitante</div>
    <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{ route('visitors.store') }}" method="post" id="visitorForm">
            {!! csrf_field() !!}
            
            <label>Nome do Visitante:</label><br>
            <input type="text" name="visitor_name" id="visitor_name" class="form-control" required><br>

            <label>Número do Documento:</label><br>
            <input type="text" name="visitor_document" id="visitor_document" class="form-control" required>
            <small id="documentError" class="text-danger" style="display: none;">O documento deve ter exatamente 11 caracteres.</small><br>

            <label>Contato:</label><br>
            <input type="text" name="visitor_contact" id="visitor_contact" class="form-control" required>
            <small id="phoneError" class="text-danger" style="display: none;">Formato inválido. Use (XX) XXXXX-XXXX.</small><br>

            <label>Motivo da Visita:</label><br>
            <textarea name="reason" id="reason" rows="4" class="form-control" placeholder="Descreva o motivo da visita..." required></textarea><br>

            <label>Horário da Chegada:</label><br>
            <input type="time" name="arrival" id="arrival" class="form-control" required><br>

            <input type="submit" value="Registrar Visitante" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
            
            <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" href="{{ url('visitors') }}">
                {{ __('Voltar') }}
            </a><br>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const documentInput = document.getElementById('visitor_document');
    const documentError = document.getElementById('documentError');
    const phoneInput = document.getElementById('visitor_contact');
    const phoneError = document.getElementById('phoneError');

    documentInput.addEventListener('input', function() {
        let value = documentInput.value.replace(/\D/g, '');

        if (value.length > 11) {
            value = value.slice(0, 11);
        }

        if (value.length <= 9) {
            value = value.replace(/(\d{3})(\d)/, '$1.$2'); 
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1-$2');
        } else {
            value = value.replace(/(\d{3})(\d{3})(\d{3})(\d)/, '$1.$2.$3-$4');
        }

        documentInput.value = value;

        const cleanedDocument = value.replace(/\D/g, '');
        const documentLength = cleanedDocument.length;

        if (documentLength < 10 || documentLength > 11) {
            documentError.textContent = 'O documento deve ter 10 ou 11 caracteres.';
            documentError.style.display = 'block';
        } else {
            documentError.style.display = 'none';
        }
    });

    phoneInput.addEventListener('input', function() {
        let value = phoneInput.value
            .replace(/\D/g, '')
            .replace(/^(\d{2})(\d)/g, '($1) $2') 
            .replace(/(\d{5})(\d)/, '$1-$2'); 

        phoneInput.value = value;

        if (!/^\(\d{2}\) \d{5}-\d{4}$/.test(value) && value.length > 0) {
            phoneError.style.display = 'block';
        } else {
            phoneError.style.display = 'none';
        }
    });

    document.getElementById('visitorForm').addEventListener('submit', function(event) {
        const cleanedDocumentLength = documentInput.value.replace(/\D/g, '').length;
        const isPhoneValid = /^\(\d{2}\) \d{5}-\d{4}$/.test(phoneInput.value);

        if (cleanedDocumentLength < 10 || cleanedDocumentLength > 11) {
            event.preventDefault(); 
            documentError.style.display = 'block'; 
        }
   
        if (!isPhoneValid) {
            event.preventDefault();
            phoneError.style.display = 'block'; 
        }
    });
});
</script>

@endsection