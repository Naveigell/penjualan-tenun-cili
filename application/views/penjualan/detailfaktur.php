<h2 class="page-title">
	Data Faktur
</h2>
<div><?php echo $this->session->flashdata('msg'); ?></div>
<form id="formpenjualan" method="POST" action="<?php echo base_url(); ?>penjualan/simpanpenjualan">
	<input type="hidden" id="cekBarang">
	<div class="row">
		<div class="col-md-5">
			<div class="card">
				<div class="card-body">
						<table class="table table-striped table-bordered">
								<tr>
									<th>No. Faktur</th>
									<th><?php echo $penjualan['no_faktur']; ?></th>
								</tr>
								<tr>
									<th>Tanggal Transaksi</th>
									<th><?php echo $penjualan['tgltransaksi']; ?></th>
								</tr>
								<tr>
									<th>Kode Pelanggan</th>
									<th><?php echo $penjualan['kode_pelanggan']; ?></th>
								</tr>
								<tr>
									<th>Nama Pelanggan</th>
									<th><?php echo $penjualan['nama_pelanggan']; ?></th>
								</tr>
								<tr>
									<th>Jenis Transaksi</th>
									<th><?php echo ucwords($penjualan['jenistransaksi']); ?></th>
								</tr>
								<?php if ($penjualan['jenistransaksi'] == "kredit") { ?>
								<tr>
									<th>Jatuh Tempo</th>
									<th><?php echo $penjualan['jatuhtempo']; ?></th>
								</tr>
								<?php } ?>
						</table>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card card-sm">
			    <div class="card-body d-flex align-items-center">
				      <span class="bg-blue text-white avatar mr-3" style="height: 9rem; width: 9rem;">
				      	<i class="fa fa-shopping-cart" style="font-size: 5rem;"></i>
				      </span>
			      	<div class="mr-3">
			          	<h2 id="totalpenjualan" style="font-size: 5rem;">0</h2>
			      </div>
			    </div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Data Barang</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-2">
							<div class="input-icon mb-3">
			                      <span class="input-icon-addon">
			                          <i class="fa fa-barcode"></i>
			                      </span>
			                      <input type="text" readonly class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang">
		                    </div>
						</div>
						<div class="col-md-4">
							<div class="input-icon mb-3">
			                      <span class="input-icon-addon">
			                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="6" rx="1" /><rect x="14" y="4" width="6" height="6" rx="1" /><rect x="4" y="14" width="6" height="6" rx="1" /><rect x="14" y="14" width="6" height="6" rx="1" /></svg>
			                      </span>
			                      <input type="text" readonly class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang">
		                    </div>
						</div>
						<div class="col-md-2">
							<div class="input-icon mb-3">
			                      <span class="input-icon-addon">
			                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect width="6" height="6" x="9" y="5" rx="1" /><line x1="4" y1="7" x2="5" y2="7" /><line x1="4" y1="11" x2="5" y2="11" /><line x1="19" y1="7" x2="20" y2="7" /><line x1="19" y1="11" x2="20" y2="11" /><line x1="4" y1="15" x2="20" y2="15" /><line x1="4" y1="19" x2="20" y2="19" /></svg>
			                      </span>
			                      <input type="text" readonly class="form-control" style="text-align: right;" name="harga" id="harga" placeholder="Harga">
		                    </div>
						</div>
						<div class="col-md-2">
							<div class="input-icon mb-3">
			                      <span class="input-icon-addon">
			                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
			                      </span>
			                      <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty">
		                    </div>
						</div>
						<div class="col-md-2">
							<a href="#" class="btn btn-primary" id="tambahbarang">
								<i class="fa fa-cart-plus" style="font-size: 1.1rem;"></i></a>
							</button>
						</div>
					</div>
					<div class="row">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>NO</th>
									<th>KODE BARANG</th>
									<th>NAMA BARANG</th>
									<th>HARGA</th>
									<th>QTY</th>
									<th>TOTAL</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody id="loaddatabarang">

							</tbody>

						</table>
					</div>
					<div class="row mt-3">
						<button type="submit" class="btn btn-primary w100">SIMPAN</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<div class="modal modal-blur fade" id="modalpelanggan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Pelanggan</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  		<table class="table table-striped table-bordered" id="tabelpelanggan">
				<thead>
					<tr>
						<th style="width: 7%;">NO</th>
						<th>KODE PELANGGAN</th>
						<th>NAMA PELANGGAN</th>
						<th>ALAMAT</th>
    				<th>NO. HP</th>
    				<th>CABANG</th>
						<th style="width: 15%;">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
	        $no = 1;
	        foreach ($pelanggan as $p) {
	        ?>
          <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $p->kode_pelanggan; ?></td>
              <td><?php echo $p->nama_pelanggan; ?></td>
              <td><?php echo $p->alamat_pelanggan; ?></td>
              <td><?php echo $p->no_hp; ?></td>
              <td><?php echo $p->nama_cabang; ?></td>
              <td>
                  <a href="#" class="btn btn-sm btn-primary pilih" data-kodepel="<?php echo $p->kode_pelanggan; ?>" data-namapel="<?php echo $p->nama_pelanggan; ?>">Pilih</a>
              </td>
          </tr>
	        <?php
	         $no++;
	        } ?>
				</tbody>
		</table>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modalbarangharga" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Harga Barang</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  		<table class="table table-striped table-bordered" id="tabelharga">
			<thead>
				<tr>
					<th style="width: 7%;">NO</th>
      		<th>KODE HARGA</th>
					<th>KODE BARANG</th>
					<th>NAMA BARANG</th>
					<th>SATUAN</th>
      		<th>HARGA</th>
      		<th>STOK</th>
      		<th>CABANG</th>
					<th style="width: 15%;">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
        $no = 1;
        foreach ($harga as $h) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $h->kode_harga; ?></td>
                <td><?php echo $h->kode_barang; ?></td>
                <td><?php echo $h->nama_barang; ?></td>
                <td><?php echo $h->satuan; ?></td>
                <td align="right"><?php echo "Rp. ". number_format($h->harga, '0', '', '.'); ?></td>
                <td><?php echo $h->stok; ?></td>
                <td><?php echo $h->kode_cabang; ?></td>

                <td>
                    <a href="#" class="btn btn-sm btn-primary pilihbarang" data-kodebarang="<?php echo $h->kode_barang; ?>" data-namabarang="<?php echo $h->nama_barang; ?>" data-harga="<?php echo $h->harga; ?>">Pilih</a>
                </td>
            </tr>
        <?php
            $no++;
        } ?>
			</tbody>
		</table>
      </div>
    </div>
  </div>
</div>
