<?php
require('loader.php');
if(!$Users->isAuthorized()) header('Location: index', true, 302);
if(isset($_GET['edit']) && $Users->getUser($_GET['edit'])){
	if(isset($_POST) && isset($_POST['groupId']) && isset($_POST['email']) && $Users->getUser($_GET['edit'])){
		$_SESSION['result'] = $Users->setUser($_GET['edit'], $_POST['groupId'], $_POST['email']);
		if($_SESSION['result']['status'] == 200 && isset($_POST['status']))
			$Users->setUserStatus($_GET['edit'], $_POST['status']);
	}
	$user = $Users->getUser($_GET['edit']);
	$users = $Users->getUsers();
	$groups = $Groups->getGroups();
	$link->set(array('users' => $users, 'groups' => $groups, 'email' => $user['email'], 'setgroup' => $user['group']['id'], 'status' => $user['status'] ));
}else{
	if(isset($_POST) && isset($_POST['groupId']) && isset($_POST['email'])){
		$password = $Users->generatePassword();
		$_SESSION['result'] = $Users->signUp($_POST['email'], $password, 0, $_POST['groupId'], "yes");
		if($_SESSION['result']['status'] == 200)
			$_SESSION['result']['message'] = $_SESSION['result']['message'] . " with default password : " . $password;
	}elseif(isset($_GET['delete']) && $Users->getUser($_GET['delete']))
		$_SESSION['result'] = $Users->deleteUser($_GET['delete']);
	$users = $Users->getUsers();
	$groups = $Groups->getGroups();
	$link->set(array('users' => $users, 'groups' => $groups, 'setgroup' => ''));
}
$link->set(array('textUsers' => $Translation->translate('Users'), 'textEmail' => $Translation->translate('Email'), 'textGroup' => $Translation->translate('Group'), 'textEnable' => $Translation->translate('Enable'), 'textUserEdit' => $Translation->translate('User Edit') ));
$pageParse = 'core/users.tpl';
require('footer.php');
?>