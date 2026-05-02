<?php

include CORE.'Router/Route.php';

$router->get(new Route('/', 'ticket/index'));
$router->get(new Route('/ticket', 'ticket/index'));
$router->get(new Route('/ticket/show', 'ticket/show'));
$router->get(new Route('/ticket/new', 'ticket/new'));
$router->post(new Route('/ticket/store', 'ticket/store'));
$router->get(new Route('/ticket/edit', 'ticket/edit'));
$router->patch(new Route('/ticket/update', 'ticket/update'));
$router->delete(new Route('/ticket/destroy', 'ticket/destroy'));

$router->get(new Route('/login', 'auth/login'));
$router->post(new Route('/login', 'auth/store'));
$router->get(new Route('/logout', 'auth/logout'));