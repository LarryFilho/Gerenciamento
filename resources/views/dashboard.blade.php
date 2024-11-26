@extends('operations.layout')

@section('content')
   
                    @role('porteiro')  
                        <br/>
                        <br/>
                       
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            
                        
                            <a href="{{ url('residents') }}" class="group block text-center p-6 bg-orange-500 text-white rounded-lg shadow-lg transform hover:scale-105 transition-all ease-in-out duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 group-hover:text-purple-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>

                                <span class="font-semibold text-lg">{{ __('Registro de Moradores') }}</span>
                            </a>

                            <a href="{{ url('visitors') }}" class="group block text-center p-6 bg-orange-500 text-white rounded-lg shadow-lg transform hover:scale-105 transition-all ease-in-out duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg"class="h-12 w-12 mx-auto mb-4 group-hover:text-purple-700"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>

                                <span class="font-semibold text-lg">{{ __('Registro de Visitantes') }}</span>
                            </a>

          
                            <a href="{{ url('cadastro') }}" class="group block text-center p-6 bg-orange-500 text-white rounded-lg shadow-lg transform hover:scale-105 transition-all ease-in-out duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 group-hover:text-purple-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>

                                <span class="font-semibold text-lg">{{ __('Registrar uma nova Encomenda') }}</span>
                            </a>

                            <a href="{{ url('operations') }}" class="group block text-center p-6 bg-orange-500 text-white rounded-lg shadow-lg transform hover:scale-105 transition-all ease-in-out duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg"class="h-12 w-12 mx-auto mb-4 group-hover:text-purple-700"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                            </svg>

                                <span class="font-semibold text-lg">{{ __('Sistema de Carga/Descarga') }}</span>
                            </a>

                           
                            <a href="{{ url('occurrences') }}" class="group block text-center p-6 bg-orange-500 text-white rounded-lg shadow-lg transform hover:scale-105 transition-all ease-in-out duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 group-hover:text-purple-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                            </svg>

                                <span class="font-semibold text-lg">{{ __('Registro de Ocorrências') }}</span>
                            </a>

                            <a href="{{ url('comum') }}" class="group block text-center p-6 bg-orange-500 text-white rounded-lg shadow-lg transform hover:scale-105 transition-all ease-in-out duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg"class="h-12 w-12 mx-auto mb-4 group-hover:text-purple-700"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>

                                <span class="font-semibold text-lg">{{ __('Áreas Comuns') }}</span>
                            </a>
                          
                        </div>
                    @else
                        @php
                            // Verifica se o usuário logado tem encomendas
                            $encomendaCount = App\Models\Encomenda::where('user_id', auth()->id())->count();
                        @endphp

                     
                        @if($encomendaCount > 0)
                            <div class="alert alert-info text-center text-xl font-bold text-green-600 mb-4 bg-green-100 p-6 rounded-lg shadow-md">
                                Chegou uma encomenda para você na portaria!
                            </div>
                        @else
                            <div class="alert alert-info text-center text-xl font-bold text-yellow-600 mb-4 bg-yellow-100 p-6 rounded-lg shadow-md">
                                Não há encomendas para você no momento.
                            </div>
                        @endif
                    @endrole
                </div>
               
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                    @if($teste > 0)
                        @foreach ($comums as $comum)
                            <div class="alert alert-success text-center text-xl font-bold text-green-600 mb-4">
                                Sua Reserva para a data {{ \Carbon\Carbon::parse($comum->data)->format('d/m/Y') }} do local {{ $comum->area->name }} realizada com Sucesso!!
                            </div>
                        @endforeach
                    @endif
            </div>
        </div>
    </div>
</x-app-layout>
