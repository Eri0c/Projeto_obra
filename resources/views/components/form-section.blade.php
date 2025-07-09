@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="form-section-content">
        <form wire:submit="{{ $submit }}">
            <div class="form-section-form-body">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="form-section-actions">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
