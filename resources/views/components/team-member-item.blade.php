<div {{ $attributes->merge(['class' => 'team-member-item']) }}>
    <div>
        <img src="{{ $profile_photo_url }}" alt="{{ $name }}">
        <div>{{ $name }}</div>
    </div>

    <div>
        @if (isset($actions))
            {{ $actions }}
        @endif
    </div>
</div>