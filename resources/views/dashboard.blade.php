<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Sistema de Portaria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     @role('porteiro')  
                     
                     <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" 
                           href="{{ url('residents') }}">
                            {{ __('Registro de Moradores') }}
                        </a>
                        
                        <br>
                        <br>

                        <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" 
                           href="{{ url('visitors') }}">
                            {{ __('Registro de Visitantes') }}
                        </a>

                        <br>
                        <br>

                        <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" 
                           href="{{ url('cadastro') }}">
                            {{ __('Registrar uma nova Encomenda') }}
                        </a>

                        <br>
                        <br>

                    <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" 
                       href="{{ url('visitors') }}">
                        {{ __('Registro de Visitantes') }}
                    </a>

                    <br>
                    <br>

                    <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" 
                       href="{{ url('cadastro') }}">
                        {{ __('Registrar uma nova Encomenda') }}
                    </a>

                    <br>
                    <br>

                    <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" 
                       href="{{ url('operations') }}">
                        {{ __('Sistema de Carga/Descarga') }}
                    </a>
                    
                    <br>
                    <br>

                    <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" 
                       href="{{ url('occurrences') }}">
                        {{ __('Registro de Ocorrências') }}
                    </a>

                    <br>
                    <br>
                    
                    <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" 
                           href="{{ url('comum') }}">
                            {{ __('Áreas comuns') }}
                        </a>

                    @else

                    @php
                        // Verifica se o usuário logado tem encomendas
                        $encomendaCount = App\Models\Encomenda::where('user_id', auth()->id())->count();
                    @endphp

                    @if($encomendaCount > 0)
                        <div class="alert alert-info text-center text-xl font-bold text-green-600 mb-4">
                            Chegou uma encomenda para você na portaria!
                        </div>
                    @else
                        <div class="alert alert-info text-center text-xl font-bold text-yellow-600 mb-4">
                            Não há encomendas para você no momento.
                        </div>
                    @endif

                        
                      
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
