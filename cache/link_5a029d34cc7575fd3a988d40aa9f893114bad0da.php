<?php $_env->includeTpl('header.tpl', true, Link_Environment::INCLUDE_TPL); ?>
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="app-container">
						<div class="row">
							<div class="col-lg-12">
								<div class="tile">
									<?php if (isset($__tpl_vars__username_1)) : ?>
									<div class="dropdown pull-right">
										<?php if (isset($__tpl_vars__creationPermission)) : ?><a href="users"><button type="button" class="btn btn-success"><?php echo $_env->filter('escape', $__tpl_vars__textAdd); ?></button></a><?php endif; ?>
									</div>
									<?php endif; ?>
									<h4 class="tile-title"><?php echo $_env->filter('escape', $__tpl_vars__textUsers); ?></h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th><?php echo $_env->filter('escape', $__tpl_vars__textEmail); ?></th>
													<th><?php echo $_env->filter('escape', $__tpl_vars__textGroup); ?></th>
													<th><?php echo $_env->filter('escape', $__tpl_vars__textEnable); ?></th>
													<th class="noExport"><?php echo $_env->filter('escape', $__tpl_vars__textActions); ?></th>
												</tr>
											</thead>
											<tbody>
											<?php
            $__tpl_foreach__users = array(
                'value' => null,
                'key' => null,
                'size' => isset($__tpl_vars__users) ? count($__tpl_vars__users) : 0,
                'current' => 0
              );

            if ($__tpl_foreach__users['size'] > 0) :
                foreach ($__tpl_vars__users as $__tpl_foreach__users['key'] => $__tpl_foreach__users['value']) {
                  ++$__tpl_foreach__users['current']; ?>
												<tr>
													<td scope="row"><?php echo $_env->filter('escape', $__tpl_foreach__users['value']['email']); ?></td>
													<td><?php echo $_env->filter('escape', $__tpl_foreach__users['value']['group']['name']); ?></td>
													<td><?php if ($__tpl_foreach__users['value']['status'] == 1) :  echo $_env->filter('escape', $__tpl_vars__textYes);  else :  echo $_env->filter('escape', $__tpl_vars__textNo);  endif; ?></td>
													<td><?php if (isset($__tpl_vars__editionPermission)) : ?><a href="users?<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>=<?php echo $_env->filter('escape', $__tpl_vars__token); ?>&edit=<?php echo $_env->filter('escape', $__tpl_foreach__users['value']['id']); ?>"><button class="btn btn-default"><?php echo $_env->filter('escape', $__tpl_vars__textEdit); ?></button></a><?php else : ?><button class="btn btn-default" disabled=""><?php echo $_env->filter('escape', $__tpl_vars__textEdit); ?></button><?php endif; ?>    <?php if (isset($__tpl_vars__deletionPermission)) : ?><button class="btn btn-danger" onclick='confirmActionDelete("users?<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>=<?php echo $_env->filter('escape', $__tpl_vars__token); ?>&delete=<?php echo $_env->filter('escape', $__tpl_foreach__users['value']['id']); ?>")'><?php echo $_env->filter('escape', $__tpl_vars__textDelete); ?></button><?php else : ?><button class="btn btn-danger" disabled=""><?php echo $_env->filter('escape', $__tpl_vars__textDelete); ?></button><?php endif; ?></td>
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
									<h4 class="tile-title"><?php echo $_env->filter('escape', $__tpl_vars__textUserEdit); ?></h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textEmail); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="email" type="email" <?php if (isset($__tpl_vars__email)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__email); ?>"<?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textGroup); ?></label>
													<div class="col-sm-12">
														<select class="form-control" name="groupId">
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
															<option value="<?php echo $_env->filter('escape', $__tpl_foreach__groups['value']['id']); ?>" <?php if ($__tpl_foreach__groups['value']['id'] === $__tpl_vars__setgroup) : ?> selected="true" <?php endif; ?>><?php echo $_env->filter('escape', $__tpl_foreach__groups['value']['name']); ?></option>
														<?php } endif; ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textEnable); ?></label>
													<div class="col-sm-12">
														<select class="form-control" name="status">
															<option value="0" <?php if (isset($__tpl_vars__status) && $__tpl_vars__status == '0') : ?>selected<?php endif; ?>><?php echo $_env->filter('escape', $__tpl_vars__textNo); ?></option>
															<option value="1" <?php if (isset($__tpl_vars__status) && $__tpl_vars__status == '1') : ?>selected<?php endif; ?>><?php echo $_env->filter('escape', $__tpl_vars__textYes); ?></option>
														</select>
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