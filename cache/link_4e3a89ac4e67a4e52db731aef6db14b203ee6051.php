	<?php if (isset($__tpl_vars__debug)) : ?>
		<div class="col-lg-12">
			<h3>Debug</h3>
			<div class="bs-component">
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#backtrace">Backtrace</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#getParams">GET Params</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#postParams">POST Params</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sessions">Sessions Params</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#servers">Servers Params</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#globals">Globals Params</a></li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active show" id="backtrace">
						<p><?php echo $_env->filter('escape', $__tpl_vars__backtrace); ?></p>
					</div>
					<div class="tab-pane fade" id="getParams">
						<p><?php echo $_env->filter('escape', $__tpl_vars__getParams); ?></p>
					</div>
					<div class="tab-pane fade" id="postParams">
						<p><?php echo $_env->filter('escape', $__tpl_vars__postParams); ?></p>
					</div>
					<div class="tab-pane fade" id="sessions">
						<p><?php echo $_env->filter('escape', $__tpl_vars__sessions); ?></p>
					</div>
					<div class="tab-pane fade" id="servers">
						<p><?php echo $_env->filter('escape', $__tpl_vars__servers); ?></p>
					</div>
					<div class="tab-pane fade" id="globals">
						<p><?php echo $_env->filter('escape', $__tpl_vars__globals); ?></p>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	</main>
	<!-- Essential javascripts for application to work-->
	<script type="text/javascript"  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script type="text/javascript"  src="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/js/popper.min.js"></script>
	<script type="text/javascript"  src="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript"  src="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/js/main.js"></script>

	<!-- The javascript plugin to display page loading on top-->
	<script type="text/javascript"  src="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/js/plugins/pace.min.js"></script>
	<!-- Password Strength Meter JS -->
	<script type="text/javascript"  src="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/js/plugins/password-strength-meter.js" async></script>
	<!-- Select Beautifuler -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

	<!-- Page specific javascripts-->
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

	<script src='https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js'></script>
	<script src='https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js'></script>
	<script type="text/javascript">$('#dataTable').DataTable({
			dom:"<'row'<'col-sm-5'l><'col-sm-6'f><'col-sm-1'B>>" +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			buttons: [
				{
				  extend: 'excel',
				  text: '<i class="far fa-file-excel"></i>',
				  filename: 'linufy_data',
				  className: 'btn btn-primary btn-sm',
				  exportOptions: {
					modifier: {
					  page: 'all'
					},
					columns: "thead th:not(.noExport)"
				  }
				}
			]
		});</script>
	<script type="text/javascript">$('#dataTable2').DataTable({
			dom:"<'row'<'col-sm-5'l><'col-sm-6'f><'col-sm-1'B>>" +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			buttons: [
				{
				  extend: 'excel',
				  text: '<i class="far fa-file-excel"></i>',
				  filename: 'linufy_data',
				  className: 'btn btn-primary btn-sm',
				  exportOptions: {
					modifier: {
					  page: 'all'
					}
				  }
				}
			]
		});</script>
	<script type="text/javascript">$('#dataTableReverseSort').DataTable({"order": [[ 0, "desc" ]]});</script>
	<script type="text/javascript">var xhttp = new XMLHttpRequest(); xhttp.open("GET", "<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/tasks/cron", true); xhttp.send();</script>
	<script type="text/javascript" src="<?php echo $_env->filter('escape', $__tpl_vars__url); ?>/assets/js/plugins/sweetalert.min.js"></script>
	<script type="text/javascript">
		function confirmActionDelete(url) {
		  swal({   
				   title: "<?php echo $_env->filter('escape', $__tpl_vars__textDoYouWantToDeleteThisObject); ?>",
				   type: "warning",   
				   showCancelButton: true,
				   cancelButtonText: "<?php echo $_env->filter('escape', $__tpl_vars__textClose); ?>",
				   confirmButtonColor: "#DD6B55",   
				   confirmButtonText: "<?php echo $_env->filter('escape', $__tpl_vars__textYes); ?>",   
				   closeOnConfirm: false 
				 }, function(){   
					swal({
						title: "<?php echo $_env->filter('escape', $__tpl_vars__textDeleteObject); ?>",
						text: "<?php echo $_env->filter('escape', $__tpl_vars__textThisObjectWillBeDeleted); ?>",
						type: "success"
					}, 
					function(){
					  window.location.href = url;
					})
			  });
		}
	</script>
  </body>
</html>