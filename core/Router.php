<?php

<<<<<<< HEAD
class Router
{
    private $routes = [];

=======
/**
 * Routeur frontal de l'application.
 *
 * Associe des URLs et des méthodes HTTP à des fichiers contrôleurs.
 * Supporte le method spoofing pour PATCH et DELETE via le champ
 * caché {@code _method} dans les formulaires HTML.
 *
 * @package Core
 */
class Router
{
    /**
     * Table de routage indexée par méthode HTTP puis par URL.
     *
     * @var array<string, array<string, Route>>
     */
    private $routes = [];

    /**
     * Chemin absolu vers le fichier contrôleur résolu lors du dernier appel à {@see run()}.
     *
     * @var string
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    private $route = '';

    public function __construct() {}

<<<<<<< HEAD
=======
    /**
     * Résout l'URL entrante et inclut le contrôleur correspondant.
     *
     * Applique le method spoofing : si la requête est POST et que
     * $_POST['_method'] vaut PATCH ou DELETE, la méthode effective
     * est remplacée en conséquence.
     * Si aucune route ne correspond, le contrôleur error/404 est chargé.
     *
     * @param  string $url URL de la requête (typiquement $_SERVER['PATH_INFO']).
     * @return void
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public function run(string $url): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'POST') {
            if (array_key_exists('_method', $_POST)) {
                $method = $_POST['_method'];
            }
        }

        $this->route = (array_key_exists($url, $this->routes[$method]))
            ? CTRL.($this->routes[$method][$url]->getAction().'.php')
            : CTRL.'error/404.php';

        include $this->route;
    }

<<<<<<< HEAD
=======
    /**
     * Retourne le chemin du dernier contrôleur résolu.
     *
     * @return string
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public function getRoute(): string
    {
        return $this->route;
    }

<<<<<<< HEAD
=======
    /**
     * Enregistre une route GET.
     *
     * @param  Route $route
     * @return void
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public function get(Route $route)
    {
        $this->routes['GET'][$route->getUrl()] = $route;
    }

<<<<<<< HEAD
=======
    /**
     * Enregistre une route POST.
     *
     * @param  Route $route
     * @return void
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public function post(Route $route): void
    {
        $this->routes['POST'][$route->getUrl()] = $route;
    }

<<<<<<< HEAD
=======
    /**
     * Enregistre une route PATCH.
     *
     * @param  Route $route
     * @return void
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public function patch(Route $route): void
    {
        $this->routes['PATCH'][$route->getUrl()] = $route;
    }

<<<<<<< HEAD
=======
    /**
     * Enregistre une route PUT.
     *
     * @param  Route $route
     * @return void
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public function put(Route $route): void
    {
        $this->routes['PUT'][$route->getUrl()] = $route;
    }

<<<<<<< HEAD
=======
    /**
     * Enregistre une route DELETE.
     *
     * @param  Route $route
     * @return void
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public function delete(Route $route): void
    {
        $this->routes['DELETE'][$route->getUrl()] = $route;
    }
}
