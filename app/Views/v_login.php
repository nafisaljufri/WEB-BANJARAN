<!-- v_login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login / Register</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url('backend') ?>/assets/img/icon.ico" type="image/x-icon"/>
	<script src="<?= base_url('backend') ?>/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['<?= base_url('backend') ?>/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link rel="stylesheet" href="<?= base_url('backend') ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('backend') ?>/assets/css/azzara.min.css">
</head>
<body class="login">

<div class="wrapper wrapper-login">
	<!-- Login Form -->
	<div class="container container-login animated fadeIn">
		<a href="<?= base_url('home')?>" style="text-decoration: none;">
		<div class="text-center mb-3">
        <img src="<?= base_url('logo') ?>/logodesa.jpg" width="180">
    	</div>
		<h4 class="text-center text-primary text-opacity-50"><b>Desa Wisata Banjaran</b></h4>
		</a>
		<?php if (session()->getFlashdata('pesan')) : ?>
			<div class="alert alert-danger"><?= session()->getFlashdata('pesan') ?></div>
		<?php endif; ?>
		<?= form_open('auth/login') ?>
		<div class="login-form">
			<div class="form-group">
				<label><b>Username</b></label>
				<input name="username" type="text" class="form-control" required>
			</div>
			<div class="form-group">
				<label><b>Password</b></label>
				<div class="position-relative">
					<input name="password" type="password" class="form-control" required>
					<div class="show-password"><i class="flaticon-interface"></i></div>
				</div>
			</div>
			<div class="form-group form-action-d-flex mb-3">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="rememberme">
					<label class="custom-control-label m-0" for="rememberme">Ingat Saya</label>
				</div>
				<button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Login</button>
			</div>
			<div class="login-account">
				<span class="msg">Belum punya akun?</span>
				<a href="#" id="show-signup" class="link">Daftar</a>
			</div>
		</div>
		<div>
			<br>
			<div>
			<a href="<?= base_url('auth/google') ?>" class="btn btn-light border w-100 d-flex align-items-center justify-content-center">
  <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" width="20" class="me-2" style="margin-right:8px;">
  <span class="fw-bold text-dark">Login dengan Google</span>
</a>
		</div>
		</div>
		<?= form_close() ?>
	</div>

	<!-- Register Form -->
	<div class="container container-signup animated fadeIn">
		<h3 class="text-center">Sign Up</h3>
		<?= form_open('auth/simpan_register') ?>
		<div class="login-form">
			<div class="form-group">
				<label><b>Nama Lengkap</b></label>
				<input name="nama_user" type="text" class="form-control" value="<?= old('nama_user') ?>" required>
				<small class="text-danger"><?= isset($validation) ? $validation->getError('nama_user') : '' ?></small>
			</div>
			<div class="form-group">
				<label><b>Username</b></label>
				<input name="username" type="text" class="form-control" value="<?= old('username') ?>" required>
				<small class="text-danger"><?= isset($validation) ? $validation->getError('username') : '' ?></small>
			</div>
			<div class="form-group">
				<label><b>Password</b></label>
				<input name="password" type="password" class="form-control" required>
				<small class="text-danger"><?= isset($validation) ? $validation->getError('password') : '' ?></small>
			</div>
			<div class="row form-sub m-0">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="agree" id="agree">
					<label class="custom-control-label" for="agree">I agree to the terms and conditions.</label>
				</div>
			</div>
			<div class="row form-action">
				<div class="col-md-6">
					<a href="#" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
				</div>
				<div class="col-md-6">
					<button type="submit" class="btn btn-primary w-100 fw-bold">Sign Up</button>
				</div>
			</div>
		</div>
		<?= form_close() ?>
	</div>
</div>

<script src="<?= base_url('backend') ?>/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url('backend') ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url('backend') ?>/assets/js/core/popper.min.js"></script>
<script src="<?= base_url('backend') ?>/assets/js/core/bootstrap.min.js"></script>
<script src="<?= base_url('backend') ?>/assets/js/ready.js"></script>
<script>
	// Toggle Sign Up and Sign In form
	$('#show-signup').on('click', function () {
		$('.container-login').hide();
		$('.container-signup').show();
	});
	$('#show-signin').on('click', function () {
		$('.container-signup').hide();
		$('.container-login').show();
	});
</script>
</body>
</html>
