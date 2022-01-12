<?php $_env->includeTpl('header.tpl', true, Link_Environment::INCLUDE_TPL); ?>
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="app-container">
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title"><?php echo $_env->filter('escape', $__tpl_vars__textOrganizations); ?></h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>#</th>
													<th>Password Hardening</th>
													<th>Validity</th>
													<th>Created</th>
												</tr>
											</thead>
											<tbody>
											<?php
            $__tpl_foreach__organizations = array(
                'value' => null,
                'key' => null,
                'size' => isset($__tpl_vars__organizations) ? count($__tpl_vars__organizations) : 0,
                'current' => 0
              );

            if ($__tpl_foreach__organizations['size'] > 0) :
                foreach ($__tpl_vars__organizations as $__tpl_foreach__organizations['key'] => $__tpl_foreach__organizations['value']) {
                  ++$__tpl_foreach__organizations['current']; ?>
												<tr>
													<td scope="row"><?php echo $_env->filter('escape', $__tpl_foreach__organizations['value']['id']); ?></td>
													<td><?php echo $_env->filter('escape', $__tpl_foreach__organizations['value']['passwordHardening']); ?></td>
													<td><?php echo $_env->filter('escape', $__tpl_foreach__organizations['value']['validity']); ?></td>
													<td><?php echo $_env->filter('escape', $__tpl_foreach__organizations['value']['created']); ?></td>
												</tr>
											<?php } endif; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div><!-- end col -->
						</div>
						<!-- end row -->
					</div> <!-- container -->
				</div> <!-- content -->
<?php $_env->includeTpl('footer.tpl', true, Link_Environment::INCLUDE_TPL); ?>