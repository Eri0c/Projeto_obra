@extends('layouts.app')

@section('content')
    <h2>Minhas Obras</h2>
    @if($obras->isEmpty())
        <p>Você ainda não foi cadastrado em nenhuma obra.</p>
    @else
        <ul>
            @foreach($obras as $obra)
                <li>{{ $obra->nome }} - <a href="{{ route('obras.show', $obra->id) }}">Ver Detalhes</a></li>
            @endforeach
        </ul>
    @endif
@endsection
