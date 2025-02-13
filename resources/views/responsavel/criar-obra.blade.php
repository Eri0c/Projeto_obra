<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar nova obra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold">Novo Cadastro de Obra</h3>

                    <form action="{{ route('obras.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome da Obra</label>
                            <input type="text" name="nome" id="nome" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                            <textarea name="descricao" id="descricao" rows="3" class="mt-1 block w-full" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full" required>
                                <option value="em andamento">Em Andamento</option>
                                <option value="concluida">Concluída</option>
                                <option value="em espera">Em Espera</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="data_inicio" class="block text-sm font-medium text-gray-700">Data de Início</label>
                            <input type="date" name="data_inicio" id="data_inicio" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="data_prevista_conclusao" class="block text-sm font-medium text-gray-700">Data Prevista para Conclusão</label>
                            <input type="date" name="data_prevista_conclusao" id="data_prevista_conclusao" class="mt-1 block w-full" required>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Criar Obra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
