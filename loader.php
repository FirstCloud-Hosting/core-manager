<?php

#Check if this instance is installed
if(!file_exists('config/config.php') && !file_exists('../config/config.php')){
	header('Location: installer/index', true, 302);
	exit();
}elseif(is_dir('installer') || is_dir('../installer'))
	die('Please remove installer folder');

#Check required libs
if(!function_exists('mcrypt_create_iv')) die('Please install mcrypt php extension');
if(!function_exists('mb_strtoupper')) die('Please install mbstring php extension');

#Load config file
require 'config/config.php';

if($environment == "devel")
	error_reporting(E_ALL);
else
	error_reporting(0);

require 'config/version.php';
require 'classes/Link/Autoloader.php';
require 'classes/class.configurations.php';
require 'classes/class.languages.php';
require 'classes/class.translation.php';
require 'classes/class.menus.php';
require 'classes/class.modules.php';
require 'classes/class.groups.php';
require 'classes/class.updates.php';
require 'classes/class.common-views.php';
require 'classes/class.memcache.php';
require 'classes/class.apiConfigurations.php';

#Initialize memcache
$Cache = new Cache($memcache, $memcacheHost, $memcachePort);

date_default_timezone_set($timezone);

$work_dir = __DIR__;

#Templating Framework
Link_Autoloader::register();
$loader = new Link_Loader_Filesystem($work_dir . '/templates');
$cache = new Link_Cache_Filesystem($work_dir . '/cache');
$link = new Link_Environment($loader, $cache);
#End

#Load all classes always used
$Configurations = new Configurations($pdo, $Cache);
$Languages = new Languages($RestClient);
$Menu = new Menus($RestClient);
$Modules = new Modules($RestClient);
$Groups = new Groups($RestClient);
$ApiConfigurations = new ApiConfigurations($RestClient);
$Updates = new Updates();
$Views = new Views($link);
#End

#Debug mode
if($environment == "devel"){
	if(isset($_GET['debug'])){
		if($_GET['debug'] == "true"){
			$_SESSION['debug'] = "true";
		}else{
			unset($_SESSION['debug']);
		}
	}

	if(isset($_SESSION['debug'])){
		$_SESSION['debugRest'] = array();
	}
}
#End

if(isset($allow_unauthenticated) && $allow_unauthenticated == True)
	$_SESSION['allow_unauthenticated'] = True;

#User is logged?
if($Users->isLogged() == false){
	header('Location: /signin', true, 302);
	exit();
}else{
	if($_SERVER["REQUEST_URI"] != "/modules/informations" ){
		if(isset($_SESSION['personalInformations']) && $_SESSION['personalInformations'] == False){
			header('Location: /modules/informations', true, 302);
			exit();
		}
	}
	if($_SERVER["REQUEST_URI"] != "/lock" && $_SERVER["REQUEST_URI"] != "/tasks/cron")
		$_SESSION['page'] = $_SERVER["REQUEST_URI"];
}
#End

#CSRF Protection
if( ( isset($_POST) && isset($_SESSION['randomTokenName']) && !isset($_POST["token_" . $_SESSION['randomTokenName']]) ) && ( isset($_GET) && !isset($_GET["token_" . $_SESSION['randomTokenName']]) ) && !in_array(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME), array('signin', 'signup', 'recoverpw', 'confirm', 'lock')) ){
	if( isset($_POST) && isset($_POST["token_" . $_SESSION['randomTokenName']]) && $_POST["token_" . $_SESSION['randomTokenName']] != $_SESSION["token_" . $_SESSION['randomTokenName']] ) unset($_POST);
	if( isset($_GET) && isset($_GET["token_" . $_SESSION['randomTokenName']]) && $_GET["token_" . $_SESSION['randomTokenName']] != $_SESSION["token_" . $_SESSION['randomTokenName']] ) unset($_GET);
	if( isset($_GET) && !empty($_GET) && !isset( $_GET["token_" . $_SESSION['randomTokenName']] ) ){
		$location = $url . $_SERVER['REQUEST_URI'];
		if (filter_var($location, FILTER_VALIDATE_URL)) {
			header('Location: ' . strtok($location, '?'), true, 302);
			exit();
		}
	}
	if( isset($_GET) && !empty($_GET) && isset( $_GET["token_" . $_SESSION['randomTokenName']] ) && $_GET["token_" . $_SESSION['randomTokenName']] != $_SESSION["token_" . $_SESSION['randomTokenName']] ){
		$location = $url . $_SERVER['REQUEST_URI'];
		if (filter_var($location, FILTER_VALIDATE_URL)) {
			header('Location: ' . strtok($location, '?'), true, 302);
			exit();
		}
	}
}else{
	if(isset($_SESSION['randomTokenName'])){
		unset($_POST["token_" . $_SESSION['randomTokenName']]);
		unset($_GET["token_" . $_SESSION['randomTokenName']]);
	}
}
#End

