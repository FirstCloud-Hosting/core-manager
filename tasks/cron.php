<?php
require 'loader.php';
if(!$Cache->get('clearCacheTime')) $Cache->set('clearCacheTime', time());
$clearCacheTime = $Cache->get('clearCacheTime');

if (time() > strtotime('+1 hour', $clearCacheTime)){
	#clear cache time
	$Cache->delete('clearCacheTime');

	#clear data in cache
	$Cache->delete('news');
}
?>