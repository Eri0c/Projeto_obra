<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center leading-tight ">
            {{ __('Gerenciar Obras') }}
        </h2>
        <a href="{{ route('obras.create') }}" class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Criar obra
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold">Obras em Andamento</h3>

                    @if($obras->isEmpty())
                        <p>Nenhuma obra em andamento.</p>
                    @else
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Nome da Obra</th>
                                    <th class="px-4 py-2">Data de Início</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($obras as $obra)
                                    <tr>
                                        <td class="px-4 py-2">{{ $obra->nome }}</td>
                                        <td class="px-4 py-2">{{ $obra->data_inicio->format('d/m/Y') }}</td>
                                        <td class="px-4 py-2">{{ $obra->status }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('obras.show', $obra->id) }}" class="text-blue-500">Ver Detalhes</a>
                                        </td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('obras.colaboradores.adicionar', $obra->id) }}"
                                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                                Adicionar Colaborador
                                            </a>
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
</x-app-layout>