#Generate menu
if(!$Users->isSignIn() || pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "lock"){

	if(strstr($_SERVER['REQUEST_URI'], 'core'))
		$currentPage = 'core/' . pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
	elseif (strstr($_SERVER['REQUEST_URI'], 'modules'))
		$currentPage = 'modules/' . pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
	else
		$currentPage = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
	$Users->generateToken();

	$user = $Users->getCurrentUser();
	$language = $Languages->getLanguage($user['language']['id']);
	$Translation = new Translation($language['code'], $work_dir, $Cache);

	#get and translate all types of menu
	$types = $Menu->getTypesMenu();
	if($types)
		$types = $Translation->arrayTranslate($types, 'name', 'core');

	#get and translate all menus
	$menus = $Menu->getMenusByGroup();
	if($menus)
		$menus = $Translation->menuTranslate($menus);

	#format menu for diplay
	$currentType = $Menu->getTypeByPage($currentPage);
	$resultTypes = array();

	if($types){
		foreach ($types as $type){
			if($type['id'] == $currentType){
				$type['expanded'] = "yes";
			}
			array_push($resultTypes, $type);
		}
	}

	//Print Alert
	if(isset($_SESSION['result']) && isset($_SESSION['redirected'])){
		$Views->displayAlert($_SESSION['result']);
		unset($_SESSION['result']);
		unset($_SESSION['redirected']);
	}

	//Set Permissions
	$Views->generateActionsMenu();

	//Set General Data
	$link->set(array('url' => $url,
		'docUrl' => $docUrl,
		'token' => $_SESSION['token'],
		'tokenName' => "token_" . $_SESSION['randomTokenName'],
		'currentPage' => $currentPage,
		'currentType' => $currentType,
		'title' => $Configurations->getConfiguration('siteName'),
		'description' => $Configurations->getConfiguration('siteDescription'),
		'versionApp' => $version));

	//Set Custom Data
	$link->set(array("welcomeUser" => $Translation->translate('Welcome,'),
		'dashboard' => $Translation->translate('Dashboard'),
		'profile' => $Translation->translate('Profile'),
		'logout' => $Translation->translate('Logout'),
		'menuType' => $resultTypes,
		'menu' => $menus
	));

	$link->set(array('textError' => $Translation->translate('Error'),
		'textSuccess' => $Translation->translate('Success'),
		'textDemonstration' => $Translation->translate('Demonstration'),
		'textAdd' => $Translation->translate('Add'),
		'textView' => $Translation->translate('View'),
		'textEdit' => $Translation->translate('Edit'),
		'textDelete' => $Translation->translate('Delete'),
		'textClose' => $Translation->translate('Close'),
		'textYes' => $Translation->translate('Yes'),
		'textNo' => $Translation->translate('No'),
		'textSave' => $Translation->translate('Save'),
		'textReset' => $Translation->translate('Reset'),
		'textExecute' => $Translation->translate('Execute'),
		'textActions' => $Translation->translate('Actions'),
		'textPrevious' => $Translation->translate('Previous'),
		'textNext' => $Translation->translate('Next'),
		'textReturn' => $Translation->translate('Return'),
		'textDoYouWantToDeleteThisObject' => $Translation->translate('Do you want to delete this object?'),
		'textDeleteObject' => $Translation->translate('Delete object'),
		'textThisObjectWillBeDeleted' => $Translation->translate('This object will be deleted'),
		'textDarkMode' => $Translation->translate('Dark Mode')
	));

	#Set Dark Mode
	if(isset($_POST['mode'])){
		if(isset($_POST['mode']) && isset($_POST['darkSwitch']) && $_POST['darkSwitch'] == "on"){
			$_SESSION['mode'] = "dark";
			header('Location: ' . $location = $url . $_SERVER['REQUEST_URI'], true, 302);
		}else{
			unset($_SESSION['mode']);
			header('Location: ' . $location = $url . $_SERVER['REQUEST_URI'], true, 302);
		}
	}
	if(isset($_SESSION['mode']) && $_SESSION['mode'])
		$link->set(array('darkMode' => true));

	#set sidenav-toggled
	if(isset($_POST['sidenav'])){
		if(isset($_POST['sidenav'])){
			if(isset($_SESSION['sidenav']))
				unset($_SESSION['sidenav']);
			else
				$_SESSION['sidenav'] = "toggled";
			header('Location: ' . $location = $url . $_SERVER['REQUEST_URI'], true, 302);
		}
	}
	if(isset($_SESSION['sidenav']) && $_SESSION['sidenav'])
		$link->set(array('sidenav' => true));

	#Demo environment
	if($environment == "demo"){
		$organization = $Users->getOrganizations();
		if($organization){
			$validity = $organization['validity'];
			if($validity == -1){
				$Views->displayDemo("unlimited");
			}elseif($validity == 0){
				header('Location: /demonstration', true, 302);
			}else{
				$Views->displayDemo($validity);
			}
		}
	}

}else{
	//Set General Data
	$link->set(array('url' => 'https://'.$_SERVER['HTTP_HOST'],
		'title' => $Configurations->getConfiguration('siteName'),
		'description' => $Configurations->getConfiguration('siteDescription'),
		'versionApp' => $version
	));
}