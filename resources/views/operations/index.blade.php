@extends('operations.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Lista de Operações</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('operations.create') }}" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" title="Registrar Nova Operação">
                            Registrar Nova Operação
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            @if($operations->isEmpty())
                                <div class="alert alert-warning" role="alert">
                                    Nenhuma operação registrada até o momento.
                                </div>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome do Produto</th>
                                            <th>Operador</th>
                                            <th>Tipo de Operação</th>
                                            <th>Quantidade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($operations as $operation)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $operation->product_name }}</td>
                                            <td>{{ $operation->user->name }}</td>
                                            <td>{{ ucfirst($operation->operation_type) }}</td>
                                            <td>{{ $operation->quantity }}</td>
                                            <td>
                                                <a href="{{ route('operations.show', $operation->id) }}" title="Ver Operação">
                                                    <button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> Detalhes
                                                    </button>
                                                </a>
                                                <a href="{{ route('operations.edit', $operation->id) }}" title="Editar Operação">
                                                    <button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                                                    </button>
                                                </a>

                                                <form method="POST" action="{{ route('operations.destroy', $operation->id) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirm('Tem certeza que deseja deletar esta operação?');">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" title="Deletar Operação">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Deletar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection