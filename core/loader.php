<?php
require '../loader.php';
if(!$Users->isAuthorized()) header('Location: /index', true, 302);
?>