<?php

/**
 * Gestionnaire de session HTTP.
 *
 * Fournit une interface statique pour lire et écrire dans $_SESSION.
 * La session est démarrée automatiquement à la première utilisation
 * si elle ne l'est pas déjà.
 *
 * @package Core
 */
class Session
{
    /**
     * Vérifie si une clé existe dans la session.
     *
     * Démarre la session si elle n'est pas encore active.
     *
     * @param  string $key Clé à rechercher dans $_SESSION.
     * @return bool        True si la clé existe, false sinon.
     */
    public static function keyExists(string $key): bool
    {
        if (!self::sessionStarted()) {
            session_start();
        }

        return array_key_exists($key, $_SESSION);
    }

    /**
     * Enregistre une valeur en session.
     *
     * Démarre la session si elle n'est pas encore active.
     *
     * @param  string $key   Clé de session.
     * @param  mixed  $value Valeur à stocker.
     * @return void
     */
    public static function set(string $key, $value): void
    {
        if (!self::sessionStarted()) {
            session_start();
        }

        $_SESSION[$key] = $value;
    }

    /**
     * Lit une valeur depuis la session.
     *
     * Démarre la session si elle n'est pas encore active.
     * Retourne $default si la clé est absente.
     *
     * @param  string           $key     Clé de session.
     * @param  mixed            $default Valeur de repli si la clé est absente.
     * @return array|string|null
     */
    public static function get(string $key, $default = null): array|string|null
    {
        if (!self::sessionStarted()) {
            session_start();
        }

        if(self::keyExists($key)){
            return $_SESSION[$key];
        }else{
            return $default;
        }
    }

    /**
     * Indique si une session PHP est actuellement active.
     *
     * @return bool
     */
    private static function sessionStarted(): bool
    {
        return (session_status() === PHP_SESSION_ACTIVE);
    }
}
