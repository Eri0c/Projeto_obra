<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Obra: ') . $obra->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <h3 class="text-lg font-bold">Tarefas da Obra</h3>

                    @if($obra->tarefas->isEmpty())
                        <p>Nenhuma tarefa cadastrada para esta obra.</p>
                    @else
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Título</th>
                                    <th class="px-4 py-2">Comôdo</th>
                                    <th class="px-4 py-2">Descrição</th>
                                    <th class="px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($obra->tarefas as $tarefa)
                                    <tr>
                                        <td class="px-4 py-2">{{ $tarefa->titulo }}</td>
                                        <td class="px-4 py-2">{{ $tarefa->comodo }}</td>
                                        <td class="px-4 py-2">{{ $tarefa->descricao }}</td>
                                        <td class="px-4 py-2">{{ $tarefa->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <a href="{{ route('tarefas.create', $obra->id) }}" 
                       class="mt-4 bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full inline-block">
                        Criar Nova Tarefa
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
