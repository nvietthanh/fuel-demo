<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="/assets/css/base.css">
	<link rel="stylesheet" href="/assets/css/admin/form.css">
	<?php echo Asset::css('bootstrap.css'); ?>
</head>

<body>
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="card p-4 shadow" style="max-width: 400px; margin: 0 auto;">
			<h2 class="text-center mb-4">Login</h2>

			<?php $errors = Session::get_flash('errors'); ?>

			<form action="/admin/login" method="post">
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="text" name="email" id="email" value="<?= e(Input::post('email', '')) ?>" class="form-control">
					<?php if (!empty($errors['email'])): ?>
						<p class="error-message"><?= e($errors['email']->get_message()) ?></p>
					<?php endif; ?>
					<?php if (Session::get_flash('msg_error')): ?>
						<p class="error-message"><?= Session::get_flash('msg_error') ?></p>
					<?php endif; ?>
				</div>

				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="password" id="password" value="<?= e(Input::post('password', '')) ?>" class="form-control">
					<?php if (!empty($errors['password'])): ?>
						<p class="error-message"><?= e($errors['password']->get_message()) ?></p>
					<?php endif; ?>
				</div>

				<div class="d-grid">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>