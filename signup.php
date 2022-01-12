<?php
require('loader.php');
if($Users->isLogged() && !empty($_POST) && !isset($_POST['signup'])){
	$link->set(array('errorTermsAndConditions' => 'yes'));

}elseif($Users->isLogged() && !empty($_POST['email']) && isset($_POST['password']) && isset($_POST['repeatpassword']) && isset($_POST['signup']) && $_POST['password'] == $_POST['repeatpassword']){

	$result = $Users->signUp($_POST['email'], $_POST['password']);
	if($result && $result['status'] == 200){

		header('Location: /confirm', true, 302);
		exit();

	}elseif($result && $result['status'] == 100)
		$link->set(array('errorApi' => 'yes', 'errorMessage' => $result['message']));

}

$link->parse('signup.tpl');
?>