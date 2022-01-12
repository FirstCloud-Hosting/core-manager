<?php $_env->includeTpl('header.tpl', true, Link_Environment::INCLUDE_TPL); ?>
<div class="content-page">
				<div class="content">
					<div class="app-container">
						<div class="row user">
							<div class="col-sm-12">
								<div class="card-box">
									<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
												<div class="info">
													<h4><?php echo $_env->filter('escape', $__tpl_vars__textUsers); ?></h4>
													<p><b><?php echo $_env->filter('escape', $__tpl_vars__countUsers); ?></b></p>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="widget-small info coloured-icon"><i class="icon fa fa-cubes fa-3x"></i>
												<div class="info">
													<!--<h4><?php echo $_env->filter('escape', $__tpl_vars__textRegions); ?></h4>
													<p><b><?php echo $_env->filter('escape', $__tpl_vars__countRegions); ?></b></p>-->
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="widget-small info coloured-icon"><i class="icon fa fa-server fa-3x"></i>
												<div class="info">
													<!--<h4><?php echo $_env->filter('escape', $__tpl_vars__textRegions); ?></h4>
													<p><b><?php echo $_env->filter('escape', $__tpl_vars__countRegions); ?></b></p>-->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- end col -->
							<div class="col-sm-12">
								<div class="card-box">
									<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="widget-small info coloured-icon"><i class="icon fa fa-wrench fa-3x"></i>
												<div class="info">
													<!--<h4><?php echo $_env->filter('escape', $__tpl_vars__textRegions); ?></h4>
													<p><b><?php echo $_env->filter('escape', $__tpl_vars__countRegions); ?></b></p>-->
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="widget-small info coloured-icon"><i class="icon fa fa-cog fa-3x"></i>
												<div class="info">
													<!--<h4><?php echo $_env->filter('escape', $__tpl_vars__textRegions); ?></h4>
													<p><b><?php echo $_env->filter('escape', $__tpl_vars__countRegions); ?></b></p>-->
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="widget-small info coloured-icon"><i class="icon fa fa-hourglass-end fa-3x"></i>
												<div class="info">
													<!--<h4><?php echo $_env->filter('escape', $__tpl_vars__textRegions); ?></h4>
													<p><b><?php echo $_env->filter('escape', $__tpl_vars__countRegions); ?></b></p>-->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- end col -->
							<div class="row">
								<div class="col-lg-12">
									<div class="tile">
										<h3 class="tile-title"><?php echo $_env->filter('escape', $__tpl_vars__textNews); ?></h3>
										<div class="tile-body"><?php echo $_env->filter('escape', $__tpl_vars__news1); ?></div>
									</div>
								</div>
							</div>
						</div>
						<!-- end row -->
					</div>
				</div> <!-- content -->
			</div>
<?php $_env->includeTpl('footer.tpl', true, Link_Environment::INCLUDE_TPL); ?>
