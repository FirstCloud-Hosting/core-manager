<?php
require('loader.php');

#User not logged
if(!isset($_SESSION['username'])){
	header('Location: /signin', true, 302);
	exit();
}

#User is logged
if(!empty($_POST['passwordUnlock']) && isset($_POST['passwordUnlock'])){
	if($user = $Users->signIn($_SESSION['username'], $_POST['passwordUnlock'])){
		if($Configurations->getConfiguration('maintenanceMode') == "true" && $user['groupId'] != 1){
			header('Location: /maintenance', true, 302);
			exit();
		}
		$_SESSION['lastActedOn'] = time();
		if(!isset($_SESSION['page'])){
			header('Location: /index', true, 302);
		}else{
			header('Location: ' . $url . $_SESSION['page'], true, 302);
		}
		exit();
	}else{
		header('Location: /logout', true, 302);
		exit();
	}
}

$link->parse('lock.tpl');
?>