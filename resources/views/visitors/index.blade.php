@extends('comuns.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Lista de Visitantes</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('visitors.create') }}" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" title="Registrar Novo Visitante">
                            Registrar Novo Visitante
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            @if($visitors->isEmpty())
                                <div class="alert alert-warning" role="alert">
                                    Nenhum visitante registrado até o momento.
                                </div>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome do Visitante</th>
                                            <th>Número do Documento</th>
                                            <th>Hora de Chegada</th>
                                            <th>Hora de Saída</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($visitors as $visitor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $visitor->visitor_name }}</td>
                                            <td>{{ $visitor->formatted_document }}</td>
                                            <td>{{ \Carbon\Carbon::parse($visitor->arrival)->format('H:i') }}</td>
                                            <td>{{ $visitor->departure ? \Carbon\Carbon::parse($visitor->departure)->format('H:i') : 'Ainda presente' }}</td>
                                            <td>
                                                <a href="{{ route('visitors.show', $visitor->id) }}" title="Ver Visitante">
                                                    <button class="ml-3 inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> Detalhes
                                                    </button>
                                                </a>
                                                <a href="{{ route('visitors.edit', $visitor->id) }}" title="Editar Visitante">
                                                    <button class="ml-3 inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                                                    </button>
                                                </a>

                                                <form method="POST" action="{{ route('visitors.destroy', $visitor->id) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirm('Tem certeza que deseja deletar este visitante?');">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="ml-3 inline-flex items-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" title="Deletar Visitante">
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
