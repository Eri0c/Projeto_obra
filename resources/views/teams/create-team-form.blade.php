<x-form-section submit="createTeam">
    <x-slot name="title">
        {{ __('Team Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new team to collaborate with others on projects.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-label value="{{ __('Team Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="size-12 rounded-full object-cover" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">

                <div class="ms-4 leading-tight">
                    <div class="text-gray-900">{{ $this->user->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $this->user->email }}</div>
                </div>
            </div>
        </div>

        <x-form-field for="name" label="{{ __('Team Name') }}">
            <x-input id="name" type="text" wire:model="state.name" autofocus />
            <x-input-error for="name" />
        </x-form-field>
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Create') }}
        </x-button>
    </x-slot>
</x-form-section>
