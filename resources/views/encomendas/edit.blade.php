@extends('encomendas.layout')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Editar Encomenda</div>
  <div class="card-body">

    <form action="{{ url('cadastro/' . $encomendas->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")

      <input type="hidden" name="id" id="id" value="{{ $encomendas->id }}" />

      <label>Nome do Morador:</label><br>
      <input type="text" name="name" id="name" value="{{ $encomendas->name }}" class="form-control" required><br>

      <label>Apartamento:</label><br>
      <select name="apto" id="apto" class="form-control" required>
          <option value="">Escolha um apartamento</option>
          @foreach ($aptos as $apto)
              <option value="{{ $apto->unidade }}" {{ $apto->unidade == $encomendas->apto ? 'selected' : '' }}>
                  {{ $apto->unidade }}
              </option>
          @endforeach
      </select><br>

      <label>Horário de Chegada:</label><br>
      <input type="time" name="horario_chegada" id="horario_chegada" value="{{ \Carbon\Carbon::parse($encomendas->horario_chegada)->format('H:i') }}" class="form-control" required><br>

      <label>Dia:</label><br>
      <input type="number" name="dia" id="dia" value="{{ $encomendas->dia }}" class="form-control" min="1" max="31" required><br>

      <label>Mês:</label><br>
      <input type="number" name="mes" id="mes" value="{{ $encomendas->mes }}" class="form-control" min="1" max="12" required><br>

      <label>Informações Adicionais:</label><br>
      <textarea name="informacoes_adicionais" id="informacoes_adicionais" rows="4" class="form-control">{{ $encomendas->informacoes_adicionais }}</textarea><br>

      <input type="submit" value="Atualizar" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
      <a href="{{ route('cadastro') }}" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
          Voltar
      </a>
    </form>

  </div>
</div>

@stop
