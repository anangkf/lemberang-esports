<?= $this->extend('templates/admin/base'); ?>
<?= $this->section('content'); ?>
<div class="row justify-content-between">
    <div class="col col-lg-4">
        <div class="card bg-success bg-gradient text-white">
            <div class="card-body">
                <h4 class="card-title">Berita</h4>
                <p class="card-text"><?= count($berita) ?></p>
            </div>
        </div>
    </div>
    <div class="col col-lg-4">
        <div class="card bg-warning bg-gradient text-white">
            <div class="card-body">
                <h4 class="card-title">Tournament</h4>
                <p class="card-text"><?= count($tournament) ?></p>
            </div>
        </div>
    </div>
    <div class="col col-lg-4">
        <div class="card bg-danger bg-gradient text-white">
            <div class="card-body">
                <h4 class="card-title">Users</h4>
                <p class="card-text"><?= count($users) ?></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <?= view_cell('ChartCell') ?>
</div>
<?= $this->endSection(); ?>
<?= $this->section('page-script'); ?>
<script>
    const ctx = document.getElementById('insightChart').getContext('2d');
    const insightChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: getLastSixMonths(),
            datasets: [{
                    label: 'Data Berita',
                    data: <?= json_encode($berita_chart) ?>,

                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Data Like',
                    data: <?= json_encode($like_chart) ?>,

                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Data Komentar',
                    data: <?= json_encode($comment_chart) ?>,

                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            }
        }
    });

    function getLastSixMonths() {
        const months = [];
        const currentDate = new Date();

        for (let i = 0; i < 6; i++) {
            const month = new Date(currentDate.getFullYear(), currentDate.getMonth() - i, 1);
            months.unshift(month.toLocaleString('default', {
                month: 'long'
            }));
        }

        return months;
    }
</script>
<?= $this->endSection(); ?>