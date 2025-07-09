<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciar Tarefas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold">Minhas tarefas</h3>

                    @if($tarefas->isEmpty())
                        <p>Nenhuma obra em andamento.</p>
                    @else
                        <table class="data-table">
                            <thead>
                                <tr class="table-header">
                                    <th class="table-cell">Nome da Obra</th>
                                    <th class="table-cell">Data de Início</th>
                                    <th class="table-cell">Status</th>
                                    <th class="table-cell">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($obras as $obra)
                                    <tr class="table-row">
                                        <td class="table-cell">{{ $obra->nome }}</td>
                                        <td class="table-cell">{{ $obra->data_inicio->format('d/m/Y') }}</td>
                                        <td class="table-cell">{{ $obra->status }}</td>
                                        <td class="table-cell">
                                            <a href="{{ route('obras.show', $obra->id) }}" class="action-link">Ver Detalhes</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>