<include tpl="header.tpl" once="true" />
<div class="content-page">
				<!-- Start content -->
				<div class="content" id="content">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="tile">
									<section class="invoice">
										<div class="row mb-4">
											<div class="col-4">
												<h2 class="page-header"><i class="fa fa-globe"></i> {companyName}</h2>
											</div>
											<div class="col-4">
												<h5 class="">Period: {periodDate}</h5>
											</div>											
											<div class="col-4">
												<h5 class="text-right">Date: {invoiceDate}</h5>
											</div>
										</div>
										<div class="row invoice-info">
											<div class="col-4">From
												<address><strong>{companyName}</strong><br>{addressCompany}</address>
											</div>
											<div class="col-4">To
												<address><strong>{personalName}</strong><br>{address} {address_2}<br>{city}, {postalCode}, {country}</address>
											</div>
											<div class="col-4"><b>Invoice #{invoiceId}</b><br><b>Payment Due:</b> {dueDate}<br><b>Note:</b> {note}<br><b>Status:</b> {status}<br></div>
										</div>
										<div class="row">
											<div class="col-12 table-responsive">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Qty</th>
															<th>Description</th>
															<th>Unit Price</th>
														</tr>
													</thead>
													<tbody>
													<foreach array="{$details}">
														<tr>
															<td>{details.value['quantity']}</td>
															<td>{details.value['description']}</td>
															<td>{details.value['price']} €</td>
														</tr>
													</foreach>
													</tbody>
												</table>
											</div>
										</div>
										<div class="row">
											<if condition="{$status} == 'unpaid'">
											<div class="col-8">
												<div class="d-print-none">
													<form class="form-horizontal" role="form" action="invoices?{tokenName}={token}&view={invoiceId}&action=giftCode" method="POST">
													<div class="form-group">
														<div class="col-md-12">
															<input class="form-control" name="giftCode" type="text" placeholder="Gift Code">
														</div>
													</div>
													<input type="hidden" name="{tokenName}" value="{token}">
													<center><button type="submit" class="btn btn-primary">{textSave}</button><button type="reset" class="btn btn-default">{textReset}</button></center>
													</form>
												</div>
											</div>
											<else />
											<div class="col-8"></div>
											</if>
											<div class="col-4 table-responsive">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Subtotal</th>
															<th>VAT ({vatPercent}%)</th>
															<th>Total</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>{subtotal} €</td>
															<td>{vatPrice} €</td>
															<td>{total} €</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="row d-print-none mt-12" id="elementH">
											<div class="col-12 text-right">
												<if condition="isset({$receipt_url})">
													<a class="btn btn-primary" href="{receipt_url}" target="_blank"><i class="fas fa-receipt"></i> {textReceipt}</a>
												</if>
												<if condition="{$status} == 'unpaid'">
												<form action="invoices?{tokenName}={token}&view={invoiceId}" method="POST">
													<script
													src="https://checkout.stripe.com/checkout.js" class="stripe-button"
													data-key="pk_test_raX7DAVuuhBwDBGMJ6P94VtT"
													data-amount="{stipeTotal}"
													data-name="{companyName}"
													data-locale="auto"
													data-currency="eur"
													data-label="Pay" >
													</script>
													<script>
														document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
													</script>
													<button type="submit" class="btn btn-primary"><i class="fa fa-credit-card"></i> {textPay}</button>
													<a class="btn btn-primary" href="#" onclick="convert_HTML_To_IMG();"><i class="fa fa-file"></i> Export</a>
													<a class="btn btn-primary" href="#" onclick="window.print();" target="_blank"><i class="fa fa-print"></i> {textPrint}</a>
												</form>		
												<else />
													<a class="btn btn-primary" href="#" onclick="convert_HTML_To_IMG();"><i class="fa fa-file"></i> Export</a>
													<a class="btn btn-primary" href="#" onclick="window.print();" target="_blank"><i class="fa fa-print"></i> {textPrint}</a>
												</if>									
											</div>
										</div>
										<div>
											<br><center><i>{companyName} {legalForm} {addressCompany} au capital de {shareCapital}€ - RCS {RCSCity} {RCSNumber} - VAT Number: {VATNumber} - SIRET: {SIRETNumber}</i></center>
										</div>
									</section>
								</div>
							</div><!-- end col -->
						</div>
						<!-- end row -->
					</div> <!-- container -->
				</div> <!-- content -->
<include tpl="footer.tpl" once="true" />