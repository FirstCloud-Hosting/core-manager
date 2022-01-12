<?php
require('loader.php');
if(isset($_GET['init']))
	$link->set(array('valid' => "no", 'message' => "An email has just been sent to you to confirm the reset of your password."));

elseif(isset($_GET) && isset($_GET['key']) && !empty($_GET['key'])){
	if(isset($_POST) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['repeatPassword']) && !empty($_POST['repeatPassword'])){
		if($_POST['password'] == $_POST['repeatPassword']){
			$reset = $Users->resetUserPassword($_GET['key'], $_POST['password']);
			$link->set(array('message' => $reset['message']));
		}else
			$link->set(array('message' => "Passwords are not the same."));
	}

}else
	$link->set(array('message' => "Your request is invalid. Please check the link you use."));

$link->parse('lostpassword.tpl');
?>