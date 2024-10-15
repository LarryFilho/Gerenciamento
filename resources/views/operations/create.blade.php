@extends('operations.layout')

@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Registrar Nova Operação</div>
    <div class="card-body">
        <form action="{{ route('operations.store') }}" method="post">
            {!! csrf_field() !!}
            
            <label>Nome do Produto:</label><br>
            <input type="text" name="product_name" id="product_name" class="form-control" required><br>

            <label>Tipo de Operação:</label><br>
            <select name="operation_type" id="operation_type" class="form-control" required>
                <option value="">Selecione o tipo de operação</option>
                <option value="load">Carregar</option>
                <option value="unload">Descarregar</option>
            </select><br>

            <label>Quantidade:</label><br>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required><br>

            <label>Data da Operação:</label><br>
            <div class="row">
                <div class="col-md-6">
                    <input type="number" name="dia" id="dia" class="form-control" min="1" max="31" placeholder="Dia" required>
                </div>
                <div class="col-md-6">
                    <select name="mes" id="mes" class="form-control" required>
                        <option value="">Escolha o mês</option>
                        <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                </div>
            </div>
            <br>

            <label>Horário da Operação:</label><br>
            <input type="time" name="horario_chegada" id="horario_chegada" class="form-control" required><br>

            <label>Descrição Adicional:</label><br>
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Descreva detalhes adicionais da operação..."></textarea><br>

            <input type="submit" value="Registrar Operação" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
            
            <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" href="{{ url('operations') }}">
                {{ __('Voltar') }}
            </a><br>
        </form>
    </div>
</div>

@endsection