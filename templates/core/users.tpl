<include tpl="header.tpl" once="true" />
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="app-container">
						<div class="row">
							<div class="col-lg-12">
								<div class="tile">
									<if condition="isset({$username_1})">
									<div class="dropdown pull-right">
										<if condition="isset({$creationPermission})"><a href="users"><button type="button" class="btn btn-success">{textAdd}</button></a></if>
									</div>
									</if>
									<h4 class="tile-title">{textUsers}</h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>{textEmail}</th>
													<th>{textGroup}</th>
													<th>{textEnable}</th>
													<th class="noExport">{textActions}</th>
												</tr>
											</thead>
											<tbody>
											<foreach array="{$users}">
												<tr>
													<td scope="row">{users.value['email']}</td>
													<td>{users.value['group']['name']}</td>
													<td><if condition="{$users.value['status']} == 1">{textYes}<else />{textNo}</if></td>
													<td><if condition="isset({$editionPermission})"><a href="users?{tokenName}={token}&edit={users.value['id']}"><button class="btn btn-default">{textEdit}</button></a><else /><button class="btn btn-default" disabled="">{textEdit}</button></if>    <if condition="isset({$deletionPermission})"><button class="btn btn-danger" onclick='confirmActionDelete("users?{tokenName}={token}&delete={users.value['id']}")'>{textDelete}</button><else /><button class="btn btn-danger" disabled="">{textDelete}</button></if></td>
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
									<h4 class="tile-title">{textUserEdit}</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label">{textEmail}</label>
													<div class="col-md-12">
														<input class="form-control" name="email" type="email" <if condition="isset({$email})"> value="{email}"</if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">{textGroup}</label>
													<div class="col-sm-12">
														<select class="form-control" name="groupId">
														<foreach array="{$groups}">
															<option value="{groups.value['id']}" <if condition="{$groups.value['id']} === {$setgroup}"> selected="true" </if>>{groups.value['name']}</option>
														</foreach>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">{textEnable}</label>
													<div class="col-sm-12">
														<select class="form-control" name="status">
															<option value="0" <if condition="isset({$status}) && {$status} == '0'">selected</if>>{textNo}</option>
															<option value="1" <if condition="isset({$status}) && {$status} == '1'">selected</if>>{textYes}</option>
														</select>
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