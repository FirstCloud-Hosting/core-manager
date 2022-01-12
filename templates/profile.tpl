<include tpl="header.tpl" once="true" />
<div class="content-page">
				<!-- Start content -->
				<if condition="{$view} == 'profile'">
				<div class="content">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title">{textProfile}</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label">{textEmail}</label>
													<div class="col-md-12">
														<input class="form-control" name="email" type="email" value="{email}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textLanguage}</label>
													<div class="col-md-12">
														<select id="languageId" class="form-control" name="languageId">
														<foreach array="{$languages}">
															<option value="{languages.value['id']}" <if condition="{$languages.value['id']} == {$language}"> selected="true" </if>>{languages.value['name']}</option>
														</foreach>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textCurrentPassword}</label>
													<div class="col-md-12">
														<input class="form-control" name="password" type="password">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textNewPassowrd}</label>
													<div class="col-md-12">
														<input class="form-control" name="newpassword" type="password" id="password">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">{textRepeatNewPassowrd}</label>
													<div class="col-md-12">
														<input class="form-control" name="repeatnewpassword" type="password">
													</div>
												</div>
												<input type="hidden" name="{tokenName}" value="{token}">
												<div class="tile-footer">
												  <center><button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{textSave}</button></center>
												</div>
											</form>
											<br/>
											<center><a href="profile?{tokenName}={token}&mfa=<if condition="{$mfa} == 'off'">configure<else />disable</if>"><button class="btn btn-warning"><if condition="{$mfa} == 'off'">{textEnable2FA}<else />{textDisable2FA}</if></button></a></center>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
							</div><!-- end col -->
							<div class="col-sm-12">
								<div class="tile">
									<div class="dropdown pull-right">
										<a href="profile?{tokenName}={token}&appAdd=true"><button type="button" class="btn btn-success">{textAdd}</button></a>
									</div>
									<h4 class="tile-title">{textApplicationsKeys}</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label">{textOrganizationKey}</label>
													<div class="col-md-12">
														<input class="form-control" name="organizationId" type="text" value="{organizationId}" readonly="true">
													</div>
												</div>
											</form>
											<if condition="isset({$appKeys})">
											<div class="table-responsive">
												<table id="dataTable_wrapper" class="table dataTable_wrapper">
													<thead>
														<tr>
															<th>{textDescription}</th>
															<th>{textSecretKey}</th>
															<th>{textCreated}</th>
															<th class="noExport">{textActions}</th>
														</tr>
													</thead>
													<tbody>
													<foreach array="{$appKeys}">
														<tr>
															<td scope="row">{appKeys.value['description']}</td>
															<td>{appKeys.value['secretKey']}</td>
															<td>{appKeys.value['created']}</td>
															<td><a href="profile?{tokenName}={token}&appEdit={appKeys.value['id']}"><button class="btn btn-default">{textEdit}</button></a>	<button class="btn btn-danger" onclick='confirmActionDelete("profile?{tokenName}={token}&appDelete={appKeys.value['id']}")'>{textDelete}</button></td>
														</tr>
													</foreach>
													</tbody>
												</table>
											</div>
											<else />
												<center><p>{textNoApplicationsKeys}</p></center>
											</if>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
							</div><!-- end col -->
						</div><!-- end row -->
					</div>
				</div> <!-- content -->
				<elif condition="{$view} == 'appEdit'" />
				<div class="content">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title">{textApplicationsKeys}</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label">{textSecretKey}</label>
													<div class="col-md-12">
														<input class="form-control" name="secretKey" type="text" value="{secretKey}" readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textDescription}</label>
													<div class="col-md-12">
														<input class="form-control" name="description" type="text" value="{description}" autofocus="">
													</div>
												</div>
												<input type="hidden" name="{tokenName}" value="{token}">
												<div class="tile-footer">
												  <center><button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{textSave}</button></center>
												</div>
											</form>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
							</div><!-- end col -->
						</div><!-- end row -->
					</div>
				</div> <!-- content -->				
				<elif condition="{$view} == 'mfa'" />
				<div class="content">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title">{textTwoFactorAuthentication}</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<center><img src="{mfaUrl}" /></center>
												<div class="form-group">
													<label class="col-md-2 control-label">{textConfirmationCode}</label>
													<div class="col-md-12">
														<input class="form-control" name="confirmationCode" type="text" autofocus="">
													</div>
												</div>
												<input type="hidden" name="{tokenName}" value="{token}">
												<input type="hidden" name="mfaKey" value="{mfaKey}">
												<div class="tile-footer">
												  <center><button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{textSave}</button></center>
												</div>
											</form>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
							</div><!-- end col -->
						</div><!-- end row -->
					</div>
				</div> <!-- content -->
				</if>
			</div>
<include tpl="footer.tpl" once="true" />