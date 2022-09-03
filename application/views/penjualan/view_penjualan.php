<h2 class="page-title">
	Data Penjualan
</h2>
<div class="row mt-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<?php if (userLevel() == 'karyawan'): ?>
					<a href="<?php echo base_url(); ?>penjualan/inputpenjualan" class="btn btn-success mb-3">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
						Tambah Data</a>
				<?php endif; ?>
				<form action="<?php echo base_url(); ?>penjualan/index" method="POST">
					<div class="input-icon mb-3">
	                      <span class="input-icon-addon">
	                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><rect x="5" y="11" width="1" height="2" /><line x1="10" y1="11" x2="10" y2="13" /><rect x="14" y="11" width="1" height="2" /><line x1="19" y1="11" x2="19" y2="13" /></svg>
	                      </span>
	                      <input type="text" value="<?php echo $no_faktur; ?>" class="form-control" name="no_faktur" id="no_faktur" placeholder="No. Faktur">
                    </div>
                    <div class="input-icon mb-3">
	                      <span class="input-icon-addon">
	                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
	                      </span>
	                      <input type="text" value="<?php echo $namapelanggan; ?>" class="form-control" name="namapelanggan" id="namapelanggan" placeholder="Pelanggan">
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
                    		<div class="input-icon mb-3">
		                      <span class="input-icon-addon">
		                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
		                      </span>
		                      <input type="date" value="<?php echo $dari; ?>" class="form-control" name="dari" id="dari" placeholder="Dari">
                    		</div>
                    	</div>
                    	<div class="col-md-6">
                    		<div class="input-icon mb-3">
		                      <span class="input-icon-addon">
		                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
		                      </span>
		                      <input type="date" value="<?php echo $sampai; ?>" class="form-control" name="sampai" id="sampai" placeholder="Sampai">
                    		</div>
                    	</div>
                    </div>
                    <div class="mb-3">
                    	<button type="submit" name="submit" class="btn btn-primary w-100"><i class="fa fa-search mr-2"></i> Cari Data</button>
                    </div>
				</form>
        		<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="width: 3%;">NO</th>
							<th>NO FAKTUR</th>
							<th>TANGGAL</th>
							<th>KODE PELANGGAN</th>
              				<th>NAMA PELANGGAN</th>
              				<th>JENIS TRANSAKSI</th>
              				<!-- <th>JATUH TEMPO</th> -->
              				<th>TOTAL PENJUALAN</th>
              				<th>TOTAL BAYAR</th>
              				<!-- <th>SISA BAYAR</th> -->
              				<th>KET</th>
              				<th>PENANGGUNG JAWAB</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = $row + 1;
						foreach ($penjualan as $p) {
							$sisabayar = $p->totalpenjualan - $p->totalbayar;
							if ($sisabayar > 0) {
								$ket = "Belum Lunas";
								$warna = "bg-red";
							} else {
								$ket = "Lunas";
								$warna = "bg-green";
							}

							$branch = $this->session->userdata('kode_cabang');

							if (!preg_match("/{$branch}/i", $p->no_faktur)) {
								continue;
							}

//							if (strpos($p->no_faktur, $this->session->userdata('kode_cabang')) !== false) {
//								continue;
//							}
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $p->no_faktur; ?></td>
								<td><?php echo $p->tgltransaksi; ?></td>
								<td><?php echo $p->kode_pelanggan; ?></td>
								<td><?php echo $p->nama_pelanggan; ?></td>
								<td><?php echo $p->jenistransaksi; ?></td>
								<!-- <td><?php echo $p->jatuhtempo; ?></td> -->
								<td align="right"><?php echo "Rp. ". number_format($p->totalpenjualan, '0', '', '.'); ?></td>
								<td align="right"><?php echo "Rp. ". number_format($p->totalbayar, '0', '', '.'); ?></td>
								<!-- <td align="right"><?php echo "Rp. ". number_format($p->totalpenjualan - $p->totalbayar, '0', '', '.'); ?></td> -->
								<td align="center"><span class="badge <?php echo $warna; ?>"><?php echo $ket; ?></span></td>
								<td><?php echo $p->nama_lengkap; ?></td>
								<td>
									<?php if (userLevel() == 'administrator'): ?>
										<form action="<?php echo base_url(); ?>penjualan/approve/<?php echo $p->no_faktur; ?>" class="d-inline" method="post">
											<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
										</form>
										<a href="#" class="btn btn-sm btn-danger hapus" data-href="<?php echo base_url(); ?>penjualan/hapuspenjualan/<?php echo $p->no_faktur; ?>">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
										</a>
									<?php else: ?>
										<a href="#" class="btn btn-sm btn-danger hapus" data-href="<?php echo base_url(); ?>penjualan/hapuspenjualan/<?php echo $p->no_faktur; ?>">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
										</a>
										<a href="<?php echo base_url(); ?>penjualan/cetakpenjualan/<?php echo $p->no_faktur; ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></a>
										<!-- <?php if ($sisabayar != 0) { ?>
									<a href="<?php echo base_url(); ?>penjualan/detailfaktur/<?php echo $p->no_faktur; ?>" class="btn btn-sm btn-success">Bayar</i></a>
									<?php } ?> -->
									<?php endif; ?>
								</td>
							</tr>
						<?php
						$no++;
						} ?>
					</tbody>

				</table>
				<div><?php echo $pagination; ?></div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="modal modal-blur fade" id="modalhapuspenjualan" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Apa Anda Yakin?</div>
      <div>Jika Dihapus Maka Anda Akan Kehilangan Data Ini</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Kembali</button>
      <a href="#" id="hapuspenjualan" class="btn btn-danger">Ya, Hapus</a>
    </div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  	flatpickr(document.getElementById('dari'), {});
  	flatpickr(document.getElementById('sampai'), {});
  });
</script>
<script>
	$(function() {
		$(".hapus").click(function() {
	        var href = $(this).attr("data-href");
	        $("#modalhapuspenjualan").modal("show");
	        $("#hapuspenjualan").attr("href", href);
	    });
	});
</script>
