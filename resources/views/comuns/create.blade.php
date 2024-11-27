@extends('comuns.layout')

@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Reserva de Áreas Comuns</div>
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

        <form action="{{ route('comum.store') }}" method="post">
            {!! csrf_field() !!}

            <label>Local:</label><br>
            <select name="area_id" id="area_id" class="form-control">
                <option value="">Selecione o Local</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
            </select>

            <label>Data da Reserva:</label><br>
            <div class="row">
                <div class="form-group">
                <input type="date" name="data" id="data" class="form-control" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" required>
                </div>
            </div>
            <br>

            <label>Informações Adicionais Sobre a Reserva:</label><br>
            <textarea name="informacoes_adicionais" id="informacoes_adicionais" rows="4" class="form-control" placeholder="Descreva detalhes da reserva..." required></textarea><br>

            <label>Morador:</label><br>
            <select name="resident_id" id="resident_id" class="form-control">
                <option value="">Selecione um morador</option>
                @foreach($residents as $resident)
                    <option value="{{ $resident->id }}">{{ $resident->resident_name }}</option>
                @endforeach
            </select><br>

            <input type="submit" value="Realizar Reserva" class="inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
            
            <a class="ml-3 inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" href="{{ url('comum') }}">
                {{ __('Voltar') }}
            </a><br>
        </form>
    </div>
</div>

@endsection
