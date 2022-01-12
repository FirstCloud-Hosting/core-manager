<include tpl="header.tpl" once="true" />
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="app-container">
						<div class="row">
							<div class="col-lg-12">
								<div class="tile">
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
													<td><a target="_blank" href="invoices?{tokenName}={token}&view={invoices.value['id']}"><button class="btn btn-success">{textView}</button></a></td>
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
						</div>
						<!-- end row -->
					</div> <!-- container -->
				</div> <!-- content -->
<include tpl="footer.tpl" once="true" />