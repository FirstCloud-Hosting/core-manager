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
		<meta property="og:url" content="https://linufy.com">
		<meta property="og:description" content="<?php echo $_env->filter('escape', $__tpl_vars__description); ?>">
		<title><?php echo $_env->filter('escape', $__tpl_vars__title); ?> - <?php echo $_env->filter('escape', $__tpl_vars__description); ?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Main CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/css/main.css">
		<!-- Font-icon css -->
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
		<!-- Password Strength Meter CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/css/password-strength-meter.css">
		<!-- Circle CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/css/circle.css">
		<!-- Dark Mode Switch -->
		<link rel="stylesheet" type="text/css" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/css/dark-mode.css">
		<!-- Select Beautifuler -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/datatables.min.css"/>
	</head>
	<body class="app sidebar-mini rtl <?php if (isset($__tpl_vars__sidenav)) : ?>sidenav-toggled<?php endif; ?>" <?php if (isset($__tpl_vars__darkMode)) : ?>data-theme="dark"<?php endif; ?>>
	<!-- Navbar-->
	<header class="app-header"><a class="app-header__logo" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/index"><img src="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/img/logo.svg"></a>
		<form method="POST">
		<input type="hidden" name="sidenav" value="on" />
		<input type="hidden" name="<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>" value="<?php echo $_env->filter('escape', $__tpl_vars__token); ?>">
		<a class="app-sidebar__toggle" href="#" onclick="this.parentNode.submit()" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
		</form>
	  <!-- Navbar Right Menu-->
	  <ul class="app-nav">
		<li class="dropdown"><a class="app-nav__item" href="<?php echo $_env->filter('escape', $__tpl_vars__docUrl); ?>" target="_blank"><i class="far fa-question-circle fa-lg"></i></a>
		</li>
		<!-- User Menu-->
		<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
		  <ul class="dropdown-menu settings-menu dropdown-menu-right">
			<li><a class="dropdown-item" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/profile"><i class="fa fa-user fa-lg"></i> <?php echo $_env->filter('escape', $__tpl_vars__profile); ?></a></li>
			<li><a class="dropdown-item" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/logout"><i class="fas fa-sign-out-alt fa-lg"></i> <?php echo $_env->filter('escape', $__tpl_vars__logout); ?></a></li>
		  </ul>
		</li>
	  </ul>
	</header>
	<!-- Sidebar menu-->
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
	<aside class="app-sidebar">
	  <div class="app-sidebar__user">
		<div>
		  <p class="app-sidebar__user-name"><?php echo $_env->filter('escape', $__tpl_vars__welcomeUser); ?></p>
		</div>
	  </div>
	  <ul class="app-menu">
		<li><a class="app-menu__item" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/index"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label"><?php echo $_env->filter('escape', $__tpl_vars__dashboard); ?></span></a></li>
		<?php
            $__tpl_foreach__menuType = array(
                'value' => null,
                'key' => null,
                'size' => isset($__tpl_vars__menuType) ? count($__tpl_vars__menuType) : 0,
                'current' => 0
              );

            if ($__tpl_foreach__menuType['size'] > 0) :
                foreach ($__tpl_vars__menuType as $__tpl_foreach__menuType['key'] => $__tpl_foreach__menuType['value']) {
                  ++$__tpl_foreach__menuType['current']; ?>
		<li class="treeview <?php if (isset($__tpl_foreach__menuType['value']['expanded'])) : ?>is-expanded<?php endif; ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa <?php echo $_env->filter('escape', $__tpl_foreach__menuType['value']['icon']); ?>"></i><span class="app-menu__label"><?php echo $_env->filter('escape', $__tpl_foreach__menuType['value']['name']); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
		  <ul class="treeview-menu">
			<?php
            $__tpl_foreach__menu = array(
                'value' => null,
                'key' => null,
                'size' => isset($__tpl_vars__menu) ? count($__tpl_vars__menu) : 0,
                'current' => 0
              );

            if ($__tpl_foreach__menu['size'] > 0) :
                foreach ($__tpl_vars__menu as $__tpl_foreach__menu['key'] => $__tpl_foreach__menu['value']) {
                  ++$__tpl_foreach__menu['current']; ?>
			<?php if ($__tpl_foreach__menuType['value']['id'] == $__tpl_foreach__menu['value']['module']['type']['id']) : ?>
			<li><a class="treeview-item <?php if ($__tpl_vars__currentPage == $__tpl_foreach__menu['value']['module']['page']) : ?>active<?php endif; ?>" href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/<?php echo $_env->filter('escape', $__tpl_foreach__menu['value']['module']['page']); ?>"><?php echo $_env->filter('escape', $__tpl_foreach__menu['value']['module']['name']); ?></a></li>
			<?php endif; ?>
			<?php } endif; ?>
		  </ul>
		</li>
		<?php } endif; ?>
	  </ul>
	  <center>
	  <p class="app-sidebar__user-designation" style="color:white;">Version : <?php echo $_env->filter('escape', $__tpl_vars__versionApp); ?> - Sirus</p>
		<div class="toggle">
			<form class="form-horizontal" role="form" method="post">
			<input type="hidden" name="mode" value="switch">
			<label class="control-label" for="darkSwitch"><p class="app-sidebar__user-designation" style="color:white;"><?php echo $_env->filter('escape', $__tpl_vars__textDarkMode); ?><input class="form-control" id="darkSwitch" name="darkSwitch" type="checkbox" <?php if (isset($__tpl_vars__darkMode)) : ?>checked<?php endif; ?> onchange="this.form.submit();"><span class="button-indecator"></span></p>
			</label>
			<input type="hidden" name="<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>" value="<?php echo $_env->filter('escape', $__tpl_vars__token); ?>">
			</form>
		</div>
	  </center>
	</aside>
	<main class="app-content">
		<div class="app-title">
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/index"><?php echo $_env->filter('escape', $__tpl_vars__dashboard); ?></a></li>
				<?php if ($__tpl_vars__currentPage != 'index') : ?>
				<?php
            $__tpl_foreach__menu = array(
                'value' => null,
                'key' => null,
                'size' => isset($__tpl_vars__menu) ? count($__tpl_vars__menu) : 0,
                'current' => 0
              );

            if ($__tpl_foreach__menu['size'] > 0) :
                foreach ($__tpl_vars__menu as $__tpl_foreach__menu['key'] => $__tpl_foreach__menu['value']) {
                  ++$__tpl_foreach__menu['current']; ?>
				<?php if ($__tpl_vars__currentPage == $__tpl_foreach__menu['value']['module']['page']) : ?>
				<li class="breadcrumb-item"><a href="#"><?php echo $_env->filter('escape', $__tpl_foreach__menu['value']['module']['name']); ?></a></li>
				<?php endif; ?>
				<?php } endif; ?>
				<?php endif; ?>
			</ul>
		</div>
		<?php if (isset($__tpl_vars__displayDemo)) : ?>
		<div class="app-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-dismissible alert-warning">
						<button class="close" type="button" data-dismiss="alert">×</button>
						<h4><?php echo $_env->filter('escape', $__tpl_vars__textDemonstration); ?>!</h4>
						<p><?php echo $_env->filter('escape', $__tpl_vars__validity); ?> days left for your trial</p>
					</div>
				</div>
			</div>
		</div>			
		<?php endif; ?>
		<?php if (isset($__tpl_vars__displayError)) : ?>
		<div class="app-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-dismissible alert-danger">
						<button class="close" type="button" data-dismiss="alert">×</button>
						<h4><?php echo $_env->filter('escape', $__tpl_vars__textError); ?>!</h4>
						<p><?php echo $_env->filter('escape', $__tpl_vars__message); ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php elseif (isset($__tpl_vars__displaySuccess)) : ?>
		<div class="app-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-dismissible alert-success">
						<button class="close" type="button" data-dismiss="alert">×</button>
						<h4><?php echo $_env->filter('escape', $__tpl_vars__textSuccess); ?>!</h4>
						<p><?php echo $_env->filter('escape', $__tpl_vars__message); ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<noscript>
		<div class="app-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-dismissible alert-danger">
						<button class="close" type="button" data-dismiss="alert">×</button>
						<h4>Please enable javascript!</h4>
						<p><?php echo $_env->filter('escape', $__tpl_vars__title); ?> require javascript for best experience</p>
					</div>
				</div>
			</div>
		</div>
		</noscript>