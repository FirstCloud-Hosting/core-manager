<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="apple-touch-icon" href="{url}/assets/img/favicon.png">
		<link rel="icon" type="image/png" href="{url}/assets/img/favicon.png">
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
		<meta property="og:url" content="https://linufy.com">
		<meta property="og:description" content="{description}">
		<title>{title} - {description}</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Main CSS-->
		<link rel="stylesheet" type="text/css" href="{url}/assets/css/main.css">
		<!-- Font-icon css -->
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
		<!-- Password Strength Meter CSS -->
		<link rel="stylesheet" type="text/css" href="{url}/assets/css/password-strength-meter.css">
		<!-- Circle CSS -->
		<link rel="stylesheet" type="text/css" href="{url}/assets/css/circle.css">
		<!-- Dark Mode Switch -->
		<link rel="stylesheet" type="text/css" href="{url}/assets/css/dark-mode.css">
		<!-- Select Beautifuler -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/datatables.min.css"/>
	</head>
	<body class="app sidebar-mini rtl <if condition="isset({$sidenav})">sidenav-toggled</if>" <if condition="isset({$darkMode})">data-theme="dark"</if>>
	<!-- Navbar-->
	<header class="app-header"><a class="app-header__logo" href="{url}/index"><img src="{url}/assets/img/logo.svg"></a>
		<form method="POST">
		<input type="hidden" name="sidenav" value="on" />
		<input type="hidden" name="{tokenName}" value="{token}">
		<a class="app-sidebar__toggle" href="#" onclick="this.parentNode.submit()" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
		</form>
	  <!-- Navbar Right Menu-->
	  <ul class="app-nav">
		<li class="dropdown"><a class="app-nav__item" href="{docUrl}" target="_blank"><i class="far fa-question-circle fa-lg"></i></a>
		</li>
		<!-- User Menu-->
		<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
		  <ul class="dropdown-menu settings-menu dropdown-menu-right">
			<li><a class="dropdown-item" href="{url}/profile"><i class="fa fa-user fa-lg"></i> {profile}</a></li>
			<li><a class="dropdown-item" href="{url}/logout"><i class="fas fa-sign-out-alt fa-lg"></i> {logout}</a></li>
		  </ul>
		</li>
	  </ul>
	</header>
	<!-- Sidebar menu-->
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
	<aside class="app-sidebar">
	  <div class="app-sidebar__user">
		<div>
		  <p class="app-sidebar__user-name">{welcomeUser}</p>
		</div>
	  </div>
	  <ul class="app-menu">
		<li><a class="app-menu__item" href="{url}/index"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label">{dashboard}</span></a></li>
		<foreach array="{$menuType}">
		<li class="treeview <if condition="isset({$menuType.value['expanded']})">is-expanded</if>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa {menuType.value['icon']}"></i><span class="app-menu__label">{menuType.value['name']}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
		  <ul class="treeview-menu">
			<foreach array="{$menu}">
			<if condition="{$menuType.value['id']} == {$menu.value['module']['type']['id']}">
			<li><a class="treeview-item <if condition="{$currentPage} == {$menu.value['module']['page']}">active</if>" href="{url}/{menu.value['module']['page']}">{menu.value['module']['name']}</a></li>
			</if>
			</foreach>
		  </ul>
		</li>
		</foreach>
	  </ul>
	  <center>
	  <p class="app-sidebar__user-designation" style="color:white;">Version : {versionApp} - Sirus</p>
		<div class="toggle">
			<form class="form-horizontal" role="form" method="post">
			<input type="hidden" name="mode" value="switch">
			<label class="control-label" for="darkSwitch"><p class="app-sidebar__user-designation" style="color:white;">{textDarkMode}<input class="form-control" id="darkSwitch" name="darkSwitch" type="checkbox" <if condition="isset({$darkMode})">checked</if> onchange="this.form.submit();"><span class="button-indecator"></span></p>
			</label>
			<input type="hidden" name="{tokenName}" value="{token}">
			</form>
		</div>
	  </center>
	</aside>
	<main class="app-content">
		<div class="app-title">
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="{url}/index">{dashboard}</a></li>
				<if condition="{$currentPage} != 'index'">
				<foreach array="{$menu}">
				<if condition="{$currentPage} == {$menu.value['module']['page']}">
				<li class="breadcrumb-item"><a href="#">{menu.value['module']['name']}</a></li>
				</if>
				</foreach>
				</if>
			</ul>
		</div>
		<if condition="isset({$displayDemo})">
		<div class="app-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-dismissible alert-warning">
						<button class="close" type="button" data-dismiss="alert">×</button>
						<h4>{textDemonstration}!</h4>
						<p>{validity} days left for your trial</p>
					</div>
				</div>
			</div>
		</div>			
		</if>
		<if condition="isset({$displayError})">
		<div class="app-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-dismissible alert-danger">
						<button class="close" type="button" data-dismiss="alert">×</button>
						<h4>{textError}!</h4>
						<p>{message}</p>
					</div>
				</div>
			</div>
		</div>
		<elseif condition="isset({$displaySuccess})" />
		<div class="app-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-dismissible alert-success">
						<button class="close" type="button" data-dismiss="alert">×</button>
						<h4>{textSuccess}!</h4>
						<p>{message}</p>
					</div>
				</div>
			</div>
		</div>
		</if>
		<noscript>
		<div class="app-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-dismissible alert-danger">
						<button class="close" type="button" data-dismiss="alert">×</button>
						<h4>Please enable javascript!</h4>
						<p>{title} require javascript for best experience</p>
					</div>
				</div>
			</div>
		</div>
		</noscript>