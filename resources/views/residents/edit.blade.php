@extends('operations.layout')

@section('content')
    <div class="container">
        <h2>Editar Morador</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('residents.update', $resident->id) }}" method="post" id="residentForm">
            {!! csrf_field() !!}
            {{ method_field('PUT') }} <!-- Importante para atualizar os dados -->

                    <label>Nome do Morador:</label><br>
                    <input type="text" name="resident_name" id="resident_name" class="form-control" value="{{ old('resident_name', $resident->resident_name) }}" required><br>

                    <label>Número do Documento:</label><br>
                    <input type="text" name="resident_document" id="resident_document" class="form-control" value="{{ old('resident_document', $resident->resident_document) }}" required>
                    <small id="documentError" class="text-danger" style="display: none;">O documento deve ter exatamente 11 caracteres.</small><br>

                    <label>Apartamento:</label><br>
                    <select name="apto" id="apto" class="form-control" required>
                        <option value="">Escolha um apartamento</option>
                        @foreach ($aptos as $apto)
                            <option value="{{ $apto->unidade }}" {{ $apto->unidade == $resident->apto ? 'selected' : '' }}>
                                {{ $apto->unidade }}
                            </option>
                        @endforeach
                    </select><br>

                    <label>Contato:</label><br>
                    <input type="text" name="resident_contact" id="resident_contact" class="form-control" value="{{ old('resident_contact', $resident->resident_contact) }}" required>
                    <small id="phoneError" class="text-danger" style="display: none;">Telefone inválido.</small><br>

                    <label>Endereço:</label><br>
                    <textarea name="address" id="address" rows="2" class="form-control" placeholder="Endereço do morador...">{{ old('address', $resident->address) }}</textarea><br>

                    <label>Data de Entrada:</label><br>
<input type="date" name="move_in_date" id="move_in_date" class="form-control" 
    value="{{ old('move_in_date', $resident->move_in_date ? $resident->move_in_date->format('Y-m-d') : '') }}" required><br>

<label>Data de Saída (Opcional):</label><br>
<input type="date" name="move_out_date" id="move_out_date" class="form-control" 
    value="{{ old('move_out_date', $resident->move_out_date ? $resident->move_out_date->format('Y-m-d') : '') }}">
<br>
                    <input type="submit" value="Atualizar Morador" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                    
                    <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" href="{{ url('residents') }}">
                        {{ __('Voltar') }}
            </a><br>
</form>

    </div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const documentInput = document.getElementById('resident_document');
    const documentError = document.getElementById('documentError');
    const phoneInput = document.getElementById('resident_contact');
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

    document.getElementById('residentForm').addEventListener('submit', function(event) {
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
document.addEventListener('DOMContentLoaded', function() {
    const moveInDateInput = document.getElementById('move_in_date');
    const moveOutDateInput = document.getElementById('move_out_date');

    document.getElementById('residentForm').addEventListener('submit', function(event) {
        const moveInDate = new Date(moveInDateInput.value);
        const moveOutDate = new Date(moveOutDateInput.value);

        // Verifica no envio do formulário
        if (moveOutDateInput.value && moveOutDate < moveInDate) {
            event.preventDefault(); // Impede o envio do formulário
            alert('A data de saída não pode ser antes da data de entrada.');
        }
    });
});


</script>
@endsection
