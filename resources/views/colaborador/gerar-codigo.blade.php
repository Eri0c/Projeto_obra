<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gerar Código de Autorização
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-10">
        <p class="mb-4">
            Você ainda não está vinculado a nenhuma obra. Clique no botão abaixo para gerar um código e enviar ao responsável.
        </p>

        <form method="POST" action="{{ route('colaborador.gerar-codigo') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Gerar Código
            </button>
        </form>

        @if (session('codigo'))
            <div class="success-message">
                <strong>Código gerado:</strong> {{ session('codigo') }}
            </div>
        @endif
    </div>
</x-app-layout>
