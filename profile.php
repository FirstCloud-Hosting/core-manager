<?php
require('loader.php');
require('classes/class.googleauthenticator.php');
require('classes/class.appKeys.php');

$appKeys = new AppKeys($RestClient);

if(isset($_POST) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['languageId'])){
	#edit user informations
	$_SESSION['result'] = $Users->editCurrentUser($_POST['password'], $_POST['email'], $_POST['languageId']);

	#change password
	if(isset($_POST['newpassword']) && isset($_POST['repeatnewpassword']) && !empty($_POST['newpassword']) && $_POST['newpassword'] == $_POST['repeatnewpassword'])
		$Users->setUserPassword($_POST['password'], $_POST['newpassword']);

}

if(isset($_GET)){
	if(isset($_GET['appAdd'])){
		$_SESSION['result'] = $appKeys->insertAppKey();
	}elseif(isset($_GET['appEdit'])){
		$appKey = $appKeys->getAppKey($_GET['appEdit']);
		if($appKey){
			if(isset($_POST) && isset($_POST['description'])){
				$_SESSION['result'] = $appKeys->editAppKey($_GET['appEdit'], $_POST['description']);
			}else{
				$link->set(array('view' => 'appEdit', 'description' => $appKey['description'], 'secretKey' => $appKey['secretKey']));
			}
		}else{
			$link->set(array('displayError' => true, 'message' => 'This application key does not exist'));
		}
	}elseif(isset($_GET['appDelete'])){
		if($appKeys->getAppKey($_GET['appDelete'])){
			$_SESSION['result'] = $appKeys->deleteAppKey($_GET['appDelete']);
		}else{
			$link->set(array('displayError' => true, 'message' => 'This application key does not exist'));
		}
	}elseif(isset($_GET['mfa']) && $_GET['mfa'] == "configure"){
		$ga = new PHPGangsta_GoogleAuthenticator();
		$user = $Users->getCurrentUser();
		if(!isset($_POST['confirmationCode'])){
			$secret = $ga->createSecret();
			$qrCodeUrl = $ga->getQRCodeGoogleUrl($Configurations->getConfiguration('siteName') . ' - ' . $user['username'], $secret);
			$link->set(array('view' => 'mfa', 'mfaUrl' => $qrCodeUrl, 'mfaKey' => $secret));
		}elseif(isset($_POST) && isset($_POST['confirmationCode']) && isset($_POST['mfaKey'])){
			if($ga->verifyCode($_POST['mfaKey'], $_POST['confirmationCode'], 2)){
				$Users->enableMFA($_POST['mfaKey']);
				$link->set(array('displaySuccess' => true, 'message' => 'Multi factor authentication has been successfully enabled'));
			}else{
				$link->set(array('displayError' => true, 'message' => 'Multi factor authentication has not been successfully enabled'));
			}
			$link->set(array('view' => 'profile'));
		}
	}elseif(isset($_GET['mfa']) && $_GET['mfa'] == "disable"){
		$Users->disableMFA();
		$link->set(array('displaySuccess' => true, 'message' => 'Multi factor authentication has been successfully disabled'));
		$link->set(array('view' => 'profile'));
	}else{
		$link->set(array('view' => 'profile'));
	}
}else{
	$link->set(array('view' => 'profile'));
}
$user = $Users->getCurrentUser();
$languages = $Languages->getLanguages();

#Translate
$link->set(array('textProfile' => $Translation->translate('Profile'),
	'textUsername' => $Translation->translate('Username'),
	'textOrganizationKey' => $Translation->translate('Organization Key'),
	'textEmail' => $Translation->translate('Email'),
	'textLanguage' => $Translation->translate('Language'),
	'textCurrentPassword' => $Translation->translate('Current Password'),
	'textNewPassowrd' => $Translation->translate('New Password'),
	'textRepeatNewPassowrd' => $Translation->translate('Repeat New Password'),
	'textEnable2FA' => $Translation->translate('Enable 2FA'),
	'textDisable2FA' => $Translation->translate('Disable 2FA'),
	'textTwoFactorAuthentication' => $Translation->translate('Two factor authentication'),
	'textConfirmationCode' => $Translation->translate('Confirmation Code'),
	'textApplicationsKeys' => $Translation->translate('Applications Keys'),
	'textDescription' => $Translation->translate('Description'),
	'textSecretKey' => $Translation->translate('Secret Key'),
	'textCreated' => $Translation->translate('Created'),
	'textNoApplicationsKeys' => $Translation->translate('No applications keys available')
));

#Data
$link->set(array('organizationId' => $user['organization']['id'],
	'email' => $user['email'],
	'languages' => $languages,
	'language' => $user['language']['id'],
	'mfa' => $user['mfa']
));

#Data APP Keys
$getAppKeys = $appKeys->getAppKeys();
if(!empty($getAppKeys))
	$link->set(array( 'appKeys' => $appKeys->getAppKeys() ));

$pageParse = 'profile.tpl';
require('footer.php');
?>