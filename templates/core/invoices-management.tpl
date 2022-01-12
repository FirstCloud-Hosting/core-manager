<include tpl="header.tpl" once="true" />
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">
						<div class="row">
							<if condition="isset({$new})">
							<if condition="isset({$invoiceId})">
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title">{textInvoices} #{invoiceId} - New line</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label">Description</label>
													<div class="col-md-12">
														<input class="form-control" name="description" type="text" autofocus required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Price</label>
													<div class="col-md-12">
														<input class="form-control" name="price" type="number" step="0.01" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Quantity</label>
													<div class="col-md-12">
														<input class="form-control" name="quantity" type="number" step="0.01" required>
													</div>
												</div>
												<input type="hidden" name="{tokenName}" value="{token}">
												<input type="hidden" name="invoiceId" value="{invoiceId}">
												<center><button type="submit" class="btn btn-primary">{textSave}</button><button type="reset" class="btn btn-default">{textReset}</button></center>
											</form>
											<br>
											<center><a target="_blank" href="invoices-management?{tokenName}={token}&view={invoiceId}"><button class="btn btn-success">{textView}</button></a></center>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
							</div>
							<else />
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title">{textInvoices}</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-sm-2 control-label">{textOrganization}</label>
													<div class="col-sm-12">
														<select class="form-control" name="organizationId">
														<foreach array="{$organizations}">
															<option value="{organizations.value['id']}">{organizations.value['id']} - {organizations.value['firstName']} {organizations.value['lastName']} - {organizations.value['companyName']}</option>
														</foreach>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Note</label>
													<div class="col-md-12">
														<input class="form-control" name="note" type="text">
													</div>
												</div>
												<input type="hidden" name="{tokenName}" value="{token}">
												<center><button type="submit" class="btn btn-primary">{textNext}</button><button type="reset" class="btn btn-default">{textReset}</button></center>
											</form>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
							</div><!-- end col -->
							</if>
							<else />
							<div class="col-lg-12">
								<div class="tile">
									<div class="dropdown pull-right">
										<if condition="isset({$creationPermission})"><a href="invoices-management?{tokenName}={token}&action=new"><button type="button" class="btn btn-success">{textAdd}</button></a></if>
									</div>
									<h4 class="tile-title">{textInvoices}</h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>{textInvoiceDate}</th>
													<th>{textDueDate}</th>
													<th>{textAmount}</th>
													<th>{textStatus}</th>
													<th class="noExport">{textActions}</th>
												</tr>
											</thead>
											<tbody>
											<if condition="isset({$invoices})">
											<foreach array="{$invoices}">
												<tr>
													<td scope="row">{invoices.value['invoiceDate']}</td>
													<td>{invoices.value['dueDate']}</td>
													<td>{invoices.value['totalPrice']} €</td>
													<td>{invoices.value['status']}</td>
													<td><a target="_blank" href="invoices-management?{tokenName}={token}&view={invoices.value['id']}"><button class="btn btn-success">{textView}</button></a></td>
												</tr>
											</foreach>
											<else />
											<p>No invoices found</p>
											</if>
											</tbody>
										</table>
									</div>
								</div>
							</div><!-- end col -->
							</if>
						</div>
						<!-- end row -->
					</div> <!-- container -->
				</div> <!-- content -->
<include tpl="footer.tpl" once="true" />