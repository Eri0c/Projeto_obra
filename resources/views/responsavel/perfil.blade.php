<!-- resources/views/responsavel/perfil.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil do Responsável') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold">Informações do Perfil</h3>

                    <div class="mt-4">
                        <p><strong>Nome:</strong> {{ auth()->user()->name }}</p>
                        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('profile.edit') }}" class="text-blue-500">Editar Perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
