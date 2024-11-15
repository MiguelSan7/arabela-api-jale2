<!-- resources/views/graficas/numdama.blade.php -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Distribución de NumDama</h3>
    </div>
    <div class="card-body">
        <canvas id="numDamaChart"></canvas>
    </div>
</div>

<script>
    console.log(data);
 /*   
    const chartData = @json($chartData);

    const ctx = document.getElementById('numDamaChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Cantidad de NumDama',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Distribución de NumDama'
                },
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'NumDama'
                    }
                }
            }
        }
    });*/
</script>