@extends('encomendas.layout')

@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header">
        <h2>Detalhes da Encomenda</h2>
    </div>
    <div class="card-body">
        <h5 class="card-title"><strong>Nome do Destinatário:</strong> {{ $encomenda->user ? $encomenda->user->name : 'Desconhecido' }}</h5>
        <p class="card-text"><strong>Dia e Mês da entrega:</strong> {{ $encomenda->dia }} / {{ $encomenda->mes }}</p>
        <p class="card-text"><strong>Horário da Entrega:</strong> {{ \Carbon\Carbon::parse($encomenda->horario_chegada)->format('H:i') }}</p>
        <p class="card-text"><strong>Informações Adicionais:</strong> {{ $encomenda->informacoes_adicionais }}</p>
    </div>
</div>

<a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline"
   href="{{ url('cadastro') }}">
   {{ __('Voltar') }}
</a>

@endsection
