<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Criar Nova Tarefa para Obra: {{ $obra->nome }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('tarefas.store', ['obras' =>$obra->id]) }}" method="POST">
                        @csrf

                        <input type="hidden" name="obra_id" value="{{ $obra->id }}">

                        <div class="mt-4">
                            <x-label for="titulo" value="Título" />
                            <x-input id="titulo" name="titulo" type="text" class="block mt-1 w-full" required />
                        </div>

                        <div class="mt-4">
                            
                            <select id="comodo" name="comodo" class="block mt-1 w-full" required>
                                <option value="">Selecione um cômodo</option>
                                <option value="quarto">Quarto</option>
                                <option value="banheiro">Banheiro</option>
                                <option value="sala">Sala</option>
                                <option value="cozinha">Cozinha</option>
                                <option value="garagem">Garagem</option>
                                <option value="escritório">Escritório</option>
                                <option value="área de serviço">Área de Serviço</option>
                            </select>


                        </div>
                        <div class="mt-4">
                            
                            <select id="seleciona_tarefa" name="seleciona_tarefa" class="block mt-1 w-full" required>
                                <option value="">Selecione uma tarefa</option>
                                <option value="pintura">Pintura</option>
                                <option value="porcelanato">Porcelanato</option>
                                <option value="sala">Sala</option>
                                <option value="cozinha">Cozinha</option>
                                <option value="garagem">Garagem</option>
                                <option value="escritório">Escritório</option>
                                <option value="área de serviço">Área de Serviço</option>
                            </select>


                        </div>

                        <div class="mt-4">
                            <x-label for="descricao" value="Descrição" />
                            <textarea id="descricao" name="descricao" class="block mt-1 w-full" required></textarea>
                        </div>

                        <div class="mt-4">
                            <x-label for="status" value="Status" />
                            <select id="status" name="status" class="block mt-1 w-full">
                                <option value="em andamento">Em Andamento</option>
                                <option value="concluída">Concluída</option>
                                <option value="em espera">Em Espera</option>
                            </select>
                        </div>

                        <x-button class="mt-4">
                            Criar Tarefa
                        </x-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>