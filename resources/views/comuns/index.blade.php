@extends('comuns.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Sistema de Reserva de Áreas Comuns</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('comum/create') }}" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" title="Adicionar nova Encomenda">
                            Reservar uma Área Comum
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome do Morador</th>
                                        <th>Apartamento</th>
                                        <th>Data</th>
                                        <th>Local</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($comums as $item)
                                @if($item->resident_id !== null)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->resident ? $item->resident->resident_name : 'N/A' }}</td>
                                        <td>{{ $item->resident ? $item->resident->apto : 'N/A' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->data)->format('d/m') }}</td>
                                        <td>{{ $item->area ? $item->area->name : 'N/A' }}</td>
  
                                        <td>
                                            <a href="{{ route('comuns.show', $item->id) }}" title="Ver Reserva"><button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                <i class="fa fa-eye" aria-hidden="true"></i>Detalhes da Reserva</button></a>
                                            <a href="{{ route('comuns.edit', $item->id) }}" title="Editar Reserva"><button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Reserva</button></a>
  
                                                <form method="POST" action="{{ route('comuns.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirm('Tem certeza que deseja deletar esta encomenda?');">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="ml-3 inline-flex items-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline"
                                                    title="Deletar Encomenda"><i class="fa fa-trash-o" aria-hidden="true"></i> Deletar</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection