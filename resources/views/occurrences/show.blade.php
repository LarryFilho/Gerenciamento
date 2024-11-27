@extends('comuns.layout')
@section('content')
<div class="container">
    <h2>Detalhes da Ocorrência</h2>
    <br/>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            ID da Ocorrência: {{ $occurrence->id }}
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Data da Ocorrência:</strong> {{ $occurrence->occurrence_date }}</p>
            <p class="card-text"><strong>Hora da Ocorrência:</strong> {{ $occurrence->occurrence_time }}</p>
            <p class="card-text"><strong>Descrição:</strong> {{ $occurrence->description }}</p>
            <p class="card-text"><strong>Testemunha:</strong> {{ $occurrence->resident ? $occurrence->resident->resident_name : 'N/A' }}</p>
            <p class="card-text"><strong>Resolvida? :</strong> {{ $occurrence->resolved ? 'Sim' : 'Não' }}</p>
            <a href="{{ route('occurrences.index') }}" title="Voltar">
                <button class="ml inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                </button>
            </a>
        </div>
    </div>
</div>
@endsection

