<?php $_env->includeTpl('header.tpl', true, Link_Environment::INCLUDE_TPL); ?>
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="app-container">
						<div class="row">
							<div class="col-lg-12">
								<div class="tile">
									<?php if (isset($__tpl_vars__name)) : ?>
									<div class="dropdown pull-right">
										<?php if (isset($__tpl_vars__creationPermission)) : ?><a href="modules"><button type="button" class="btn btn-success"><?php echo $_env->filter('escape', $__tpl_vars__textAdd); ?></button></a><?php endif; ?>
									</div>
									<?php endif; ?>
									<h4 class="tile-title"><?php echo $_env->filter('escape', $__tpl_vars__textModules); ?></h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th><?php echo $_env->filter('escape', $__tpl_vars__textType); ?></th>
													<th><?php echo $_env->filter('escape', $__tpl_vars__textName); ?></th>
													<th><?php echo $_env->filter('escape', $__tpl_vars__textPage); ?></th>
													<th class="noExport"><?php echo $_env->filter('escape', $__tpl_vars__textActions); ?></th>
												</tr>
											</thead>
											<tbody>
											<?php
            $__tpl_foreach__modules = array(
                'value' => null,
                'key' => null,
                'size' => isset($__tpl_vars__modules) ? count($__tpl_vars__modules) : 0,
                'current' => 0
              );

            if ($__tpl_foreach__modules['size'] > 0) :
                foreach ($__tpl_vars__modules as $__tpl_foreach__modules['key'] => $__tpl_foreach__modules['value']) {
                  ++$__tpl_foreach__modules['current']; ?>
												<tr>
													<td scope="row"><?php echo $_env->filter('escape', $__tpl_foreach__modules['value']['module']['type']['name']); ?></td>
													<td><?php echo $_env->filter('escape', $__tpl_foreach__modules['value']['module']['name']); ?></td>
													<td><?php echo $_env->filter('escape', $__tpl_foreach__modules['value']['module']['page']); ?></td>
													<td><?php if (isset($__tpl_vars__editionPermission)) : ?><a href="modules?<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>=<?php echo $_env->filter('escape', $__tpl_vars__token); ?>&edit=<?php echo $_env->filter('escape', $__tpl_foreach__modules['value']['module']['id']); ?>"><button class="btn btn-default"><?php echo $_env->filter('escape', $__tpl_vars__textEdit); ?></button></a><?php else : ?><button class="btn btn-default" disabled=""><?php echo $_env->filter('escape', $__tpl_vars__textEdit); ?></button><?php endif; ?>    <?php if (isset($__tpl_vars__deletionPermission)) : ?><button class="btn btn-danger" onclick='confirmActionDelete("modules?<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>=<?php echo $_env->filter('escape', $__tpl_vars__token); ?>&delete=<?php echo $_env->filter('escape', $__tpl_foreach__modules['value']['module']['id']); ?>")'><?php echo $_env->filter('escape', $__tpl_vars__textDelete); ?></button><?php else : ?><button class="btn btn-danger" disabled=""><?php echo $_env->filter('escape', $__tpl_vars__textDelete); ?></button><?php endif; ?></td>
												</tr>
											<?php } endif; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div><!-- end col -->
							<?php if (isset($__tpl_vars__creationPermission)) : ?>
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title"><?php echo $_env->filter('escape', $__tpl_vars__textModuleEdit); ?></h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-sm-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textType); ?></label>
													<div class="col-sm-12">
														<select name="typeId" class="form-control">
														<?php
            $__tpl_foreach__types = array(
                'value' => null,
                'key' => null,
                'size' => isset($__tpl_vars__types) ? count($__tpl_vars__types) : 0,
                'current' => 0
              );

            if ($__tpl_foreach__types['size'] > 0) :
                foreach ($__tpl_vars__types as $__tpl_foreach__types['key'] => $__tpl_foreach__types['value']) {
                  ++$__tpl_foreach__types['current']; ?>
															<option value="<?php echo $_env->filter('escape', $__tpl_foreach__types['value']['id']); ?>" <?php if ($__tpl_foreach__types['value']['id'] === $__tpl_vars__settype) : ?> selected="true" <?php endif; ?>><?php echo $_env->filter('escape', $__tpl_foreach__types['value']['name']); ?></option>
														<?php } endif; ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textName); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="name" type="text" <?php if (isset($__tpl_vars__name)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__name); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textPage); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="page" type="text" <?php if (isset($__tpl_vars__page)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__page); ?>" <?php endif; ?>>
													</div>
												</div>
												<input type="hidden" name="<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>" value="<?php echo $_env->filter('escape', $__tpl_vars__token); ?>">
												<center><button type="submit" class="btn btn-primary"><?php echo $_env->filter('escape', $__tpl_vars__textSave); ?></button><button type="reset" class="btn btn-default"><?php echo $_env->filter('escape', $__tpl_vars__textReset); ?></button></center>
											</form>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
							</div><!-- end col -->
							<?php endif; ?>
						</div>
						<!-- end row -->
					</div> <!-- container -->
				</div> <!-- content -->
<?php $_env->includeTpl('footer.tpl', true, Link_Environment::INCLUDE_TPL); ?>