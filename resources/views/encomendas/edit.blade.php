@extends('comuns.layout')

@section('content')
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Editar Encomenda</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('cadastro/' . $encomenda->id) }}" method="post">
                        {!! csrf_field() !!}
                        @method("PATCH")

                        <input type="hidden" name="id" id="id" value="{{ $encomenda->id }}" />
                        
                        <label>Destinatário:</label><br>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">Escolha um destinatário</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $encomenda->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <br>

                        <label>Dia e Mês da Encomenda:</label><br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" name="dia" id="dia" class="form-control" min="1" max="31" value="{{ $encomenda->dia }}" placeholder="Dia" required>
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

                        <label>Horário de Chegada:</label><br>
                        <input type="time" name="horario_chegada" id="horario_chegada" value="{{ \Carbon\Carbon::parse($encomenda->horario_chegada)->format('H:i') }}" class="form-control" required><br>

                        <label>Informações Adicionais:</label><br>
                        <textarea name="informacoes_adicionais" id="informacoes_adicionais" rows="4" class="form-control" placeholder="Digite quaisquer informações adicionais que você desejar...">{{ $encomenda->informacoes_adicionais }}</textarea>
                        <br>

                        <div class="d-flex justify-content-between">
                            <input type="submit" value="Atualizar" class="inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                            <a href="{{ url('cadastro') }}" class="ml-3 inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
                                Voltar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
