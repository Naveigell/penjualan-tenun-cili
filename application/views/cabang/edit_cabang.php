<form action="<?php echo base_url() ?>cabang/updatecabang" class="formcabang" method="POST">
	<div class="form-group mb-3">
		<input type="text" value="<?php echo $cabang['kode_cabang']; ?>" class="form-control" name="kodecabang" placeholder="Kode Cabang">
	</div>
	<div class="form-group mb-3">
		<input type="text" value="<?php echo $cabang['nama_cabang']; ?>" class="form-control" name="namacabang" placeholder="Nama Cabang">
	</div>
	<div class="form-group mb-3">
		<input type="text" value="<?php echo $cabang['alamat_cabang']; ?>" class="form-control" name="alamatcabang" placeholder="Alamat Cabang">
	</div>
	<div class="form-group mb-3">
		<input type="number" value="<?php echo $cabang['telepon']; ?>" class="form-control" name="telepon" placeholder="Telepon">
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-primary w-100">Simpan</button>
	</div>
</form>

<script>
	$(function(){
		$('.formcabang').bootstrapValidator({
	      fields: {
	        kodecabang: {
	          message: 'Kode Cabang Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Kode Cabang Harus Diisi !'
	          }
            }
          },
          namacabang: {
	          message: 'Nama Cabang Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Nama Cabang Harus Diisi !'
	          }
            }
          },
          alamatcabang: {
	          message: 'Alamat Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Alamat Harus Diisi !'
	          },
            }
          },
          telepon: {
	          message: 'Telepon Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Telepon Harus Diisi !'
	          },
				  regexp: {
					  regexp: /^(\+62|62|0)(8|2)\d+$/,
				  }
            }
          },
	    }
	   });
	});
</script>
