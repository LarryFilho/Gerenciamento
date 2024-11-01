@extends('operations.layout')

@section('content')
    <div class="container">
        <h2>Editar Visitante</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('visitors.update', $visitor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome do Visitante:</label>
                <input type="text" class="form-control" id="visitor_name" name="visitor_name" value="{{ $visitor->visitor_name }}" required>
            </div>

            <div class="form-group">
                <label for="document_number">Número do Documento:</label>
                <input type="text" class="form-control" id="visitor_document" name="visitor_document" value="{{ $visitor->visitor_document }}" required>
            </div>

            <div class="form-group">
                <label for="contact">Contato:</label>
                <input type="text" class="form-control" id="visitor_contact" name="visitor_contact" value="{{ $visitor->visitor_contact }}" required>
            </div>

            <div class="form-group">
                <label for="reason_for_visit">Motivo da Visita:</label>
                <textarea class="form-control" id="reason" name="reason" required>{{ $visitor->reason }}</textarea>
            </div>

            <label>Horário da Chegada:</label><br>
            <input type="time" name="arrival" id="arrival" class="form-control" value="{{ \Carbon\Carbon::parse($visitor->arrival)->format('H:i') }}" required><br>

            <label>Horário da Saída:</label><br>
            <input type="time" name="departure" id="departure" class="form-control" value="{{ $visitor->departure }}"><br>


            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                <i class="fa fa-save" aria-hidden="true"></i> Atualizar
            </button>

            <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" href="{{ url('visitors') }}">
                {{ __('Voltar') }}
            </a>
        </form>
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
