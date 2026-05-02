<?php

class Session
{
    public static function keyExists(string $key): bool
    {
        if (!self::sessionStarted()) {
            session_start();
        }

        return array_key_exists($key, $_SESSION);
    }

    public static function set(string $key, $value): void
    {
        if (!self::sessionStarted()) {
            session_start();
        }

        $_SESSION[$key] = $value;
    }

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

    private static function sessionStarted(): bool
    {
        return (session_status() === PHP_SESSION_ACTIVE);
    }
}
