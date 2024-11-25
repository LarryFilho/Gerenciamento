@extends('comuns.layout')
@section('content')
    <div class="container">
        <h2>Editar Ocorrência</h2>
        <br/>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('occurrences.update', $occurrence->id) }}" method="POST">
            @csrf
            @method('PUT')
            <br>
            <div class="form-group">
                <label for="occurrence_date">Data da Ocorrência:</label>
                <input type="date" class="form-control" id="occurrence_date" name="occurrence_date" value="{{ $occurrence->occurrence_date }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="occurrence_time">Hora da Ocorrência:</label>
                <input type="time" class="form-control" id="occurrence_time" name="occurrence_time" value="{{ \Carbon\Carbon::parse($occurrence->occurrence_time)->format('H:i') }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $occurrence->description }}</textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="resident_id">Testemunha (Morador):</label>
                <select class="form-control" id="resident_id" name="resident_id">
                    <option value="">Nenhum</option>
                    @foreach($residents as $resident)
                        <option value="{{ $resident->id }}" {{ $occurrence->resident_id == $resident->id ? 'selected' : '' }}>
                            {{ $resident->resident_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="resolved">Status:</label>
                <select class="form-control" id="resolved" name="resolved" required>
                    <option value="0" {{ !$occurrence->resolved ? 'selected' : '' }}>Não Resolvido</option>
                    <option value="1" {{ $occurrence->resolved ? 'selected' : '' }}>Resolvido</option>
                </select>
            </div>
            <br>

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                <i class="fa fa-refresh" aria-hidden="true"></i> Atualizar
            </button>
        </form>
    </div>
@endsection
