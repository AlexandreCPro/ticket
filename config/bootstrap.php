<?php

define('VIEWS', ROOT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
define('CTRL', ROOT.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR);
define('CORE', ROOT.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR);

include CORE.'Router.php';
include CORE.'Session.php';
$router = new Router;

include ROOT.'/config/routes.php';
