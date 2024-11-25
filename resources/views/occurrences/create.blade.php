@extends('comuns.layout')

@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Registrar Nova Ocorrência</div>
    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ocorreu um problema!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('occurrences.store') }}" method="post">
            {!! csrf_field() !!}

            <label>Data da Ocorrência:</label><br>
            <div class="row">
                <div class="form-group">
                <input type="date" name="occurrence_date" id="occurrence_date" class="form-control" max="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" required>
                </div>

                <div class="form-group">
                    <label>Hora da Ocorrência:</label><br>
                    <input type="time" name="occurrence_time" id="occurrence_time" class="form-control" required>
                </div>
            </div>
            <br>

            <label>Descrição da Ocorrência:</label><br>
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Descreva detalhes da ocorrência..." required></textarea><br>

            <label>Testemunha (Opcional):</label><br>
            <select name="resident_id" id="resident_id" class="form-control">
                <option value="">Selecione um morador</option>
                @foreach($residents as $resident)
                    <option value="{{ $resident->id }}">{{ $resident->resident_name }}</option>
                @endforeach
            </select><br>

            <label>Ocorrência Resolvida?</label><br>
            <input type="checkbox" name="resolved" id="resolved" value="1"> <br><br>

            <input type="submit" value="Registrar Ocorrência" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
            
            <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" href="{{ url('occurrences') }}">
                {{ __('Voltar') }}
            </a><br>
        </form>
    </div>
</div>

@endsection
