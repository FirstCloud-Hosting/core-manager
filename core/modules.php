<?php
require('loader.php');
if(isset($_GET['edit']) && $Modules->getModule($_GET['edit'])){
	if(isset($_POST) && isset($_POST['typeId']) && isset($_POST['name']) && isset($_POST['page']) && $Modules->getModule($_GET['edit']))
		$_SESSION['result'] = $Modules->setModule($_GET['edit'], $_POST['typeId'], $_POST['name'], $_POST['page']);
	$module = $Modules->getModule($_GET['edit']);
	$link->set(array('settype' => $module['type']['id'], 'name' => $module['name'], 'page' => $module['page']));
}else{
	if(isset($_POST) && isset($_POST['typeId']) && isset($_POST['name']) && isset($_POST['page']))
		$_SESSION['result'] = $Modules->insertModule($_POST['typeId'], $_POST['name'], $_POST['page']);
	elseif(isset($_GET['delete']) && $Modules->getModule($_GET['delete']))
		$_SESSION['result'] = $Modules->deleteModule($_GET['delete']);
	$modules = $Modules->getModules();
	$link->set(array('settype' => ''));
}
$modules = $Modules->getModules();

$link->set(array('modules' => $modules, 'types' => $Menu->getTypes()));
$link->set(array('textModules' => $Translation->translate('Modules'), 'textModuleEdit' => $Translation->translate('Module Edit'), 'textName' => $Translation->translate('Name'), 'textType' => $Translation->translate('Type'), 'textPage' => $Translation->translate('Page')));
$pageParse = 'core/modules.tpl';
require('footer.php');
?>