<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistema Registro de Encomendas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <x-app-layout>
        <div class="bg-gradient-to-b from-purple-500 to-purple-900 min-h-screen">
      
        <br/>
            <div class="text-center">
                <h2 class="font-semibold text-xl text-white leading-tight p-4 bg-orange-500 rounded-pill shadow-sm mx-auto d-inline-block">
                    {{ __('Sistema da Portaria') }}
                </h2>
            </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>