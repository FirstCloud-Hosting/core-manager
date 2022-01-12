<?php

//CONFIG DATABASE
$dsn = 'mysql:dbname=DB_NAME;host=DB_HOST';
$user = 'DB_USER';
$password = 'DB_PASSWORD';

//CONFIG SECURITY
$secretKey = "SECRET_KEY";

#do not use behind a reverse proxy
$forceSSL = false;

$timezone = "Europe/Paris";

//URL
$url = "URL";

$apiUrl = "API_URL";

$docUrl = "API_DOC";

//MEMCACHE
$memcache = True;
$memcacheHost = "MEMCACHE_HOST";
$memcachePort = 11211;

$environment = "devel";
#$environment = "demo";
#$environment = "production";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo 'Erreur interne au serveur : veuillez reessayer ulterieurement.';
}

if ((empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") && $forceSSL === true) {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (filter_var($location, FILTER_VALIDATE_URL)) {
	    header('HTTP/1.1 301 Moved Permanently');
	    header('Location: ' . $location);
	}else{
	    header('HTTP/1.1 301 Moved Permanently');
	    header('Location: ' . $url);
	}
    exit;
}

require(__DIR__ . '/../classes/class.rest-client.php');
require(__DIR__ . '/../classes/class.users.php');
$RestClient = new RestClient($apiUrl);
$Users = new Users($RestClient);
?>
