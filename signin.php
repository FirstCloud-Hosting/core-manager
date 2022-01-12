<?php
require('loader.php');
require('classes/class.googleauthenticator.php');
if(!empty($_SESSION['confirmAlert']) && $_SESSION['confirmAlert'] == True){
	$link->set(array('alertConfirm' => 'yes'));
	unset($_SESSION['confirmAlert']);
}elseif(!empty($_POST['email']) && isset($_POST['email']) && empty($_POST['password'])){
	if( $Users->lostPassword($_POST['email'])['status'] == 200 ){
		header('Location: lostpassword?init=success', true, 302);
		exit();
	}
}elseif(!empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['password']) && isset($_POST['password'])){
	$user = $Users->signIn($_POST['email'], $_POST['password']);
	if($user['status'] == 200){
		$user = $user['data'];
		if($Configurations->getConfiguration('maintenanceMode') == "true" && $user['group_id'] != 1){
			header('Location: maintenance', true, 302);
			exit();
		}

		$_SESSION['tokenApi'] = $user['token'];
		$_SESSION['userId'] = $user['user_id'];
		$_SESSION['groupId'] = $user['group_id'];
		$_SESSION['permissions'] = $Groups->getPermissionsByGroupId($user['group_id']);
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$_SESSION['IPaddress'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
		}
		$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['lastActedOn'] = time();
		$_SESSION['randomTokenName'] = getrandmax();
		$user = $Users->getCurrentUser();
		$_SESSION['organizationId'] = $user['organization']['id'];

		if($user['mfa'] == "on"){
			$_SESSION['user2fa'] = "unverified";
			$_SESSION['2faKey'] = $user['mfaKey'];
			$link->set(array('view' => 'mfa'));
		}else{
			$_SESSION['user2fa'] = "off";
			header('Location: index', true, 302);
			exit();
		}
	}else{
		#Authentication error
		if($user)
			$link->set(array('errorSignIn' => 'yes', 'message' => $user['message']));
		else
			$link->set(array('errorSignIn' => 'yes', 'message' => "Unable to reach the authentication server"));
	}
}elseif(!empty($_POST['confirmationCode'])){
	$ga = new PHPGangsta_GoogleAuthenticator();
	if($ga->verifyCode($_SESSION['2faKey'], $_POST['confirmationCode'], 10)){
		$_SESSION['user2fa'] = "verified";
		unset($_SESSION['2faKey']);
		header('Location: index', true, 302);
		exit();
	}
}
$link->parse('signin.tpl');
?>