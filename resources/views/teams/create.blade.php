<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Team') }}
        </h2>
    </x-slot>

    <div>
        <div class="main-content">
            @livewire('teams.create-team-form')
        </div>
    </div>
</x-app-layout>
