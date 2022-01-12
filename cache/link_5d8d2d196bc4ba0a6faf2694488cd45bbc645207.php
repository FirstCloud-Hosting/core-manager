<?php $_env->includeTpl('header.tpl', true, Link_Environment::INCLUDE_TPL); ?>
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title"><?php echo $_env->filter('escape', $__tpl_vars__textConfigurations); ?></h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-sm-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textMaintenanceMode); ?></label>
													<div class="col-sm-12">
														<select class="form-control" name="maintenanceMode">
															<option value="false" <?php if ($__tpl_vars__maintenanceMode == 'false') : ?> selected="true" <?php endif; ?>><?php echo $_env->filter('escape', $__tpl_vars__textDisable); ?></option>
															<option value="true" <?php if ($__tpl_vars__maintenanceMode == 'true') : ?> selected="true" <?php endif; ?>><?php echo $_env->filter('escape', $__tpl_vars__textEnable); ?></option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textMaintenanceMessage); ?></label>
													<div class="col-md-12">
														<textarea class="form-control" name="maintenanceMessage" rows="5"><?php if (isset($__tpl_vars__maintenanceMessage)) :  echo $_env->filter('escape', $__tpl_vars__maintenanceMessage);  endif; ?></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textSiteName); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="siteName" type="text" <?php if (isset($__tpl_vars__siteName)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__siteName); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textSiteDescription); ?></label>
													<div class="col-md-12">
														<textarea class="form-control" name="siteDescription" rows="5"><?php if (isset($__tpl_vars__siteDescription)) :  echo $_env->filter('escape', $__tpl_vars__siteDescription);  endif; ?></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textCompanyName); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="companyName" type="text" <?php if (isset($__tpl_vars__companyName)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__companyName); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textAddress); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="address" type="text" <?php if (isset($__tpl_vars__address)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__address); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textPhoneNumber); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="phoneNumber" type="text" <?php if (isset($__tpl_vars__phoneNumber)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__phoneNumber); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textRCSNumber); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="RCSNumber" type="text" <?php if (isset($__tpl_vars__RCSNumber)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__RCSNumber); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textRCSCity); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="RCSCity" type="text" <?php if (isset($__tpl_vars__RCSCity)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__RCSCity); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textLegalForm); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="legalForm" type="text" <?php if (isset($__tpl_vars__legalForm)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__legalForm); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textShareCapital); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="shareCapital" type="text" <?php if (isset($__tpl_vars__shareCapital)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__shareCapital); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textVATNumber); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="VATNumber" type="text" <?php if (isset($__tpl_vars__VATNumber)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__VATNumber); ?>" <?php endif; ?>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><?php echo $_env->filter('escape', $__tpl_vars__textSIRETNumber); ?></label>
													<div class="col-md-12">
														<input class="form-control" name="SIRETNumber" type="text" <?php if (isset($__tpl_vars__SIRETNumber)) : ?> value="<?php echo $_env->filter('escape', $__tpl_vars__SIRETNumber); ?>" <?php endif; ?>>
													</div>
												</div>
												<input type="hidden" name="<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>" value="<?php echo $_env->filter('escape', $__tpl_vars__token); ?>">
												<center><button type="submit" class="btn btn-primary"><?php echo $_env->filter('escape', $__tpl_vars__textSave); ?></button><button type="reset" class="btn btn-default"><?php echo $_env->filter('escape', $__tpl_vars__textReset); ?></button></center>
											</form>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
								<div class="tile">
									<h4 class="tile-title"><?php echo $_env->filter('escape', $__tpl_vars__textClearCache); ?></h4>
									<div class="row">
										<div class="col-lg-12">
											  <div class="row invoice-info">
												<div class="col-1">
													<strong>Enabled :</strong>
													<strong>Version :</strong>
												</div>
												<div class="col-3">
													<?php echo $_env->filter('escape', $__tpl_vars__textStatusCache); ?><br>
													<?php echo $_env->filter('escape', $__tpl_vars__versionCache); ?><br>
												</div>
												<div class="col-4"></div>
												<div class="col-1">
													<strong>Get Hits :</strong>
													<strong>Get Miss :</strong>
												</div>
												<div class="col-3">
													<?php echo $_env->filter('escape', $__tpl_vars__statsGetHits); ?><br>
													<?php echo $_env->filter('escape', $__tpl_vars__statsGetMisses); ?>
												</div>
											  </div>
											<center><a href="configurations?<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>=<?php echo $_env->filter('escape', $__tpl_vars__token); ?>&flush=true"><button class="btn btn-danger"><?php echo $_env->filter('escape', $__tpl_vars__textFlushCache); ?></button></a></center>
										</div>
									</div>
								</div>
							</div><!-- end col -->
						</div>
						<!-- end row -->
					</div> <!-- container -->
				</div> <!-- content -->
<?php $_env->includeTpl('footer.tpl', true, Link_Environment::INCLUDE_TPL); ?>