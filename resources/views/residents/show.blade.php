@extends('operations.layout')

@section('content')
    <div class="container">
        <h2>Detalhes do Morador</h2>

        <div class="card">
            <div class="card-header">
                ID do Morador: {{ $resident->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nome do Morador: {{ $resident->resident_name }}</h5>
                <p class="card-text"><strong>Documento do Morador:</strong> {{ $resident->formatted_document }}</p>
                <p class="card-text"><strong>Apartamento:</strong> {{ $resident->apto }}</p>
                <p class="card-text"><strong>Contato:</strong> {{ $resident->resident_contact }}</p>
                <p class="card-text"><strong>Data de Entrada:</strong> {{ \Carbon\Carbon::parse($resident->move_in_date)->format('d/m/Y') }}</p>
                <p class="card-text"><strong>Data de Saída:</strong> {{ $resident->move_out_date ? \Carbon\Carbon::parse($resident->move_out_date)->format('d/m/Y') : 'Ainda residindo' }}</p>
                <p class="card-text"><strong>Data de Cadastro:</strong> {{ $resident->created_at->format('d/m/Y') }}</p>
                <a href="{{ url('residents') }}" title="Voltar">
                    <button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
