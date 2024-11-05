@extends('operations.layout')

@section('content')
<div class="container">
    <h2>Lista de Ocorrências</h2>
    <div class="card-body">
                        <a href="{{ route('occurrences.create') }}" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" title="Registrar Novo Ocorrência">
                            Registrar Nova Ocorrência
                            </a>
                        <br/>
                        <br/>
            @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data da Ocorrência</th>
                <th>Hora da Ocorrência</th>
                <th>Testemunha</th>
                <th>Resolvida?</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($occurrences as $occurrence)
                <tr>
                    <td>{{ $occurrence->id }}</td>
                    <td>{{ $occurrence->occurrence_date }}</td>
                    <td>{{ $occurrence->occurrence_time }}</td>
                    <td>{{ $occurrence->resident ? $occurrence->resident->resident_name : 'N/A' }}</td>
                    <td>{{ $occurrence->resolved ? 'Sim' : 'Não' }}</td>
                    <td>
                    <a href="{{ route('occurrences.show', $occurrence->id) }}" title="Ver Ocorrência">
    <button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
        <i class="fa fa-eye" aria-hidden="true"></i> Detalhes
    </button>
</a>

<a href="{{ route('occurrences.edit', $occurrence->id) }}" title="Editar Ocorrência">
    <button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
    </button>
</a>

<form method="POST" action="{{ route('occurrences.destroy', $occurrence->id) }}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirm('Tem certeza que deseja deletar esta ocorrência?');">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" class="ml-3 inline-flex items-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" title="Deletar Ocorrência">
        <i class="fa fa-trash-o" aria-hidden="true"></i> Deletar
    </button>
</form>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
