<div {{ $attributes->merge(['class' => 'form-field']) }}>
    <x-label for="{{ $for ?? '' }}" value="{{ $label ?? '' }}" />
    {{ $slot }}
    @if(isset($error))
        <x-input-error for="{{ $for ?? '' }}" :messages="$error" />
    @endif
</div>