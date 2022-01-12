<?php
require('loader.php');
$link->set(array('maintenanceMessage' => $Configurations->getConfiguration('maintenanceMessage')));
$link->parse('maintenance.tpl');
?>