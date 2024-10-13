@extends('encomendas.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Sistema de Registo de Encomendas</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('cadastro/create') }}" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" title="Adicionar nova Encomenda">
                            Adicionar Nova Encomenda
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
                                        <th>Dia e Mês da entrega</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($encomendas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->apto }}</td>
                                        <td>{{ $item->dia }} / {{ $item->mes }}</td>
  
                                        <td>
                                            <a href="{{ route('cadastro.show', $item->id) }}" title="Ver Encomenda"><button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                <i class="fa fa-eye" aria-hidden="true"></i>Detalhes da Encomenda</button></a>
                                            <a href="{{ route('cadastro.edit', $item->id) }}" title="Editar Encomenda"><button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
  
                                                <form method="POST" action="{{ route('cadastro.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirm('Tem certeza que deseja deletar esta encomenda?');">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" 
                                                    title="Deletar Encomenda"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                        </td>
                                    </tr>
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