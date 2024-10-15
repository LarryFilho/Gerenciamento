@extends('operations.layout')

@section('content')
    <div class="container">
        <h2>Detalhes da Operação</h2>

        <div class="card">
            <div class="card-header">
                Operation ID: {{ $operation->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Product Name: {{ $operation->product_name }}</h5>
                <p class="card-text"><strong>Operador:</strong> {{ $operation->user->name }}</p>
                <p class="card-text"><strong>Tipo de Operação:</strong> {{ ucfirst($operation->operation_type) }}</p>
                <p class="card-text"><strong>Quantidade:</strong> {{ $operation->quantity }}</p>
                <p class="card-text"><strong>Descrição:</strong> {{ $operation->description }}</p>
                <p class="card-text"><strong>Data e Horário:</strong> {{ $operation->operation_date_time }}</p>
                <a href="{{ url('operations') }}" title="Voltar"><button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Voltar
            </div>
        </div>
    </div>
@endsection
