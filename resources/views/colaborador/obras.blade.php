<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Minhas Obras
        </h2>
    </x-slot>

    @if($obras->isEmpty())
        <p class="p-4">Você ainda não foi cadastrado em nenhuma obra.</p>
    @else
        <ul class="p-4 list-disc list-inside">
            @foreach($obras as $obra)
                <li class="list-item">{{ $obra->nome }} - <a class="list-link" href="{{ route('obras.show', $obra->id) }}">Ver Detalhes</a></li>
            @endforeach
        </ul>
    @endif
</x-app-layout>
