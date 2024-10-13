@extends('encomendas.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Criar nova Encomenda</div>
    <div class="card-body">
        <form action="{{ url('cadastro') }}" method="post">
            {!! csrf_field() !!}
            <label>Nome do Destinatário:</label><br>
            <input type="text" name="name" id="name" class="form-control" required><br>

            <label>Apartamento:</label><br>
            <select name="apto" id="apto" class="form-control" required>
                <option value="">Escolha um apartamento</option>
                @foreach ($aptos as $apto)
                    <option value="{{ $apto->unidade }}">{{ $apto->unidade }}</option>
                @endforeach
            </select><br>
            
            <label>Horário de Chegada:</label><br>
            <input type="time" name="horario_chegada" id="horario_chegada" class="form-control" required><br>

            <label>Informações Adicionais:</label><br>
            <textarea name="informacoes_adicionais" id="informacoes_adicionais" rows="4" class="form-control" placeholder="Digite quaisquer informações adicionais que você desejar..."></textarea>
            </textarea>
            <br>
            
            <input type="submit" value="Registrar" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
            <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" href="{{ route('cadastro') }}">
                {{ __('voltar') }}
            </a><br>
        </form>
    </div>
</div>

@stop