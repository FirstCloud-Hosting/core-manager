<?php
class Users {
	protected $restClient;

	public function __construct(\RestClient $restClient){
		$this->restClient = $restClient;
		session_start();
	}

	public function generateToken(){
		if(PHP_MAJOR_VERSION === 5) $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
		else $_SESSION['token'] = bin2hex(random_bytes(32));
	}

	public function isSignIn(){
		if(in_array(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME), array('signin', 'signup', 'lostpassword', 'confirm', 'maintenance', 'demonstration', 'lock', '404', 'privacy-policy', 'webinars'))) return true;
		return false;
	}

	public function isLogged(){
		if(isset($_SESSION['allow_unauthenticated']) && $_SESSION['allow_unauthenticated'] == True)
			return true;
		if(in_array(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME), array('signin', 'signup', 'lostpassword', 'confirm', 'maintenance', 'demonstration', 'lock', '404', 'privacy-policy', 'webinars')))
			return true;
		if(!isset($_SESSION['userId']) || !isset($_SESSION['groupId']))
			return false;
		if(!isset($_SESSION['IPaddress']) || !isset($_SESSION['userAgent']))
			return false;
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
			if($_SESSION['IPaddress'] != $_SERVER['HTTP_X_FORWARDED_FOR'])
				return false;
		}else{
			if ($_SESSION['IPaddress'] != $_SERVER['REMOTE_ADDR'])
				return false;
		}
		if( $_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT'])
			return false;
		if( $_SESSION['user2fa'] == "unverified")
			return false;
		$this->restClient->module('authentication');
		$result = $this->restClient->get($_SESSION['tokenApi']);
		if($result['data'] == False || (isset($_SESSION['lastActedOn']) && (time() - $_SESSION['lastActedOn'] > 10*60))){
			header('Location: /lock', true, 302);
			exit();
		}else $_SESSION['lastActedOn'] = time();
		if(!isset($_SESSION['token']))
			$this->generateToken();
		return true;
	}

	public function isAuthorized(){

		if(isset($_SESSION['allow_unauthenticated']) && $_SESSION['allow_unauthenticated'] == True)
			return true;

		$page = pathinfo($_SERVER['PHP_SELF']);
		$page = substr($page['dirname'], 1) . '/' . $page['filename'];

		foreach ($_SESSION['permissions'] as $permission) {
			if($permission['module']['page'] == $page)
				return true;
		}
		return false;
	}

	public function lostPassword($email){
		$this->restClient->module('users/lostPassword');
		$result = $this->restClient->post(null, array('email' => $email));
		return $result;
	}

	public function lostPasswordNew($email, $forgotPasswordKey){
		$this->restClient->module('users/lostPassword/newPassword');
		$result = $this->restClient->post(null, array('email' => $email, 'forgotPasswordKey' => $forgotPasswordKey));
		return $result;
	}

	public function signIn($email, $password){
		$this->restClient->module('authentication');
		$result = $this->restClient->post(null, array('email' => $email, 'password' => $password));
		return $result;
	}

	public function signUp($email, $password, $status = 0, $groupId = 3, $admin = "no"){
		if($admin == "no"){
			$this->restClient->module('users');
			$result = $this->restClient->post(null, array('email' => $email, 'password' => $password, 'status' => $status, 'group_id' => $groupId));

			#Used for redirect public SignUp to confirm page
			if($result['status'] == 200)
				$_SESSION['email'] = $email;

		}else{
			$this->restClient->module('users');
			$result = $this->restClient->post($_SESSION['tokenApi'], array('email' => $email, 'password' => $password, 'status' => $status, 'group_id' => $groupId));
		}
		return $result;
	}

	public function confirm($email, $key){
		$this->restClient->module('users/confirm');
		$result = $this->restClient->post(null, array('email' => $email, 'confirmKey' => $key));
		if($result['status'] == 200){
			return true;
		}
		return false;
	}

	public function forgetPassword($email){
		$this->restClient->module('users/forgetPassword');
		$result = $this->restClient->get($_SESSION['tokenApi'], $email);
		if($result['status'] == 200){
			return $result['data'];
		}
		return false;
	}

	public function getCurrentUser(){
		if($_SESSION['userId']){
			$this->restClient->module('users');
			$result = $this->restClient->get($_SESSION['tokenApi'], $_SESSION['userId']);
			return $result['data'];
		}
		return false;
	}

	public function setUser($id, $groupId, $email){
		$this->restClient->module('users');
		$result = $this->restClient->put($_SESSION['tokenApi'], $id, array('email' => $email, 'groupId' => $groupId));
		return $result;
	}

	public function setUserPassword($currentPassword, $password){
		$this->restClient->module('users');
		$result = $this->restClient->put($_SESSION['tokenApi'], 'password', array('currentPassword' => $currentPassword, 'password' => $password));
		return $result;
	}

	public function resetUserPassword($forgotPasswordKey, $password){
		$this->restClient->module('users');
		$result = $this->restClient->put(null, 'password', array('forgotPasswordKey' => $forgotPasswordKey, 'password' => $password));
		return $result;
	}

	public function setUserStatus($id, $status){
		$this->restClient->module('users');
		$result = $this->restClient->put($_SESSION['tokenApi'], $id . '/status', array('status' => $status));
		return $result;
	}

	public function enableMFA($mfaKey){
		$this->restClient->module('users');
		$result = $this->restClient->put($_SESSION['tokenApi'], 'mfa', array('mfa' => "on", 'mfaKey' => $mfaKey));
		if($result['status'] == 200){
			return $result['data'];
		}
		return false;
	}

	public function disableMFA(){
		$this->restClient->module('users');
		$result = $this->restClient->put($_SESSION['tokenApi'], 'mfa', array('mfa' => "off", 'mfaKey' => 'disabled'));
		if($result['status'] == 200){
			return $result['data'];
		}
		return false;
	}

	public function editCurrentUser($currentPassword, $email, $languageId){
		$this->restClient->module('users');
		$result = $this->restClient->put($_SESSION['tokenApi'], $_SESSION['userId'], array('email' => $email, 'currentPassword' => $currentPassword, 'languageId' => $languageId));
		return $result;
	}

	public function deleteUser($id){
		$this->restClient->module('users');
		$result = $this->restClient->delete($_SESSION['tokenApi'], $id);
		return $result;
	}

	public function getUser($id){
		$this->restClient->module('users');
		$result = $this->restClient->get($_SESSION['tokenApi'], $id);
		return $result['data'];
	}

	public function getUsers(){
		$this->restClient->module('users');
		$result = $this->restClient->get($_SESSION['tokenApi']);
		return $result['data'];
	}

	public function getOrganizations(){
		$this->restClient->module('organizations');
		$result = $this->restClient->get($_SESSION['tokenApi']);
		return $result['data'];
	}

	public function getOrganization($id){
		$this->restClient->module('organizations');
		$result = $this->restClient->get($_SESSION['tokenApi'], $id);
		return $result['data'];
	}

	public function countUsers(){
		$this->restClient->module('users/count');
		$result = $this->restClient->get($_SESSION['tokenApi']);
		if($result['status'] == 200)
			return $result['data'];
		else
			return 1;
	}

	public function generatePassword(){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
		$password = substr( str_shuffle( $chars ), 0, 12 );

		return $password;
	}
}
?>