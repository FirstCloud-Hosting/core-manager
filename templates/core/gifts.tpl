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
										<if condition="isset({$creationPermission})"><a href="gifts"><button type="button" class="btn btn-success">{textAdd}</button></a></if>
									</div>
									</if>
									<h4 class="tile-title">Gifts Code</h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>Code</th>
													<th>Value</th>
													<th>Type of value</th>
													<th>Start Date</th>
													<th>End Date</th>
													<th>Assigned Organization</th>
													<th>Number of authorized validation</th>
													<th class="noExport">{textActions}</th>
												</tr>
											</thead>
											<tbody>
											<foreach array="{$gifts}">
												<tr>
													<td scope="row">{gifts.value['code']}</td>
													<td>{gifts.value['value']}</td>
													<td>{gifts.value['typeOfValue']}</td>
													<td>{gifts.value['startTime']}</td>
													<td>{gifts.value['endTime']}</td>
													<td><if condition="{$gifts.value['organizationId']} == 0">No organization assigned<else />{gifts.value['organizationId']}</if></td>
													<td><if condition="{$gifts.value['numberOfValidation']} == 0">No limit of validation<else />{gifts.value['numberOfValidation']}</if></td>
													<td><if condition="isset({$editionPermission})"><a href="gifts?{tokenName}={token}&edit={gifts.value['id']}"><button class="btn btn-default">{textEdit}</button></a><else /><button class="btn btn-default" disabled="">{textEdit}</button></if>	<if condition="isset({$deletionPermission})"><button class="btn btn-danger" onclick='confirmActionDelete("gifts?{tokenName}={token}&delete={gifts.value['id']}")'>{textDelete}</button><else /><button class="btn btn-danger" disabled="">{textDelete}</button></if></td>
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
									<h4 class="tile-title">Gift Code Edition</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label">Code</label>
													<div class="col-md-12">
														<input class="form-control" name="code" type="text" <if condition="isset({$code})"> value="{code}" </if> autofocus>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Value</label>
													<div class="col-md-12">
														<input class="form-control" name="value" type="text" <if condition="isset({$value})"> value="{value}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Type of value</label>
													<div class="col-sm-12">
														<select class="form-control" name="typeOfValue">
															<option value="percent" <if condition="isset({$typeOfValue}) && {$typeOfValue} == 'percent'"> selected="true" </if>>Percent</option>
															<option value="euros" <if condition="isset({$typeOfValue}) && {$typeOfValue} == 'euros'"> selected="true" </if>>Euros</option>
															<option value="servers" <if condition="isset({$typeOfValue}) && {$typeOfValue} == 'servers'"> selected="true" </if>>Servers</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Start Time</label>
													<div class="col-md-12">
														<input class="form-control" name="startTime" type="date" <if condition="isset({$startTime})"> value="{startTime}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">End Time</label>
													<div class="col-md-12">
														<input class="form-control" name="endTime" type="date" <if condition="isset({$endTime})"> value="{endTime}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Assigned Organization</label>
													<div class="col-md-12">
														<input class="form-control" name="organizationId" type="text" <if condition="isset({$organizationId})"> value="{organizationId}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">Number Of Authorized Validation</label>
													<div class="col-md-12">
														<input class="form-control" name="numberOfValidation" type="number" <if condition="isset({$numberOfValidation})"> value="{numberOfValidation}" </if>>
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