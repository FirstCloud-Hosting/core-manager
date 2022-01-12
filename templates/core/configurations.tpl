<include tpl="header.tpl" once="true" />
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title">{textConfigurations}</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-sm-2 control-label">{textMaintenanceMode}</label>
													<div class="col-sm-12">
														<select class="form-control" name="maintenanceMode">
															<option value="false" <if condition="{$maintenanceMode} == 'false'"> selected="true" </if>>{textDisable}</option>
															<option value="true" <if condition="{$maintenanceMode} == 'true'"> selected="true" </if>>{textEnable}</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label">{textMaintenanceMessage}</label>
													<div class="col-md-12">
														<textarea class="form-control" name="maintenanceMessage" rows="5"><if condition="isset({$maintenanceMessage})">{maintenanceMessage}</if></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textSiteName}</label>
													<div class="col-md-12">
														<input class="form-control" name="siteName" type="text" <if condition="isset({$siteName})"> value="{siteName}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textSiteDescription}</label>
													<div class="col-md-12">
														<textarea class="form-control" name="siteDescription" rows="5"><if condition="isset({$siteDescription})">{siteDescription}</if></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textCompanyName}</label>
													<div class="col-md-12">
														<input class="form-control" name="companyName" type="text" <if condition="isset({$companyName})"> value="{companyName}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textAddress}</label>
													<div class="col-md-12">
														<input class="form-control" name="address" type="text" <if condition="isset({$address})"> value="{address}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textPhoneNumber}</label>
													<div class="col-md-12">
														<input class="form-control" name="phoneNumber" type="text" <if condition="isset({$phoneNumber})"> value="{phoneNumber}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textRCSNumber}</label>
													<div class="col-md-12">
														<input class="form-control" name="RCSNumber" type="text" <if condition="isset({$RCSNumber})"> value="{RCSNumber}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textRCSCity}</label>
													<div class="col-md-12">
														<input class="form-control" name="RCSCity" type="text" <if condition="isset({$RCSCity})"> value="{RCSCity}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textLegalForm}</label>
													<div class="col-md-12">
														<input class="form-control" name="legalForm" type="text" <if condition="isset({$legalForm})"> value="{legalForm}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textShareCapital}</label>
													<div class="col-md-12">
														<input class="form-control" name="shareCapital" type="text" <if condition="isset({$shareCapital})"> value="{shareCapital}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textVATNumber}</label>
													<div class="col-md-12">
														<input class="form-control" name="VATNumber" type="text" <if condition="isset({$VATNumber})"> value="{VATNumber}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textSIRETNumber}</label>
													<div class="col-md-12">
														<input class="form-control" name="SIRETNumber" type="text" <if condition="isset({$SIRETNumber})"> value="{SIRETNumber}" </if>>
													</div>
												</div>
												<input type="hidden" name="{tokenName}" value="{token}">
												<center><button type="submit" class="btn btn-primary">{textSave}</button><button type="reset" class="btn btn-default">{textReset}</button></center>
											</form>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
								<div class="tile">
									<h4 class="tile-title">{textLogo}</h4>
									<div class="row">
										<div class="col-lg-12">
											<center><img src="{url}/assets/img/logo.svg" class="img-thumbnail"></center>
											<form enctype="multipart/form-data" class="form-horizontal" role="form" method="post">
												<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
												<input class="form-control-file" name="logo" id="logo" type="file">
												<input type="hidden" name="{tokenName}" value="{token}">
												<center><button type="submit" class="btn btn-primary" name="submit">{textSave}</button><button type="reset" class="btn btn-default">{textReset}</button></center>
											</form>
										</div>
									</div>
								</div>
								<div class="tile">
									<h4 class="tile-title">{textClearCache}</h4>
									<div class="row">
										<div class="col-lg-12">
											  <div class="row invoice-info">
												<div class="col-1">
													<strong>Enabled :</strong>
													<strong>Version :</strong>
												</div>
												<div class="col-3">
													{textStatusCache}<br>
													{versionCache}<br>
												</div>
												<div class="col-4"></div>
												<div class="col-1">
													<strong>Get Hits :</strong>
													<strong>Get Miss :</strong>
												</div>
												<div class="col-3">
													{statsGetHits}<br>
													{statsGetMisses}
												</div>
											  </div>
											<center><a href="configurations?{tokenName}={token}&flush=true"><button class="btn btn-danger">{textFlushCache}</button></a></center>
										</div>
									</div>
								</div>
							</div><!-- end col -->
						</div>
						<!-- end row -->
					</div> <!-- container -->
				</div> <!-- content -->
<include tpl="footer.tpl" once="true" />