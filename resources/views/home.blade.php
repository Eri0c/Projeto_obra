<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página Inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold">Bem-vindo ao sistema de gerenciamento de obras</h3>

                    @if(session('error'))
                        <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <p>Você está na página inicial do sistema. Aqui você pode acessar diversas funcionalidades para gerenciar suas obras e tarefas.</p>

                    <div class="mt-6">
                        <a href="{{ route('gerenciar-obras') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                            Acessar Obras
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
