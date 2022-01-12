<include tpl="header.tpl" once="true" />
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="app-container">
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title">{textOrganizations}</h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>#</th>
													<th>Password Hardening</th>
													<th>Validity (in days)</th>
													<th>Created</th>
												</tr>
											</thead>
											<tbody>
											<foreach array="{$organizations}">
												<tr>
													<td scope="row">{organizations.value['id']}</td>
													<td><if condition="{$organizations.value['passwordHardening']} == '0'">{textNo}<else />{textYes}</if></td>
													<td><if condition="{$organizations.value['validity']} == '-1'">Unlimited<else />{organizations.value['validity']}</if></td>
													<td>{organizations.value['created']}</td>
												</tr>
											</foreach>
											</tbody>
										</table>
									</div>
								</div>
							</div><!-- end col -->
						</div>
						<!-- end row -->
					</div> <!-- container -->
				</div> <!-- content -->
<include tpl="footer.tpl" once="true" />