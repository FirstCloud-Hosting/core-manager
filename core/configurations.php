<?php
require('loader.php');
if(isset($_GET['flush'])){
	$Cache->flush();
	$_SESSION['result'] = array('status' => 200, 'message' => 'Cache successfully flushed');
}elseif(isset($_FILES['logo'])){
	if($_FILES['logo']['type'] != "image/svg+xml" && end((explode(".", $_FILES["logo"]["name"]))) == "svg" ){
		$_SESSION['result'] = array('status' => 100, 'message' => 'Only SVG format is allowed');
	}else{
		$uploadfile = $work_dir . '/assets/img/logo.svg';
		if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile))
			$_SESSION['result'] = array('status' => 200, 'message' => 'Logo successfully uploaded');
		else
			$_SESSION['result'] = array('status' => 200, 'message' => 'Logo uploading failed');
	}
}elseif(isset($_POST)){
	if(isset($_POST['apiConfigurations'] ) ){
		unset($_POST['apiConfigurations']);
		foreach ($_POST as $name => $value) {
			$_SESSION['result'] = $ApiConfigurations->setConfiguration($name, $value);
		}
	}else{
		foreach ($_POST as $name => $value) {
			if($Configurations->getConfiguration($name)) $_SESSION['result'] = $Configurations->setConfiguration($name, $value);
			else $_SESSION['result'] = $Configurations->insertConfiguration($name, $value);
		}
	}
}
foreach ($Configurations->getConfigurations() as $config) {
	$link->set(array($config['name'] => $config['value']));
}
$stats = $Cache->stats();
$link->set(array('textConfigurations' => $Translation->translate('Configurations'), 'textConfigurationsMode' => $Translation->translate('Configurations Mode'), 'textMaintenanceMode' => $Translation->translate('Maintenance Mode'), 'textEnable' => $Translation->translate('Enable'), 'textDisable' => $Translation->translate('Disable'), 'textMaintenanceMessage' => $Translation->translate('Maintenance Message'), 'textSiteName' => $Translation->translate('Site Name'), 'textSiteDescription' => $Translation->translate('Site Description'), 'textCompanyName' => $Translation->translate('Company Name'), 'textAddress' => $Translation->translate('Address'), 'textPhoneNumber' => $Translation->translate('Phone Number'), 'textRCSNumber' => $Translation->translate('RCS Number'), 'textRCSCity' => $Translation->translate('RCS City'), 'textLegalForm' => $Translation->translate('Legal Form'), 'textShareCapital' => $Translation->translate('Share Capital'), 'textVATNumber' => $Translation->translate('VAT Number'), 'textSIRETNumber' => $Translation->translate('SIRET Number'), 'textClearCache' => $Translation->translate('Clear Cache'), 'textFlushCache' => $Translation->translate('Flush Cache') ));

$link->set(array( 'textInvoiceConfiguration' => $Translation->translate('Invoice Configuration'), 'textPrice' => $Translation->translate('Price'), 'textFreeServers' => $Translation->translate('Free Servers') ));

$link->set(array( 'textLogo' => $Translation->translate('Logo Upload (SVG only)'),
	'textStatusCache' => $Cache->status() ? 'Enabled' : 'Disabled',
	'versionCache'=> $Cache->version(),
	'statsGetHits' => $stats['get_hits'],
	'statsGetMisses' => $stats['get_misses'] ));

$pageParse = 'core/configurations.tpl';
require('footer.php');
?>