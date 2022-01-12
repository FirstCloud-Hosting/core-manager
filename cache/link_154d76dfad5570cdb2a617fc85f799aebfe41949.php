<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="apple-touch-icon" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/img/favicon.png">
		<link rel="icon" type="image/png" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/img/favicon.png">
		<link rel="manifest" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/img/icons/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/img/favicon.png">
		<meta name="theme-color" content="#ffffff">

		<meta name="description" content="<?php echo $_env->filter('escape', $__tpl_vars__description); ?>">
		<!-- Twitter meta-->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:site" content="@1stCloudHosting">
		<meta property="twitter:creator" content="@1stCloudHosting">
		<!-- Open Graph Meta-->
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="<?php echo $_env->filter('escape', $__tpl_vars__title); ?>">
		<meta property="og:title" content="<?php echo $_env->filter('escape', $__tpl_vars__title); ?>">
		<meta property="og:url" content="https://linufy.com/">
		<meta property="og:description" content="<?php echo $_env->filter('escape', $__tpl_vars__description); ?>">
		<title><?php echo $_env->filter('escape', $__tpl_vars__title); ?> - <?php echo $_env->filter('escape', $__tpl_vars__description); ?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Main CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/css/main.css">
		<!-- Font-icon css-->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<section class="material-half-bg">
			<div class="cover"></div>
		</section>
		<section class="login-content">
			<div class="logo">
				<img src="assets/img/logo.svg">
			</div>
			<?php if (isset($__tpl_vars__view) && $__tpl_vars__view == 'mfa') : ?>
			<div class="login-box" style="min-height: 250px;">
			<?php else : ?>
			<div class="login-box">
			<?php endif; ?>
				<?php if (isset($__tpl_vars__view) && $__tpl_vars__view == 'mfa') : ?>
				<form class="login-form" method="post">
					<h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>MFA Verification</h3>
					<div class="form-group">
						<input name="confirmationCode" class="form-control" type="text" required="" placeholder="Code" autocomplete="off" autofocus>
					</div>
					<div class="form-group btn-container">
						<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Check</button>
					</div>
				</form>
				<?php else : ?>
				<form class="login-form" method="post">
					<h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Sign In</h3>
					<div class="form-group">
						<input name="email" class="form-control" type="text" required="" placeholder="Email" autofocus>
					</div>
					<div class="form-group">
						<input name="password" class="form-control" type="password" required="" placeholder="Password">
					</div>
					<div class="form-group">
						<div class="utility">
					  		<p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
					  		<p class="semibold-text mb-2"><a href="/privacy-policy">Our Privacy Policy</a></p>
						</div>
					</div>
					<div class="form-group btn-container">
						<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Sign In</button>
					</div>
					<br/> 
					<div class="col-sm-12 text-center">
						<p class="text-muted">Don't have an account? <a href="signup" class="text-primary m-l-5"><b>Sign Up</b></a></p>
					</div>
				</form>
				<form class="forget-form" method="post">
					<h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
					<div class="form-group">
						<input name="email" class="form-control" type="email" required="" placeholder="Enter email">
					</div>
					<div class="form-group btn-container">
						<button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Send Email</button>
					</div>
					<div class="form-group mt-3">
						<p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
					</div>
				</form>
				<?php endif; ?>
			</div>
		</section>
		<script>
			var resizefunc = [];
		</script>
		<!-- jQuery  -->
		<script type="text/javascript"  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="/assets/js/main.js"></script>
		<!-- The javascript plugin to display page loading on top-->
		<script src="assets/js/plugins/pace.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<?php if (isset($__tpl_vars__alertConfirm) and $__tpl_vars__alertConfirm == 'yes') : ?>
		<script type="text/javascript">
			Swal.fire({
			  title: 'Welcome!',
			  text: "Your account has been activated. You can now connect with your username and password.",
			  type: 'success',
			  confirmButtonText: 'OK'
			})
		</script>
		<?php endif; ?>
		<?php if (isset($__tpl_vars__errorSignIn) and $__tpl_vars__errorSignIn == 'yes') : ?>
		<script type="text/javascript">
			Swal.fire({
			  title: 'Error!',
			  text: '<?php echo $_env->filter('escape', $__tpl_vars__message); ?>',
			  type: 'error',
			  confirmButtonText: 'OK'
			})
		</script>
		<?php endif; ?>
		<script type="text/javascript">
		  // Login Page Flipbox control
		  $('.login-content [data-toggle="flip"]').click(function() {
			$('.login-box').toggleClass('flipped');
			return false;
		  });
		</script>
	</body>
</html>
