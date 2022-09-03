<form action="<?php echo base_url() ?>user/simpanuser" class="formuser" method="POST">
	<div class="form-group mb-3">
		<input type="text" class="form-control" name="id_user" placeholder="ID User">
	</div>
	<div class="form-group mb-3">
		<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
	</div>
	<div class="form-group mb-3">
		<input type="number" class="form-control" name="no_hp" placeholder="No HP">
	</div>
	<div class="form-group mb-3">
		<input type="text" class="form-control" name="username" placeholder="Username">
	</div>
	<div class="form-group mb-3">
		<input type="email" class="form-control" name="email" placeholder="Email">
	</div>
	<div class="form-group mb-3">
		<input type="password" class="form-control" name="password" placeholder="Password">
	</div>
	<div class="form-group mb-3">
		<select name="level" class="form-select">
			<option value="">Level</option>
			<option value="administrator">administrator</option>
			<option value="owner">owner</option>
			<option value="karyawan">karyawan</option>
		</select>
	</div>
	<div class="form-group mb-3">
		<select name="cabang" class="form-select">
			<option value="">Cabang</option>
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
		$('.formuser').bootstrapValidator({
	      fields: {
	        id_user: {
	          message: 'ID User Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'ID User Harus Diisi !'
	          }
            }
          },
          nama_lengkap: {
	          message: 'Nama Lengkap Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Nama Lengkap Harus Diisi !'
	          }
            }
          },
          no_hp: {
	          message: 'No HP Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'No HP Harus Diisi !'
	          },
				  regexp: {
					  regexp: /^(\+62|62|0)8\d+$/,
				  }
            }
          },
          username: {
	          message: 'Username Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Username Harus Diisi !'
	          }
            }
          },
          password: {
	          message: 'Password Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Password Harus Diisi !'
	          }
            }
          },
          level: {
	          message: 'Level Tidak Valid !',
	          validators: {
	            notEmpty: {
	              message: 'Level Harus Diisi !'
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
