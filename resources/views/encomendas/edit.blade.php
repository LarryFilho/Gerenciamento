@extends('encomendas.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Editar Encomenda</div>
  <div class="card-body">
       
      <form action="{{ url('cadastro/' .$encomendas->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$encomendas->id}}" id="id" />
        <label>Name do Morador:</label></br>

        <input type="text" name="name" id="name" value="{{$encomendas->name}}" class="form-control"></br>
        <label>Apartamento:</label></br>

        <input type="text" name="apto" id="apto" value="{{$encomendas->apto}}" class="form-control"></br>
        <input type="submit" value="Atualizar" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline">
        </br>
    </form>
    
  </div>
</div>
  
@stop