<x-app-layout>
    <div class="container text-center">
        <h2>Você ainda não está vinculado a nenhuma obra.</h2>
        <p>Gere um código de autorização e envie ao responsável para que ele possa vinculá-lo a uma obra.</p>

        <form method="POST" action="{{ route('colaborador.gerar-codigo') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Gerar Código</button>
        </form>

        @if(session('codigo'))
            <div class="alert alert-success mt-3">
                <strong>Seu código:</strong> {{ session('codigo') }} <br>
                Envie esse código ao responsável.
            </div>
        @endif
    </div>
</x-app-layout>
