
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.14
* @link https://tabler.io
* Copyright 2018-2020 The Tabler Authors
* Copyright 2018-2020 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Register</title>
	<!-- CSS files -->
	<link href="<?php echo base_url(); ?>assets/dist/css/tabler.min.css" rel="stylesheet"/>
	<link href="<?php echo base_url(); ?>assets/dist/css/tabler-flags.min.css" rel="stylesheet"/>
	<link href="<?php echo base_url(); ?>assets/dist/css/tabler-payments.min.css" rel="stylesheet"/>
	<link href="<?php echo base_url(); ?>assets/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
	<link href="<?php echo base_url(); ?>assets/dist/css/demo.min.css" rel="stylesheet"/>
	<link href="<?php echo base_url(); ?>assets/static/logoweb.png" rel="shortcut icon"/>
	<style>
		body {
			display: none;
		}
	</style>
</head>
<body class="antialiased border-top-wide border-primary d-flex flex-column">
<div class="flex-fill d-flex flex-column justify-content-center py-4">
	<div class="container-tight py-6">
		<div class="text-center mb-4">
			<a href="#"><img src="<?php echo base_url(); ?>assets/static/logins.png" height="170" alt=""></a>
		</div>
		<form class="card card-md" action="<?php echo base_url(); ?>auth/doRegister" method="POST">
			<div class="card-body">
				<h2 class="card-title text-center mb-4">Silahkan Register !</h2>
				<h4><?php echo $this->session->flashdata('msg'); ?></h4>
				<div class="mb-3">
					<label class="form-label">Nama Lengkap</label>
					<input type="text" name="nama_lengkap" class="form-control" placeholder="Enter full name" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Nomor Telepon</label>
					<input type="number" name="no_hp" class="form-control" placeholder="Enter phone number" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Username</label>
					<input type="text" name="username" class="form-control" placeholder="Enter username" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Email</label>
					<input type="email" name="email" class="form-control" placeholder="Enter email" required>
				</div>
				<div class="mb-2">
					<label class="form-label">
						Password
					</label>
					<div class="input-group input-group-flat">
						<input type="password" name="password" class="form-control"  placeholder="Password"  autocomplete="off" required>

					</div>
				</div>
				<div class="mb-3">
					<label class="form-label">Kode Cabang</label>
					<select name="kode_cabang" id="" class="form-control" required>
						<option value="">-- Nothing Selected --</option>
						<?php /** @var array $branches */
						foreach ($branches as $branch): ?>
							<option value="<?= $branch->kode_cabang; ?>"><?= $branch->nama_cabang; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-footer text-center">
					<button type="submit" class="btn btn-primary w-100">Sign up</button>
					<br>
					<a href="<?= base_url('auth/login'); ?>" class="btn btn-warning w-100 mt-2">Sign in</a>
					<br><br>
					<a href="<?= base_url('auth/forget_password'); ?>" class="link link-info">Lupa password?</a>
				</div>
			</div>

		</form>
		<!-- <div class="text-center text-muted mt">
          Don't have account yet? <a href="<?php echo base_url(); ?>assets/sign-up.html" tabindex="-1">Sign up</a>
        </div> -->
	</div>
</div>
<!-- Libs JS -->
<script src="<?php echo base_url(); ?>assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Tabler Core -->
<script src="<?php echo base_url(); ?>assets/dist/js/tabler.min.js"></script>
<script>
	document.body.style.display = "block"
</script>
</body>
</html>
