<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="apple-touch-icon" href="{url}/assets/img/favicon.png">
		<link rel="icon" type="image/png" href="{url}/assets/img/favicon.png">
		<link rel="manifest" href="{url}/assets/img/icons/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="{url}/assets/img/favicon.png">
		<meta name="theme-color" content="#ffffff">

		<meta name="description" content="{description}">
		<!-- Twitter meta-->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:site" content="@1stCloudHosting">
		<meta property="twitter:creator" content="@1stCloudHosting">
		<!-- Open Graph Meta-->
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{title}">
		<meta property="og:title" content="{title}">
		<meta property="og:url" content="https://linufy.com/">
		<meta property="og:description" content="{description}">
		<title>{title} - {description}</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Main CSS-->
		<link rel="stylesheet" type="text/css" href="{url}/assets/css/main.css">
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
			<div class="login-box extra">
				<form class="login-form" method="post">
					<h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Sign Up</h3>
					<div class="form-group">
						<input name="email" class="form-control" type="email" required="" placeholder="Email" autofocus>
					</div>
					<div class="form-group">
						<input name="password" class="form-control" type="password" required="" placeholder="Password">
					</div>
					<div class="form-group">
						<input name="repeatpassword" class="form-control" type="password" required="" placeholder="Repeat Password">
					</div>
						<div class="form-group">
							<div class="col-xs-12">
								<div class="checkbox checkbox-custom">
									<input name="signup" type="checkbox" required>
									<label for="signup">I accept <a target="_blanck" href="{url}/CGV.pdf">Terms and Conditions</a></label>
								</div>
							</div>
						</div>
					<div class="form-group btn-container">
						<button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Sign Up</button>
					</div>
					<br/> 
					<div class="col-sm-12 text-center">
						<p class="text-muted">Already have an account? <a href="signin" class="text-primary m-l-5"><b>Sign In</b></a></p>
					</div>
				</form>
			</div>
		</section>
		<script>
			var resizefunc = [];
		</script>
		<!-- jQuery  -->
		<script type="text/javascript"  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="/assets/js/main.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<if condition="isset({$errorTermsAndConditions}) and {$errorTermsAndConditions} == 'yes'">
		<script type="text/javascript">
			Swal.fire({
			  title: 'Error!',
			  text: 'Please read and accept our Terms and Conditions',
			  type: 'error',
			  confirmButtonText: 'OK'
			})
		</script>
		</if>
		<if condition="isset({$errorApi}) and {$errorApi} == 'yes'">
		<script type="text/javascript">
			Swal.fire({
			  title: 'Error!',
			  text: '{errorMessage}',
			  type: 'error',
			  confirmButtonText: 'OK'
			})
		</script>
		</if>
		<script type="text/javascript">
		  // Login Page Flipbox control
		  $('.login-content [data-toggle="flip"]').click(function() {
			$('.login-box').toggleClass('flipped');
			return false;
		  });
		</script>
	</body>
</html>