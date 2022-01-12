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
										<a href="pricelist"><button type="button" class="btn btn-success">{textAdd}</button></a>
									</div>
									</if>
									<h4 class="tile-title">{textPriceList}</h4>
									<div class="table-responsive">
										<table id="dataTable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>{textPrice}</th>
													<th>{textFromNumberOfServers}</th>
													<th>{textToNumberOfServers}</th>
													<th class="noExport">{textActions}</th>
												</tr>
											</thead>
											<tbody>
											<foreach array="{$prices}">
												<tr>
													<td scope="row">{prices.value['price']} €</td>
													<td>{prices.value['fromServer']}</td>
													<td>{prices.value['toServer']}</td>
													<td><a href="pricelist?{tokenName}={token}&edit={prices.value['id']}"><button class="btn btn-default">{textEdit}</button></a>	<a href="pricelist?{tokenName}={token}&delete={prices.value['id']}"><button class="btn btn-danger">{textDelete}</button></a></td>
												</tr>
											</foreach>
											</tbody>
										</table>
									</div>
								</div>
							</div><!-- end col -->
							<div class="col-sm-12">
								<div class="tile">
									<h4 class="tile-title">{textPriceEdition}</h4>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal" role="form" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label">{textPrice}</label>
													<div class="col-md-12">
														<input class="form-control" name="price" type="text" <if condition="isset({$price})"> value="{price}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">{textFromNumberOfServers}</label>
													<div class="col-md-12">
														<input class="form-control" name="fromServer" type="number" <if condition="isset({$fromServer})"> value="{fromServer}" </if>>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">{textToNumberOfServers}</label>
													<div class="col-md-12">
														<input class="form-control" name="toServer" type="number" <if condition="isset({$toServer})"> value="{toServer}" </if>>
													</div>
												</div>
												<input type="hidden" name="{tokenName}" value="{token}">
												<center><button type="submit" class="btn btn-primary">{textSave}</button><button type="reset" class="btn btn-default">{textReset}</button></center>
											</form>
										</div><!-- end col -->
									</div><!-- end row -->
								</div>
							</div><!-- end col -->
						</div>
						<!-- end row -->
					</div> <!-- container -->
				</div> <!-- content -->
<include tpl="footer.tpl" once="true" />