<h2 class="page-title">
	Dashboard
</h2>

<div class="alert alert-success alert-dismissible" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
  Selamat Datang <b><?php echo $this->session->userdata('nama_lengkap'); ?></b> Sebagai <b><?php echo ucwords($this->session->userdata('level')); ?></b>
  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
</div>

<?php if (userLevel() == 'administrator'): ?>
	<?php foreach ($inactive_users as $user): ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<i class="fa fa-users"></i>
			Ada karyawan baru bernama <b><?= $user['nama_lengkap']; ?></b> yang harus di verifikasi
			<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
		</div>
	<?php endforeach; ?>
	<?php foreach ($inactive_transactions as $transaction): ?>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<i class="fa fa-money"></i>
			Ada transaksi baru dengan no faktur <b><?= $transaction['no_faktur']; ?></b> yang harus di validasi
			<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<?php if (userLevel() == 'karyawan'): ?>
	<?php foreach ($penjualan_notifications as $notification): ?>
		<div class="alert alert-success alert-dismissible">
			<i class="fa fa-check"></i>
			Transaksi dengan no faktur <b><?= $notification->no_faktur; ?></b> sudah di validasi
			<a href="/PenjualanUserPivot/update/<?= $notification->id; ?>" class="btn-close"></a>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<?php if (userLevel() == 'owner'): ?>
	<div class="row">
		<div class="col-md-6 col-xl-3">
			<div class="card card-sm">
				<div class="card-body d-flex align-items-center">
	      <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
	      </span>
					<div class="mr-3">
						<div class="font-weight-medium">
							<?php echo $jmlpelanggan; ?> Pelanggan
						</div>
						<div class="text-muted">Data Pelanggan</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-3">
			<div class="card card-sm">
				<div class="card-body d-flex align-items-center">
	      <span class="bg-green text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="19" r="2" /><circle cx="17" cy="19" r="2" /><path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" /></svg>
	      </span>
					<div class="mr-3">
						<div class="font-weight-medium">
							<?php echo $jmlpenjualan; ?> Transaksi
						</div>
						<div class="text-muted">Transaksi Hari Ini</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-3">
			<div class="card card-sm">
				<div class="card-body d-flex align-items-center">
	      <span class="bg-blue text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><rect x="10" y="12" width="4" height="4" /></svg>
	      </span>
					<div class="mr-3">
						<div class="font-weight-medium">
							<?php echo $jmlcabang; ?> Cabang
						</div>
						<div class="text-muted">Data Cabang</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-3">
			<div class="card card-sm">
				<div class="card-body d-flex align-items-center">
	      <span class="bg-orange text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
	      </span>
					<div class="mr-3">
						<div class="font-weight-medium">
							<?php echo "Rp." . number_format($jmlbayar['totalbayar'], '0', '', '.'); ?>
						</div>
						<div class="text-muted">Pendapatan Hari Ini</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Grafik Penjualan</h3>
				</div>
				<div class="card-body">
					<?php foreach($rekappenjualan as $d) {
						$bulan[] = $d->namabulan;
						$totalpenjualan[] = $d->totalpenjualan;
					} ?>
					<div id="chart-tasks-overview"></div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-tasks-overview'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 320,
      			parentHeightOffset: 0,
      			toolbar: {
      				show: false,
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "A",
      			data: <?php echo json_encode($totalpenjualan); ?>
      		}],
      		grid: {
      			padding: {
      				top: -20,
      				right: 0,
      				left: -4,
      				bottom: -4
      			},
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			categories: <?php echo json_encode($bulan); ?>
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		colors: ["#206bc4"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
