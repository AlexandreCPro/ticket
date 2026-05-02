<?php

define('ROOT', dirname(__FILE__, 2));

include ROOT.'/config/bootstrap.php';
include CORE.'functions.php';

$router->run($_SERVER['PATH_INFO'] ?? '/');
