<form action="<?php echo base_url() ?>barang/simpanharga" class="formharga" method="POST">
	<div class="form-group mb-3">
		<input type="text" readonly class="form-control" name="kodeharga" id="kodeharga" placeholder="Kode Harga">
	</div>
	<div class="form-group mb-3">
		<select name="kodebarang" id="kodebarang" class="form-select">
			<option value="">Pilih Barang</option>
			<?php foreach ($barang as $b) { ?>
				<option value="<?php echo $b->kode_barang; ?>"><?php echo $b->kode_barang . " - " . $b->nama_barang; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group mb-3">
		<input type="number" id="harga" class="form-control" name="harga" placeholder="Harga">
	</div>
	<div class="form-group mb-3">
		<input type="number" id="stok" class="form-control" name="stok" placeholder="Stok">
	</div>
	<div class="form-group mb-3">
		<select id="cabang" name="cabang" class="form-select">
			<option value="">Pilih Cabang</option>
			<?php foreach ($cabang as $c) { ?>
				<option value="<?php echo $c->kode_cabang; ?>"><?php echo $c->nama_cabang; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-primary w-100">Simpan</button>
	</div>
</form>

<script>
	$(function(){
		$('.formharga').bootstrapValidator({
	      fields: {
          kodebarang: {
	          message: 'Barang Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Barang Harus Diisi !'
	          }
            }
          },
          harga: {
	          message: 'Harga Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Harga Harus Diisi !'
	          }
            }
          },
          stok: {
	          message: 'Stok Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Stok Harus Diisi !'
	          }
            }
          },
          cabang: {
	          message: 'Cabang Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Cabang Harus Diisi !'
	          }
            }
          },
	    }
	   });

		function loadkodeharga() {
			var kodebarang = $("#kodebarang").val();
			var kodecabang = $("#cabang").val();
			var kodeharga = kodebarang + kodecabang;
			$("#kodeharga").val(kodeharga);
		}

		$("#kodebarang").change(function() {
			loadkodeharga();
		});

		$("#cabang").change(function() {
			loadkodeharga();
		});
	});
</script>
