<?php $_env->includeTpl('header.tpl', true, Link_Environment::INCLUDE_TPL); ?>
<div class="content-page">
      <div class="page-error tile">
      	<h3><?php echo $_env->filter('escape', $__tpl_vars__textCurrentCoreVersion); ?> : <?php echo $_env->filter('escape', $__tpl_vars__currentVersion); ?></h3>
      	<h3><?php echo $_env->filter('escape', $__tpl_vars__textLastCoreVersion); ?> : <?php echo $_env->filter('escape', $__tpl_vars__lastVersion); ?></h3>
      	<?php if ($__tpl_vars__updateAvailable == 'update') : ?>
	        <p><?php echo $_env->filter('escape', $__tpl_vars__textAnUpdateIsAvailable); ?></p>
	        <p><a class="btn btn-primary" href="update?confirm&<?php echo $_env->filter('escape', $__tpl_vars__tokenName); ?>=<?php echo $_env->filter('escape', $__tpl_vars__token); ?>"><?php echo $_env->filter('escape', $__tpl_vars__textUpgrade); ?></a></p>
    	<?php endif; ?>
      </div>
<?php $_env->includeTpl('footer.tpl', true, Link_Environment::INCLUDE_TPL); ?>