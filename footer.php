<?php
if(isset($_SESSION['result']) && empty($_SESSION['redirected']) && !isset($_SESSION['debug'])){
		$_SESSION['redirected'] = True;
		$location = $url . $_SERVER['REQUEST_URI'];


		if (filter_var($location, FILTER_VALIDATE_URL)) {

			$url_parts = parse_url($location);
			if(isset($url_parts['query']))
				parse_str($url_parts['query'], $query_parts);
			else
				$query_parts = array();
		
			if(array_key_exists('delete', $query_parts)){
				unset($query_parts['delete']);
				header('Location: ' . strtok($location, '?') . '?' . http_build_query($query_parts), true, 302);
			}else
				header('Location: ' . strtok($location, '?'), true, 302);
			exit();
		}
}else{

	if($environment == "devel" && isset($_SESSION['debug'])){
		$link->set(array('debug' => 'on', 'backtrace' => var_export(debug_backtrace(), true), 'getParams' => var_export($_GET, true), 'postParams' => var_export($_POST, true), 'sessions' => var_export($_SESSION, true), 'servers' => var_export($_SERVER, true), 'globals' => var_export($_SESSION['debugRest'], true) ));
	}

	if(isset($pageParse)){
		$link->parse($pageParse);
	}
}
?>