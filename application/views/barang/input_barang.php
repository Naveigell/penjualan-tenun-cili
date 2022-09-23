<form action="<?php echo base_url() ?>barang/simpanbarang" class="formbarang" method="POST">
	<div class="form-group mb-3">
		<input type="text" class="form-control" name="kodebarang" placeholder="Kode Barang" onkeyup="checkCode(this)">
		<span class="small text text-danger d-none" id="code-exists">Kode barang sudah ada</span>
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
		<button id="save-product" type="submit" class="btn btn-primary w-100">Simpan</button>
	</div>
</form>

<script>
	function checkCode(evt) {

		if (evt.value == '') {
			$('#code-exists').removeClass('d-block');
			$('#code-exists').addClass('d-none');

			return;
		}

		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(); ?>barang/checkCode/' + evt.value,
			success: function(response) {
				if (JSON.parse(response).exists) {
					$('#code-exists').addClass('d-block');
					$('#code-exists').removeClass('d-none');

					$('#save-product').attr('disabled', '');
				} else {
					$('#code-exists').removeClass('d-block');
					$('#code-exists').addClass('d-none');

					$('#save-product').removeAttr('disabled');
				}
			}
		});
	}

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
