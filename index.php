<?php
require('loader.php');
require('classes/modules/class.news.php');

$link->set(array('textUsers' => $Translation->translate('Users'), 'countUsers' => $Users->countUsers() ));

$News = new News($pdo, $Cache);
$news = $News->getLastNews();
$link->set(array("news1" => $news[0]['news'], 'textNews' => $Translation->translate('News', 'news')));

$link->parse('index.tpl');
?>