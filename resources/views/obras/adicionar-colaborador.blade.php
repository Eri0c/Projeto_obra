<x-app-layout>
    <x-slot name="header">
        <h2 class="form-title">
            {{ __('Adicionar Colaborador à Obra') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <h3>Obra: {{ $obra->nome }}</h3>

            <form action="{{ route('obras.colaboradores.adicionar', ['obra' => $obra->id]) }}" method="POST">

                @csrf
                <x-form-field for="codigo" label="Código do Colaborador:">
                <x-input
                    type="text"
                    name="codigo"
                    id="codigo"
                    required
                />
            </x-form-field>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Vincular Colaborador
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
