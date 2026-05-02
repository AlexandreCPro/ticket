<?php

/**
 * Représente une route de l'application.
 *
 * Associe une URL (chemin) à l'identifiant d'un contrôleur (action).
 * Les instances sont enregistrées dans {@see Router} via les méthodes
 * get(), post(), patch(), put() et delete().
 *
 * @package Core
 */
class Route
{
    /**
     * Chemin URL de la route (ex. : '/ticket/show').
     *
     * @var string
     */
    private string $url;

    /**
     * Identifiant du contrôleur à charger (ex. : 'ticket/show').
     *
     * Correspond au chemin relatif du fichier dans le dossier controllers/,
     * sans l'extension .php.
     *
     * @var string
     */
    private string $action;

    /**
     * @param string $url    Chemin URL de la route.
     * @param string $action Identifiant du contrôleur (chemin relatif sans .php).
     */
    public function __construct(string $url, string $action)
    {
        $this->url = $url;
        $this->action = $action;
    }

    /**
     * Retourne le chemin URL de la route.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Retourne l'identifiant du contrôleur à charger.
     *
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
}
