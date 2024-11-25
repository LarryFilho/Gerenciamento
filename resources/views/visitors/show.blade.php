@extends('comuns.layout')

@section('content')
    <div class="container">
        <h2>Detalhes do Visitante:</h2>
        <br/>
    
        <div class="card">
            <div class="card-header">
                ID do Visitante: {{ $visitor->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nome do Visitante: {{ $visitor->visitor_name }}</h5>
                <p class="card-text"><strong>Documento do Visitante:</strong> {{ $visitor->formatted_document }}</p>
                <p class="card-text"><strong>Contato:</strong> {{ $visitor->visitor_contact }}</p>
                <p class="card-text"><strong>Motivo da Visita:</strong> {{ $visitor->reason }}</p>
                <p class="card-text"><strong>Horário de Chegada:</strong> {{ $visitor->arrival }}</p>
                <p class="card-text"><strong>Horário de Saída:</strong> {{ $visitor->departure ?? 'N/A' }}</p>
                <p class="card-text"><strong>Data de Cadastro:</strong> {{ $visitor->created_at->format('d/m/Y') }}</p>
                <br/>
    
                <a href="{{ url('visitors') }}" title="Voltar">
                    <button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
