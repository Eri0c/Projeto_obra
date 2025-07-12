<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Criar Nova Tarefa para Obra: {{ $obra->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-container">
                <h3>Nova Tarefa</h3>

                @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('tarefas.store', ['obra' => $obra->id]) }}" method="POST">
                    @csrf

                    <input type="hidden" name="obra_id" value="{{ $obra->id }}">

                    <div class="form-grid">
                        <div class="form-field">
                            <label for="titulo">Título</label>
                            <input id="titulo" name="titulo" type="text" required />
                        </div>

                        <div class="form-field">
                            <label for="comodo">Cômodo</label>
                            <select name="comodo" id="comodo" required>
                                <option value="">Selecione um cômodo</option>
                                @foreach($comodos as $comodo)
                                <option value="{{ $comodo->nome }}">{{ $comodo->nome }}</option>
                                @endforeach
                                <option value="outro">Adicionar um novo cômodo</option>
                            </select>
                            <input id="novo_comodo" name="novo_comodo" type="text" placeholder="Ou digite um novo cômodo" />
                        </div>

                        <div class="form-field">
                            <label for="seleciona_tarefa">Tarefa</label>
                            <select id="seleciona_tarefa" name="seleciona_tarefa" required>
                                <option value="">Selecione uma tarefa</option>
                                @foreach($tipos_tarefas as $tipo)
                                <option value="{{ $tipo->nome }}">{{ $tipo->nome }}</option>
                                @endforeach
                                <option value="outro">Adicionar uma nova tarefa</option>
                            </select>
                            <input id="nova_tarefa" name="nova_tarefa" type="text" placeholder="Ou digite uma nova tarefa" />
                        </div>

                        <div class="form-field">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="em andamento">Em Andamento</option>
                                <option value="concluída">Concluída</option>
                                <option value="em espera">Em Espera</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="descricao">Descrição</label>
                        <textarea id="descricao" name="descricao" rows="4" required></textarea>
                    </div>

                    <x-button>Criar Tarefa</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>