<h2 class="page-title">
	Data Barang
</h2>

<div class="row mt-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<?php if (userLevel() == 'administrator'): ?>
					<a href="#" class="btn btn-success mb-3" id="tambahbarang">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
						Tambah Data</a>
				<?php endif; ?>
                <div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
				<table class="table table-striped table-bordered" id="tabelbarang">
					<thead>
						<tr>
							<th style="width: 7%;">NO</th>
							<th>KODE BARANG</th>
							<th>NAMA BARANG</th>
							<th>SATUAN</th>
							<?php if (userLevel() == 'administrator'): ?>
								<th style="width: 11%;">AKSI</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php 
                        $no = 1;
                        foreach ($barang as $b) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $b->kode_barang; ?></td>
                                <td><?php echo $b->nama_barang; ?></td>
                                <td><?php echo $b->satuan; ?></td>
								<?php if (userLevel() == 'administrator'): ?>
									<td>
										<a href="#" data-kodebarang="<?php echo $b->kode_barang; ?>" class="btn btn-sm btn-primary edit">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg>
											Edit</a>
										<a href="#" data-href="<?php echo base_url(); ?>barang/hapusbarang/<?php echo $b->kode_barang; ?>" class="btn btn-sm btn-danger hapus">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
											Hapus</a>
									</td>
								<?php endif; ?>
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
<div class="modal modal-blur fade" id="modalbarang" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Input Barang</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      		<div id="loadforminputbarang"></div>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modaleditbarang" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Barang</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div id="loadformeditbarang"></div>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modalhapusbarang" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Apa Anda Yakin?</div>
      <div>Jika Dihapus Maka Anda Akan Kehilangan Data Ini</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Kembali</button>   
      <a href="#" id="hapusbarang" class="btn btn-danger">Ya, Hapus</a>
    </div>
  </div>
</div>
</div>


<script>
    $(function() {
        $("#tambahbarang").click(function() {
            $("#modalbarang").modal("show");
            $("#loadforminputbarang").load("<?php echo base_url(); ?>barang/inputbarang");
        });
        $(".edit").click(function() {
            var kodebarang = $(this).attr("data-kodebarang");
            $("#modaleditbarang").modal("show");
            $("#loadformeditbarang").load("<?php echo base_url(); ?>barang/editbarang/" + kodebarang);
        });
        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapusbarang").modal("show");
            $("#hapusbarang").attr("href", href);
        });

        $('#tabelbarang').DataTable();
    });
</script>
