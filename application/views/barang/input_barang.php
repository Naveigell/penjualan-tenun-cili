<form action="<?php echo base_url() ?>barang/simpanbarang" class="formbarang" method="POST">
	<div class="form-group mb-3">
		<input type="text" class="form-control" name="kodebarang" placeholder="Kode Barang">
	</div>
	<div class="form-group mb-3">
		<input type="text" class="form-control" name="namabarang" placeholder="Nama Barang">
	</div>
	<div class="form-group mb-3">
		<input type="text" class="form-control" name="satuan" placeholder="Satuan">
	</div>
	<!-- <div class="form-group mb-3">
		<select name="satuan" class="form-select">
			<option value="">Satuan</option>
			<option value="kain meteran">Kain Meteran</option>
			<option value="selendang">Selendang</option>
		</select>
	</div> -->
	<div class="mb-3">
		<button type="submit" class="btn btn-primary w-100">Simpan</button>
	</div>
</form>

<script>
	$(function(){
		$('.formbarang').bootstrapValidator({
	      fields: {
	        kodebarang: {
	          message: 'Kode Barang Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Kode Barang Harus Diisi !'
	          }
            }
          },
          namabarang: {
	          message: 'Nama Barang Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Nama Barang Harus Diisi !'
	          }
            }
          },
          satuan: {
	          message: 'Satuan Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Satuan Harus Diisi !'
	          }
            }
          },
	    }
	   });
	});
</script>