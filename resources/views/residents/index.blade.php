@extends('comuns.layout')

@section('content')
<body class="
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Lista de Moradores</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('residents.create') }}" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" title="Registrar Novo Morador">
                            Registrar Novo Morador
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            @if($residents->isEmpty())
                                <div class="alert alert-warning" role="alert">
                                    Nenhum morador registrado até o momento.
                                </div>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome do Morador</th>
                                            <th>Apartamento</th>
                                            <th>Data de Entrada</th>
                                            <th>Data de Saída</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($residents as $resident)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $resident->resident_name }}</td>
                                            <td>{{ $resident->apto }}</td>
                                            <td>{{ \Carbon\Carbon::parse($resident->move_in_date)->format('d/m/Y') }}</td>
                                            <td>{{ $resident->move_out_date ? \Carbon\Carbon::parse($resident->move_out_date)->format('d/m/Y') : 'Ainda residindo' }}</td>
                                            <td>
                                                <a href="{{ route('residents.show', $resident->id) }}" title="Ver Morador">
                                                    <button class="ml-3 inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> Detalhes
                                                    </button>
                                                </a>
                                                <a href="{{ route('residents.edit', $resident->id) }}" title="Editar Morador">
                                                    <button class="ml-3 inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                                                    </button>
                                                </a>

                                                <form method="POST" action="{{ route('residents.destroy', $resident->id) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirm('Tem certeza que deseja deletar este morador?');">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="ml-3 inline-flex items-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" title="Deletar Morador">
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
