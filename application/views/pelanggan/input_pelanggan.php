<form action="<?php echo base_url() ?>pelanggan/simpanpelanggan" class="formpelanggan" method="POST">
	<div class="form-group mb-3">
		<input type="text" class="form-control" name="kodepelanggan" placeholder="Kode Pelanggan" onkeyup="checkCode(this)">
		<span class="small text text-danger d-none" id="code-exists">Kode cabang sudah ada</span>
	</div>
	<div class="form-group mb-3">
		<input type="text" class="form-control" name="namapelanggan" placeholder="Nama Pelanggan">
	</div>
	<div class="form-group mb-3">
		<input type="text" class="form-control" name="alamatpelanggan" placeholder="Alamat Pelanggan">
	</div>
	<div class="form-group mb-3">
		<input type="number" class="form-control" name="nohp" placeholder="Nomor Handphone" data-bv-excluded="false">
	</div>
	<div class="form-group mb-3">
		<select name="cabang" class="form-select">
			<option value="">Pilih Cabang</option>
			<?php foreach ($cabang as $c) { ?>
				<option value="<?php echo $c->kode_cabang; ?>"><?php echo $c->nama_cabang; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="mb-3">
		<button id="save-button" type="submit" class="btn btn-primary w-100">Simpan</button>
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
			url: '<?php echo base_url(); ?>pelanggan/checkCode/' + evt.value,
			success: function(response) {
				if (JSON.parse(response).exists) {
					$('#code-exists').addClass('d-block');
					$('#code-exists').removeClass('d-none');

					$('#save-button').attr('disabled', '');
				} else {
					$('#code-exists').removeClass('d-block');
					$('#code-exists').addClass('d-none');

					$('#save-button').removeAttr('disabled');
				}
			}
		});
	}

	$(function(){
		$('.formpelanggan').bootstrapValidator({
	      fields: {
	        kodepelanggan: {
	          message: 'Kode Pelanggan Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Kode Pelanggan Harus Diisi !'
	          }
            }
          },
          namapelanggan: {
	          message: 'Nama Pelanggan Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Nama Pelanggan Harus Diisi !'
	          }
            }
          },
          alamatpelanggan: {
	          message: 'Alamat Pelanggan Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Alamat Pelanggan Harus Diisi !'
	          }
            }
          },
          nohp: {
	          message: 'No HP  Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'NO HP Harus Diisi !'
	          },
				  regexp: {
					  regexp: /^(\+62|62|0)8\d+$/,
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
	});
</script>
