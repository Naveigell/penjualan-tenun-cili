<?php $no = 1;
$totalpenjualan = 0;
foreach ($barangtemp as $b) {
	$totalpenjualan = $totalpenjualan + $b->total;

	var_dump($b);
?>
<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $b->kode_barang; ?></td>
	<td><?php echo $b->nama_barang; ?></td>
	<td align="right"><?php echo "Rp. ". number_format($b->harga, '0', '', '.'); ?></td>
	<td><?php echo $b->qty; ?></td>
	<td align="right"><?php echo "Rp. ". number_format($b->total, '0', '', '.'); ?></td>
	<td>
		<a href="#" class="btn btn-sm btn-danger hapus" data-kodebarang="<?= $b->kode_barang; ?>" data-iduser="<?= $b->id_user; ?>">
			<i class="fa fa-trash"></i>
		</a>
	</td>
</tr>
<?php
	$no++;
	} ?>

	<tr>
		<th colspan="5">GRAND TOTAL</th>
		<th style="text-align: right;"><p id="grandtotal"><?php echo "Rp. ". number_format($totalpenjualan, '0', '', '.'); ?></p></th>
		<th></th>
	</tr>

<script>
	$(function() {
		function loaddatabarang()
		{
			var id_user = $("#id_user").val();
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>penjualan/getDatabarangtemp',
				data: {
					id_user: id_user
				},
				cache: false,
				success: function(respond) {
					$("#loaddatabarang").html(respond);
				}
			});
		}
		function loadgrandtotal() {
			var grandtotal = $("#grandtotal").text();
			$("#totalpenjualan").text(grandtotal);
		}
		loadgrandtotal();
		$(".hapus").click(function() {
			var kodebarang = $(this).attr("data-kodebarang");
			var iduser = $(this).attr("data-iduser");
			var kode_pelanggan = $('#kode_pelanggan').val();
			var nama_pelanggan = $('#namapelanggan').val();
			var jenis_transaksi = $('#jenistransaksi :selected').val();

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>penjualan/hapusBarangtemp',
				//url: '<?php //echo base_url(); ?>//penjualan/hapusBarangtemp',
				data: {
					kodebarang: kodebarang,
					iduser: iduser,
					kode_pelanggan: kode_pelanggan,
					nama_pelanggan: nama_pelanggan,
					jenis_transaksi: jenis_transaksi,
				},
				cache: false,
				success: function(respond) {
					if (respond == 1) {
						swal("Deleted", "Data Berhasil Dihapus", "success").then(function () {
							window.location.reload();
						});
						// loaddatabarang();
					}
				}
			});
		});
	});
</script>
