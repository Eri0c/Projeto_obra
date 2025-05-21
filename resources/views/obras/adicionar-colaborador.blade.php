<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Colaborador à Obra') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <h3>Obra: {{ $obra->nome }}</h3>

            <form action="{{ route('obras.colaboradores.adicionar', $obra->id) }}" method="POST">
                @csrf
                <label for="codigo" class="block font-medium text-sm text-gray-700">Código do Colaborador:</label>
                <input
                    type="text"
                    name="codigo"
                    id="codigo"
                    class="border rounded w-full py-2 px-3 mt-1 mb-4"
                    required
                >

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Vincular Colaborador
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
