@extends('encomendas.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">
        <h2>Detalhes da Encomenda</h2>
    </div>
    <div class="card-body">
        <h5 class="card-title">Nome do Destinatário: {{ $encomendas->name }}</h5>
        <h5 class="card-text">Apartamento: {{ $encomendas->apto }}</h5>
        <h5 class="card-text">Dia e Mês da entrega: {{ $encomendas->dia }} / {{ $encomendas->mes }}</h5>
        <h5 class="card-text">Horário da entrega: {{ \Carbon\Carbon::parse($encomendas->horario_chegada)->format('H:i') }}</h5>
        <h5 class="card-text">Informações Adicionais: {{ $encomendas->informacoes_adicionais }}</h5>
    </div>
</div>

<a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline"
   href="{{ route('cadastro') }}">
   {{ __('Voltar') }}
</a>

@endsection
