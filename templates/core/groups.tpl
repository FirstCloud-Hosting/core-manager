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
										<if condition="isset({$creationPermission})"><a href="groups"><button type="button" class="btn btn-success">{textAdd}</button></a></if>
									</div>
									</if>
									<h4 class="tile-title">{textUsersGroups}</h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>{textName}</th>
													<th>{textNote}</th>
													<th class="noExport">{textActions}</th>
												</tr>
											</thead>
											<tbody>
											<foreach array="{$groups}">
												<tr>
													<td scope="row">{groups.value['name']}</td>
													<td>{groups.value['note']}</td>
													<td><if condition="isset({$editionPermission})"><a href="groups?{tokenName}={token}&edit={groups.value['id']}"><button class="btn btn-default">{textEdit}</button></a><else /><button class="btn btn-default" disabled="">{textEdit}</button></if>	<if condition="isset({$deletionPermission})"><button class="btn btn-danger" onclick='confirmActionDelete("groups?{tokenName}={token}&delete={groups.value['id']}")'>{textDelete}</button><else /><button class="btn btn-default" disabled="">{textDelete}</button></if></td>
												</tr>
											</foreach>
											</tbody>
										</table>
									</div>
								</div>
							</div><!-- end col -->
							<if condition="isset({$creationPermission})">
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title">{textGroupEdit}</h4>
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
													<label class="col-md-2 control-label">{textNote}</label>
													<div class="col-md-12">
														<textarea class="form-control" name="note" rows="5"><if condition="isset({$name})">{note}</if></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">{textSelectPermissions}</label>
													<div class="col-md-12">
														<table class="table table-sm">
														  <thead>
															<tr>
																<th>{textName}</th>
																<th>{textView}</th>
																<th>{textAdd}</th>
																<th>{textEdit}</th>
																<th>{textDelete}</th>
															</tr>
														  </thead>
														  <tbody>
														  	<foreach array="{$modules}">
															<tr>
																<td>{modules.value['module']['name']}</td>
																<td>
																	<div class="toggle-flip">
																		<label>
																			<center><input name="permissions[{modules.value['module']['id']}][view]" class="form-check-input" type="checkbox" <if condition="isset({$modules.value['view']}) && {$modules.value['view']} == 1">checked</if>><span class="flip-indecator" data-toggle-on="{textON}" data-toggle-off="{textOFF}"></span></center>
																		</label>
																	</div>
																</td>
																<td>
																	<div class="toggle-flip">
																		<label>
																			<center><input name="permissions[{modules.value['module']['id']}][creation]" class="form-check-input" type="checkbox" <if condition="isset({$modules.value['creation']}) && {$modules.value['creation']} == 1">checked</if>><span class="flip-indecator" data-toggle-on="{textON}" data-toggle-off="{textOFF}"></span></center>
																		</label>
																	</div>
																</td>
																<td>
																	<div class="toggle-flip">
																		<label>
																			<center><input name="permissions[{modules.value['module']['id']}][edition]" class="form-check-input" type="checkbox" <if condition="isset({$modules.value['edition']}) && {$modules.value['edition']} == 1">checked</if>><span class="flip-indecator" data-toggle-on="{textON}" data-toggle-off="{textOFF}"></span></center>
																		</label>
																	</div>
																</td>
																<td>
																	<div class="toggle-flip">
																		<label>
																			<center><input name="permissions[{modules.value['module']['id']}][deletion]" class="form-check-input" type="checkbox" <if condition="isset({$modules.value['deletion']}) && {$modules.value['deletion']} == 1">checked</if>><span class="flip-indecator" data-toggle-on="{textON}" data-toggle-off="{textOFF}"></span></center>
																		</label>
																	</div>
																</td>
															</tr>
															</foreach>
														  </tbody>
														</table>
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