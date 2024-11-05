@extends('comuns.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">
        <h2>Detalhes da Reserva</h2>
    </div>
    <div class="card-body">
        <h5 class="card-title"><strong>Nome do Morador:</strong> {{ $comuns->resident->resident_name }}</h5>                                                       
        <p class="card-text"><strong>Apartamento:</strong> {{ $comuns->resident->apto }}</p>
        <p class="card-text"><strong>Data:</strong> {{ $comuns->data }}</p>
        <p class="card-text"><strong>Local:</strong> {{ $comuns->area->name }}</p>
        <p class="card-text"><strong>Informações Adicionais:</strong> {{ $comuns->informacoes_adicionais }}</p>
    </div>
</div>

<a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline"
   href="{{ route('comum') }}">
   {{ __('Voltar') }}
</a>

@endsection
