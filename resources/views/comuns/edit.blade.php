@extends('comuns.layout')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Editar Reserva</div>
  <div class="card-body">

    <form action="{{ url('comum/' . $comuns->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")

      <input type="hidden" name="id" id="id" value="{{ $comuns->id }}" />

      <label>Morador:</label><br>
            <select name="resident_id" id="resident_id" class="form-control">
                <option value="">Selecione um morador</option>
                @foreach($residents as $resident)
                    <option value="{{ $resident->id }}">{{ $resident->resident_name }}</option>
                @endforeach
      </select><br>

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
                <input type="date" name="data" id="data" class="form-control" max="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" required>
                </div>
            </div>
      <br>

      <label>Informações Adicionais:</label><br>
      <textarea name="informacoes_adicionais" id="informacoes_adicionais" rows="4" class="form-control" placeholder="Digite quaisquer informações adicionais que você desejar...">{{ $comuns->informacoes_adicionais }}</textarea><br>

      <input type="submit" value="Atualizar" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
      <a href="{{ route('comum') }}" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
          Voltar
      </a>
    </form>

  </div>
</div>

@stop
