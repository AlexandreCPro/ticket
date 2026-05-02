<?php

include CORE.'Router/Route.php';

<<<<<<< HEAD
$router->get(new Route('/', 'home/index'));
=======
$router->get(new Route('/', 'ticket/index'));
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
$router->get(new Route('/ticket', 'ticket/index'));
$router->get(new Route('/ticket/show', 'ticket/show'));
$router->get(new Route('/ticket/new', 'ticket/new'));
$router->post(new Route('/ticket/store', 'ticket/store'));
$router->get(new Route('/ticket/edit', 'ticket/edit'));
$router->patch(new Route('/ticket/update', 'ticket/update'));
$router->delete(new Route('/ticket/destroy', 'ticket/destroy'));

$router->get(new Route('/login', 'auth/login'));
$router->post(new Route('/login', 'auth/store'));
<<<<<<< HEAD
$router->get(new Route('/logout', 'auth/logout'));

$router->get(new Route('/user', 'user/index'));
$router->get(new Route('/user/new', 'user/new'));
$router->post(new Route('/user/store', 'user/store'));
$router->get(new Route('/user/edit', 'user/edit'));
$router->patch(new Route('/user/update', 'user/update'));
$router->delete(new Route('/user/destroy', 'user/destroy'));

$router->get(new Route('/categorie', 'categorie/index'));
$router->get(new Route('/categorie/new', 'categorie/new'));
$router->post(new Route('/categorie/store', 'categorie/store'));
$router->get(new Route('/categorie/edit', 'categorie/edit'));
$router->patch(new Route('/categorie/update', 'categorie/update'));
$router->delete(new Route('/categorie/destroy', 'categorie/destroy'));
=======
$router->get(new Route('/logout', 'auth/logout'));
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
