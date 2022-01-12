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
										<?php if (isset($__tpl_vars__creationPermission)) : ?><a href="groups"><button type="button" class="btn btn-success"><?php echo $_env->filter('escape', $__tpl_vars__textAdd); ?></button></a><?php endif; ?>
									</div>
									<?php endif; ?>
									<h4 class="tile-title"><?php echo $_env->filter('escape', $__tpl_vars__textUsersGroups); ?></h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th><?php echo $_env->filter('escape', $__tpl_vars__textName); ?></th>
													<th><?php echo $_env->filter('escape', $__tpl_vars__textNote); ?></th>
													<th class="noExport"><?php echo $_env->filter('escape', $__tpl_vars__textActions); ?></th>
												</tr>
											</thead>
											<tbody>
											<?php
            $__tpl_foreach__groups = array(
                'value' => null,
                'key' => null,
                'size' => isset($__tpl_vars__groups) ? count($__tpl_vars__groups) : 0,
                'current' => 0
              );

            if ($__tpl_foreach__groups['size'] > 0) :
                foreach ($__tpl_vars__groups as $__tpl_foreach__groups['key'] => $__tpl_foreach__groups['value']) {
                  ++$__tpl_foreach__groups['current']; ?>
												<tr>
													<td scope="row"><?php echo $_env->filter('escape', $__tpl_foreach__groups['value']['name']); ?></td>
													<td><?php echo $_env->filter('escape', $__tpl_foreach__groups['value']['note']); ?></td>
													<td><?php if (isset($__tpl_vars__editionPermission)) : ?><a href="groups?<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>=<?php echo $_env->filter('escape', $__tpl_vars__token); ?>&edit=<?php echo $_env->filter('escape', $__tpl_foreach__groups['value']['id']); ?>"><button class="btn btn-default"><?php echo $_env->filter('escape', $__tpl_vars__textEdit); ?></button></a><?php else : ?><button class="btn btn-default" disabled=""><?php echo $_env->filter('escape', $__tpl_vars__textEdit); ?></button><?php endif; ?>	<?php if (isset($__tpl_vars__deletionPermission)) : ?><button class="btn btn-danger" onclick='confirmActionDelete("groups?<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>=<?php echo $_env->filter('escape', $__tpl_vars__token); ?>&delete=<?php echo $_env->filter('escape', $__tpl_foreach__groups['value']['id']); ?>")'><?php echo $_env->filter('escape', $__tpl_vars__textDelete); ?></button><?php else : ?><button class="btn btn-default" disabled=""><?php echo $_env->filter('escape', $__tpl_vars__textDelete); ?></button><?php endif; ?></td>
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
									<h4 class="tile-title"><?php echo $_env->filter('escape', $__tpl_vars__textGroupEdit); ?></h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textName); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="name" type="text" <?php if (isset($__tpl_vars__name)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__name); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textNote); ?></label>
													<div class="col-md-12">
														<textarea class="form-control" name="note" rows="5"><?php if (isset($__tpl_vars__name)) :  echo $_env->filter('escape', $__tpl_vars__note);  endif; ?></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textSelectPermissions); ?></label>
													<div class="col-md-12">
														<table class="table table-sm">
														  <thead>
															<tr>
																<th><?php echo $_env->filter('escape', $__tpl_vars__textName); ?></th>
																<th><?php echo $_env->filter('escape', $__tpl_vars__textView); ?></th>
																<th><?php echo $_env->filter('escape', $__tpl_vars__textAdd); ?></th>
																<th><?php echo $_env->filter('escape', $__tpl_vars__textEdit); ?></th>
																<th><?php echo $_env->filter('escape', $__tpl_vars__textDelete); ?></th>
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
																<td><?php echo $_env->filter('escape', $__tpl_foreach__modules['value']['module']['name']); ?></td>
																<td>
																	<div class="toggle-flip">
																		<label>
																			<center><input name="permissions[<?php echo $_env->filter('escape', $__tpl_foreach__modules['value']['module']['id']); ?>][view]" class="form-check-input" type="checkbox" <?php if (isset($__tpl_foreach__modules['value']['view']) && $__tpl_foreach__modules['value']['view'] == 1) : ?>checked<?php endif; ?>><span class="flip-indecator" data-toggle-on="<?php echo $_env->filter('escape', $__tpl_vars__textON); ?>" data-toggle-off="<?php echo $_env->filter('escape', $__tpl_vars__textOFF); ?>"></span></center>
																		</label>
																	</div>
																</td>
																<td>
																	<div class="toggle-flip">
																		<label>
																			<center><input name="permissions[<?php echo $_env->filter('escape', $__tpl_foreach__modules['value']['module']['id']); ?>][creation]" class="form-check-input" type="checkbox" <?php if (isset($__tpl_foreach__modules['value']['creation']) && $__tpl_foreach__modules['value']['creation'] == 1) : ?>checked<?php endif; ?>><span class="flip-indecator" data-toggle-on="<?php echo $_env->filter('escape', $__tpl_vars__textON); ?>" data-toggle-off="<?php echo $_env->filter('escape', $__tpl_vars__textOFF); ?>"></span></center>
																		</label>
																	</div>
																</td>
																<td>
																	<div class="toggle-flip">
																		<label>
																			<center><input name="permissions[<?php echo $_env->filter('escape', $__tpl_foreach__modules['value']['module']['id']); ?>][edition]" class="form-check-input" type="checkbox" <?php if (isset($__tpl_foreach__modules['value']['edition']) && $__tpl_foreach__modules['value']['edition'] == 1) : ?>checked<?php endif; ?>><span class="flip-indecator" data-toggle-on="<?php echo $_env->filter('escape', $__tpl_vars__textON); ?>" data-toggle-off="<?php echo $_env->filter('escape', $__tpl_vars__textOFF); ?>"></span></center>
																		</label>
																	</div>
																</td>
																<td>
																	<div class="toggle-flip">
																		<label>
																			<center><input name="permissions[<?php echo $_env->filter('escape', $__tpl_foreach__modules['value']['module']['id']); ?>][deletion]" class="form-check-input" type="checkbox" <?php if (isset($__tpl_foreach__modules['value']['deletion']) && $__tpl_foreach__modules['value']['deletion'] == 1) : ?>checked<?php endif; ?>><span class="flip-indecator" data-toggle-on="<?php echo $_env->filter('escape', $__tpl_vars__textON); ?>" data-toggle-off="<?php echo $_env->filter('escape', $__tpl_vars__textOFF); ?>"></span></center>
																		</label>
																	</div>
																</td>
															</tr>
															<?php } endif; ?>
														  </tbody>
														</table>
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