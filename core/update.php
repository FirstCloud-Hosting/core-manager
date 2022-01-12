<?php
require('loader.php');

if(isset($_GET['confirm'])) $Updates->updateCore();

if(trim($Updates->getLastVersion()) == trim($version)) $updateAvailable = "noupdate";
else $updateAvailable = "update";

$link->set(array('textCurrentCoreVersion' => $Translation->translate('Current Core Version'), 'textLastCoreVersion' => $Translation->translate('Last Core Version'), 'textAnUpdateIsAvailable' => $Translation->translate('An update is available. Do you want install the latest core version?'), 'textUpgrade' => $Translation->translate('Upgrade')));
$link->set(array('currentVersion' => $version, 'lastVersion' => $Updates->getLastVersion(), 'updateAvailable' => $updateAvailable));
$pageParse = 'core/update.tpl';
require('footer.php');