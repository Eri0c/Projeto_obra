<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar nova obra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-container">
                <h3>Novo Cadastro de Obra</h3>

                <form action="{{ route('obras.store') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-field">
                            <label for="nome">Nome da Obra</label>
                            <input type="text" name="nome" id="nome" required>
                        </div>

                        <div class="form-field">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" id="endereco" required>
                        </div>

                        <div class="form-field">
                            <label for="status">Status</label>
                            <select name="status" id="status" required>
                                <option value="em andamento">Em Andamento</option>
                                <option value="concluida">Concluída</option>
                                <option value="em espera">Em Espera</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <label for="data_inicio">Data de Início</label>
                            <input type="date" name="data_inicio" id="data_inicio" required>
                        </div>

                        <div class="form-field">
                            <label for="data_prevista_conclusao">Data Prevista para Conclusão</label>
                            <input type="date" name="data_prevista_conclusao" id="data_prevista_conclusao" required>
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" id="descricao" rows="4" required></textarea>
                    </div>

                    <x-button>Criar obra</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
