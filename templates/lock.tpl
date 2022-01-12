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
		<section class="lockscreen-content">
			<div class="logo">
				<img src="assets/img/logo.svg">
			</div>
	        <div class="lock-box">
	            <h4 class="text-center user-name">{username}</h4>
	            <p class="text-center text-muted">Account Locked</p>
		        <form class="unlock-form" method="post">
		            <div class="form-group">
		                <label class="control-label">PASSWORD</label>
		                <input class="form-control" name="passwordUnlock" id="passwordUnlock" type="password" placeholder="Password" required autofocus>
		            </div>
		            <div class="form-group btn-container">
		           		<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-unlock fa-lg"></i>UNLOCK </button>
		            </div>
		        </form>
		        <p><a href="/signin">Not {username} ? Login Here.</a></p>
	        </div>
		</section>
		<!-- jQuery  -->
		<script type="text/javascript"  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="/assets/js/main.js"></script>
		<!-- The javascript plugin to display page loading on top-->
		<script src="assets/js/plugins/pace.min.js"></script>
	</body>
</html>
