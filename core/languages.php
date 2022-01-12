<?php
require('loader.php');

if(isset($_GET['edit']) && $Languages->getLanguage($_GET['edit'])){
	if(isset($_POST) && isset($_POST['name']) && isset($_POST['code']) && $Languages->getLanguage($_GET['edit']))
		$_SESSION['result'] = $Languages->setLanguage($_GET['edit'], $_POST['name'], $_POST['code']);
	$language = $Languages->getLanguage($_GET['edit']);
	$languages = $Languages->getLanguages();
	$link->set(array('languages' => $languages, 'name' => $language['name'], 'code' => $language['code']));
}elseif(isset($_GET['translate']) && isset($_GET['file'])){
	if(isset($_POST['msgid']) && isset($_POST['msgstr'])){
		$Languages->setTranslation($_GET['translate'], $_GET['file'], $_POST['msgid'], $_POST['msgstr']);
	}
  $link->set(array( 'translations' => $Languages->getTranslations($_GET['translate'], $_GET['file']) ));
}else{
	if(isset($_POST) && isset($_POST['name']) && isset($_POST['code']))
		$_SESSION['result'] = $Languages->insertLanguage($_POST['name'], $_POST['code']);
	elseif(isset($_GET['delete']) && $Languages->getLanguage($_GET['delete']))
		$_SESSION['result'] = $Languages->deleteLanguage($_GET['delete']);
	$languages = $Languages->getLanguages();
	$link->set(array('languages' => $languages, 'files' => $Languages->getLanguageFiles('fr_FR')));
}

$link->set(array('textLanguages' => $Translation->translate('Languages'), 'textName' => $Translation->translate('Name'), 'textCode' => $Translation->translate('Code'), 'textLanguageEdit' =>$Translation->translate('Language Edit')));

if(isset($_GET['translate']) && isset($_GET['file']))
	$pageParse = 'core/languages-translation.tpl';
else
	$pageParse = 'core/languages.tpl';

require('footer.php');
?>