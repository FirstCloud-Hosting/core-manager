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
										<if condition="isset({$creationPermission})"><a href="modules"><button type="button" class="btn btn-success">{textAdd}</button></a></if>
									</div>
									</if>
									<h4 class="tile-title">{textModules}</h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>{textType}</th>
													<th>{textName}</th>
													<th>{textPage}</th>
													<th class="noExport">{textActions}</th>
												</tr>
											</thead>
											<tbody>
											<foreach array="{$modules}">
												<tr>
													<td scope="row">{modules.value['module']['type']['name']}</td>
													<td>{modules.value['module']['name']}</td>
													<td>{modules.value['module']['page']}</td>
													<td><if condition="isset({$editionPermission})"><a href="modules?{tokenName}={token}&edit={modules.value['module']['id']}"><button class="btn btn-default">{textEdit}</button></a><else /><button class="btn btn-default" disabled="">{textEdit}</button></if>    <if condition="isset({$deletionPermission})"><button class="btn btn-danger" onclick='confirmActionDelete("modules?{tokenName}={token}&delete={modules.value['module']['id']}")'>{textDelete}</button><else /><button class="btn btn-danger" disabled="">{textDelete}</button></if></td>
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
									<h4 class="tile-title">{textModuleEdit}</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-sm-2 control-label">{textType}</label>
													<div class="col-sm-12">
														<select name="typeId" class="form-control">
														<foreach array="{$types}">
															<option value="{types.value['id']}" <if condition="{$types.value['id']} === {$settype}"> selected="true" </if>>{types.value['name']}</option>
														</foreach>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textName}</label>
													<div class="col-md-12">
														<input class="form-control" name="name" type="text" <if condition="isset({$name})"> value="{name}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">{textPage}</label>
													<div class="col-md-12">
														<input class="form-control" name="page" type="text" <if condition="isset({$page})"> value="{page}" </if>>
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