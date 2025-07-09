<div {{ $attributes->merge(['class' => 'team-invitation-item']) }}>
    <div>{{ $email }}</div>

    <div>
        @if (isset($actions))
            {{ $actions }}
        @endif
    </div>
</div>