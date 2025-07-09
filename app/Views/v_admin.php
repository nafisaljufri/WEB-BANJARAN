<div class="main-panel">
			<div class="content">
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fas fa-users"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Paket Wisata</p>
												<h4 class="card-title"><?= $totalPaket?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="far fa-newspaper"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Total Pesanan</p>
												<h4 class="card-title"><?= $totalPesanan?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="far fa-chart-bar"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Pembayaran</p>
												<h4 class="card-title"><?= $totalPembayaran?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-secondary bubble-shadow-small">
												<i class="far fa-check-circle"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Galeri</p>
												<h4 class="card-title"><?= $totalGaleri?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">User Statistics</div>
										<div class="card-tools">
											<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
												Export
											</a>
											<a href="#" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												Print
											</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container" style="min-height: 375px">
										<canvas id="statisticsChart"></canvas>
                                        <script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('statisticsChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Dibayar', 'Selesai'],
            datasets: [{
                label: 'Status Pesanan',
                data: [<?= $jumlahPending ?? 0 ?>, <?= $jumlahDibayar ?? 0 ?>, <?= $jumlahSelesai ?? 0 ?>],
                backgroundColor: ['#f39c12', '#28a745', '#3498db'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>

									</div>
									<div id="myChartLegend"></div>
								</div>
							</div>
						</div>
                        
						<div class="col-md-4">
							<div class="card card-secondary">
								<div class="card-header">
									<div class="card-title"><h1>Penjualan</h1></div>
									<div class="card-category">Pembayaran Hari Ini (<?= date('d M Y') ?>)</div>
								</div>
								<div class="card-body pb-0">
									<div class="mb-4 mt-2">
										<h1>Rp <?= number_format($totalBayarHariIni, 0, ',', '.') ?></h1>
									</div>
									<div class="pull-in">
										<canvas id="dailySalesChart"></canvas>
									</div>
								</div>
							</div>
							<div class="card card-info bg-info-gradient">
								<div class="card-body">
									<h4 class="mb-1 fw-bold">Tasks Progress</h4>
									<div id="task-complete" class="chart-circle mt-4 mb-3"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
console.log('ChartJS loaded:', typeof Chart !== 'undefined');
</script>
<script>
const ctx = document.getElementById('statisticsChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Dibayar', 'Selesai'],
        datasets: [{
            label: 'Status Pesanan',
            data: [<?= $jumlahPending ?? 0 ?>, <?= $jumlahDibayar ?? 0 ?>, <?= $jumlahSelesai ?? 0 ?>],
            backgroundColor: ['#f39c12', '#28a745', '#3498db'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>
