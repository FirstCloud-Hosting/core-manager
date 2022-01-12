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
										<table id="dataTableEditable" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>{textName}</th>
													<th>{textCode}</th>
													<th class="noExport">{textActions}</th>
												</tr>
											</thead>
											<tbody>
											<foreach array="{$languages}">
												<tr>
													<td scope="row">{languages.value['name']}</td>
													<td>{languages.value['code']}</td>
													<td><div class="btn-group" role="group" aria-label="Button group with nested dropdown">
														<button class="btn btn-primary" type="button">Translation</button>
														<div class="btn-group" role="group">
														  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"></button>
														  <div class="dropdown-menu dropdown-menu-right">
														  <foreach array="{$files}">
															<a class="dropdown-item" href="languages?{tokenName}={token}&translate={languages.value['code']}&file={files.value}">{files.value}</a>
														  </foreach>
														  </div>
														</div>
													  </div>
			  											<if condition="isset({$editionPermission})"><a href="languages?{tokenName}={token}&edit={languages.value['id']}"><button class="btn btn-default">{textEdit}</button></a><else /><button class="btn btn-default" disabled="">{textEdit}</button></if>    <if condition="isset({$deletionPermission})"><button class="btn btn-danger" onclick='confirmActionDelete("languages?{tokenName}={token}&delete={languages.value['id']}")'>{textDelete}</button><else /><button class="btn btn-danger" disabled="">{textDelete}</button></if></td>
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