@extends('comuns.layout')
@section('content')
    <div class="container">
        <h2>Editar Operação</h2>
        <br/>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('operations.update', $operation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="product_name">Produto:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $operation->product_name }}" required>
            </div>

            <div class="form-group">
                <label for="operation_type">Operação:</label>
                <select class="form-control" id="operation_type" name="operation_type" required>
                    <option value="Carregar" {{ $operation->operation_type == 'Carregar' ? 'selected' : '' }}>Carregar</option>
                    <option value="Descarregar" {{ $operation->operation_type == 'Descarregar' ? 'selected' : '' }}>Descarregar</option>
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantidade:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $operation->quantity }}" required>
            </div>
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
            <div class="form-group">
                <div>
                <label for="description">Descrição:</label>
                <div>
                <textarea class="form-control" id="description" name="description">{{ $operation->description }}</textarea>
            </div>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
            <i class="fa fa-trash-o" aria-hidden="true"></i> Atualizar
            </button>
        </form>
    </div>
@endsection