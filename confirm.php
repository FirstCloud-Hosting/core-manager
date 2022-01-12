<?php
require('loader.php');
if(!empty($_GET['email']) && !empty($_GET['key']) && $Users->confirm($_GET['email'], $_GET['key'])){
	$_SESSION['confirmAlert'] = True;
    header('Location: signin', true, 302);
    exit();
}elseif(empty($_SESSION['email'])){
    header('Location: index', true, 302);
    exit();
}

$link->set(array('email' => $_SESSION['email']));
$link->parse('confirm.tpl');
?>