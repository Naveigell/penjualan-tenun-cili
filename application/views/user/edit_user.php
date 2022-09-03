<form action="<?php echo base_url() ?>user/updateuser/<?= $user->id_user; ?>" class="formuser" method="POST">
	<div class="form-group mb-3">
		<input type="text" readonly value="<?= $user->id_user; ?>" class="form-control" name="id_user" placeholder="ID User">
	</div>
	<div class="form-group mb-3">
		<input type="text" value="<?= $user->nama_lengkap; ?>" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
	</div>
	<div class="form-group mb-3">
		<input type="number" value="<?= $user->no_hp; ?>" class="form-control" name="no_hp" placeholder="No HP">
	</div>
	<div class="form-group mb-3">
		<input type="text" value="<?= $user->username; ?>" class="form-control" name="username" placeholder="Username">
	</div>
	<div class="form-group mb-3">
		<input type="email" value="<?= $user->email; ?>" class="form-control" name="email" placeholder="Email">
	</div>
	<div class="form-group mb-3">
		<input type="password" value="<?= $user->password; ?>" class="form-control" name="password" placeholder="Password">
	</div>
	<div class="form-group mb-3">
		<select name="level" class="form-select">
			<option value="">Level</option>
			<option <?php if ($user->level == 'administrator'): ?> selected <?php endif; ?> value="administrator">administrator</option>
			<?php if (userLevel() == 'owner'): ?>
				<option <?php if ($user->level == 'owner'): ?> selected <?php endif; ?> value="owner">owner</option>
			<?php endif; ?>
			<option <?php if ($user->level == 'karyawan'): ?> selected <?php endif; ?> value="karyawan">karyawan</option>
		</select>
	</div>
	<div class="form-group mb-3">
		<select name="cabang" class="form-select">
			<option value="">Cabang</option>
			<?php foreach ($cabang as $c) { ?>
				<option <?php if ($user->kode_cabang == $c->kode_cabang): ?> selected <?php endif; ?> value="<?php echo $c->kode_cabang; ?>"><?php echo $c->nama_cabang; ?></option>
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
