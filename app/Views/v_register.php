<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Register</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url('backend/assets/img/icon.ico') ?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?= base_url('backend/assets/js/plugin/webfont/webfont.min.js') ?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['<?= base_url('backend/assets/css/fonts.css') ?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url('backend/assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('backend/assets/css/azzara.min.css') ?>">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-signup animated fadeIn">	
        <h3 class="text-center">Sign Up</h3>

			<?= form_open('auth/simpan_register') ?>
			<div class="login-form">

				<div class="form-group">
					<label for="nama_user" class="placeholder"><b>Nama Lengkap</b></label>
					<input id="nama_user" name="nama_user" type="text" class="form-control" value="<?= old('nama_user') ?>" required>
					<small class="text-danger"><?= isset($validation) ? $validation->getError('nama_user') : '' ?></small>
				</div>

				<div class="form-group">
					<label for="username" class="placeholder"><b>Username</b></label>
					<input id="username" name="username" type="text" class="form-control" value="<?= old('username') ?>" required>
					<small class="text-danger"><?= isset($validation) ? $validation->getError('username') : '' ?></small>
				</div>

				<div class="form-group">
					<label for="password" class="placeholder"><b>Password</b></label>
					<div class="position-relative">
						<input id="password" name="password" type="password" class="form-control" required>
						<div class="show-password"><i class="flaticon-interface"></i></div>
					</div>
					<small class="text-danger"><?= isset($validation) ? $validation->getError('password') : '' ?></small>
				</div>

				<div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="agree" required>
						<label class="custom-control-label" for="agree">Saya menyetujui syarat dan ketentuan</label>
					</div>
				</div>

				<div class="row form-action">
					<div class="col-md-6">
						<a href="<?= base_url('auth') ?>" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-primary w-100 fw-bold">Sign Up</button>
					</div>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>

	<!-- JS Files -->
	<script src="<?= base_url('backend/assets/js/core/jquery.3.2.1.min.js') ?>"></script>
	<script src="<?= base_url('backend/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') ?>"></script>
	<script src="<?= base_url('backend/assets/js/core/popper.min.js') ?>"></script>
	<script src="<?= base_url('backend/assets/js/core/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('backend/assets/js/ready.js') ?>"></script>
</body>
</html>
