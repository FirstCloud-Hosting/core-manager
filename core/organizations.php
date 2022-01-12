<?php
require('loader.php');
require('../classes/class.organizations.php');
$Organizations = new Organizations($RestClient);
$organizations = $Organizations->getOrganizations();

$link->set(array('organizations' => $organizations,
'textOrganizations' => $Translation->translate('Organizations') ));

$pageParse = 'core/organizations.tpl';
require('footer.php');
?>