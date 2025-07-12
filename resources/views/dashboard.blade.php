<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="main-content">
        <div class="dashboard">
            <div class="dashboard-header">
                <h1>{{ __('Dashboard') }}</h1>
            </div>

            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <h2>Resumo das Obras</h2>
                    <ul>
                        <li>
                            <span>Obras em andamento</span>
                            <span>3</span>
                        </li>
                        <li>
                            <span>Obras concluídas</span>
                            <span>5</span>
                        </li>
                        <li>
                            <span>Obras paradas</span>
                            <span>1</span>
                        </li>
                    </ul>
                </div>

                <div class="dashboard-card">
                    <h2>Tarefas Pendentes</h2>
                    <ul>
                        <li>
                            <span>Instalação elétrica</span>
                            <span>Em andamento</span>
                        </li>
                        <li>
                            <span>Pintura da fachada</span>
                            <span>Pendente</span>
                        </li>
                        <li>
                            <span>Assentamento de piso</span>
                            <span>Atrasada</span>
                        </li>
                    </ul>
                </div>

                <div class="dashboard-card">
                    <h2>Gráfico de Atividades</h2>
                    <canvas id="activityChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('activityChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
                    datasets: [{
                        label: 'Tarefas Concluídas',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
