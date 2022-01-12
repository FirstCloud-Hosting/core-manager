<include tpl="header.tpl" once="true" />
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="app-container">
						<div class="row">
							<div class="col-lg-12">
								<div class="tile">
									<if condition="isset({$name})">
									<div class="dropdown pull-right">
										<if condition="isset({$creationPermission})"><a href="languages"><button type="button" class="btn btn-success">{textAdd}</button></a></if>
									</div>
									</if>
									<h4 class="tile-title">{textLanguages}</h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>{textName}</th>
													<th>{textCode}</th>
													<th class="noExport">{textActions}</th>
												</tr>
											</thead>
											<tbody>
											<foreach array="{$translations}">
												<tr>
													<td scope="row">{translations.value['msgid']}</td>
													<td data-editable="true">{translations.value['msgstr']}</td>
													<td><if condition="isset({$editionPermission})"><a data-toggle="modal" data-target="#translation-{translations.current}-edit""><button class="btn btn-default">{textEdit}</button></a><else /><button class="btn btn-default" disabled="">{textEdit}</button></if></td>
												</tr>
												<div id="translation-{translations.current}-edit" class="modal hide fade" tabindex="-1" data-focus-on="input:first">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Translation</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																  <span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form class="form-horizontal" role="form" method="post">
																	<div class="form-group">
																		<label class="col-md-2 control-label">Value</label>
																		<div class="col-md-12">
																			<input class="form-control" name="msgstr" type="text" <if condition="isset({$translations.value['msgstr']})">value="{translations.value['msgstr']}"</if>>
																		</div>
																	</div>
																	<input type="hidden" name="{tokenName}" value="{token}">
																	<input type="hidden" name="msgid" value="{translations.value['msgid']}">
																	<center>
																		<button type="submit" class="btn btn-primary">{textSave}</button>
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">{textClose}</button>
																	</center>
																</form>
															</div>
														</div>
													</div>
												</div>
											</foreach>
											</tbody>
										</table>
									</div>
								</div>
							</div><!-- end col -->
							<if condition="isset({$creationPermission})">
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title">{textLanguageEdit}</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label">{textName}</label>
													<div class="col-md-12">
														<input class="form-control" name="name" type="text" <if condition="isset({$name})"> value="{name}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textCode}</label>
													<div class="col-md-12">
														<input class="form-control" name="code" type="text" <if condition="isset({$code})"> value="{code}" </if>>
													</div>
												</div>
												<input type="hidden" name="{tokenName}" value="{token}">
												<center><button type="submit" class="btn btn-primary">{textSave}</button><button type="reset" class="btn btn-default">{textReset}</button></center>
											</form>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
							</div><!-- end col -->
							</if>
						</div>
						<!-- end row -->
					</div> <!-- container -->
				</div> <!-- content -->
<include tpl="footer.tpl" once="true" />